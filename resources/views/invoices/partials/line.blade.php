<template x-for="(line, idx) in lines" :key="idx">
    <div class="row gy-3">
        <div class="col-12 col-md-9 col-xl">
            <label for="id-283928" class="form-regular__label">{{ __('Paslaugos ar prekės pavadinimas') }}</label>
            <div class="form-regular__wrap" style="position: relative;" >
                <span class="form-regular__icon"><i class="icon-search" aria-hidden="true"></i></span>
                <input @@input.debounce="fetchResults(line)" x-model="line.product_name" type="text" x-bind:name="`lines[${idx}][product_name]`"
                    placeholder="{{ __('Įveskite paslaugos ar prekės pavadinimą') }}" id="id-283928">
                <select @@click.outside="resetSearch(line)" x-show="line.resultCount > 0" name="customer" id="selecta" :size="line.resultCount+1" @@change="line.resultCount=0;showSearch=false;fixLine(line, $event.target.value)" style="width:90%; position:absolute; top:40px; left: 40px;">
                    <option x-show="line.resultCount<1">Loading...</option>
                    <template x-for="item in line.results">
                        <option :value="item.id" x-text="item.label"></option>
                    </template>
                </select>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-1">
            <label for="id-564045" class="form-regular__label">{{ __('Kaina') }}</label>
            <input x-model="line.product_price" @@input="$nextTick(() =>updateRow(line))"
                type="text" x-bind:name="`lines[${idx}][product_price]`" placeholder="1" id="id-564045">
        </div>
        <div class="col-6 col-md col-xl-1">
            <label for="id-220857" class="form-regular__label">{{ __('Kiekis') }}</label>
            <input x-model="line.product_qty" @@input="$nextTick(() =>updateRow(line))" type="text"
                x-bind:name="`lines[${idx}][product_qty]`" placeholder="0" id="id-220857">
        </div>
        <div class="col-6 col-sm col-md col-xl-1">
            <label for="id-813205" class="form-regular__label">{{ __('Mato') }} vnt.</label>
            <select x-model="line.unit" x-bind:name="`lines[${idx}][unit]`" class="js-select" id="id-813205" style="width: 100%;">
                <option>Vnt.</option>
            </select>
        </div>
        <div class="col-6 col-sm col-md col-xl-1">
            <label for="id-909053" class="form-regular__label">{{ __('PVM') }}</label>
            <select x-model="line.vat" @@input="updateRow(line)" x-bind:name="`lines[${idx}][vat]`" class="js-select"
                id="id-909053" style="width: 100%;">
                <option value="0">0%</option>
                <option value="1.21">21%</option>
            </select>
        </div>
        <div class="col col-xl-1">
            <label for="id-471668" class="form-regular__label">{{ __('Suma') }}</label>
            <input x-model="line.total" type="text" x-bind:name="`lines[${idx}][total]`" placeholder="0" id="id-471668" readonly>
        </div>
        <div class="col-auto">
            <ul class="site-helpers justify-content-end m-t-34">
                <li class="site-helpers__items"><a href="js:;" @@click="deleteLine(line.id)"
                        class="site-helpers__links color-scarlet"><i class="icon-trash" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="col-12">
            {{-- <label for="id-514376" class="form-regular__label">{{ __('Textarea') }}</label> --}}
            <textarea x-model="line.comment" rows="2" x-bind:name="`lines[${idx}][comment]`" placeholder="{{ __("Pastabos ir kita") }}" id="id-514376"></textarea>
        </div>
        <hr class="clearfix" />
    </div>

</template>
@php
$lines = [
    ["id" =>1, "total" => 0.00, "product_qty" => 1, "vat" => 1.21]
];
if(old('lines')) {
    $lines = old('lines') ?? [];
}

if(!empty($item)) {
    $lines = $item->lines()->get()->toArray();
}
@endphp

@push('scripts')
    <script>
        function invoiceLines() {
            return {
                q: '',
                showSearch:true,
                resultCount: 0,
                results: [],
                fixLine(line, evt) {
                    // console.log(this.results, evt);
                    const val = line.results.filter((item) => item.id == evt);
                    console.log(val[0]);
                    line.product_name = val[0].label;
                    line.product_qty = val[0].quantity;
                    line.product_price = val[0].price;
                    line.results = [];
                    line.resultCount = 0;
                    this.updateRows();
                },
                fetchResults(line) {
                    fetch(`/products/search?term=${this.q}`)
                        .then(response => {
                            if (!response.ok) alert(`Something went wrong: ${response.status} - ${response.statusText}`)
                            return response.json()
                        })
                        .then(data => {
                            line.results = data
                            line.resultCount = data.length
                        })
                },
                resetSearch(){
                    this.q =''
                    this.showSearch = true
                },
                lines: @json($lines),
                total: 0.00,
                vat: 0.00,
                total_with_vat: 0.00,
                addLine() {
                    this.lines.push({
                        id: Date.now(),
                        total: 0.00,
                        product_qty: 1,
                        vat: 1.21,
                        total_vat:0,
                        results: [],
                        resultCount: 0,
                    });
                },
                updateRows() {
                    this.lines.forEach(line => {
                        this.updateRow(line);
                    });
                },
                updateRow(line) {
                    let pPrice = parseFloat(line.product_price).toFixed(2) || 0;
                    let pQty = parseFloat(line.product_qty).toFixed(2) || 0 ;
                    let pTotal = pPrice * pQty;
                    let pVat = parseFloat(line.vat).toFixed(2) || 0;

                    vat = pTotal * pVat - pTotal;
                    line.total_vat = vat.toFixed(2);
                    line.total = (pTotal).toFixed(2);

                    if (isNaN(line.total)) {
                        line.total = 0.00;
                    }
                    if (isNaN(line.total_vat)) {
                        line.total_vat = 0.00;
                    }
                },
                get calcTotal() {
                    return this.lines.reduce((acc, line) => acc + parseFloat(line.total), 0) || 0.00;
                },
                get calcVat() {
                    return this.lines.reduce((acc, line) => acc + parseFloat(line.total_vat) || 0.00, 0) || 0.00;
                },
                get calcTotalWithVat() {
                    return this.calcTotal + this.calcVat;
                },
                deleteLine(lineId) {
                    if (this.lines.length > 1) {
                        let position = this.lines.findIndex(el => el.id == lineId);
                        this.lines.splice(position, 1);
                    }
                }
            }
        }

    </script>
@endpush
