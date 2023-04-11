<button class="button" onclick="toggleModal()">
    Bewerken
</button>
<x-popup title="Bewerk de review">
    <form action="{{url()->current()}}/review" method="POST">
        @csrf
        <section class="column">
            <section class="column" style="gap: 1rem">
                <x-reviews.stars/>
                <x-input name="title" type="textarea" label="Titel" required rows="2" value="{{$review->title}}"/>
                <x-input name="description" type="textarea" label="Omschrijving" required rows="5" value="{{$review->description}}"/>
            </section>
            <section class="center">
                <button class="button">
                    Plaatsen
                </button>
            </section>
        </section>
    </form>
</x-popup>

