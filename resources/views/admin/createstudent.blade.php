@extends('layouts.app')
@section('content')
<div uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: false">
    <h1 class="uk-text-center">Register Student</h1>
<form action="{{ route('storestudent') }}" method="POST">
{{ csrf_field() }}
<div class="uk-card-secondary uk-overlay uk-overlay-primary">
    <div class="uk-margin">
            <input class="uk-input" id="inputName" name="name" type="text" placeholder="Name" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" value="{{ old('email') }}" id="inputEmail" name="email" type="text" placeholder="Email" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="phone" type="number" placeholder="Phone Number" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="password" type="password" placeholder="Password" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="password_confirmation" type="password" placeholder="Password Confirmation" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" id="inputPassword" name="type" type="text" placeholder="Type" required>
    </div>

    <div class="uk-margin">
        <button class="uk-button uk-button-default">Register</button>
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
    </div>
</div>
</form>
</div>
@endsection