<x-app-layout>

<form method="post" action="{{ route('contrahents.store') }}">
@csrf
    @isset($user)
        @method('PUT')
    @endisset

    <div class="site-card clearfix">
        <div class="site-card__header">
            <h4>{{__("Vartotojas")}}</h4>
        </div>
        <div class="site-card__body">
            <div class="row gy-3">
                <div class="col-12">
                    <label for="name" class="form-regular__label">{{__("Pavadinimas")}}</label>
                    <input type="text" name="name" placeholder="{{__("Įveskite pirkėjo pavadinimą")}}" id="name" value="{{ old('name') }}">
                </div>
                <div class="col-12">
                    <label for="company_code" class="form-regular__label">{{__("Kodas")}}</label>
                    <input type="text" name="code" placeholder="{{__("Įveskite pirkėjo kodą")}}" id="code" value="{{ old('code') }}">
                </div>
                <div class="col-12">
                    <label for="vat" class="form-regular__label">{{__("PVM kodas")}}</label>
                    <input type="text" name="vat" placeholder="{{__("Įveskite pirkėjo PVM kodą")}}" id="vat" value="{{ old('vat') }}">
                </div>
                <div class="col-12">
                    <label for="email" class="form-regular__label">{{__("El. paštas")}}</label>
                    <input type="email" name="email" placeholder="{{__("Įveskite pirkėjo el.paštą")}}" id="email" value="{{ old('email') }}">
                </div>

                <div class="col-12">
                    <label for="phone" class="form-regular__label">{{__("Telefonas")}}</label>
                    <input type="text" name="phone" placeholder="{{__("Įveskite pirkėjo telefoną")}}" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="col-12">
                    <label for="address" class="form-regular__label">{{__("Adresas")}}</label>
                    <input type="text" name="address" placeholder="{{__("Įveskite pirkėjo adresą")}}" id="address" value="{{ old('address') }}">
                </div>
                <div class="col-12">
                    <label for="country" class="form-regular__label">{{__("Šalis")}}</label>
                    <input type="text" name="country" placeholder="{{__("Įveskite pirkėjo šalį")}}" id="country" value="{{ old('country') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
            <button type="submit" class="btn btn--primary btn--block-xs" style="margin-top:1.5rem; width:100%; margin-bottom:1rem">{{__("Išsaugoti")}}</button>
        </div>
</form>
</x-app-layout>
