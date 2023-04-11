<ul class="breadcrumbs">
    @foreach($breadcrumbs as $key => $path)
{{--        @dd($path["link"])--}}
        @if(isset($path["link"]) && isset($path["label"]))
            <li><a href="{{$path["link"]}}">{{$path["label"]}}</a></li>
        @elseif (isset($path["label"]))
            <li>{{$path["label"]}}</li>
        @endif
        @if($key < (count($breadcrumbs) -1))
                <i class="fa-solid fa-arrow-right"></i>
        @endif
    @endforeach
</ul>
