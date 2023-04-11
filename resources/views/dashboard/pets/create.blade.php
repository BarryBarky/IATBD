<x-dashboard-layout>
<form action="/dashboard/huisdieren" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="form-header" style="margin-bottom: 3rem">Huisdier aanmaken</h1>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <section class="column" style="gap: 1rem; width: 100%">
        <section class="space-between" style="gap: 3rem; align-items: start">
            <section class="column" style="gap: 1rem; width: 60%">
                <h3>Algemeen</h3>
                <section class="show-section">
                    <section class="row">
                        <x-input label="Naam" type="text" name="name" required/>
                        <x-input label="Soort" type="select_pet_type" name="pet_type_id" required/>
                    </section>
                    <section class="row">
                        <x-input label="Leeftijd" type="text" name="age" required size="5"/>
                        <x-input label="Geslacht" type="select_sex" name="sex" required/>
                    </section>
                    <x-input label="Omschrijving"
                             description="Omschrijf wat voor huisdier het is, wat de eigenschappen zijn en waar de oppasser op moet letten als hij / zij op het dier gaat oppassen"
                             type="textarea" name="description" required/>
                </section>
            </section>
            <section class="column" style="gap: 1rem;  width: 40%">
                <h3>Foto</h3>
                <x-file-upload name="profile_pic" styles="width: 100%; height: 200px;"/>
            </section>
        </section>
    </section>
    <section class="center" style="margin: 3rem 0">
        <button class="button">
            Aanmaken
        </button>
    </section>
</form>
</x-dashboard-layout>
