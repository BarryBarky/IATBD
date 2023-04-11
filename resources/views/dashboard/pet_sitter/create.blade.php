<x-dashboard-layout>
    <form action="/dashboard/mijn-profiel/oppasser" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <h1 class="form-header" style="margin-bottom: 3rem">Als oppasser aanmelden</h1>
        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <section class="column">
            <section class="column" style="gap: 1rem">
                <h3>Algemeen</h3>
                <x-input label="Wat kan ik bieden als oppasser?"
                         description="Schrijf een leuk en uitnodigend paragraafje over hoe jij jezelf wilt presenteren als oppasser"
                         name="description" type="textarea" cols="80" required/>
            </section>
            <section class="column" style="gap: 1rem">
                <h3>Leefomgeving</h3>
                <p class="meta-description">
                    Wat is de omgeving waarin er opgepast kan worden. Dat is natuurlijk wat de huisdiereigenaar zich afvraagd.
                    Laat zien in welke omgeving de huisdieren worden opgepast.
                </p>
                <section class="image-gallery">
                    <x-file-upload name="image1" styles="width: 100%; height: 300px"/>
                    <x-file-upload name="image2" styles="width: 100%; height: 300px"/>
                    <x-file-upload name="image3" styles="width: 100%; height: 300px"/>
                    @error('images')
                    <p class="error-message">{{$message}}</p>
                    @enderror
                </section>
            </section>
            <section class="center">
                <button class="button">
                    Aanmelden
                </button>
            </section>
        </section>
    </form>
</x-dashboard-layout>
