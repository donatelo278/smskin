<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sundry\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        return view('public.template.article', [
            'articles' => Article::query()
                ->orderByDesc('id')
                ->paginate(10)
        ]);
    }

    public function show($slug)
    {
        return view('public.show.article', [
            'article' => Article::query()->where('id', $slug)->first(),
        ]);
    }

    public function commentStore (Request $request, ArticleService $service)
    {
        $article = Article::query()->where('id', $request->id)->first();
        if($article == null) dd('Ошибка, такой новости нет');
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1500'
        ]);

        if ($validator->fails()) {
            $messageBag = (object)$validator->getMessageBag();
            return $service->getHtmlMessage($messageBag);
        }
        Comment::query()->create([
           'article_id' => $article->id,
            'message' => $request->message,
            'subject' => $request->subject
        ]);
        return json_encode(['status' => 'ok']);
    }

    public function likeStore(Request $request)
    {
        $article = Article::query()->lockForUpdate()->where('id', $request->id)->first();
        if($article == null) dd('Ошибка, такой новости нет');
        $article->count_like++;
        $article->update();
        return json_encode(['count_like' => $article->count_like]);
    }

    public function viewStore(Request $request)
    {
        $article = Article::query()->lockForUpdate()->where('id', $request->id)->first();
        if($article == null) dd('Ошибка, такой новости нет');
        $article->count_view++;
        $article->update();
        return json_encode(['count_view' => $article->count_view]);
    }
}
