@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding " action="{{ route('storemodule') }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
         {{ csrf_field() }}
         <legend class="uk-legend ">Add Module</legend>
         Title
         <div class="uk-margin">
            <input class="uk-input" type="text" name="title" placeholder="Title" required>
         </div>
         File
         <div class="uk-margin">
            <div uk-form-custom>
               <input type="file" accept="application/*" name="file"> 
               <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
            </div>
         </div>
         Uploader
         <div class="uk-margin">
            <input class="uk-input" type="text" name="uploader" value="{{ Auth::user()->name }}" required>
         </div>
         Status
         <div class="uk-margin">
            <div class="uk-form-controls">
               <select class="uk-select" id="form-stacked-select" name="status">
                  <option value="Publish">Publish</option>
                  <option value="Not Publish">Not Publish</option>
               </select>
            </div>
         </div>
      </fieldset>
      <div class="uk-margin">
         <input  class="uk-button uk-button-default" type="submit" placeholder="Post">
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