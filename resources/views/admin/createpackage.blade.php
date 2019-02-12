@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('storepackage') }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      <legend class="uk-legend ">Add Package</legend>
      Name
      <div class="uk-margin">
         <input class="uk-input" type="text" name="name" placeholder="Name Package" required>
      </div>
      Description
      <div class="uk-margin">
         <textarea class="uk-textarea ckeditor" id="ckedtor" name="description" rows="5"></textarea>
      </div>
             <script type="text/javascript">
         var editor = CKEDITOR.replace( 'ckedtor', {
    language: 'en',
    extraPlugins: 'notification'
});

editor.on( 'required', function( evt ) {
    editor.showNotification( 'This field is required.', 'warning' );
    evt.cancel();
} );
</script>
      Price
      <div class="uk-margin">
         <input class="uk-input" type="number" name="price" placeholder="Price" required>
      </div>
      <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="until">
               <option value="Week">Week</option>
               <option value="Month">Month</option>
               <option value="Year">Year</option>
            </select>
         </div>
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
@if(session()->has('message'))
<script>UIkit.notification({message: 'Berhasil Di Update', pos: 'bottom-center'})</script>
@endif
@endsection