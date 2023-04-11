<x-dashboard-layout>
    <form method="POST" action="/dashboard/advertenties/{{$ad->id}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1 class="form-header" style="margin-bottom: 3rem">Advertentie
            Bewerken</h1>
        <x-breadcrumbs :breadcrumbs="$breadcrumbs"></x-breadcrumbs>
        <section class="column" style="gap: 3rem">
            <section class="space-between" style="align-items: start; gap: 3rem">
                <section class="column" style="width: 60%; gap: 3rem">
                    <section class="column" style="gap: 1rem">
                        <h3>Algemeen</h3>
                        <section class="show-section">
                            <section class="row">
                                <x-input label="Bedrag" name="price_in_euros" type="text"
                                         value="{{$ad->price_in_euros}}"
                                         required size="5"/>
                            </section>
                            <x-input label="Titel" name="title" type="textarea"
                                     description="Kies een pakkende titel"
                                     value="{{$ad->title}}"
                                     required/>
                        </section>
                    </section>
                    <section class="column" style="gap: 1rem; width: 80%">
                        <h3>Datum</h3>
                        <section class="show-section">
                            <section class="space-between" style="gap: 1rem">
                                <x-input label="Start periode" name="starting_period" type="date"
                                         value="{{$ad->starting_period}}"
                                         required/>
                                <x-input label="Einde periode" name="ending_period" type="date"
                                         value="{{$ad->ending_period}}"
                                         required/>
                            </section>
                        </section>
                    </section>
                </section>
                <section class="column" style="gap: 1rem; width: 40%">
                    <h3>Foto</h3>
                    @if(isset($ad->image))
                        <x-file-upload name="image" styles="width: 100%; height: 200px; background-image: url({{\Illuminate\Support\Facades\Storage::url($ad->image)}})"/>
                    @else
                        <x-file-upload name="image" styles="width: 100%; height: 200px;"/>
                    @endif
                </section>
            </section>
            <section class="column" style="gap: 1rem">
                <h3>Huisdieren toevoegen</h3>
                <p class="meta-description">Kies een aantal huisdieren. Als je er nog geen hebt kan de advertentie niet gemaakt worden! Maak ze aan onder het kopje "Eigen Huisdieren"</p>
                <table>
                    <tr>
                        <th></th>
                        <th>Foto</th>
                        <th>Naam</th>
                        <th>Soort</th>
                        <th>Leeftijd</th>
                    </tr>
                    @foreach(auth()->user()->pets as $pet)
                        @php
                            $checked = false;
                            foreach($ad->pets as $adPet) {
                                if($adPet->id === $pet->id){
                                    $checked = true;
                                }
                            }
                        @endphp
                        <tr>
                            <td>
                                @if($checked)
                                    <x-input checked name="pets[]" type="checkbox" value="{{$pet->id}}" required/>
                                @else
                                    <x-input name="pets[]" type="checkbox" value="{{$pet->id}}" required/>
                                @endif
                            </td>
                            <td style="width: 10%"><img src="{{isset($pet->profile_pic) ? Storage::url($pet->profile_pic) : asset('storage/profile_pics/animals/placeholder.png')}}"
                                                        alt="placeholder" class="img-fluid"/></td>
                            <td>{{$pet->name}}</td>
                            <td>{{$pet->petType->name}}</td>
                            <td>{{$pet->age}}</td>
                        </tr>
                    @endforeach
                </table>
                @error('pets')
                <p class="error-message">{{$message}}</p>
                @enderror
            </section>
        </section>
        <section class="center" style="margin: 3rem 0">
            <button class="button">
                Opslaan
            </button>
        </section>
    </form>
</x-dashboard-layout>
<script src="/js/fileUpload.js"></script>
<?php
