@extends('layouts.app')
@section('content')
    <h1 class="uk-text-center">Package</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
         	<th>No</th>
          <th>Photo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Class</th>
            <th>Year</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($stories as $key =>$story)
         <tr>
            <td>{{$stories->firstItem()+ $key}}</td>
            <td><img width="80" height="80" class="uk-border-circle" src="/img/stories/{{$story->image}}"></td>
            <td>{{$story->name}}</td>
            <td>{!!str_limit($story->post,200,' ...')!!}</td>
            <td>{{$story->class}}</td>
            <td>{{$story->year}}</td>
            <td>{{$story->status}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.stories',$story) }}">Update</a>
               <form action="{{ route('stories.destroy', $story) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$story->name}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $stories->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h3>Notice</h3>
    <p>{{ session()->get('message') }}</p>
</div>
      @endif
@endsection