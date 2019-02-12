@extends('layouts.app')
@section('content')
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding " action="{{ route('update.module',$module) }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
         {{ csrf_field() }}
      {{ method_field('PATCH')}}
         <legend class="uk-legend ">Add Module</legend>
         Title
         <div class="uk-margin">
            <input class="uk-input" type="text" name="title" value="{{$module->title}}" required>
         </div>
         File
         <div class="uk-margin">
            <a href="/files/{{$module->file}}" target="_blank"><img width="70" height="70" src="https://www.solar-trade.org.uk/wp-content/uploads/2015/03/pdf-icon.png" alt="{{$module->file}}"></a>
            <div uk-form-custom>
               <input type="file" accept="application/*" name="file"> 
               <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
            </div>
         </div>
         Uploader
         <div class="uk-margin">
            <input class="uk-input" type="text" name="uploader" value="{{$module->uploader}}" required>
         </div>
         Status
      <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select uk-form-width-medium" id="form-stacked-select" name="status">
               @if($module->status == "Publish")
               <option value="{{$module->status}}">{{$module->status}}</option>
               <option value="Not Publish">Not Publish</option>
               @else
               <option value="{{$module->status}}">{{$module->status}}</option>
               <option value="Publish">Publish</option>
               @endif
            </select>
         </div>
      </fieldset>
      <div class="uk-margin">
         <input  class="uk-button uk-button-default" type="submit" value="Post">
      </div>
   </form>
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-danger" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   <p>{{ session()->get('message') }}</p>
</div>
@endif
@endsection