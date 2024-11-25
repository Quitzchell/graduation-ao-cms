<?php

namespace Database\Seeders;

use AO\Component\Models\ManagedContent;
use AO\Component\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedPageTable();
        $this->seedManagedContentTable();
    }

    private function seedPageTable(): void
    {
        Page::create([
            'name' => 'Review',
            'template_name' => 'review',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedManagedContentTable(): void
    {
        ManagedContent::create([
            'order' => 1,
            'uri' => 'review',
            'parent_id' => 1,
            'linkable_id' => 3,
            'linkable_type' => 'AO\Component\Models\Page',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
