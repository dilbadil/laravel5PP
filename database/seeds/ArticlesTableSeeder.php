<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

use Faker\Factory as Faker;
use App\Article;
use App\User;
use App\Tag;

use Laracasts\TestDummy\Factory as TestDummy;

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Article');

        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) 
        {
            $tagIds = $this->getTagLists();
            $userIds = User::lists('id');
            $userId = Collection::make($userIds)->random();

            $article = new Article;
            $article->user_id = $userId;
            $article->title = $faker->sentence;
            $article->body = $faker->paragraph(20);
            $article->excerpt = $article->generateExcerpt();
            $article->slug = $article->generateSlug();
            $article->save();
            $article->tags()->attach($tagIds);
        }
    }

    /**
     * Get tag lists from ids of tag.
     *
     * @return array
     */
    private function getTagLists()
    {
        $faker = Faker::create();
        $tagIds = Tag::lists('id');

        return $faker->randomElements($tagIds, $faker->numberBetween(2, count($tagIds)));
    }

}
