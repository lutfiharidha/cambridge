@extends('layouts.app')
@section('content')
<h1 class="uk-text-center">Orders</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>WhatsApp</th>
            <th>Package</th>
         </tr>
      </thead>
      <tbody>
         @foreach($orders as $key =>$order)
         <tr>
            <td>{{$orders->firstItem()+ $key}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->telp}}</td>
            <td><a href="https://api.whatsapp.com/send?phone={{$order->whatsapp}}&text=assalamu'alaikum,apakah benar anda memesan {{$order->get_package->name}} pada web kami?" target="_blank">{{$order->whatsapp}}</a></td>
            <td>{{$order->get_package->name}}</td>
         </tr>
         @endforeach
      </tbody>
   </table>
   {!! $orders->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   <p>{{ session()->get('message') }}</p>
</div>
@endif
@endsection