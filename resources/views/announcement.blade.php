@extends('layouts.navb')
@section('content')
<div class="uk-container uk-container-small uk-padding">
	@foreach($announcement as $announce)
        <h3 class="uk-text-uppercase">{{$announce->title}}</h3>
            <div class="uk-panel">
            	@if($announce->image == "")
              <img class="uk-align-left uk-margin-remove-adjacent" src="https://www.freeiconspng.com/uploads/no-image-icon-4.png" width="225" height="150" alt="{{$announce->title}}">
               @elseif(in_array(substr($announce->image, -3), $image))
               <img class="uk-align-left uk-margin-remove-adjacent" src="/img/announcement/{{$announce->image}}" width="225" height="150" alt="{{$announce->title}}">
               @else
               <a href="/img/announcement/{{$announce->image}}" target="_blank">
                  <img width="40" height="40" src="https://img.clipartxtras.com/43edbab99e6d1747643f6d8102cf06c2_new-file-simple-clip-art-at-clkercom-vector-clip-art-online-files-clipart-png_222-300.png" alt="{{$announce->image}}"><br>{{$announce->image}}
               </a>
            @endif
    			{!!$announce->post!!}
        </div>
    @endforeach
       {!! $announcement->render() !!}

</div>
@endsection