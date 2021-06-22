@extends('public.layouts')
@section('content')
    @foreach($articles as $article)
        <div class="row">
            <div class="col-12">
                <hr />
                <a href="{{ route('article-show', $article->id) }}">{{ $article->title }}</a><br />
                <img src="{{ asset('storage/images/default.png') }}" style="width: 100px; height: 100px;"/> <br />
                {{ $article->desc }}<br />
            </div>
        </div>
    @endforeach
@endsection
