@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding " action="{{ route('storeblog') }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
         {{ csrf_field() }}
         <legend class="uk-legend ">Add Blog</legend>
         Title
         <div class="uk-margin">
            <input class="uk-input" type="text" name="title" placeholder="Title" required>
         </div>
         Image
         <div class="uk-margin">
            <div uk-form-custom>
               <input type="file" name="file" required>
               <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
            </div>
         </div>
         Description
         <div class="uk-margin">
            <textarea class="uk-textarea ckeditor" id="ckedtor" name="post" rows="5"></textarea>
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
         Writer
         <div class="uk-margin">
            <input class="uk-input" type="text" name="writer" value="{{ Auth::user()->name }}" required>
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
@endsection