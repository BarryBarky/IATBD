<a class="card" href="{{url()->current()}}/{{$ad->id}}">
    <section >
        <img src="{{isset($ad->image) ? Storage::url($ad->image): asset('/storage/advertisements/placeholder.png')}}" alt="Advertentie banner" class="img-fluid"/>
        <ul class="meta-data" style="justify-content: start">
            <li>
                <p style="font-weight: 600; font-size: 12pt">{{$ad->title}}</p>
            </li>
            <li>
                <p class="row" style="gap: 1rem; align-items: center"><span class="row" style="width: fit-content; gap: 0.25rem; align-items: center"><i class="fa-solid fa-euro-sign" style="width: fit-content; color: var(--green-color); font-size: 12pt;"></i><span style="width: fit-content; color: var(--green-color); font-size: 18pt;">{{$ad->price_in_euros}}</span></span><span style="width: fit-content">Per uur</span></p>
            </li>
            <li style="justify-content: space-between">
                <p style="font-weight: 500; color: var(--bg-secondary)">{{$ad->starting_period}}</p>
                <p style="text-align: center">t/m</p>
                <p style="font-weight: 500; color: var(--bg-secondary)">{{$ad->ending_period}}</p>
            </li>
        </ul>
    </section>
</a>

