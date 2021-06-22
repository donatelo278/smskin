<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<= 20; $i++)
        {
            $arr[] = [
              'title' => Str::random(20),
                'desc' => Str::random(200),
                'count_like' => 0,
                'count_view' => 0,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        Article::query()->insert($arr);
    }
}
