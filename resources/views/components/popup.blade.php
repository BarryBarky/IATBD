<section class="popup-parent">
    <section class="popup"
    @if(isset($id))
        id="{{$id}}"
    @endif
    >
        <header>
            <h1 class="h4">{{$title}}</h1>
            @if(isset($id))
                <span onclick="toggleModal('{{$id}}')">X</span>
            @else
                <span onclick="toggleModal()">X</span>
            @endif
        </header>
        {{$slot}}
    </section>
</section>
