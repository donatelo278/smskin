<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('public.template.main', [
            'articles' => Article::query()
                ->orderByDesc('id')
                ->limit(6)
                ->get(),
        ]);
    }
}
