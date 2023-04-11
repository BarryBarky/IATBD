<x-dashboard-layout>
    <form action="/dashboard/huisdieren/{{$pet->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1 class="form-header" style="margin-bottom: 3rem">Huisdier bewerken</h1>
        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <section class="column" style="gap: 1rem; width: 100%">
            <section class="space-between" style="gap: 3rem; align-items: start">
                <section class="column" style="gap: 1rem; width: 60%">
                    <h3>Algemeen</h3>
                    <section class="show-section">
                        <section class="row">
                            <x-input label="Naam" type="text" name="name" value="{{$pet->name}}" required/>
                            <x-input label="Soort" type="select_pet_type" name="pet_type_id" value="{{$pet->pet_type_id}}" required/>
                        </section>
                        <section class="row">
                            <x-input label="Leeftijd" type="text" name="age" value="{{$pet->age}}" required size="5"/>
                            <x-input label="Geslacht" type="select_sex" name="sex" value="{{$pet->sex}}" required/>
                        </section>
                        <x-input label="Omschrijving"
                                 description="Omschrijf wat voor huisdier het is, wat de eigenschappen zijn en waar de oppasser op moet letten als hij / zij op het dier gaat oppassen"
                                 type="textarea" name="description" value="{{$pet->description}}" required/>
                    </section>
                </section>
                <section class="column" style="gap: 1rem;  width: 40%">
                    <h3>Foto</h3>
                    @if(isset($pet->profile_pic))
                        <x-file-upload name="profile_pic" styles="width: 100%; height: 200px; background-image: url({{\Illuminate\Support\Facades\Storage::url($pet->profile_pic)}})"/>
                    @else
                    <x-file-upload name="profile_pic" styles="width: 100%; height: 200px;"/>
                    @endif
                </section>
            </section>
        </section>
        <section class="center" style="margin: 3rem 0">
            <button class="button">
                Aanmaken
            </button>
        </section>
    </form>
</x-dashboard-layout>
