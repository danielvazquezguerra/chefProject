<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $numUsers = 50;
        $numPosts = 10;
        $numUsersPosts = 100;

        factory(User::class, $numUsers)->create();
        factory(Post::class, $numPosts)->create();

        for ( $i=0; $i<$numUsersPosts; $i++) {
            DB::table('post-user')->insert([
                'curso_id' => random_int(1,10),
                'user_id' => random_int(1, 50),
            ]);
        }

    }
}
