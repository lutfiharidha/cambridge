@extends('layouts.app')
@section('content')
    <h1 class="uk-text-center">Teachers</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
         	<th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($teacher as $key =>$teach)
         <tr>
            <td>{{$teacher->firstItem()+ $key}}</td>
            <td>{{$teach->name}}</td>
            <td>{{$teach->email}}</td>
            <td>{{$teach->phone}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.teacher',$teach) }}">Update</a>
               <form action="{{ route('teacher.destroy', $teach) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                   <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$teach->name}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $teacher->render() !!}
</div>
@endsection