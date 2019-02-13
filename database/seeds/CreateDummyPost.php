<?php


use App\Post;
use Illuminate\Database\Seeder;

class CreateDummyPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = ['ItSolutionStuff.com', 'Webprofile.me', 'HDTuto.com', 'Nicesnippets.com'];


        foreach ($posts as $key => $value) {

            Post::create(['title'=>$value]);

        }
    }
}
