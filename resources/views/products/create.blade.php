<x-app-layout>

    <form method="post" action="{{ route('products.store') }}">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset

        <div class="site-card clearfix">
            <div class="site-card__header">
                <h4>{{__("Produktas")}}</h4>
            </div>
            <div class="site-card__body">
                <div class="row gy-3">
                    <div class="col-12">
                        <label for="name" class="form-regular__label">{{__("Pavadinimas")}}</label>
                        <input type="text" name="name" placeholder="{{__("Įveskite pirkėjo pavadinimą")}}" id="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-12">
                        <label for="company_code" class="form-regular__label">{{__("Kaina")}}</label>
                        <input type="text" name="price" placeholder="{{__("Įveskite pirkėjo kodą")}}" id="code"
                            value="{{ old('price') }}">
                    </div>
                    <div class="col-12">
                        <label for="vat" class="form-regular__label">{{__("Kiekis")}}</label>
                        <input type="text" name="quantity" placeholder="{{__("Įveskite pirkėjo PVM")}} kodą" id="vat"
                            value="{{ old('quantity') }}">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-regular__label">{{__("Matas")}}</label>
                        <input type="unit" name="unit" placeholder="{{__("Įveskite pirkėjo el")}}.paštą" id="email"
                            value="{{ old('unit') }}">
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-regular__label">{{__("PVM")}}</label>
                        <input type="text" name="vat" placeholder="{{__("Įveskite pirkėjo telefoną")}}" id="phone"
                            value="{{ old('vat') }}">
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-regular__label">{{__("Kodas")}}</label>
                        <input type="text" name="code" placeholder="{{__("Įveskite prekės kodą")}}" id="phone"
                            value="{{ old('code') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn--primary btn--block-xs"
                style="margin-top:1.5rem; width:100%; margin-bottom:1rem">{{__("Išsaugoti")}}</button>
        </div>
    </form>
</x-app-layout>
