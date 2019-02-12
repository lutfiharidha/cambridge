@extends('layouts.app')
@section('content')
<div uk-scrollspy="cls: uk-animation-fade; delay: 500; repeat: false">
    <h1 class="uk-text-center">Change Password</h1>
<form action="{{ route('password.update') }}" method="POST">
{{ csrf_field() }}
<div class="uk-card-secondary uk-overlay uk-overlay-primary">
<div class="uk-margin">
            <input class="uk-input" id="Password" name="old" type="password" placeholder="Current Password" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" id="Password" name="password" type="password" placeholder="New Password" required>
    </div>
    <div class="uk-margin">
            <input class="uk-input" id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm New Password" required>
    </div>

    <div class="uk-margin">
        <button class="uk-button uk-button-default">Change</button>
        @if ($errors->has('password_confirmation'))
        <div class="uk-text-danger">
            {{ $errors->first('password_confirmation') }}    
        </div>
        @endif
        @if ($errors->has('password'))
        <div class="uk-text-danger">
            {{ $errors->first('password') }}    
        </div>
        @endif
        @if(session()->has('failure'))
        <div class="uk-text-danger">
           {{ session()->get('failure') }}
        </div>
        @endif
        @if(session()->has('success'))
        <div class="uk-text-bold">
           {{ session()->get('success') }}
        </div>
        @endif
    </div>
</div>
</form>
</div>
@endsection