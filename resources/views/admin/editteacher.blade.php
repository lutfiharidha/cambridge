@extends('layouts.app')
@section('content')
<div class="uk-padding uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form action="{{ route('update.teacher',$teacher) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      <legend class="uk-legend ">Posting</legend>
      <div class="uk-margin">
         Name
         <input class="uk-input" type="text" name="name" value="{{$teacher->name}}">
      </div>
      <div class="uk-margin">
         Email
         <input class="uk-input" type="text" name="email" value="{{$teacher->email}}">
      </div>
      <div class="uk-margin">
         Phone
         <input class="uk-input" type="text" name="phone" value="{{$teacher->phone}}">
      </div>
      <div class="uk-margin">
         Password
         <input class="uk-input" type="password" name="password">
      </div>
   </fieldset>
   <div class="uk-margin">
      <input  class="uk-button uk-button-default" type="submit" value="Post">
      @if ($errors->has('email'))
      <div class="uk-text-danger">
         {{ $errors->first('email') }}    
      </div>
      @endif
      @if ($errors->has('password'))
      <div class="uk-text-danger">
         {{ $errors->first('password') }}    
      </div>
      @endif
      @if(session()->has('message'))
      <div class="uk-text-bold">
         {{ session()->get('message') }}
      </div>
      @endif
</form>
</div>
@endsection