<div class="col-12 col-xl-6 m-b-20">
  <div class="site-card clearfix">
    <div class="site-card__header">
      <h4>Pardavėjas</h4>
    </div>
    <div class="site-card__body">
      <h5>{{ $config->seller_name }}</h5>
      <dl>
        @if( $config->seller_code )
        <dt>{{ __("Kodas")}}:</dt>
        <dd>{{ $config->seller_code }}</dd>
        @endif
        @if( $config->seller_phone )
        <dt>{{ __("Telefonas")}}:</dt>
        <dd>{{ $config->seller_phone }}</dd>
        @endif
        @if( $config->seller_email )
        <dt>{{ __("El.paštas")}}:</dt>
        <dd>{{ $config->seller_email }}</dd>
        @endif
        @if( $config->seller_addres )
        <dt>{{ __("Adresas")}}:</dt>
        <dd>{{ $config->seller_address }}</dd>
        @endif
        @if( $config->seller_country )
        <dt>{{ __("Šalis")}}:</dt>
        <dd>{{ $config->seller_country }}</dd>
        @endif
        @if( $config->seller_vat )
        <dt>{{ __("PVM kodas")}}:</dt>
        <dd>{{ $config->seller_vat }}</dd>
        @endif
        @if( $config->seller_bank )
        <dt>{{ __("Sąskaitos numeris")}}:</dt>
        <dd>{{ $config->seller_bank }}</dd>
        @endif

      </dl>
    </div>
  </div>
</div>