@extends('layouts.app')
@section('content')
<h1 class="uk-text-center">Announcement</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto ">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($announcement as $key =>$announce)
         <tr>
            <td>{{$announcement->firstItem()+ $key}}</td>
            <td>@if($announce->image == "")
               <img width="80" height="80" class="uk-border-circle" src="https://www.freeiconspng.com/uploads/no-image-icon-4.png">
               @elseif(in_array(substr($announce->image, -3), $image))
               <img width="80" height="80" src="/img/announcement/{{$announce->image}}">
               @else
               <a href="/img/announcement/{{$announce->image}}" target="_blank">
                  <img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$announce->image}}">
               </a>
            @endif</td>
            <td>{{$announce->title}}</td>
            <td>{!!str_limit($announce->post,100,' ...')!!}</td>
            <td>@if($announce->forr == "") 
               {{$announce->status}} 
               @else
               {{$announce->status}} for {{$announce->forr}}
               @endif
            </td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.announce',$announce) }}">Update</a>
               <form action="{{ route('announce.destroy', $announce) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$announce->title}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   {!! $announcement->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   <p>{{ session()->get('message') }}</p>
</div>
@endif
@endsection