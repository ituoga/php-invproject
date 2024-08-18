@php use App\Enums\InvoiceTypeEnum;use App\Services\InvoiceNumberResolverService;use App\Services\InvoiceTypeResolverService; @endphp

@switch($type)
    @case(InvoiceTypeEnum::Preliminary->value)
        <h1>{{ __('Išankstinės Sąskaitos faktūros išrašymas') }}</h1>
        @break
    @case(InvoiceTypeEnum::Credit->value)
        <h1>{{ __('Kreditinės Sąskaitos faktūros išrašymas') }}</h1>
        @break
    @default
        <h1>{{ __('Sąskaitos faktūros išrašymas') }}</h1>
        @break
@endswitch
