@extends('layouts.app')
@section('content')
@if (session()->has('popup'))
<script type="text/javascript">
           UIkit.modal.alert('<h3 class="uk-text-center">WELCOME BACK <span class="uk-text-uppercase">{{ Auth::user()->name }}</span></h3>').then(function () {
               console.log('Alert closed.')
           });
</script>
@endif
<div class="uk-text-center uk-child-width-1-4@s uk-grid-small" uk-grid>
    <div>
        <h2>User <span class="uk-badge">{{$datauser}}</span></h2>
        <div class="uk-padding">
            <h5>Admin : <span class="uk-badge">{{$dataadmin}}</span></h5>
            <h5>Teacher : <span class="uk-badge">{{$datateacher}}</span></h5>
            <h5>Student : <span class="uk-badge">{{$datastudent}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Blog <span class="uk-badge">{{$datablog}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdatablog}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udatablog}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Gallery <span class="uk-badge">{{$datagallery}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdatagallery}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udatagallery}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Stories <span class="uk-badge">{{$datastory}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdatastory}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udatastory}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Packages <span class="uk-badge">{{$datapackage}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdatapackage}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udatapackage}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Announcement <span class="uk-badge">{{$dataannounce}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdataannounce}}</span></h5>           
            <h5>Unpublish : <span class="uk-badge">{{$udataannounce}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Module <span class="uk-badge">{{$datamodule}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdatamodule}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udatamodule}}</span></h5>
        </div>
    </div>
    <div>
        <h2>Article <span class="uk-badge">{{$dataarticle}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdataarticle}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udataarticle}}</span></h5>
        </div>
    </div>
</div>
<div class="uk-text-center">
        <h2>Orders <span class="uk-badge">{{$dataorder}}</span></h2>
    </div>
@endsection
