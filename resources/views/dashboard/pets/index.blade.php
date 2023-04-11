<x-dashboard-layout>
    <section class="page-header">
        <h1 class="form-header">Eigen Huisdieren</h1>
        <section class="controls">
            <a class="button" href="{{url()->current()}}/aanmaken" style="margin: 0 0 3rem 0; width: fit-content">
                Aanmaken
            </a>
        </section>
    </section>
    @include('partials._search')
    <section class="column">
    @if(count($pets) > 0)
        <section class="card-section" style="grid-template-columns: 1fr 1fr 1fr 1fr">
            @foreach($pets as $pet)
                <x-cards.pet :pet="$pet"/>
            @endforeach
        </section>
            {{$pets->links()}}
    @else
        <section class="center" style="margin: 3rem 0">
            <h4>Helaas geen huisdieren gevonden...</h4>
        </section>
    @endif
    </section>
</x-dashboard-layout>

