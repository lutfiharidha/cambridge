@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('update.stories',$stories) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      <legend class="uk-legend ">Edit Stories</legend>
      Name
      <div class="uk-margin">
         <input class="uk-input" type="text" name="name" value="{{$stories->name}}" required>
      </div>
      Image
      <div class="uk-margin">
        <img width="150" height="150" class="uk-border-circle" src="/img/stories/{{$stories->image}}">
         <div uk-form-custom>
            
            <input type="file" name="image">
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
         </div>
      </div>
      Description
      <div class="uk-margin">
         <textarea class="uk-textarea ckeditor" id="ckedtor" name="description" rows="5">{!!$stories->post!!}</textarea>
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
      Graduates
      <div class="uk-margin">
         <input class="uk-input uk-form-width-medium" type="text" name="class" value="{{$stories->class}}" required>
         <input class="uk-input uk-form-width-medium" type="text" pattern="\d*" maxlength="4" name="year" value="{{$stories->year}}" required>
      </div>
      Status
       <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="status">
               @if($stories->status == "Publish")
               <option value="{{$stories->status}}">{{$stories->status}}</option>
               <option value="Not Publish">Not Publish</option>
               @else
               <option value="{{$stories->status}}">{{$stories->status}}</option>
               <option value="Publish">Publish</option>
               @endif
            </select>
         </div>
      </div>
   </fieldset>
   <div class="uk-margin">
      <input  class="uk-button uk-button-default" type="submit" value="Post">
</form>
</div>
@if($errors->any())
<div class="uk-text-center uk-text-lead uk-dark" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
@endsection