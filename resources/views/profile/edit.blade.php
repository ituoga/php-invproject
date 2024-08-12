<x-app-layout>
    <h1>{{ __('Mano') }}</h1>
    <h2>{{ __('Profilis') }}</h2>

    <form method="post" action="{{ route('profile.update') }}" class="form-regular clearfix">
        @csrf
        <dl>
            <dt>{{ __('Pavadiniams ( vardas/pavarde arba imones pavadinimas)') }}:</dt>
            <dd><input type="text" name="seller_code" value="" placeholder="{{ __('Kodas') }}"></dd>
            <dt>{{ __('Kodas') }}:</dt>
            <dd><input type="text" name="seller_code" value="" placeholder="{{ __('Kodas') }}"></dd>
            <dt>{{ __('PVM kodas') }}:</dt>
            <dd><input type="text" name="seller_code" value="" placeholder="{{ __('PVM kodas') }}"></dd>
            <dt>{{ __('Telefonas') }}:</dt>
            <dd><input type="text" name="seller_phone" value="" placeholder="{{ __('Telefonas') }}"></dd>
            <dt>{{ __('El.paštas') }}:</dt>
            <dd><input type="text" name="seller_email" value="" placeholder="{{ __('El.paštas') }}"></dd>
            <dt>{{ __('Adresas') }}:</dt>
            <dd><input type="text" name="seller_address" value="" placeholder="{{ __('Adresas') }}"></dd>
            <dt>{{ __('Šalis') }}:</dt>
            <dd><input type="text" name="seller_country" value="" placeholder="{{ __('Šalis') }}"></dd>
            <dt>{{ __('Sąskaitos numeris') }}:</dt>
            <dd><input type="text" name="seller_code" value="" placeholder="{{ __('Sąskaitos numeris') }}">
            </dd>
        </dl>
        <div class="row">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">Saugoti profili</button>
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
                <button type="submit" class="btn btn--secondary btn--block-xs">Saugoti nustatymu</button>
            </div>
        </div>
    </form>
</x-app-layout>
