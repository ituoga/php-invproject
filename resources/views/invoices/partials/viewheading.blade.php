@php use App\Enums\InvoiceTypeEnum;use App\Services\InvoiceNumberResolverService;use App\Services\InvoiceTypeResolverService; @endphp

@switch($type)
    @case(InvoiceTypeEnum::Preliminary->value)
        <h1>{{ __('Išankstinė Sąskaita faktūra') }}</h1>
        @break
    @case(InvoiceTypeEnum::Credit->value)
        <h1>{{ __('Kreditinė Sąskaita faktūra') }}</h1>
        @break
    @default
        @if($config->seller_vat)
            <h1>{{ __('PVM-Sąskaita faktūra') }}</h1>
        @else
            <h1>{{ __('Sąskaita faktūra') }}</h1>
        @endif

        @break
@endswitch
