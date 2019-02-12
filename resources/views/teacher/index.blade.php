@extends('layouts.app')
@section('content')
@if (session()->has('popup'))
<script type="text/javascript">
           UIkit.modal.alert('<h3 class="uk-text-center">WELCOME BACK <span class="uk-text-uppercase">{{ Auth::user()->name }}</span></h3>@if($dataannounce !== 0)<p class="uk-text-center">You Have <span class="uk-text-bold">{{$dataannounce}}</span> Announcement @else You do not have Announcement</p> @endif').then(function () {
               console.log('Alert closed.')
           });
</script>
@endif
<div class="uk-text-center uk-child-width-1-3@s uk-grid-small" uk-grid>
	<div>
        <h2>Blog <span class="uk-badge">{{$datablog}}</span></h2>
        <div class="uk-padding">
            <h5>Publish : <span class="uk-badge">{{$pdatablog}}</span></h5>
            <h5>Unpublish : <span class="uk-badge">{{$udatablog}}</span></h5>
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
<ul uk-accordion>
    @foreach($announce as $annon)
    <li>
        <a class="uk-accordion-title" href="#">{{$annon->title}} <span class="uk-float-right uk-badge">{{date('d-m-Y', strtotime($annon->created_at))}}</span></a>
        <div class="uk-accordion-content">
            @if($annon->image == "")
              <img class="uk-align-left uk-margin-remove-adjacent" src="https://www.freeiconspng.com/uploads/no-image-icon-4.png" width="225" height="150" alt="{{$annon->title}}">
               @elseif(in_array(substr($annon->image, -3), $image))
               <img class="uk-align-left uk-margin-remove-adjacent" src="/img/announcement/{{$annon->image}}" width="225" height="150" alt="{{$annon->title}}">
               @else
               <a href="/img/announcement/{{$annon->image}}" target="_blank">
                  <img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$annon->image}}"><br>{{$annon->image}}
               </a>
            @endif
            <p>{!!$annon->post!!}</p>
        </div>
    </li>
        @endforeach
</ul>
{!! $announce->render() !!}
@endsection
 