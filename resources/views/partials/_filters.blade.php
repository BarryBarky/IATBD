<section class="filters">
    <button type="button" onclick="toggleModal()"><i class="fa-solid fa-filter"></i></button>
    <x-popup title="">
        <section class="column">
            <section class="column" style="gap: 1rem">
                <h3>Algemeen</h3>
                <section class="row">
                    @if(request()->segment(2) === 'huisdieren')
                        <x-input label="Soort huisdier" type="select_pet_type" name="soort"/>
                        <x-input label="Gelacht" type="select_sex" name="geslacht"/>
                    @endif
                    @if(request()->segment(2) === 'advertenties')
                        <section class="field-section">
                            <label for="sorteren_op">
                                Sorteer op
                            </label>
                            <select id="sorteren_op" name="sorteren_op" style="width: fit-content">
                                <option value>-</option>
                                <option value="prijs_oplopend">Prijs - oplopend</option>
                                <option value="prijs_aflopend">Prijs - aflopend</option>
                            </select>
                        </section>
                    @endif
                </section>
            </section>
            @if(request()->segment(2) === 'advertenties')
                <section class="column" style="gap: 1rem">
                    <h3>Periode</h3>
                    <section class="row">
                        <x-input label="Start Periode" type="date" name="periode_start"/>
                        <x-input label="Einde Periode" type="date" name="periode_eind"/>
                    </section>
                </section>
            @endif
        </section>

    </x-popup>
</section>
<script>
    document.rice
</script>

