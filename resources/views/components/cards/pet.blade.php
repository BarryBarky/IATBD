<a class="card" href="{{url()->current()}}/{{$pet->id}}">
    <section >
        <img src="{{isset($pet->profile_pic) ? Storage::url($pet->profile_pic) : asset('/storage/profile_pics/animals/placeholder.png')}}" alt="Huisdier profiel foto" class="img-fluid"/>
        <ul class="meta-data">
            <li class="space-between">
                <h4>Naam</h4>
                <p>{{$pet->name}}</p>
            </li>
        </ul>
    </section>
</a>
