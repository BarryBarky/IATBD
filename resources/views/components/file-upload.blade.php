<section class="image-block" style="{{isset($styles) ? $styles : ''}}" onclick="document.getElementById('{{$name}}').click()">
    <i class="fa-solid fa-camera"></i>
    <input name="{{$name}}" id="{{$name}}" accept="image/*" class="hidden" type="file" onChange="fileUpload(this.files[0], {{$name}})">
</section>
