<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::query()->get();
        foreach ($articles as $article)
        {
            $ar[] = [
                'title' => Str::random(10),
                'article_id' => $article->id,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            $ar[] = [
                'title' => Str::random(10),
                'article_id' => $article->id,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        Tag::query()->insert($ar);
    }
}
