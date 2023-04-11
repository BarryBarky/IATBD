<form action="">
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
                        <td>{{$petSitter->user->first_name}}</td>
                        <td>{{$petSitter->user->last_name}}</td>
                        <td>{{$petSitter->user->age}}</td>
                        <td>{{$petSitter->user->sex}}</td>
                        <td><a href="/dashboard/gebruikers/{{$petSitter->user->id}}"><i class="fa-solid fa-user"></i></a></td>
                        <td><a href="/dashboard/advertenties/{{$advertisement->id}}"><i class="fa-solid fa-money-check-dollar"></i></a></td>
                        <td>{{$advertisement->pivot->is_accepted ? 'Ja' : 'Nee'}}</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </table>
</form>
