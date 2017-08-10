<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create();
        factory(App\Category::class, 1)->create();
        factory(App\Supplier::class, 1)->create();
        // factory(App\Menu::class, 10)->create();
        // factory(App\Receipt::class, 5)->create();
        factory(App\Company::class, 1)->create();
        factory(App\SystemSetting::class, 1)->create();
        // factory(App\Order::class, 10)->create();
    }
}
