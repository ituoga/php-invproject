<x-app-layout>
    <h1>{{ __('Mano') }}</h1>
    <h2>{{ __('Profilis') }}</h2>

    <form method="post" action="{{ route('profile.update') }}" class="form-regular clearfix">
        @csrf
        @method('PATCH')
        <dl>
            <dt>{{ __('Vykdau individualią veiklą') }}:</dt>
            <dd>
                {{-- <input type="text" name="seller_idv" value="" placeholder="{{ __('Vykdau individualią veiklą') }}"> --}}
                <select name="seller_idv" class="js-select" style="width: 100%">
                    <option value="no" @if(old("seller_idv") == "no") selected @endif >{{ __('Ne') }}</option>
                    <option value="yes" @if(old("seller_idv") == "yes") selected @endif>{{ __('Taip') }}</option>
                </select>
            </dd>
            <dt>{{ __('Pavadinimas ( vardas/pavarde arba imones pavadinimas)') }}:</dt>
            <dd><input type="text" name="seller_name" value="{{ old("seller_name",$config?->seller_name) }}" placeholder="{{ __('Pavadinimas') }}"></dd>
            <dt>{{ __('Kodas') }}:</dt>
            <dd><input type="text" name="seller_code" value="{{ old("seller_code",$config?->seller_code) }}" placeholder="{{ __('Kodas') }}"></dd>
            <dt>{{ __('PVM kodas') }}:</dt>
            <dd><input type="text" name="seller_vat" value="{{ old("seller_vat",$config?->seller_vat) }}" placeholder="{{ __('PVM kodas') }}"></dd>
            <dt>{{ __('Telefonas') }}:</dt>
            <dd><input type="text" name="seller_phone" value="{{ old("seller_phone",$config?->seller_phone) }}" placeholder="{{ __('Telefonas') }}"></dd>
            <dt>{{ __('El. paštas') }}:</dt>
            <dd><input type="text" name="seller_email" value="{{ old("seller_email",$config?->seller_email) }}" placeholder="{{ __('El. paštas') }}"></dd>
            <dt>{{ __('Adresas') }}:</dt>
            <dd><input type="text" name="seller_address" value="{{ old("seller_address",$config?->seller_address) }}" placeholder="{{ __('Adresas') }}"></dd>
            <dt>{{ __('Šalis') }}:</dt>
            <dd><input type="text" name="seller_country" value="{{ old("seller_country",$config?->seller_country) }}" placeholder="{{ __('Šalis') }}"></dd>
            <dt>{{ __('Sąskaitos numeris') }}:</dt>
            <dd><input type="text" name="seller_bank" value="{{ old("seller_bank",$config?->seller_bank) }}" placeholder="{{ __('Sąskaitos numeris') }}">
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
            <dd><input type="text" name="config_pay_until" value="{{ old("config_pay_until",$config?->config_pay_until) }}" placeholder="{{ __('14') }}"></dd>
            <dt>{{ __('PVM Riba ( pvz 45000 )') }}:</dt>
            <dd><input type="text" name="config_pvm_from" value="{{ old("config_pvm_from",$config?->config_pvm_from) }}" placeholder="{{ __('45000') }}"></dd>
            <dt>{{ __('Įrašų per puslapį') }}:</dt>
            <dd><input type="text" name="config_rows_per_page" value="{{ old("config_rows_per_page",$config?->config_rows_per_page) }}" placeholder="{{ __('30') }}"></dd>
        </dl>

        <div class="row">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">{{__("Saugoti nustatymus")}}</button>
            </div>
        </div>
    </form>


    <h2>{{ __('Serija ir Numeris') }}</h2>

    <form method="post" action="{{ route('config.update') }}" class="form-regular clearfix">
        @csrf
        @method("post")
        <dl>
            <dt>{{ __('Išankstinių serija') }}:</dt>
            <dd><input type="text" name="invoice_series_pre" value="{{ old("invoice_series_pre",$config?->invoice_series_pre) }}" placeholder="{{ __('P') }}"></dd>
            <dt>{{ __('Išankstinių sekantis numeris') }}:</dt>
            <dd><input type="text" name="invoice_number_pre" value="{{ old("invoice_number_pre",$config?->invoice_number_pre) }}" placeholder="{{ __('1') }}"></dd>
        </dl>
        <dl>
            <dt>{{ __('Debetinių serija') }}:</dt>
            <dd><input type="text" name="invoice_series_deb" value="{{ old("invoice_series_deb",$config?->invoice_series_deb) }}" placeholder="{{ __('DN') }}"></dd>
            <dt>{{ __('Debetinių sekantis numeris') }}:</dt>
            <dd><input type="text" name="invoice_number_deb" value="{{ old("invoice_number_deb",$config?->invoice_number_deb) }}" placeholder="{{ __('1') }}"></dd>
        </dl>
        <dl>
            <dt>{{ __('Kreditinių serija') }}:</dt>
            <dd><input type="text" name="invoice_series_cre" value="{{ old("invoice_series_cre",$config?->invoice_series_cre) }}" placeholder="{{ __('CR') }}"></dd>
            <dt>{{ __('Kreditinių sekantis numeris') }}:</dt>
            <dd><input type="text" name="invoice_number_cre" value="{{ old("invoice_number_cre",$config?->invoice_number_cre) }}" placeholder="{{ __('1') }}"></dd>
        </dl>

        <div class="row">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">{{__('Saugoti nustatymus')}}</button>
            </div>
        </div>
    </form>
</x-app-layout>
