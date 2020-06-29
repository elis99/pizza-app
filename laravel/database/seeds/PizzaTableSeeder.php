<?php

use Illuminate\Database\Seeder;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pizzas')
            ->delete();
        \DB::table('pizzas')
            ->insert([
                [
                    'id' => 1,
                    'name' => 'Pepperoni',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 5 ,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 2,
                    'name' => 'Pepperoni Spicy',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 6,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 3,
                    'name' => 'Pepperoni Double',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 7,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 4,
                    'name' => 'Pepperoni with mushrooms',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 6,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 5,
                    'name' => 'Pepperoni',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 5,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 6,
                    'name' => 'Pepperoni',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 5 ,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 7,
                    'name' => 'Pepperoni',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 5 ,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],
                [
                    'id' => 8,
                    'name' => 'Pepperoni with extra cheese',
                    'description' => 'Great crust, gooey cheese, and tons of pepperoni',
                    'price' => 5 ,
                    'img_url' => 'https://cdn.ruled.me/wp-content/uploads/2014/08/pepperonipizza.jpg'
                ],

            ]);
    }
}
