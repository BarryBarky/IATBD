<x-dashboard-layout>
    <section class="page-header">
        <h1 class="form-header" style="">Advertenties</h1>
        <section class="controls">
            <a class="button" href="{{url()->current()}}/aanmaken">
                Aanmaken
            </a>
        </section>
    </section>
    <section class="tabs">
        <a href="{{url()->current()}}"
            class="active"
        >Alle Advertenties</a>
    </section>
   @include('partials._search')
    <section class="column">
        @if(count($advertisements) > 0)
            <section class="card-section">
                @foreach($advertisements as $advertisement)
                    <x-cards.advertisement :ad="$advertisement"/>
                @endforeach
            </section>
            {{$advertisements->links()}}
        @else
            <section class="center" style="margin: 3rem 0">
                <h4>Helaas geen advertenties gevonden...</h4>
            </section>
    @endif
</x-dashboard-layout>
