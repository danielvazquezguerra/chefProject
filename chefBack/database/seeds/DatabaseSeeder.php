<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Recipe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Post::truncate();
        Recipe::truncate();
        DB::table('post-user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $numUsers = 50;
        $numPosts = 10;
        $numUsersPosts = 100;
        $numRecipes = 30;
        $numRecipesPosts = 100;

        factory(User::class, $numUsers)->create();
        factory(Post::class, $numPosts)->create();
        factory(Recipe::class, $numRecipes)->create();

        for ( $i=0; $i<$numUsersPosts; $i++) {
            DB::table('post-user')->insert([
                'post_id' => random_int(1,10),
                'user_id' => random_int(1, 50),
            ]);
        }

        for ( $i=0; $i<$numRecipesPosts; $i++) {
            DB::table('post-user')->insert([
                'recipe_id' => random_int(1,30),
            ]);
        }

    }
}
