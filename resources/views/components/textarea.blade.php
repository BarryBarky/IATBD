<label for="{{$name}}">
    @if($required)
        <span class="required">*</span>
    @endif
    {{$label}}
</label>
<textarea
    id="{{$name}}"
    name="{{$name}}"
    >
    {{$value ?? old($name)}}
</textarea>
@error($name)
<p class="error-message">{{$message}}</p>
@enderror

