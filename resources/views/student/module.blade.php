@extends('layouts.app')
@section('content')
<h1 class="uk-text-center">Modules</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
            <th>No</th>
            <th>Title</th>
            <th>File</th>
            <th>Uploader</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($module as $key =>$modul)
         <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$modul->title}}</td>
            <td><img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$modul->file}}"></a></td>
            <td>{{$modul->uploader}}</td>
            <td>{{$modul->status}}</td>
            <td>
            <a href="/files/{{$modul->file}}" target="_blank"><button class="uk-button uk-button-text uk-text-danger">Download</button></a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
{{ $module->links() }}</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   <p>{{ session()->get('message') }}</p>
</div>
@endif
@endsection