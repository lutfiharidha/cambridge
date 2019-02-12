@extends('layouts.app')
@section('content')
<h1 class="uk-text-center">Galleries</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
            <th>No</th>
            <th>Image</th>
            <th>Caption</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($gallery as $key =>$post)
         <tr>
            <td>{{$gallery->firstItem()+ $key}}</td>
            <td><img width="80" height="80" src="/img/galleries/{{$post->image}}"></td>
            <td>{!!str_limit($post->caption,100,' ...')!!}</td>
            <td>{{$post->status}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.gallery',$post) }}">Update</a>
               <form action="{{ route('gallery.destroy', $post) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   {!! $gallery->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   <p>{{ session()->get('message') }}</p>
</div>
@endif
@endsection