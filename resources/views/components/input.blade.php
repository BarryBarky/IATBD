<section class="field-section" style="{{isset($styles) ? $styles : ''}}">
    @if(isset($label))
        <label for="{{$name}}">
            @if(isset($required))
                <span class="required">*</span>
            @endif
            {{$label}}
        </label>
    @endif
    @if(isset($description))
        <p class="meta-description">
            {{$description}}
        </p>
    @endif
    @if($type === 'textarea')
        <textarea name="{{$name}}" id="{{$name}}" @if(isset($rows)) rows="{{$rows}}" @else rows="5"
                  @endif @if(isset($cols)) cols="{{$cols}}" @else cols="50" @endif>
            {{$value ?? old($name)}}
        </textarea>
    @elseif($type === 'select_sex')
        <select name="{{$name}}" id="{{$name}}">
            <option value>-</option>
            <option {{isset($value) === 'Man' ? 'selected' : ''}} value="Man">Man</option>
            <option {{isset($value) === 'Vrouw' ? 'selected' : ''}} value="Vrouw">Vrouw</option>
        </select>
    @elseif($type === 'select_pet_type')
        <select name="{{$name}}" id="{{$name}}">
            <option value>-</option>
            @foreach(\App\Models\PetType::all() as $pet_type)
                <option
                    {{isset($value) === $pet_type->id ? 'selected' : ''}} value="{{$pet_type->id}}">{{$pet_type->name}}</option>
            @endforeach
        </select>
    @else
        <input
            id="{{$name}}"
            type="{{$type}}"
            name="{{$name}}"
            value="{{$value ?? old($name)}}"
            @if(isset($size))
                @if($size == '100%')
                    style="width: 100%"
            @else
                size="{{$size}}"
            @endif
            @elseif(isset($checked))
                checked
            @endif
        />
    @endif
    @error($name)
    <p class="error-message">{{$message}}</p>
    @enderror
</section>
