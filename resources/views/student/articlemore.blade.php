@extends('layouts.app')
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
<div class="uk-card uk-card-default uk-card-body">
   <article class="uk-article">
      <h1 class="uk-article-title uk-text-center">{{$posts->title}}</h1>
      @if($posts->file == "")
      <img class="uk-align-left uk-margin-remove-adjacent" src="https://www.freeiconspng.com/uploads/no-image-icon-4.png" width="225" height="150" alt="{{$posts->title}}">
      @elseif(in_array(substr($posts->file, -3), $image))
      <img class="uk-align-left uk-margin-remove-adjacent" src="/img/announcement/{{$posts->file}}" width="225" height="150" alt="{{$posts->title}}">
      @else
      <a href="/img/announcement/{{$posts->file}}" target="_blank">
         <img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$posts->file}}"><br>{{$posts->file}}
      </a>
      @endif
      <p class="uk-article-meta">Written by {{$posts->writer}} on {{date('d M Y', strtotime($posts->created_at))}}.</p>
      <p class="uk-text-lead uk-text-justify">{!!$posts->post!!}</p>
   </article>
</div>
@endsection