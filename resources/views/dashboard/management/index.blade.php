<x-dashboard-layout>
    <section class="page-header">
        <h1 class="form-header" style="">Beheer</h1>
    </section>
    <section class="tabs">
        <a href="{{url()->current()}}"
           @if(Request::get('bekijk') !== "oppasvragen")
               class="active"
            @endif
        >Alle Gebruikers</a>
        <a href="{{url()->current()}}?bekijk=oppasvragen"
           @if(Request::get('bekijk') === "oppasvragen")
               class="active"
            @endif
        >Alle Oppasvragen</a>
    </section>
    <section class="column">

        @if(Request::get('bekijk') === "oppasvragen")
            <x-tables.requests :petSitters="$petSitters"/>
        @else
            <x-tables.users :users="$users"/>
        @endif

    </section>
</x-dashboard-layout>
