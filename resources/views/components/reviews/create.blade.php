@php($isCreated = false)
@foreach($user->reviews as $review)
    @if($review->owner_id === \Illuminate\Support\Facades\Auth::id())
        @php($isCreated = true)
    @endif
@endforeach
@if($isCreated)
    <button class="button" onclick="toggleModal('create-review')">
        Review Plaatsen
    </button>
@endif
<x-popup title="Plaats een review" id="create-review">
    <form action="/dashboard/profiel/{{$user->id}}/review" method="POST">
        @csrf
        <section class="column" style="margin-top: 3rem">
            <section class="column" style="gap: 1rem">
                <x-reviews.stars id="create-review"/>
                <x-input name="title" type="textarea" label="Titel" required rows="2"/>
                <x-input name="description" type="textarea" label="Omschrijving" required rows="5"/>
            </section>
            <section class="center">
                <button class="button">
                    Plaatsen
                </button>
            </section>
        </section>
    </form>
</x-popup>
