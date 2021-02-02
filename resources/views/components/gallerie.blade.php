<div>
{{$slot}}
@if(session()->has('image'))
        {{session()->get('image')}}
       
        <img src="{{asset('storage/images/'.session()->get('image'))}}" alt="" srcset="">
        @endif
</div>