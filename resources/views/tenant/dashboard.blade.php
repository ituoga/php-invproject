<x-app-layout>
    {{-- <h1>{{ __('Pradžia') }}</h1> --}}

    {{-- {!! $chart->container() !!} --}}
    {{-- {!! $chart->script() !!} --}}
    <div class="row">
        <div class="col col-xl-2">
            <a class="btn btn--primary w-100" href="{{ route("invoices.create" )}}">Kurti naują</a>
        </div>
        <div class="col col-xl-2">
            <a class="btn btn--secondary w-100" href="{{ route("invoices.create" )}}">Kurti išankstinę</a>
        </div>
    </div>
    @push('styles')
        <style>
            .w-100 {
                width: 100;
                display: block;
            }
        </style>
    @endpush
</x-app-layout>
