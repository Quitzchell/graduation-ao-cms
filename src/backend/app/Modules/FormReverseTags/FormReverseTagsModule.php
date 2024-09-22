<?php

namespace App\Modules\FormReverseTags;

use AO\Component\Models\Groupable;
use AO\Module\BaseModule;
use AO\Module\Interfaces\RelatedToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FormReverseTagsModule extends BaseModule implements RelatedToModel
{
    protected function parsePivotData()
    {
        if ($this->pivot_data) {
            $this->pivot_data = collect(array_map(
                'trim', explode(',', $this->pivot_data)
            ))->map(function ($item) {
                return explode(':', $item);
            })->pluck(1, 0)->all();
        }

        return $this->pivot_data;
    }

    protected function resolveGroupable()
    {
        if ($this->groupable && !class_exists($this->groupable)) {
            $this->groupable = 'App\\Groupables\\' . $this->groupable;
        }

        return $this->groupable;
    }

    public function groupable()
    {
        $this->resolveGroupable();
        return $this->groupable;
    }

    protected function resolveRelation()
    {
        if ($this->relation_on && !class_exists($this->relation_on)) {
            $this->relation_on = 'App\\Models\\' . $this->relation_on;
        }

        return $this->relation_on;
    }

    protected function loadTagsFromSource()
    {
        if ($this->groupable) {
            return array_values(
                forward_static_call([$this->groupable, 'groups'])
            );

        } elseif ($this->relation_on && $this->relation_name) {

            if ((new $this->relation_on) instanceof \Eloquent) {

                $mapper = function ($item) {
                    return [
                        'id' => $item->getKey(),
                        'name' => $item->{$this->relation_name},
                    ];
                };

                // If the value of the field is a collection, map it to the correct format
                if ($this->value instanceof Collection) {
                    $this->value = $this->value->map($mapper);
                }

                $relation_on = $this->relation_on;

                // Handle reversed relations
                if ($this->reverse_relation) {
                    $reversedTags = $this->getReversedTags($this->reverse_relation, $mapper);
                    if ($this->value->isEmpty()) {
                        $this->value = $reversedTags;
                    } else {
                        $this->value = $this->value->merge($reversedTags);
                    }
                }

                // Handle show_first logic
                if ($this->show_first) {
                    $showFirst = [];
                    $this->show_first = explode(',', str_replace(['[', ']'], '', $this->show_first));
                    $relationModel = new $relation_on();

                    foreach ($this->show_first as $value) {
                        $showFirst[] = $relation_on::where($relationModel->getKeyName(), $value)->first();
                    }

                    $this->show_first = collect($showFirst)->map($mapper)->toArray();
                }

                // Apply filtering based on $this->where
                if ($this->where) {
                    $relation_on = $relation_on::query();
                    $where_values = explode(',', $this->where);

                    foreach ($where_values as $where_value) {
                        $parts = explode(':', $where_value);
                        if (count($parts) > 2) {
                            $relation_on->orWhere($parts[0], $parts[1], $parts[2]);
                        } else {
                            $relation_on->orWhere($parts[0], $parts[1]);
                        }
                    }
                }

                // Fetch and combine tags based on ordering and other criteria
                return $this->combineAndReturnTags($relation_on, $mapper);
            }
        }

        return null;
    }

    protected function getReversedTags($reversedRelations, $mapper)
    {
        // Fetch the tags and map them
        $tags = $this->model->{$reversedRelations}->map($mapper);

        // Return as a Collection directly
        return collect($tags);
    }

    protected function combineAndReturnTags($relation_on, $mapper)
    {
        $tags = [];

        if ($this->order_by) {
            $tags = $relation_on::orderBy($this->order_by)->get()->map($mapper)->toArray();
        } else {
            $tags = $relation_on::get()->map($mapper)->toArray();
        }

        // Combine show_first with tags, ensuring uniqueness
        if ($this->show_first) {
            $tags = array_map("unserialize", array_unique(array_map("serialize", array_merge($this->show_first, $tags))));
        }

        return $tags;
    }


    public function get($model = null)
    {
        $this->hide_label = $this->hideLabel ?: $this->hide_label;

        if (!$this->label) {
            $this->label = 'Label not set';
        }

        if (!$this->value) {
            $this->value = [];
        }

        if (!$this->class) {
            $this->class = 'form-control';
        }

        if (!$this->placeholder) {
            $this->placeholder = '';
        }

        if (!$this->tags) {
            $this->tags = null;
        }

        if (!$this->readonly) {
            $this->readonly = false;
        }

        if (!$this->where) {
            $this->where = false;
        }

        if (!$this->order_by) {
            $this->order_by = false;
        }

        if (!$this->show_first) {
            $this->show_first = false;
        }

        if (!$this->prefix_by) {
            $this->prefix_by = false;
        }

        if (!isset($this->prefix_by_value) && $this->prefix_by_value !== 'null')
            $this->prefix_by_value = false;

        if (!$this->pivot) {
            $this->pivot = false;
        }

        if (!$this->implode) {
            $this->implode = false;
        }

        $this->free_entries = $this->free_entries ? true : ($this->config('free_entries') ? true : false);

        $groupable = $this->resolveGroupable();
        $relation = $this->resolveRelation();


        if (!$this->tags) {
            $this->tags = $this->loadTagsFromSource();
        }

        // Used in some of Module A/Degenaar/Museumnacht? Probably can be removed
        if (!$this->tags && $this->config_tags && config($this->config_tags, false)) {
            $this->keyed_tags = array_map('utf8_decode', config($this->config_tags, false));

            $this->tags = collect($this->keyed_tags)->map(function ($v, $k) {
                return ['id' => $k, 'name' => $v];
            })->values()->all();

            $valueField = 'name';
        }

        if (is_string($this->tags)) {
            $this->tags = explode(',', $this->tags);
        }

        $this->id = 'tags_' . uniqid() . rand(0, 1000);

        // Fetch groupable relation
        if ($model instanceof \Eloquent && $groupable) {
            $pivot_data = $this->parsePivotData();

            /** @var Groupable $groupable */
            $this->value = $groupable::linkableRelation($model, $pivot_data)->get();
        }

        // if there are old values, overwrite value with old value
        if ($old = old($this->name)) {
            $this->value = [];
            foreach ($old as $oldKey => $oldValue) {
                $this->value[] = [
                    'id' => $oldKey,
                    'name' => $oldValue,
                ];
            }

            $valueField = 'name';
        }

        if ($this->store_keys) {
            // If we are using the module with a relation, map the value to the keys of the available tags
            // Allows the use of tags based on a relation inside blocks and templates
            if ($relation) {
                $tags = [];
                foreach ($this->tags as $k => $v) {
                    $tags[$v['id']] = $k;
                }

                $mapper = function ($v) use ($tags) {
                    return array_key_exists($v, $tags) ? $this->tags[$tags[$v]] : "";
                };

                // If we are using keyed_tags, map the value to the keyed tags
            } elseif ($this->keyed_tags !== null) {
                $mapper = function ($v, $k) {
                    return array_key_exists($k, $this->keyed_tags) ? $this->keyed_tags[$k] : "";
                };
            }

            if (isset($mapper)) {
                $this->value = collect($this->value);

                if ($this->keyed_tags !== null) {
                    $this->value = $this->value->flip();
                }

                $this->value = $this->value->map($mapper)->all();
            }
        }

        if (is_string($this->value) && (config('content.tags.implode', false) || $this->implode)) {
            $this->value = array_map('trim', explode(',', $this->value));
        }
        // TODO Refactor valueField logic
        foreach ($this->value as $key => $val) {
            if ($val instanceof Groupable) {
                $this->value[$key] = $val->name;
            } elseif (is_array($val)) {
                $this->value[$key] = $val;

                if (isset($val['name'])) {
                    $valueField = 'name';
                }
            } elseif (!is_string($val) && is_array($val->toArray())) {
                $valArray = $val->toArray();
                $this->value[$key] = $valArray;

                if (isset($valArray['name'])) {
                    $valueField = 'name';
                }
            } else {
                $this->value[$key] = ['name' => $val, 'id' => $key];

                $valueField = 'name';
            }
        }

        $this->magicSuggest = [
            'allowFreeEntries' => $this->free_entries,
            'typeDelay' => 100,
            'maxSelection' => $this->max ? intval($this->max) : 999,
            'maxSelectionText' => trans('ao_module::admin.max-selected'),
            'expandOnFocus' => true,
            'valueField' => $valueField ?? 'id',
            'placeholder' => $this->placeholder === 'false' ? '' : ($this->placeholder ?: trans('ao_module::admin.add-tag')),
            'data' => $this->tags !== null ? $this->tags : url(
                $this->uri ?: 'api/complete-tags'
            ),
        ];
    }

    public function post()
    {
        $this->resolveGroupable();

        if ($this->groupable && $this->model) {
            forward_static_call_array([$this->groupable, 'sync'], [
                $this->model, $this->value, $this->parsePivotData()
            ]);
        } else {
            if ($this->relation_on && $this->model) {
                $value = $this->value ? array_keys(array_filter($this->value)) : [];
                $value = $this->filterOutReversedRelations($value);

                if (is_array($value)) {
                    $newEntries = array_filter($value, function ($entry) {
                        return is_string($entry);
                    });
                    foreach ($newEntries as $key => $newEntry) {
                        $model = new $this->relation_on();
                        $model->{$this->relation_name} = $newEntry;
                        $model->save();
                        $value[$key] = $model->{$model->getKeyName()};
                    }
                }

                if ($this->pivot) {
                    $this->pivot = collect(json_decode($this->pivot))->mapWithKeys(function ($value, $name) {
                        return [$name => $value];
                    })->toArray();
                    $value = collect($value)->mapWithKeys(function ($val) {
                        return [$val => $this->pivot];
                    })->toArray();
                }

                $this->model->{$this->name}()->sync($value);
            }
        }

        if ((config('content.tags.implode', false) || $this->implode) && is_array($this->value)) {
            return implode(', ', array_diff($this->value, [''])) ?: '';
        }

        if ($this->store_keys && $this->_parent) {
            $v = array_diff($this->value ?: [], ['']);
            $keys = array_keys($v);
            $prev = $this->_parent->contents($this->name);

            $keep = array_intersect($prev, $keys);
            $new = array_diff($keys, $keep);

            $r = array_diff(array_merge($keep, $new), ['']);

            return $r;
        }

        return is_array($this->value) ? array_filter($this->value) : ($this->value ?: '');
    }

    protected function filterOutReversedRelations($values): array
    {
        $filter = [];
        foreach ($this->model->{$this->reverse_relation} as $reversedRelation) {
            $relatedPivotKeyName = $reversedRelation->{$this->name}()->getRelatedPivotKeyName();
            if ($reversedRelation->relationships()->where($relatedPivotKeyName, $this->model->getKey())->exists()) {
                $filter[] = $reversedRelation->getKey();
            };
        }

        return array_filter($values, function ($value) use ($filter) {
            return !in_array($value, $filter);
        });
    }

    protected function getPrefixedRelations($relation_on, $prefixBy, $parentId = 0, $query = '', $bindings = [], $modelType = '', $prefixName = '')
    {
        if (is_string($relation_on)) {
            if ($parentId == 'null') {
                $currentQuery = $relation_on::whereNull($prefixBy);
                $currentSqlQuery = $relation_on::whereNull($prefixBy)->toSql();
                $currentBindings = $currentQuery->getBindings();
            } else {
                $currentQuery = $relation_on::where($prefixBy, $parentId);
                $currentSqlQuery = $relation_on::where($prefixBy, $parentId)->toSql();
                $currentBindings = $currentQuery->getBindings();
            }
        } else {
            if ($parentId == 'null') {
                $currentQuery = $relation_on->whereNull($prefixBy);
                $currentSqlQuery = $relation_on->whereNull($prefixBy)->toSql();
                $currentBindings = $relation_on->getBindings();
            } else {
                $currentQuery = $relation_on->where($prefixBy, $parentId);
                $currentSqlQuery = $relation_on->where($prefixBy, $parentId)->toSql();
                $currentBindings = $relation_on->getBindings();
            }
        }

        $items = [];

        if (empty($query) && empty($bindings) && empty($modelType)) {
            foreach ($currentQuery->get() as $item) {
                if (empty($currentBindings)) {
                    if (is_string($relation_on)) {
                        $currentSqlQuery = $relation_on::where($prefixBy, $item->{$item->getKeyName()})->toSql();
                    } else {
                        $currentSqlQuery = $relation_on->where($prefixBy, $item->{$item->getKeyName()})->toSql();
                    }

                    $currentBindings[] = $item->{$item->getKeyName()};
                } else {
                    $currentBindings[array_key_last($currentBindings)] = $item->{$item->getKeyName()};
                }

                foreach ($this->getPrefixedRelations($relation_on, $prefixBy, $item->{$item->getKeyName()}, $currentSqlQuery, $currentBindings, get_class($item), $item->{$this->relation_name}) as $prefixedItem) {
                    $items[] = $prefixedItem;
                }
            }
        } else {
            foreach (DB::select((DB::raw($query)), $bindings) as $item) {
                $item->{$this->relation_name} = $prefixName . ' - ' . $item->{$this->relation_name};
                $items[] = new $modelType((array)$item);
            }
        }

        return collect($items);
    }
}
