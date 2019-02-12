@extends('layouts.navb')
@section('content')
<main class="uk-container uk-container-large" uk-height-viewport="offset-top: false">
   <div class="uk-container uk-container-large">
      <div class="uk-section">
         <div class="uk-container">
            <div  uk-grid>
               <div class=" uk-width-expand ">
                <div class="uk-child-width-1-3@s uk-grid-small" uk-grid>
                @foreach($gallery as $gal)
                <a href="#more" uk-toggle><img class="uk-border-rounded" width="350" height="350" src="/img/galleries/{{$gal->image}}" alt="{!! $gal->caption !!}"></a>
                    <div id="more" uk-modal>
                        <div class="uk-border-rounded uk-modal-dialog uk-modal-body">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <h2 class="uk-modal-title uk-text-center uk-text-capitalize">{!!$gal->caption!!}</h2>
                            <img class="uk-border-rounded" src="/img/galleries/{{$gal->image}}" alt="{!! $gal->caption !!}">
                        </div>
                    </div>
                    @endforeach  
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