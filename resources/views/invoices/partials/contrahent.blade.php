

@php
    $item ??= null;
    @endphp
<div class="col-12 col-xl-6 m-b-20">
    <div class="site-card clearfix">
        <div class="site-card__header">
            <h4>Pirkėjas</h4>
        </div>
        <div class="site-card__body">
            <div class="row gy-3">
                <div class="col-12">
                    <label for="id-560955" class="form-regular__label">{{ __('Pavadinimas') }}<span class='text-red'>*</span></label>
                    <input type="text" name="contrahent_name" placeholder="{{ __('Įveskite pirkėjo pavadinimą') }}"
                        value="{{ old("contrahent_name",$item?->contrahent_name) }}" class="contrahent_name">
                </div>
                <div class="col-12">
                    <label for="id-733324" class="form-regular__label">{{ __('Kodas') }}<span class='text-red'>*</span></label>
                    <input type="text" name="contrahent_code" placeholder="{{ __('Įveskite pirkėjo kodą') }}"
                        value="{{ old("contrahent_code",$item?->contrahent_code) }}" class="contrahent_code">
                </div>
                <div class="col-12">
                    <label for="id-051784" class="form-regular__label">{{ __('PVM') }} kodas</label>
                    <input type="text" name="contrahent_vat" value="{{old("contrahent_vat", $item?->contrahent_vat )}}" placeholder="{{ __('Įveskite pirkėjo PVM kodą') }}"
                        id="id-051784">

                </div>
                <div class="col-12">
                    <label for="id-826525" class="form-regular__label">{{ __('El') }}.paštas</label>
                    <input type="text" name="contrahent_email" placeholder="{{ __('Įveskite pirkėjo el. paštą') }}s"
                    value="{{ old("contrahent_email",$item?->contrahent_email) }}">
                </div>
                <div class="col-12">
                    <label for="id-609813" class="form-regular__label">{{ __('Telefonas') }}</label>
                    <input type="text" name="contrahent_phone" placeholder="{{ __('Įveskite pirkėjo telefono nr') }}"
                    value="{{ old("contrahent_phone",$item?->contrahent_phone) }}">
                </div>
                <div class="col-12">
                    <label for="id-080505" class="form-regular__label">{{ __('Adresas') }}</label>
                    <input type="text" name="contrahent_address" placeholder="{{ __('Įveskite pirkėjo adresą') }}"
                    value="{{ old("contrahent_address",$item?->contrahent_address) }}">
                </div>
                <div class="col-12">
                    <label for="id-080505" class="form-regular__label">{{ __('Šalis') }}</label>
                    <input type="text" name="contrahent_country" placeholder="{{ __('Įveskite pirkėjo šalį') }}"
                    value="{{ old("contrahent_country",$item?->contrahent_country) }}">
                </div>
            </div>
        </div>
    </div>
</div>
