@extends('layouts.app')
@section('content')
<h1 class="uk-text-center">Article</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
            <th>No</th>
            <th>File</th>
            <th>Title</th>
            <th>Article</th>
            <th>Writer</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($article as $key =>$post)
         <tr>
<td>{{$loop->iteration}}</td>
            <td><a href="/files/{{$post->file}}" target="_blank"><img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$post->file}}"></a></td>
            <td>{{$post->title}}</td>
            <td>{!!str_limit($post->article,100,' ...')!!}</td>
            <td>{{$post->writer}}</td>
            <td>{{$post->status}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.article',$post) }}">Update</a>
               <form action="{{ route('article.destroy', $post) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$post->title}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
{{ $article->links() }}</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   <p>{{ session()->get('message') }}</p>
</div>
@endif
@endsection