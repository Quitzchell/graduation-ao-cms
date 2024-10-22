<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageSeeder extends Seeder
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
        \Page::create([
            'name' => 'Home',
            'template_name' => 'home',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedManagedContentTable(): void
    {
        \ManagedContent::create([
            'order' => 1,
            'uri' => 'home',
            'parent_id' => 1,
            'linkable_id' => 1,
            'linkable_type' => 'AO\Component\Models\Page',
            'locked' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
