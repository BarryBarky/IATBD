<form action="{{url()->current()}}">
    <section class="search" style="gap: 3rem">
        @csrf
        <section class="searchbar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="zoeken" id="search" placeholder="Vul een zoekterm in..." value="{{request('zoeken') ? request('zoeken') : ''}}"/>
        </section>
        <section class="last-items">
           @include('partials._filters')
            <section>
                <button class="button" >Zoeken...</button>
            </section>
        </section>
    </section>
</form>
