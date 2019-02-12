@extends('layouts.app')
@section('content')
<div uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: false">
    <h1 class="uk-text-center">Register Teacher</h1>
<form action="{{ route('storeteacher') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="uk-card-secondary uk-overlay uk-overlay-primary">
    Name
    <div class="uk-margin">
            <input class="uk-input" id="inputName" name="name" type="text" placeholder="Name" required>
    </div>
    Email
    <div class="uk-margin">
            <input class="uk-input" value="{{ old('email') }}" id="inputEmail" name="email" type="text" placeholder="Email" required>
    </div>
    Phone Number
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="phone" type="number" placeholder="Phone Number" required>
    </div>
    Password
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="password" type="password" placeholder="Password" required>
    </div>
    Password Confirmation
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="password_confirmation" type="password" placeholder="Password Confirmation" required>
    </div>
    <div class="uk-margin">
        <button class="uk-button uk-button-default">Register</button>
    </div>
</div>
</form>
</div>
@if($errors->any())
<div class="uk-text-center uk-text-lead" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
@endsection