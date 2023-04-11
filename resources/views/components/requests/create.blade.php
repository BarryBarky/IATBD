@if($ad->user_id !== \Illuminate\Support\Facades\Auth::id() && \Illuminate\Support\Facades\Auth::user()->hasRoles(['pet_sitter']))
    <section class="show-section">
        <h4>Ben je geïnteresseerd?</h4>
        @php($isRequested = false)
        @if(count($ad->requests) > 0)
            @foreach($ad->requests as $request)
                @if($request->id == Auth::user()->pet_sitter_id)
                    @php($isRequested = true)
                @endif
            @endforeach
        @endif
        @if($isRequested)
            <p>Ja, ik heb aanvraag gedaan</p>
        @else
            <form action="{{url()->current()}}/aanvraag-doen" method="POST" style="width: 100%">
                @csrf
                <button class="button">
                    Aanvraag doen
                </button>
            </form>
        @endif
    </section>
@endif
