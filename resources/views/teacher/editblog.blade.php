@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('updatete.blog',$blog) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      <legend class="uk-legend ">Edit Announcement</legend>
      Title
      <div class="uk-margin">
         <input class="uk-input" type="text" name="title" value="{{$blog->title}}" required>
      </div>
      Image
      <div class="uk-margin">
         <div uk-form-custom>
            <img width="150" height="150"  src="{{asset($blog->image)}}">
            <input type="file" name="image">
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
         </div>
      </div>
      Description
      <div class="uk-margin">
         <textarea class="uk-textarea ckeditor" id="ckedtor" name="description" rows="5">{!!$blog->post!!}</textarea>
      </div>
      Writer
      <div class="uk-margin">
         <input class="uk-input" type="text" name="writer" value="{{$blog->writer}}" required>
      </div>
      Status
      <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="status">
               @if($blog->status == "Publish")
               <option value="{{$blog->status}}">{{$blog->status}}</option>
               <option value="Not Publish">Not Publish</option>
               @else
               <option value="{{$blog->status}}">{{$blog->status}}</option>
               <option value="Publish">Publish</option>
               @endif
            </select>
         </div>
         <div class="uk-margin">
            <input  class="uk-button uk-button-default" type="submit" value="Post">
         </div>
   </fieldset>
</form>
</div>
@endsection