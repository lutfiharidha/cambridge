@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding " action="{{ route('update.article', $article) }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
         {{ csrf_field() }}
         {{ method_field('PATCH')}}
         <legend class="uk-legend ">Edit Article</legend>
         Title
         <div class="uk-margin">
            <input class="uk-input" type="text" name="title" value="{{$article->title}}" required>
         </div>
         File
         <div class="uk-margin">
            <div uk-form-custom>
               <input type="file" accept="application/*" name="file"> 
               <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
            </div>
         </div>
         Article
         <div class="uk-margin">
            <textarea class="uk-textarea ckeditor" id="ckedtor" name="article" rows="5">{{$article->article}}</textarea>
         </div>
         Writer
         <div class="uk-margin">
            <input class="uk-input" type="text" name="writer" value="{{$article->writer}}" required>
         </div>
         Status
      <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="status">
               @if($article->status == "Publish")
               <option value="{{$article->status}}">{{$article->status}}</option>
               <option value="Not Publish">Not Publish</option>
               @else
               <option value="{{$article->status}}">{{$article->status}}</option>
               <option value="Publish">Publish</option>
               @endif
            </select>
         </div>
      </fieldset>
      <div class="uk-margin">
         <input  class="uk-button uk-button-default" type="submit" value="Post">
      </div>
   </form>
</div>
@if($errors->any())
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
@endsection