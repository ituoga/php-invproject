<x-app-layout>
    <h1>{{ __('Sąskaitos faktūros išrašymas') }}</h1>

    <form method="post" action="{{ route("invoices.store") }}" class="form-regular clearfix">
        @csrf

        <h5>1. {{ __('Sąskaitos faktūros išrašymo data') }}</h5>

        <div class="row">
            <div class="col-12 col-sm-6 col-xl-4 m-b-20">
                <label for="id-047724" class="form-regular__label">{{ __('Išrašymo data') }}</label>
                <div class="form-regular__wrap">
                    <span class="form-regular__icon"><i class="icon-calendar-plus" aria-hidden="true"></i></span>
                    <input type="date" name="document_date" value="{{ now()->format("Y-m-d") }}" placeholder="{{ __('Pasirinkite datą') }}" id="id-047724">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 m-b-20">
                <label for="id-750453" class="form-regular__label">{{ __('Apmokėti iki') }}</label>
                <div class="form-regular__wrap">
                    <span class="form-regular__icon"><i class="icon-calendar-plus" aria-hidden="true"></i></span>
                    <input type="date" name="pay_until" value="{{ now()->addDays(14)->format("Y-m-d") }}" placeholder="{{ __('Pasirinkite datą') }}" id="id-750453">
                </div>
            </div>
        </div>

        <h5>2. {{ __('Mokėjimo informacija') }}</h5>

        <div class="row">
            <div class="col-12 col-sm-6 col-xl-3 m-b-20">
                <label for="id-761741" class="form-regular__label">{{ __('Valiuta') }}</label>
                <select name="invoice_currency" class="js-select" id="id-761741" style="width: 100%;">
                    <option value="eur">EUR</option>
                    {{-- <option value="usd">USD</option> --}}
                    {{-- <option value="gbp">GBP</option> --}}
                </select>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 m-b-20">
                <label for="id-458066" class="form-regular__label">{{ __('Kursas') }}</label>
                <input type="text" name="invoice_exchange_rate" placeholder="1.000000" id="id-458066" value="1.00">
            </div>
            <div class="col-12 col-sm-6 col-xl-3 m-b-20">
                <label for="id-697453" class="form-regular__label">{{ __('Serija') }}</label>
                <input type="text" name="invoice_series" placeholder="SRS" id="id-458066" value="{{ $config?->invoice_series_deb }}">
                {{-- <select name="select" class="js-select" id="id-697453" style="width: 100%;"> --}}
                {{-- <option>--</option> --}}
                {{-- </select> --}}
            </div>
            <div class="col-12 col-sm-6 col-xl-3 m-b-20">
                <label for="id-522356" class="form-regular__label">{{ __('Numeris') }}</label>
                <input type="text" name="invoice_number" placeholder="" value="1" id="id-522356">
            </div>
        </div>

        <div class="row m-t-20">
            @include('invoices.partials.seller')

            @include('invoices.partials.contrahent')

        </div>




        <div class="row m-t-20">
            <div class="col m-b-20 ">
                <div class="site-card clearfix">
                    <div class="site-card__body" x-data="invoiceLines()" x-init="$nextTick(() =>updateRows())">

                        @include('invoices.partials.line')

                        @include('invoices.partials.newline')

                    </div>
                </div>
            </div>

        </div>

        <div class="row m-t-20">
            <div class="col m-b-20">
                <div class="site-card clearfix">
                    <div class="site-card__body">
                        <div class="row gy-4">
                            <div class="col-12 col-md-6">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label for="id-866667" class="form-regular__label">{{ __("Sąskaitą išrašė")}}</label>
                                        <input type="text" name="invoice_author" value="{{ auth()->user()?->name }}" placeholder="{{ __("Žmogus su geležine kauke")}}"
                                            id="id-866667">
                                    </div>
                                    <div class="col-12">
                                        <label for="id-367923" class="form-regular__label">{{ __("Pastabos")}}</label>
                                        <textarea name="invoice_notes" placeholder="{{ __("Pridėti pastabą...")}}" id="id-367923"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label for="id-838479" class="form-regular__label">{{ __("Sąskaitą priėmė")}}</label>
                                        <input type="text" name="invoice_contrahent" placeholder="{{ __("Žmogus su medine kauke")}}"
                                            id="id-838479">
                                    </div>
                                    <div class="col-12">
                                        <label for="id-519043" class="form-regular__label">{{ __("Komentaras")}}</label>
                                        <textarea name="invoice_comment" placeholder="{{ __("Pridėti komentarą...")}}" id="id-519043"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 col-md-auto m-b-20">
                <button type="submit" class="btn btn--secondary btn--block-xs">Išrašyti sąskaitą</button>
            </div>
            <div class="col-6 col-md-auto m-b-20">
                <a href="{{ route("invoices.index") }}" class="btn btn--default btn--block-xs">Atšaukti</a>
            </div>
        </div>

    </form>
</x-app-layout>
