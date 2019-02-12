@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding " action="{{ route('storeannounce') }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
         {{ csrf_field() }}
         <legend class="uk-legend ">Add Announcement</legend>
         Title
         <div class="uk-margin">
            <input class="uk-input" type="text" name="title" placeholder="Title" required>
         </div>
         Image
         <div class="uk-margin">
            <div uk-form-custom>
               <input type="file" name="file">
               <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
            </div>
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
         Status
         <div class="uk-margin">
            <div class="uk-form-controls">
               <select class="uk-select" id="form-stacked-select" name="status">
                  <option value="Not Publish">Not Publish</option>
                  <option value="Publish">Publish</option>
               </select>
               <div class="uk-margin">
                  <div id="sel" class="uk-form-controls">
                  </div>
               </div>
               <script>
                  $(document).ready(function () {
                      $("#form-stacked-select").change(function () {
                          var foo = $("#form-stacked-select").val();
                          if (foo == "Publish") {
                              $("#sel").html("For <select class='uk-select' name='forr'><option value='Everyone'>Everyone</option><option value='Student'>Student</option><option value='Teacher'>Teacher</option></select>")
                          }
                          else{
                          $("#sel").html("")
                          }
                      });
                  });
               </script>
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