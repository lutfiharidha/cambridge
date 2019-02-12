@extends('layouts.app')
@section('content')
    <h1 class="uk-text-center">Package</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
         	<th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($package as $key =>$pack)
         <tr>
            <td>{{$package->firstItem()+ $key}}</td>
            <td>{{$pack->name}}</td>
            <td>{!!str_limit($pack->description,200,' ...')!!}</td>
            <td>{{$pack->price}}</td>
            <td>{{$pack->status}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.package',$pack) }}">Update</a>
               <form action="{{ route('package.destroy', $pack) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$pack->name}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $package->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h3>Notice</h3>
    <p>{{ session()->get('message') }}</p>
</div>
      @endif
@endsection