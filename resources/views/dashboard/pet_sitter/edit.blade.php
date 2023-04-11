<x-dashboard-layout>
    <form action="/dashboard/mijn-profiel/oppasser/{{$petSitter->id}}" method="post" class="form"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1 class="form-header">Oppasser bewerken</h1>
        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <section class="column">
            <section class="column" style="gap: 1rem">
                <h3>Algemeen</h3>
                <section class="field-section">
                    <x-input label="Wat kan ik bieden als oppasser?"
                             description="Schrijf een leuk en uitnodigend paragraafje over hoe jij jezelf wilt presenteren als oppasser."
                             name="description" type="textarea" value="{{$petSitter->description}}" required/>
                </section>
            </section>
            <section class="column" style="gap: 1rem">
                <h3>Leefomgeving</h3>
                <p class="meta-description">
                    Wat is de omgeving waarin er opgepast kan worden. Dat is natuurlijk wat de huisdiereigenaar zich
                    afvraagd.
                    Laat zien in welke omgeving de huisdieren worden opgepast.
                </p>
                <section class="image-gallery">
                    @for($i = 1; $i<=3; $i++)
                        @if(count($petSitter->images) >= $i)
                            <x-file-upload name="image{{$i}}"
                                           styles="width: 100%; height: 300px; background-image: url({{\Illuminate\Support\Facades\Storage::url($petSitter->images[($i -1)]->url)}})"/>
                        @else
                            <x-file-upload name="image{{$i}}" styles="width: 100%; height: 300px;"/>
                        @endif
                    @endfor
                    @error('images')
                    <p class="error-message">{{$message}}</p>
                    @enderror
                </section>
            </section>
            <section class="center">
                <button class="button">
                    Opslaan
                </button>
            </section>
        </section>
    </form>
</x-dashboard-layout>
