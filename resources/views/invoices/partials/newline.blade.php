<div class="row gy-3 p-4">
    <div class="col-12 col-sm-6 col-md-7 col-xl-9">
        <div class="row gy-4">
            <div class="col-12">
                <a href="js:;" @@click="addLine()" class="btn btn--default"><i class="icon-plus" aria-hidden="true"></i>Nauja eilutė</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-5 col-xl-3">
        <div class="row gy-2">
            <div class="col-9"><strong>{{ __('Viso') }}:</strong><input type="hidden" name="invoice_total" x-bind:value="calcTotal"/></div>
            <div class="col-3 text-right" x-text="calcTotal"></div>
            <div class="col-9"><strong>{{ __('PVM') }}:</strong><input type="hidden" name="invoice_vat" x-bind:value="calcVat"/></div>
            <div class="col-3 text-right" x-text="calcVat">0</div>
            <div class="col-9"><strong>{{ __('Viso su PVM') }}:</strong><input type="hidden" name="invoice_total_with_vat" x-bind:value="calcTotalWithVat" /></div>
            <div class="col-3 text-right" x-text="calcTotalWithVat">0</div>
        </div>
    </div>
</div>

