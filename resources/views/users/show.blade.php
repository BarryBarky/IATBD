<x-dashboard-layout>
    <section class="page-header">
        <h1 class="form-header" style="margin-bottom: 3rem;">
            {{$user->first_name. " " .$user->last_name}}
        </h1>
        @if(Auth::id() === $user->id)
            <section class="controls">
                <a class="button" href="{{url()->current()}}/bewerken" style="margin-bottom: 3rem">
                    Bewerken
                </a>
            </section>
        @endif
    </section>
    @if(isset($breadcrumbs))
        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    @endif
    <section class="space-between" style="gap: 3rem; align-items: stretch;">
        <section class="column" style="gap: 3rem; width: 100%">
            <img
                src="{{$user->profile_pic ? Storage::url($user->profile_pic) : Storage::url('/profile_pics/users/placeholder.png')}}"
                alt="Profile picture" class="img-fluid"
                style="max-height: 300px;  object-fit: cover;">
            <section class="column" style="gap: 1rem">
                <h3>Adresgegevens</h3>
                <section class="show-section">
                    <section class="space-between">
                        <h4>Plaatsnaam</h4>
                        <p>{{$user->city}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Straatnaam + Huisnummer</h4>
                        <p>{{$user->street. " " .$user->house_number}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Postcode</h4>
                        <p>{{$user->postal_code}}</p>
                    </section>
                </section>
            </section>
        </section>

        <section class="column" style="gap: 3rem; width: 100%; justify-content: space-between">
            <section class="column" style="gap: 3rem">
                <section class="show-section">
                    <section class="space-between">
                        <h4>Leeftijd</h4>
                        <p>{{$user->age}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Geslacht</h4>
                        <p>{{$user->sex}}</p>
                    </section>
                </section>
                <section class="show-section">
                    <section class="space-between">
                        <h4>Telefoonnummer</h4>
                        <p>{{$user->phone}}</p>
                    </section>
                    <section class="space-between">
                        <h4>Emailadres</h4>
                        <p>{{$user->email}}</p>
                    </section>
                </section>
            </section>
            <section class="center">
                @if(!$user->petSitter && Auth::id() === $user->id)
                    <a href="{{url()->current()}}/oppasser/aanmaken" class="button"
                       style="text-decoration: none; font-weight: 500">Meld je aan als oppasser</a>
                @else
                    <i class="fa-solid fa-user" style="color: var(--bg-secondary); opacity: 0.3; font-size: 130pt"></i>
                @endif
            </section>
        </section>
    </section>
    @if($user->petSitter)
        <hr style="margin: 3rem 0">
        <section class="space-between" style="margin-bottom: 2rem">
            <h2 class="row" style="gap: 1rem"><i class="fa-solid fa-check" style="color: var(--bg-secondary);"></i>Ik
                ben Oppasser</h2>
            @if(Auth::id() === $user->id)
                <section class="row" style="gap: 1rem; align-items: center">
                    <form action="{{url()->current()}}/oppasser/{{$user->petSitter->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="delete" value="Verwijderen"
                               style="font-size: 11pt; cursor: pointer"/>
                    </form>
                    <a class="button" href="{{url()->current()}}/oppasser/bewerken">
                        Bewerken
                    </a>
                </section>
            @endif
        </section>
        <section class="space-between" style="gap: 3rem; align-items: start">
            <section class="column" style="gap: 1rem; width: 100%">
                <section class="show-section">
                    <p>{{$user->petSitter->description}}</p>
                </section>
            </section>
            <section class="column" style="gap: 1rem; width: 100%">
                <section class="show-section">
                    <x-reviews.index :reviews="$user->reviews"/>
                </section>
            </section>
            @if(Auth::id() !== $user->id && isset($isAccepted))
                <x-reviews.create :user="$user"/>
            @endif
        </section>
        <h3 style="margin: 3rem 0 1rem 0">Leefomgeving</h3>
        <section class="show-image-gallery" style="gap: 3rem">
            @foreach($user->petSitter->images as $image)
                <img src="{{\Illuminate\Support\Facades\Storage::url($image->url)}}" alt="leefomgeving"
                     class="img-fluid" style="width: 100%; height: 300px;"/>
            @endforeach
        </section>
    @endif
</x-dashboard-layout>
