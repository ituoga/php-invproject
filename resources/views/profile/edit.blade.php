<x-app-layout>
    <h1>{{ __('Mano') }}</h1>
    <h2>{{ __('Profilis') }}</h2>

    <form method="post" action="{{ route('profile.update') }}" class="form-regular clearfix">
        @csrf
        @method('PATCH')
        <dl>
            <dt>{{ __('Vygdau individualią veiklą') }}:</dt>
            <dd>
                {{-- <input type="text" name="seller_idv" value="" placeholder="{{ __('Vygdau individualią veiklą') }}"> --}}
                <select name="seller_idv" class="js-select" style="width: 100%">
                    <option value="ne">{{ __('Ne') }}</option>
                    <option value="taip">{{ __('Taip') }}</option>
                </select>
            </dd>
            <dt>{{ __('Pavadiniams ( vardas/pavarde arba imones pavadinimas)') }}:</dt>
            <dd><input type="text" name="seller_name" value="{{ $config?->seller_name }}" placeholder="{{ __('Pavadinimas') }}"></dd>
            <dt>{{ __('Kodas') }}:</dt>
            <dd><input type="text" name="seller_code" value="{{ $config?->seller_code }}" placeholder="{{ __('Kodas') }}"></dd>
            <dt>{{ __('PVM kodas') }}:</dt>
            <dd><input type="text" name="seller_vat" value="{{ $config?->seller_vat }}" placeholder="{{ __('PVM kodas') }}"></dd>
            <dt>{{ __('Telefonas') }}:</dt>
            <dd><input type="text" name="seller_phone" value="{{ $config?->seller_phone }}" placeholder="{{ __('Telefonas') }}"></dd>
            <dt>{{ __('El.paštas') }}:</dt>
            <dd><input type="text" name="seller_email" value="{{ $config?->seller_email }}" placeholder="{{ __('El.paštas') }}"></dd>
            <dt>{{ __('Adresas') }}:</dt>
            <dd><input type="text" name="seller_address" value="{{ $config?->seller_address }}" placeholder="{{ __('Adresas') }}"></dd>
            <dt>{{ __('Šalis') }}:</dt>
            <dd><input type="text" name="seller_country" value="{{ $config?->seller_country }}" placeholder="{{ __('Šalis') }}"></dd>
            <dt>{{ __('Sąskaitos numeris') }}:</dt>
            <dd><input type="text" name="seller_bank" value="{{ $config?->seller_bank }}" placeholder="{{ __('Sąskaitos numeris') }}">
            </dd>
        </dl>
        <div class="row">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">{{__("Saugoti profili")}}</button>
            </div>
        </div>
    </form>

    <h2>{{ __('Nustatymai') }}</h2>

    <form method="post" action="{{ route('config.update') }}" class="form-regular clearfix">
        @csrf
        <dl>
            <dt>{{ __('Apmokėti per') }}:</dt>
            <dd><input type="text" name="config_pay_until" value="{{ $config?->config_pay_until }}" placeholder="{{ __('14') }}"></dd>
            <dt>{{ __('PVM Riba ( pvz 45000 )') }}:</dt>
            <dd><input type="text" name="config_pvm_from" value="{{ $config?->config_pvm_from }}" placeholder="{{ __('45000') }}"></dd>
            <dt>{{ __('Įrašų per puslapį') }}:</dt>
            <dd><input type="text" name="config_rows_per_page" value="{{ $config?->config_rows_per_page }}" placeholder="{{ __('30') }}"></dd>
        </dl>

        <div class="row">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">{{__("Saugoti nustatymu")}}</button>
            </div>
        </div>
    </form>


    <h2>{{ __('Serija ir Numeris') }}</h2>

    <form method="post" action="{{ route('config.update') }}" class="form-regular clearfix">
        @csrf
        @method("post");
        <dl>
            <dt>{{ __('Išankstinių serija') }}:</dt>
            <dd><input type="text" name="invoice_series_pre" value="{{ $config?->invoice_series_pre }}" placeholder="{{ __('P') }}"></dd>
            <dt>{{ __('Išankstinių sekantis numeris') }}:</dt>
            <dd><input type="text" name="invoice_number_pre" value="{{ $config?->invoice_number_pre }}" placeholder="{{ __('1') }}"></dd>
        </dl>
        <dl>
            <dt>{{ __('Debetinių serija') }}:</dt>
            <dd><input type="text" name="invoice_series_deb" value="{{ $config?->invoice_series_deb }}" placeholder="{{ __('DN') }}"></dd>
            <dt>{{ __('Debetinių sekantis numeris') }}:</dt>
            <dd><input type="text" name="invoice_number_deb" value="{{ $config?->invoice_number_deb }}" placeholder="{{ __('1') }}"></dd>
        </dl>
        <dl>
            <dt>{{ __('Kreditinių serija') }}:</dt>
            <dd><input type="text" name="invoice_series_cre" value="{{ $config?->invoice_series_cre }}" placeholder="{{ __('CR') }}"></dd>
            <dt>{{ __('Kreditinių sekantis numeris') }}:</dt>
            <dd><input type="text" name="invoice_number_cre" value="{{ $config?->invoice_number_cre }}" placeholder="{{ __('1') }}"></dd>
        </dl>

        <div class="row">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">{{__('Saugoti nustatymus')}}</button>
            </div>
        </div>
    </form>
</x-app-layout>
