@extends('layouts.nav')
@section('content')
<div class="uk-visible@m uk-position-center uk-overlay uk-overlay-default uk-text-center uk-h1">CAMBRIDGE SCHOOL<br>LHOKSEUMAWE</div>
</div>
<div class="uk-background-fixed uk-background-cover" style="background-image: url(http://www.training.risk.net/sites/default/files/styles/full_image_original/public/2018-03/Risk%20Training%20Web%20Background.jpg?h=c2d33084&itok=84EM2HGk);">
   <div class="uk-overlay uk-overlay-default">
      <div class="uk-padding-large uk-container uk-container-small">
         <h1 class="uk-text-center">CAMBRIDGE SCHOOL</h1>
         <p class="uk-text-justify">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>
      <div class="uk-padding-large uk-container uk-container-small">
         <h1 class="uk-text-center">WHY CAMBRIDGE SCHOOL</h1>
         <p class="uk-text-justify uk-text-justify">
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>
   </div>
</div>
<div class="uk-background-fixed uk-background-cover" style="background-image: url(https://www.greatwhitenorth.com/wp-content/uploads/Generic_BG11_Dark.png);">
   <div class="uk-padding uk-container uk-container-small">
      <div class="uk-overlay uk-overlay-default">
         <div>
            <div class="uk-card-body">
               <h1>VISION</h1>
               <p class="uk-text-justify uk-text-middle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
            </div>
         </div>
         <div>
            <div class="uk-card-body">
               <h1>MISSION</h1>
               <p class="uk-text-justify uk-text-middle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="pricing" class="uk-background-fixed uk-background-cover" style="background-image: url(http://www.training.risk.net/sites/default/files/styles/full_image_original/public/2018-03/Risk%20Training%20Web%20Background.jpg?h=c2d33084&itok=84EM2HGk);">
   <div class="uk-overlay uk-overlay-default uk-padding-large">
      <h1 class="uk-heading-line"><span>PRICING</h1>
      <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
         @foreach($package as $pack)
         <div>
            <div class="uk-card uk-card-secondary uk-card-body">
               <h3 class="uk-card-title">{{$pack->name}} <span class="uk-label">{{$pack->price}} / {{$pack->until}}</span></h3>
               <div class="uk-text-middle"> 
                  {!!str_limit($pack->description,300,' ...')!!}
               </div>
               <a class="uk-button uk-button-text" >
               <p><a class="uk-button uk-button-primary uk-text-center uk-margin-large-top" href="{{ route('order.action', [$pack->id, preg_replace('/\+/', '-',urlencode(strtolower($pack->name)))]) }}">Order Now</a></p>
            </div>
         </div>
         @endforeach
         <div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-position-center uk-overlay uk-overlay-default uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <form class=" uk-align-center" method="POST" action="{{ route('login') }}">
                        @csrf
    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" type="email" name="email" required autofocus>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline ">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" type="password" name="password" required>
        </div>
    </div>
    <div class="uk-margin">
    <div class="uk-inline uk-float-right">
      <button class="uk-button uk-button-primary">Login</button>
    </div>
</div>
</form>
    </div>
</div>
      </div>
   </div>
</div>
<div id="stories" class="uk-padding uk-visible@l uk-background-fixed uk-position-relative uk-visible-toggle uk-light" uk-slideshow="ratio: 9:3;animation: push" style="background-image: url(https://www.chan-naylor.com.au/wp-content/uploads/2017/12/allher-testimonial-background.jpg);">
   <ul class="uk-slideshow-items">
      @foreach($stories as $story)
      <li>
         <div class="uk-position-center uk-position-small uk-text-center uk-flex uk-padding-small uk-width-1-2@s">
            <div class="image-cropper  uk-align-center">
            <img class="testi" uk-slideshow-parallax="y: -50,0,0; opacity: 1,1,0" src="/img/stories/{{$story->image}}" alt="{{$story->name}}">
            </div>
            <h3 class="uk-text-capitalize" uk-slideshow-parallax="y: 0,0,0; opacity: 1,1,0">{{$story->name}}</h3>
            <div uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">{!!$story->post!!}</div>
            <i class="uk-text-small uk-text-italic" uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">{{$story->class}}, {{$story->year}}</i>
         </div>
      </li>
      @endforeach
   </ul>
   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
   <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div>
<div class="uk-padding uk-visible@l">
  <h1 class="uk-text-center">OUR LOCATION</h1>
  <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248.34297279293614!2d97.13832987408858!3d5.185760511950998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3047830a8b242f65%3A0xef45f792e3a195f6!2sCambrige+School+Lhokseumawe!5e0!3m2!1sid!2ssg!4v1540024206074" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></center>
</div>
@endsection