<section class="column">
    <form action="/dashboard/gebruikers/block" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="column">
            <table>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Leeftijd</th>
                    <th>Geslacht</th>
                    <th>Volledig profiel</th>
                    <th>Blokkeren</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->sex}}</td>
                        <td><a href="/dashboard/gebruikers/{{$user->id}}"><i class="fa-solid fa-user"></i></a></td>
                        <td>
                            @if($user->is_blocked)
                                <x-input type="checkbox" name="users[]" value="{{$user->id}}" checked styles="margin: 0 auto;"/>
                            @else
                                <x-input type="checkbox" name="users[]" value="{{$user->id}}" styles="margin: 0 auto;"/>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <section class="center">
                <button class="button">Opslaan</button>
            </section>
        </section>
    </form>
</section>


