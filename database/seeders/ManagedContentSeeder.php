<?php

namespace Database\Seeders;

use AO\Component\Models\ManagedContent;
use Illuminate\Database\Seeder;

class ManagedContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultMenus = [
            [
                'name' => 'Main Menu',
                'order' => 1,
            ],
            [
                'name' => 'Footer Menu',
                'order' => 2,
            ],
            [
                'name' => 'Hidden',
                'order' => 3,
            ]
        ];

        foreach ($defaultMenus as $menu) {
            ManagedContent::create([
                'uri' => $menu['name'],
                'locked' => true,
                'order' => $menu['order'],
            ]);
        }
    }
}
