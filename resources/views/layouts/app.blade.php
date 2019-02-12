<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>
         @if(Auth::user()->hasRole('admin'))
            Admin
         @elseif(Auth::user()->hasRole('teacher')){
            Teacher
         @else
         Student
         @endif

      @yield('title')</title>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/css/uikit.min.css" />
      <link rel="stylesheet" href="{{ url('css/app.css') }}" />
      <!-- UIkit JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="{{ asset('unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
      <script src="{{ asset('unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit-icons.min.js"></script>
   </head>
   <body>
      <main class="uk-container uk-container-large">
         @guest
         @else
                  <div class="uk-hidden@l uk-offcanvas-content">
              <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <nav class="uk-navbar-item uk-logo uk-navbar-container uk-width-expand uk-text-uppercase" uk-toggle="target: #offcanvas-flip" uk-icon="icon: menu; ratio: 2"> {{ Auth::user()->name }} </nav>
<div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default  uk-nav-parent-icon" uk-nav>
               <li class="uk-active uk-divider uk-logo">
                           <a href="/">Cambridge School</a>
                        </li>
     <li class="uk-active uk-divider">
                           <a href="/home">Dashboard</a>
                        </li>
                        @role('teacher')
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Blog</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('addte.blog') }}">Add Blog</a></li>
                              <li><a href="{{ route('te.blog') }}">Update Blog</a></li>
                           </ul>
                        </li>
                        @endrole
                        @role('student')
                        <li class="uk-active uk-divider">
                           <a href="{{route('article')}}">Article</a>
                        </li>
                        <li class="uk-active uk-divider">
                           <a href="{{route('module')}}">Module</a>
                        </li>
                        @endrole
                        @role('admin')
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Blog</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.blog') }}">Add Blog</a></li>
                              <li><a href="{{ route('data.blog') }}">Update Blog</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Announcement</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.announce') }}">Add Announcement</a></li>
                              <li><a href="{{ route('data.announce') }}">Update Announcement</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Success Stories</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.stories') }}">Add Story</a></li>
                              <li><a href="{{ route('data.stories') }}">Update Story</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Package</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.package') }}">Add Package</a></li>
                              <li><a href="{{ route('data.package') }}">Update Package</a></li>
                              <li><a href="{{ route('data.orders') }}">Orders</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Teachers</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.teacher') }}">Add Teacher</a></li>
                              <li><a href="{{ route('data.teacher') }}">Update Teacher</a></li>
                              <li><a href="{{ route('datamin.article') }}">Article</a></li>
                              <li><a href="{{ route('datamin.module') }}">Module</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Students</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.student') }}">Add Student</a></li>
                              <li><a href="{{ route('data.student') }}">Update Student</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Gallery</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.gallery') }}">Add Image</a></li>
                              <li><a href="{{ route('data.gallery') }}">Update Image</a></li>
                           </ul>
                        </li>
                        @endrole
                        @role('teacher')
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Module</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.module') }}">Add Module</a></li>
                              <li><a href="{{ route('data.module') }}">Update Module</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Articles</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.article') }}">Add Article</a></li>
                              <li><a href="{{ route('data.article') }}">Update Article</a></li>
                           </ul>
                        </li>
                        @endrole
                        <li class="uk-active uk-divider">
                           <a href="{{ route('password.form') }}">Change Password</a>
                        </li>
                        <li class="uk-active uk-divider">
                           <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </li>
                     </ul>
                        </ul>

        </div>
    </div>
</div>
</div>
         <div uk-grid>
            <div class="uk-background-cover uk-light uk-padding-small uk-background-secondary uk-visible@m uk-width-1-6" uk-height-viewport="offset-top: true">
               <div class="uk-card">
                  <div>
                     <ul class="uk-text-left uk-nav-default uk-nav-parent-icon" uk-nav>
                        <a class="uk-button" href="{{route('beranda')}}"><h4 class="uk-text-bold uk-text-uppercase uk-text-center uk-margin-small-top">Cambridge School</h4></a>
                        <li class="uk-active uk-divider">
                           <a href="/home">Dashboard</a>
                        </li>
                        @role('teacher')
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Blog</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('addte.blog') }}">Add Blog</a></li>
                              <li><a href="{{ route('te.blog') }}">Update Blog</a></li>
                           </ul>
                        </li>
                        @endrole
                        @role('student')
                        <li class="uk-active uk-divider">
                           <a href="{{route('article')}}">Article</a>
                        </li>
                        <li class="uk-active uk-divider">
                           <a href="{{route('module')}}">Module</a>
                        </li>
                        @endrole
                        @role('admin')
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Blog</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.blog') }}">Add Blog</a></li>
                              <li><a href="{{ route('data.blog') }}">Update Blog</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Announcement</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.announce') }}">Add Announcement</a></li>
                              <li><a href="{{ route('data.announce') }}">Update Announcement</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Success Stories</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.stories') }}">Add Story</a></li>
                              <li><a href="{{ route('data.stories') }}">Update Story</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Package</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.package') }}">Add Package</a></li>
                              <li><a href="{{ route('data.package') }}">Update Package</a></li>
                              <li><a href="{{ route('data.orders') }}">Orders</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Teachers</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.teacher') }}">Add Teacher</a></li>
                              <li><a href="{{ route('data.teacher') }}">Update Teacher</a></li>
                              <li><a href="{{ route('datamin.article') }}">Article</a></li>
                              <li><a href="{{ route('datamin.module') }}">Module</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Students</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.student') }}">Add Student</a></li>
                              <li><a href="{{ route('data.student') }}">Update Student</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Gallery</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.gallery') }}">Add Image</a></li>
                              <li><a href="{{ route('data.gallery') }}">Update Image</a></li>
                           </ul>
                        </li>
                        @endrole
                        @role('teacher')
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Module</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.module') }}">Add Module</a></li>
                              <li><a href="{{ route('data.module') }}">Update Module</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Articles</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{ route('add.article') }}">Add Article</a></li>
                              <li><a href="{{ route('data.article') }}">Update Article</a></li>
                           </ul>
                        </li>
                        @endrole
                        <li class="uk-active uk-divider">
                           <a href="{{ route('password.form') }}">Change Password</a>
                        </li>
                        <li class="uk-active uk-divider">
                           <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            @endguest
            <div class="uk-width-expand uk-section">
               @yield('content')
            </div>
         </div>
         </div>
      </main>
   </body>
</html>