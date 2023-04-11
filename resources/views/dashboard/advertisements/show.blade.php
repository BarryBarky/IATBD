<x-dashboard-layout>
    <section class="page-header">
        <h1 class="form-header">
            {{$ad->title}}
        </h1>
        @if($ad->user_id === \Illuminate\Support\Facades\Auth::id())
            <section class="controls">
                <section class="row" style="gap: 1rem; align-items: center">
                    <form action="{{url()->current()}}" method="post" style="position: relative">
                        @csrf
                        @method('delete')
                        <input type="submit" class="delete" value="Verwijderen"
                               style="font-size: 11pt; cursor: pointer"/>
                    </form>
                    <a class="button" href="{{url()->current()}}/bewerken" style="position: relative">
                        Bewerken
                    </a>
                </section>
            </section>
        @endif
    </section>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <section class="column" style="gap: 3rem">
        <section class="space-between" style="gap: 3rem; align-items: stretch;">
            <section class="column" style="gap: 3rem; width: 100%">
                <img
                    src="{{isset($ad->image) ? Storage::url($ad->image) : asset('storage/advertisements/placeholder.png')}}"
                    alt="Profile picture" class="img-fluid"
                    style="max-height: 300px;  object-fit: cover;">
            </section>
            <section class="column" style="width: 100%; gap: 3rem">
                <section class="show-section">
                    <section class="space-between">
                        <h4>Prijs</h4>
                        <p>{{$ad->price_in_euros}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Start periode</h4>
                        <p>{{$ad->starting_period}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Einde periode</h4>
                        <p>{{$ad->ending_period}}</p>
                    </section>
                </section>
                <x-requests.create :ad="$ad"/>
                <x-requests.index :ad="$ad"/>
            </section>
        </section>
        <section class="column" style="gap: 1rem">
            <h3>Dieren</h3>
            <section class="card-section" style="grid-template-columns: 1fr 1fr 1fr 1fr; margin: 0 0 3rem 0">
                @foreach($ad->pets as $pet)
                    <x-cards.pet :pet="$pet"/>
                @endforeach
            </section>
        </section>
    </section>


</x-dashboard-layout>


