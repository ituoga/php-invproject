<x-app-layout>

    <form method="post" action="{{ route('contrahents.update', $item) }}">
        @csrfÏ
        @method('PUT')

        <div class="site-card clearfix">
            <div class="site-card__header">
                <h4>Vartotojas</h4>
            </div>
            <div class="site-card__body">
                <div class="row gy-3">
                    <div class="col-12">
                        <label for="name" class="form-regular__label">Pavadinimas</label>
                        <input type="text" name="name" placeholder="Įveskite pirkėjo pavadinimą" id="name"
                            value="{{ old('name', $item->name) }}">
                    </div>
                    <div class="col-12">
                        <label for="company_code" class="form-regular__label">Kodas</label>
                        <input type="text" name="code" placeholder="Įveskite pirkėjo kodą" id="code"
                            value="{{ old('code', $item->code) }}">
                    </div>
                    <div class="col-12">
                        <label for="vat" class="form-regular__label">PVM kodas</label>
                        <input type="text" name="vat" placeholder="Įveskite pirkėjo PVM kodą" id="vat"
                            value="{{ old('vat', $item->vat) }}">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-regular__label">El.paštas</label>
                        <input type="email" name="email" placeholder="Įveskite pirkėjo el.paštą" id="email"
                            value="{{ old('email', $item->email) }}">
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-regular__label">Telefonas</label>
                        <input type="text" name="phone" placeholder="Įveskite pirkėjo telefoną" id="phone"
                            value="{{ old('phone', $item->phone) }}">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-regular__label">Adresas</label>
                        <input type="text" name="address" placeholder="Įveskite pirkėjo adresą" id="address"
                            value="{{ old('address', $item->address) }}">
                    </div>
                    <div class="col-12">
                        <label for="city" class="form-regular__label">Miestas</label>
                        <input type="text" name="city" placeholder="Įveskite pirkėjo miestą" id="city"
                            value="{{ old('city', $item->city) }}">
                    </div>
                    <div class="col-12">
                        <label for="country" class="form-regular__label">Šalis</label>
                        <input type="text" name="country" placeholder="Įveskite pirkėjo šalį" id="country"
                            value="{{ old('country', $item->country) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn--primary btn--block-xs"
                style="margin-top:1.5rem; width:100%; margin-bottom:1rem">Išsaugoti</button>
        </div>
    </form>
</x-app-layout>