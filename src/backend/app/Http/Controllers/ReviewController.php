<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AO\Module\Modules\Form\FormModule;
use App\Models\Review;
use ObjectManager;

class ReviewController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Review::class);

        parent::__construct();
    }

//    public function postAdd()
//    {
//        if (\request()->input('reviewable')) {
//            [$reviewableType, $reviewableId] = explode(':', \request()->input('reviewable'));
//
//            \request()->merge([
//                'reviewable_type' => $reviewableType,
//                'reviewable_id' => $reviewableId,
//            ]);
//        }
//
//        $model = Review::create([
//            'title' => \request()->input('title'),
//            'review' => \request()->input('review'),
//            'reviewable_type' => $reviewableType,
//            'reviewable_id' => $reviewableId,
//            'excerpt' => \request()->input('excerpt'),
//            'score' => \request()->input('score'),
//        ]);
//
//        $id = $model->getKey();
//
//        return $this->modelRedirect("view/$id");
//    }
}
