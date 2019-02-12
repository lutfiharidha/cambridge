@extends('layouts.navb')
@section('title')
| {{ $posts->title}}
@endsection
@section('meta')
{{ $posts->meta}}
@endsection
@section('meta')
{{ $posts->keyword}}
@endsection
@section('content') 
<main id="main" class="uk-container uk-container-large uk-margin-top uk-margin-bottom" uk-height-viewport="offset-top: false">
   <div class="uk-container uk-container-large">
      <div class="uk-section">
         <div class="uk-container">
            <div  uk-grid>
               <div class=" uk-width-expand ">
                  <div class="uk-card uk-card-default uk-card-body">
                     <article class="uk-article">
                        <h1 class="uk-article-title uk-text-center">{{$posts->title}}</h1>
                        <center><img width="500" height="500" class="uk-margin-small-bottom"  src="/img/stories/{{$posts->image}}" alt="{{$posts->title}}"></center>
                        <p class="uk-article-meta">Written by {{$posts->writer}} on {{date('d M Y', strtotime($posts->created_at))}}.</p>
                        <p class="uk-text-lead uk-text-justify">{!!$posts->post!!}</p>
                     </article>
                  </div>
                  <div id="top"></div>
               </div>
               <div class=" uk-visible@m uk-width-1-3">
                  @foreach($blog as $post1)
                  <div class="uk-card uk-card-default uk-card-body uk-margin-bottom uk-width-1">
                     <h3 class="uk-card-title">{{$post1->title}}</h3>
                     <p class="uk-text-justify">{!!str_limit($post1->post,100,' ...')!!}</p>
                     <a class="uk-label uk-button" href="{{ route('blog.action', [$post1->id, urlencode(date('Y', strtotime($post1->created_at))),preg_replace('/\+/', '-',urlencode(strtolower($post1->title)))]) }}">Read more</a>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection