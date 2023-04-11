@if(count($reviews) > 0)
    @php($avgStar = $reviews->avg('stars'))
    <section class="row" style="gap: 0.25rem; align-items: center">
        <x-reviews.stars value="{{$avgStar}}"/><a class="view-reviews" onclick="toggleModal()">({{count($reviews)}})</a>
    </section>
    <x-popup title="Alle reviews" id="view-reviews">
        <section class="column" style="margin: 3rem 0">
            @foreach($reviews as $review)
                <section class="space-between" style="align-items: start; gap: 1rem">
                    <section class="row">
                        <img src="{{$review->owner->profile_pic ? \Illuminate\Support\Facades\Storage::url($review->owner->profile_pic) :  \Illuminate\Support\Facades\Storage::url('profile_pics/users/placeholder.png')}}"
                             style="width: 15%" class="img-fluid" alt="Profiel foto"/>
                        <section class="column" style="gap: 1rem">
                                <span>
                                <a href="/dashboard/profiel/{{$review->owner->id}}"
                                   style="font-weight: 700">{{$review->owner->first_name. ' '. $review->owner->last_name}}</a> <br>Zegt het volgende...
                            </span>
                            <section class="column" style="gap: 0.25rem">
                                <x-reviews.stars value="{{$review->stars}}"/>
                                <h4>{{$review->title}}</h4>
                                <p>{{$review->description}}</p>
                            </section>
                        </section>
                    </section>
                    @if($review->owner_id === \Illuminate\Support\Facades\Auth::id())
                    <section class="column" style="gap: 1rem">
                        <form action="{{url()->current()}}/review/{{$review->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="delete" value="Verwijderen" style="font-size: 10pt; cursor: pointer"/>
                        </form>
{{--                        <x-reviews.edit :review="$review" />--}}
                    </section>
                    @endif
                </section>
            @endforeach
        </section>
    </x-popup>
@else
    <p>Je hebt nog geen reviews</p>
@endif
