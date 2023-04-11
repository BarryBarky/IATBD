<x-dashboard-layout>
    <form action="/dashboard/mijn-profiel/{{$user->id}}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1 class="form-header" style="margin-bottom: 2rem">Gebruiker bewerken</h1>
        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <section class="column" style="gap: 3rem">
            <section class="space-between" style="align-items: stretch; gap: 3rem">
                <section class="column" style="width: 100%; gap: 1rem">
                    <h3>Algemeen</h3>
                    <section class="show-section">
                        <section class="row">
                            <x-input label="Voornaam" name="first_name" type="text" value="{{$user->first_name}}"
                                     required/>
                            <x-input label="Achternaam" name="last_name" type="text" value="{{$user->last_name}}"
                                     required/>
                        </section>
                        <section class="row">
                            <x-input label="Leeftijd" name="age" type="text" value="{{$user->age}}" required/>
                            <x-input label="Geslacht" name="sex" type="select_sex" value="{{$user->sex}}" required/>
                        </section>
                    </section>
                </section>
                <section class="column" style="width: 100%; gap: 1rem">
                    <h3>Profiel foto</h3>
                    <x-file-upload name="profile_pic"
                                   styles="width: 100%; height: 100%; background-image: url({{\Illuminate\Support\Facades\Storage::url($user->profile_pic)}})"/>
                </section>
            </section>
            <section class="space-between" style="gap: 3rem; align-items: stretch">
                <section class="column" style="width: 100%; gap: 1rem">
                    <h3>Contactinformatie</h3>
                    <section class="show-section">
                        <x-input label="telefoonnummer" name="phone" type="text" value="{{$user->phone}}"/>
                        <section class="row">
                            <x-input label="Plaatsnaam" name="city" type="text" value="{{$user->city}}" required/>
                            <x-input label="Postcode" name="postal_code" type="text" value="{{$user->postal_code}}"
                                     required/>
                        </section>
                        <section class="row">
                            <x-input label="Straatnaam" name="street" type="text" value="{{$user->street}}" required/>
                            <x-input label="huisnummer" name="house_number" type="text" value="{{$user->house_number}}"
                                     required/>
                        </section>
                    </section>
                </section>
                <section class="column" style="width: 100%; gap: 1rem">
                    <h3>Gebruikersinformatie</h3>
                    <section class="show-section">
                        <x-input label="Email" name="email" type="text" value="{{$user->email}}" size="30"/>
                    </section>
                </section>
            </section>
        </section>

        <section class="center" style="margin-top: 3rem">
            <button class="button">
                Opslaan
            </button>
        </section>
    </form>
</x-dashboard-layout>

