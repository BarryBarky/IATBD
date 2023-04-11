<x-layout>
    <section class="users-form">
        <header class="users-form-header">
            <figure style="width: 50%">
                <img src="/images/logo.svg" alt="logo" class="img-fluid">
            </figure>
        </header>

        <form method="POST" action="/gebruikers" enctype="multipart/form-data">
            @csrf
            <section class="column">
                <section class="space-between">
                    <section class="column" style="width: 70%">
                        <section class="column" style="gap: 1rem">
                            <h3>Algemeen</h3>
                            <section class="row">
                                <x-input label="Voornaam" name="first_name" type="text" size="20" required></x-input>
                                <x-input label="Achternaam" name="last_name" type="text" size="20" required></x-input>
                            </section>
                            <section class="row">
                                <x-input label="Leeftijd" name="age" type="text" size="5" required></x-input>
                                <x-input label="Geslacht" name="sex" type="select_sex" required></x-input>
                            </section>
                        </section>
                        <section class="column" style="gap: 2rem">
                            <section class="column" style="gap: 1rem">
                                <h3>Contactinformatie</h3>
                                <section class="column">
                                    <x-input label="Telefoonnummer" name="phone" type="text" size="20"></x-input>
                                </section>
                            </section>
                            <section class="column" style="gap: 1rem">
                                <section class="row">
                                    <x-input label="Plaatsnaam" name="city" type="text" size="20" required></x-input>
                                    <x-input label="Postcode" name="postal_code" type="text" size="20" required></x-input>
                                </section>
                                <section class="row">
                                    <x-input label="Straatnaam" name="street" type="text" size="20" required></x-input>
                                    <x-input label="Huisnummer" name="house_number" type="text" size="5" required></x-input>
                                </section>
                            </section>
                        </section>

                    </section>
                    <section class="column" style="width: 30%">
                            <x-file-upload name="profile_pic" styles="width: 100%; height: 10rem;"/>
                    </section>
                </section>
                <section class="column" style="gap: 1rem">
                    <h3>Gebruikersinformatie</h3>
                    <section class="column">
                        <x-input label="Email" name="email" type="email" size="20" required></x-input>
                    </section>
                    <section class="row">
                        <x-input label="Wachtwoord" name="password" type="password" size="20" required></x-input>
                        <x-input label="Herhaal Wachtwoord" name="password_confirmation" type="password" size="20" required></x-input>
                    </section>
                </section>
                <p class="column" style="gap: 0.25rem"><span>Heb je al een account?</span><a href="/inloggen">Inloggen</a></p>
                <section class="center">
                    <button
                        type="submit" class="button">
                        Registreren
                    </button>
                </section>
                <section id="dog-section">
                    <figure id="speech-bubble">
                        <img src="{{asset('/images/speech_bubble.svg')}}" alt="Speech Bubble">
                    </figure>
                    <figure id="dog">
                        <img src="{{asset('/images/dog.gif')}}" alt="Dog" class="img-fluid">
                    </figure>
                </section>
            </section>
        </form>
    </section>
</x-layout>


