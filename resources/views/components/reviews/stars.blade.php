<section class="stars" @if(isset($id)) id="{{$id}}" @endif>
    @for($i = 1; $i<=5; $i ++)
        @php($class = 'fa-regular')
        @if(isset($value))
            @if(intval($value) >= $i)
                @php($class = 'fa-solid')
            @endif
        @endif
        <i class="{{$class}} fa-star"></i>
    @endfor
</section>
<x-input type="hidden" name="stars" styles="display: none;"></x-input>
