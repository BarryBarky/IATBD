<x-layout>
    <section class="login-form">
        <header class="users-form-header">
            <figure style="width: 60%">
                <img src="/images/logo.svg" alt="logo" class="img-fluid">
            </figure>
        </header>

        <form method="POST" action="/gebruikers/authenticeren">
            @csrf
            <h1 class="form-header h3">Log in</h1>
            <section class="column" style="padding: 1rem 2rem; gap: 1rem">
                <x-input label="email" name="email" type="email" size="100%" styles="width: 100%" required></x-input>
                <x-input label="Wachtwoord" name="password" type="password" size="100%" styles="width: 100%" required></x-input>
                <p class="column" style="gap: 0.25rem"><span>Heb je nog geen account?</span><a href="/registreren">Registreren</a></p>
                    @error('credentials')
                    <section class="error-group">
                        <p class="error-message">{{$message}}</p>
                    </section>
                    @enderror

            </section>
            <section class="center">
                <button type="submit" class="button">
                    Log in
                </button>
            </section>
        </form>
    </section>
</x-layout>


