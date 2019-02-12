@extends('layouts.navb')
@section('content')
<main class="uk-container uk-container-large" uk-height-viewport="offset-top: false">
   <div class="uk-container uk-container-large">
      <div class="uk-section">
         <div class="uk-container">
            <div  uk-grid>
               <div class=" uk-width-expand ">
               	@foreach($blog as $posts)
                  <div class="uk-card uk-card-default uk-card-body">
                     <article class="uk-article">
                        <h3 class="uk-article-title">{{$posts->title}}</h3>
                        <p class="uk-article-meta">Written by {{$posts->nama}} on {{date('d M Y', strtotime($posts->created_at))}}.</p>
                        <p class="uk-text-lead">{!!str_limit($posts->post,200,' ...')!!}</p>
					    <div class="uk-grid-small uk-child-width-auto" uk-grid>
					        <div>
					            <a class="uk-button uk-button-text" href="{{ route('blog.action', [$posts->id, urlencode(date('Y', strtotime($posts->created_at))),preg_replace('/\+/', '-',urlencode(strtolower($posts->title)))]) }}">Read more</a>
					        </div>
					    </div>
                     </article>
                  </div>
                  @endforeach
                  <div class="uk-margin">
               {!! $blog->render() !!}
               </div>                  	
               </div>
               <div class=" uk-visible@m uk-width-1-3">
                  @foreach($blogs as $post1)
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