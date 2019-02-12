@extends('layouts.app')
@section('content')
<h1 class="uk-text-center">Articles</h1>
   @foreach($article as $posts)
   <div class="uk-overlay uk-overlay-secondary uk-card-body">
      <article class="uk-article">
         <h3>{{$posts->title}}</h3>
         <p class="uk-article-meta">Written by {{$posts->writer}} on {{date('d M Y', strtotime($posts->created_at))}}.</p>
         <p>{!!str_limit($posts->post,200,' ...')!!}</p>
         <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div>
               <a class="uk-button uk-button-text" href="{{ route('article.action', [$posts->id, urlencode(date('Y', strtotime($posts->created_at))),preg_replace('/\+/', '-',urlencode(strtolower($posts->title)))]) }}">Read more</a>
            </div>
         </div>
      </article>
   </div>
   @endforeach
   <div class="uk-margin">
      {!! $article->render() !!}
   </div>
@endsection
