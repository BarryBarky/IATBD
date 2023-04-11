@if(count($ad->requests) > 0 && $ad->user_id === \Illuminate\Support\Facades\Auth::id())
    <section class="column" style="gap: 1rem">
        <h4>Geïntresseerden!</h4>
        <form action="{{url()->current()}}/accepteren" method="POST">
            @csrf
            @method('put')
            <section class="column">
                <section class="column" style="overflow-x: auto">
                    <table>
                        <tr>
                            <th>Accepteren?</th>
                            <th>Foto</th>
                            <th>Naam</th>
                            <th>Volledig Profiel</th>
                        </tr>
                        @if($ad->requests()->where('is_accepted', true)->count() === 1)
                            @php($request = $ad->requests()->where('is_accepted', true)->first())
                            <tr>
                                <td><i class="fa-solid fa-check" style="color: var(--bg-secondary)"></i></td>
                                <td style="width: 20%"><img
                                        src="{{isset($request->user->profile_pic) ? Storage::url($request->user->profile_pic) : asset('storage/advertisements/placeholder.png')}}"
                                        alt="placeholder" class="img-fluid"/></td>
                                <td>{{$request->user->first_name. ' ' . $request->user->last_name}}</td>
                                <td><a href="/dashboard/advertenties/{{$ad->id}}/profiel/{{$request->user->id}}"><i
                                            class="fa-solid fa-address-card"></i></a></td>
                            </tr>
                        @else
                            @foreach($ad->requests as $request)
                                <tr>
                                    <td>
                                        <x-input name="petSitter" type="radio" value="{{$request->id}}" styles="margin: 0 auto;"
                                                 required/>
                                    </td>
                                    <td style="width: 20%"><img
                                            src="{{isset($request->user->profile_pic) ? Storage::url($request->user->profile_pic) : asset('storage/advertisements/placeholder.png')}}"
                                            alt="placeholder" class="img-fluid"/></td>
                                    <td>{{$request->user->first_name. ' ' . $request->user->last_name}}</td>
                                    <td><a href="/dashboard/advertenties/{{$ad->id}}/profiel/{{$request->user->id}}"><i
                                                class="fa-solid fa-address-card"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </section>

            @if($ad->requests()->where('is_accepted', true)->count() === 0)
                <section class="center">
                    <button class="button">Opslaan</button>
                </section>
            @endif
            </section>
        </form>
    </section>
@endif
