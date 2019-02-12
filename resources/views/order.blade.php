@extends('layouts.navb')
@section('content')
<div class="uk-padding uk-container uk-container-small uk-dark" uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: false">
    <h1 class="uk-text-center">Order {{$posts->name}}</h1>
<form action="{{route('order.store')}}" method="POST">
{{ csrf_field() }}
<div class="uk-card-secondary uk-overlay uk-overlay-primary">
    <div class="uk-margin">
            <input class="uk-input" id="inputName" name="name" type="text" placeholder="Name" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" name="address" type="text" placeholder="Address" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" name="phone" type="number" placeholder="Phone Number" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" name="wa" type="number" placeholder="WhatsApp">
    </div>
    <div class="uk-margin">
            <input class="uk-input" name="package" type="hidden" value="{{$posts->id}}" >
            <input class="uk-input" type="text" value="{{$posts->name}}" disabled>
    </div>
    <div class="uk-margin">
        <button class="uk-button uk-button-default">Order</button>
    </div>
</div>
</form>
@if(session()->has('message'))
<script type="text/javascript">
    UIkit.modal.dialog('<h1 class="uk-text-center uk-modal-body">{{ session()->get("message") }}</h1>');
</script>
@endif
</div>
@endsection