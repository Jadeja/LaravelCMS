<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
    	factory(App\User::class,10)->create()->each(function($user){

    		$user->posts()->save(factory(App\Post::class )->make());
    		
    	});
    	factory(App\Role::class,3)->create();    	
    	factory(App\Category::class,5)->create();    	
    	factory(App\Photo::class,1)->create();    	


        // $this->call(UsersTableSeeder::class);
    }
}
