<x-dashboard-layout>
    <section class="page-header">
        <h1 class="form-header">
            {{$pet->name}}
        </h1>
        <section class="controls">
            <section class="row" style="gap: 1rem; align-items: center">
                <form action="{{url()->current()}}" method="post" style="position: relative">
                    @csrf
                    @method('delete')
                    <input type="submit" class="delete" value="Verwijderen" style="font-size: 11pt; cursor: pointer"/>
                </form>
                <a class="button" href="{{url()->current()}}/bewerken" style="position: relative">
                    Bewerken
                </a>
            </section>
        </section>
    </section>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <section class="space-between" style="gap: 3rem; align-items: stretch;">
        <section class="column" style="gap: 3rem; width: 100%">
            <img
                src="{{isset($pet->profile_pic) ? Storage::url($pet->profile_pic) : asset('storage/profile_pics/animals/placeholder.png')}}"
                alt="Profile picture" class="img-fluid"
                style="max-height: 300px;  object-fit: cover;">
        </section>
        <section class="column" style="width: 100%; gap: 3rem">
            <section class="column">
                <section class="show-section">
                    <section class="space-between">
                        <h4>Naam</h4>
                        <p>{{$pet->name}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Leeftijd</h4>
                        <p>{{$pet->age}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Geslacht</h4>
                        <p>{{$pet->sex}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Soort</h4>
                        <p>{{$pet->petType->name}}</p>
                    </section>
                </section>
            </section>
            <section class="column" style="gap: 1rem">
                <section class="show-section">
                    <section class="space-between">
                        <h4>Omschrijving</h4>
                        <p>{{$pet->description}}</p>
                    </section>
                </section>
            </section>
        </section>
    </section>
</x-dashboard-layout>

