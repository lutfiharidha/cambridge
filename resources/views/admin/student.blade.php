@extends('layouts.app')
@section('content')
    <h1 class="uk-text-center">Students</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
         	<th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($student as $key =>$study)
         <tr>
            <td>{{$student->firstItem()+ $key}}</td>
            <td>{{$study->name}}</td>
            <td>{{$study->email}}</td>
            <td>{{$study->phone}}</td>
            <td>{{$study->type}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.student',$study) }}">Update</a>
               <form action="{{ route('student.destroy', $study) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$study->name}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $student->render() !!}
</div>
@endsection