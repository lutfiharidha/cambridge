<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cambridge School Lhokseumawe @yield('title')</title>
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/css/uikit.min.css" />
      <link rel="stylesheet" href="{{ url('css/app.css') }}" />
<style type="text/css">
  ::-webkit-scrollbar{width: 7px;}::-webkit-scrollbar-track{box-shadow: inset 0 0 0 grey;border-radius: 3px;}::-webkit-scrollbar-thumb{background: darkblue;border-radius: 10px;}::-webkit-scrollbar-thumb:hover{background: darkblue;}
</style>
<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit-icons.min.js"></script>
</head>
<body>
    <div class="uk-background-secondary uk-light">
            <div class="uk-container uk-text-right uk-text-white uk-text-small uk-container-medium">
               <span class="uk-margin-right">
               <span uk-icon="receiver"></span> 0853-6460-5541  </span>
               <span>
               <span uk-icon="mail"> </span> Lutfiharidha1337@gmail.com
               </span>
            </div>
         </div>
                  <div class="uk-hidden@l uk-offcanvas-content">

         <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <nav class="uk-navbar-item uk-logo uk-navbar-container uk-width-expand" uk-toggle="target: #offcanvas-flip" uk-icon="icon: menu; ratio: 2">CAMBRIDGE SCHOOL</nav>
<div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar">
<div class="uk-active uk-divider uk-logo">
                           <a href="/">Cambridge School</a>
                        </div>          <hr>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active uk-margin"><a href="{{ route('beranda') }}" uk-scroll>Home</a></li>
                <li  class="uk-active uk-margin"><a href="{{ route('blog') }}">Blog</a></li>
                <li class="uk-active uk-margin"><a href="{{ route('announcement') }}">Announcement</a></li>
                <li class="uk-active uk-margin"> <a href="{{ route('galleries') }}" >Gallery</a></li>
               <li class="uk-active uk-margin"><a href="/#pricing">Pricing</a></li>
                <li class="uk-active">@guest
                              <a href="#modal-center"><button class="uk-button uk-button-primary">Login</button></a>
                                    @else
      <a href="/home"><button class="uk-button uk-button-primary"> Dashboard</button></a>
      @endguest<div id="modal-center" class="uk-flex-top" uk-modal>
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
                           </li>
                        </ul>

        </div>
    </div>
</div>
</div>
               <nav class="uk-visible@m uk-navbar-transparent uk-container uk-container-medium" uk-navbar>
                  <div class="uk-navbar-left" >
                     <a class="uk-margin-small-top uk-navbar-item uk-logo"><img width="80" height="80" src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7b/University_of_Cambridge_coat_of_arms_official_version.svg/884px-University_of_Cambridge_coat_of_arms_official_version.svg.png"></a>
                  </div>
                  <div class="uk-navbar-right">
                     <div>
                        <ul class="uk-navbar-nav ">
                           <li class="uk-active">
                              <a class="uk-button uk-button-text" href="{{ route('beranda') }}">Home</a>
                           </li>
                           <li class="uk-active">
                              <a class="uk-button uk-button-text" href="{{ route('blog') }}">Blog</a>
                           </li>
                           <li class="uk-active">
                              <a class="uk-button uk-button-text" href="{{ route('announcement') }}">Announcement</a>
                           </li>
                           <li class="uk-active">
                              <a class="uk-button uk-button-text" href="{{ route('galleries') }}" >Gallery</a>
                           </li>
                           <li>
                              <a href="/#pricing"> <button class="uk-button uk-button-secondary">Pricing</button></a>
                           </li>
                           <li>
                            @guest
                              <a href="#modal-center" uk-toggle><button class="uk-button uk-button-primary"> Login</button></a>
                                    @else
      <a href="/home"><button class="uk-button uk-button-primary"> Dashboard</button></a>
      @endguest
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
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
               <hr>
            @yield('content')
 <div class="uk-visible@m uk-background-cover uk-padding uk-dark" style="background-image: url(http://www.training.risk.net/sites/default/files/styles/full_image_original/public/2018-03/Risk%20Training%20Web%20Background.jpg?h=c2d33084&itok=84EM2HGk);">
      <div class="uk-container">
         <div  uk-grid>
                <div class=" uk-visible@m uk-width-1-3 uk-text-center">
               <img width="80" height="80" src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7b/University_of_Cambridge_coat_of_arms_official_version.svg/884px-University_of_Cambridge_coat_of_arms_official_version.svg.png"><br>Jalan Lorem ipsum<br>Lhokseumawe, Aceh - Indonesia<br>Telp/Fax : 000000000<br>info@copany.com
            </div>
            <div class="uk-width-expand">
              <h4 class="uk-heading-line"><span>Find Us On</span></h4>
              <div class="uk-text-center uk-margin-top">
            <span class="uk-margin-right" uk-icon="icon: facebook; ratio: 2.3"></span>
            <span class="uk-margin-right" uk-icon="icon: whatsapp; ratio: 2.3"></span>
            <span class="uk-margin-right" uk-icon="icon: instagram; ratio: 2.3"></span>
          </div>
            <h4 class="uk-heading-line uk-margin-top"><span>External Link</span></h4>
              <ul class="uk-list uk-list-large uk-text-muted">
                <li><a class="uk-button uk-button-text" href="https://www.mekode.com/">Mekode</a></li>
                <li><a class="uk-button uk-button-text" href="">Risetdikti</a></li>
                <li><a class="uk-button uk-button-text" href="">Cambridge</a></li>
              </ul>
            </div>
            <div class=" uk-visible@m uk-width-1-3">
              <form>

    <div class="uk-margin">
        <div class="uk-form-controls">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Email">
        </div>
    </div>

        <div class="uk-margin">
        <div class="uk-form-controls">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Name">
        </div>
    </div>

 <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Message"></textarea>
        </div>
    <button class="uk-float-right uk-button uk-button-primary uk-text-white">Send</button>

</form>
            </div>
         </div>
      </div>
      
    </div>
    <div class="uk-background-secondary">
            <div class="uk-container uk-text-white uk-text-small uk-container-medium">
              <div class="uk-padding uk-hidden@l uk-text-center uk-light">
                <a class="uk-button uk-button-text" href="">Facebook</a>
                <a class="uk-button uk-button-text" href="">WhatsApp</a>
                <a class="uk-button uk-button-text" href="">Instagram</a><br>
                <a class="uk-button uk-button-text uk-label" href="https://www.google.com/maps/place/Cambrige+School+Lhokseumawe/@5.1857605,97.1383299,21z/data=!4m5!3m4!1s0x3047830a8b242f65:0xef45f792e3a195f6!8m2!3d5.1858086!4d97.1384783" target="_blank">Location</a>
              </div>
               <p class="uk-text-center uk-light">Created By <a href="https://fb.me/md5.support" target="_blank">Lutfi Haridha</a> &copy <a href="https://www.mekode.com" target="_blank">Mekode</a> - 2018</p>
            </div>
         </div>
     </body>
     </html>