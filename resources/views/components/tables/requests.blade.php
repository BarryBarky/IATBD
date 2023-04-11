<section class="column" style="overflow-x:auto;">
    <table>
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Leeftijd</th>
            <th>Geslacht</th>
            <th>Volledig profiel</th>
            <th>Welke advertentie?</th>
            <th>Is geaccepteerd?</th>
            <th>Verwijder aanvraag</th>
        </tr>
        @foreach($petSitters as $petSitter)
            @if(count($petSitter->advertisements) > 0)
                @foreach($petSitter->advertisements as $advertisement)
                    <tr>
                        <td style="padding: 1rem">{{$petSitter->user->first_name}}</td>
                        <td>{{$petSitter->user->last_name}}</td>
                        <td>{{$petSitter->user->age}}</td>
                        <td>{{$petSitter->user->sex}}</td>
                        <td><a href="/dashboard/gebruikers/{{$petSitter->user->id}}"><i class="fa-solid fa-user"></i></a></td>
                        <td><a href="/dashboard/advertenties/{{$advertisement->id}}"><i class="fa-solid fa-money-check-dollar"></i></a></td>
                        <td>{{$advertisement->pivot->is_accepted ? 'Ja' : 'Nee'}}</td>
                        <td>
                            <form action="/dashboard/oppasser/{{$petSitter->id}}/aanvraag" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-input type="hidden" name="advertisement" value="{{$advertisement->id}}"></x-input>
                                <button>
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </table>
</section>

