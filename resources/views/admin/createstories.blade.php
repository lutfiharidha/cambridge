@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('storestories') }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      <legend class="uk-legend ">Add Stories</legend>
      Name
      <div class="uk-margin">
         <input class="uk-input" type="text" name="name" placeholder="Name" required>
      </div>
       Image
      <div class="uk-margin">
         <div uk-form-custom>
            <input type="file" name="image" required>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
         </div>
      </div>
      Description
      <div class="uk-margin">
         <textarea class="uk-textarea ckeditor" id="ckedtor" name="description" rows="5"></textarea>
      </div>     
      Graduates
      <div class="uk-margin">
         <input class="uk-input uk-form-width-medium" type="text" name="class" placeholder="Class" required>
         <input class="uk-input uk-form-width-medium" type="text" pattern="\d*" maxlength="4" name="year" placeholder="Year" required>
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