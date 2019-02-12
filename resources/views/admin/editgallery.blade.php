 @extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding" action="{{ route('update.gallery',$gallery) }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
          {{ csrf_field() }}
          {{ method_field('PATCH')}}
        <legend class="uk-legend ">Edit Gallery</legend>
         Image
         <div class="uk-margin">
            <div uk-form-custom>
            	<img width="150" height="150" src="/img/galleries/{{$gallery->image}}">
               <input type="file" name="image">
               <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
            </div>
         </div>
         Caption
         <div class="uk-margin">
            <textarea class="uk-textarea ckeditor" id="ckedtor" name="caption" rows="5">{!!$gallery->caption!!}</textarea>
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
               @if($gallery->status == "Publish")
               <option value="{{$gallery->status}}">{{$gallery->status}}</option>
               <option value="Not Publish">Not Publish</option>
               @else
               <option value="{{$gallery->status}}">{{$gallery->status}}</option>
               <option value="Publish">Publish</option>
               @endif
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