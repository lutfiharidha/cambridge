@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('update.announce',$announce) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      <legend class="uk-legend ">Edit Announcement</legend>
      Title
      <div class="uk-margin">
         <input class="uk-input" type="text" name="title" value="{{$announce->title}}" required>
      </div>
            Image
      <div class="uk-margin">
         <div uk-form-custom>
            @if($announce->image == "")
               <img width="80" height="80" class="uk-border-circle" src="https://www.freeiconspng.com/uploads/no-image-icon-4.png">
               @elseif(in_array(substr($announce->image, -3), $image))
               <img width="80" height="80" src="/img/announcement/{{$announce->image}}">
               @else
               <a href="/img/announcement/{{$announce->image}}" target="_blank">
                  <img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$announce->image}}">
               </a>
            @endif
            <input type="file" name="file">
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
         </div>
      </div>
      Description
      <div class="uk-margin">
         <textarea class="uk-textarea ckeditor" id="ckedtor" name="description" rows="5">{!!$announce->post!!}</textarea>
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
            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="status">
               @if($announce->status == "Publish")
               <option value="{{$announce->status}}">{{$announce->status}}</option>
               <option value="Not Publish">Not Publish</option>
               @else
               <option value="{{$announce->status}}">{{$announce->status}}</option>
               <option value="Publish">Publish</option>
               @endif
            </select>
         </div>
         <div class="uk-margin">
            @if($announce->status == "Publish")
            <div id="sel" class="uk-form-controls">
               <select class="uk-select uk-form-width-medium" name="forr">
                  @if($announce->forr == "Everyone")   
                  <option value="{{$announce->forr}}">{{$announce->forr}}</option>
                  <option value="Student">Student</option>
                  <option value="Teacher">Teacher</option>
                  @elseif($announce->forr == "Student")
                  <option value="{{$announce->forr}}">{{$announce->forr}}</option>
                  <option value="Everyone">Everyone</option>
                  <option value="Teacher">Teacher</option>
                  @else
                  <option value="{{$announce->forr}}">{{$announce->forr}}</option>
                  <option value="Student">Student</option>
                  <option value="Everyone">Everyone</option>                  
                  @endif
               </select>
               @endif
            </div>
            <p></p>
         </div>
         <div class="uk-margin">
            <input  class="uk-button uk-button-default" type="submit" value="Post">
         </div>
         <script>
            $(document).ready(function () {
                $("#form-stacked-select").change(function () {
                    var foo = $("#form-stacked-select").val();
                    if (foo == "Not Publish") {
                        $("div#sel").empty()
                     }
                    else{
                    $("p").html("<div id='sel'><select class='uk-select uk-form-width-medium' name='forr'><option value='Everyone'>Everyone</option><option value='Student'>Student</option><option value='Teacher'>Teacher</option></select>")
                    }
                });
            });
         </script>
   </fieldset>
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