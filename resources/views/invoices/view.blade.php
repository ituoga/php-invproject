<!doctype html>
<html>
<head>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
                @include("invoices.partials.viewheading", ["type" => $item->type])

                <h3 class="pull-right">{{__("Serija")}} {{ $item->invoice_series }} {{__("Nr.")}} {{ $item->invoice_number }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>{{__("Pirkėjas")}}</strong><br>
                        {{ $item->contrahent_name }}<br>
                        {{ $item->contrahent_code }}<br>
    					@if($item->contrahent_vat) {{ $item->contrahent_vat }}<br> @endif
                        @if($item->contrahent_address) {{ $item->contrahent_address }}<br> @endif
                        @if($item->contrahent_phone) {{ $item->contrahent_phone }}<br> @endif
                        @if($item->contrahent_country) {{ $item->contrahent_country }}<br> @endif
                        @if($item->contrahent_email) {{ $item->contrahent_email }} @endif<br>
</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>{{ __("Pardavėjas") }}</strong><br>
                        {{ $item->seller_name ?? $config->seller_name}}<br>
                        {{ $item->seller_code ?? $config->seller_code  }}<br>
                        @if($item->seller_vat ?? $config->seller_vat) {{ $item->seller_vat  ?? $config->seller_vat }}<br> @endif
                        @if($item->seller_address  ?? $config->seller_address) {{ $item->seller_address ?? $config->seller_address }}<br> @endif
                        @if($item->seller_phone ?? $config->seller_phone) {{ $item->seller_phone ?? $config->seller_phone }}<br> @endif
                        @if($item->seller_country ?? $config->seller_country) {{ $item->seller_country ?? $config->seller_country }}<br> @endif
                        @if($item->seller_email ?? $config->seller_email) {{ $item->seller_email ?? $config->seller_email }} @endif<br>
</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>{{ __("Dokumento data") }}</strong><br>
                        {{ $item->document_date }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>{{ __("Prekės / paslaugos") }}</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>{{__("Pavadinimas")}}</strong></td>
        							<td class="text-center"><strong>{{ __("Kaina") }}</strong></td>
        							<td class="text-center"><strong>{{ __("Kiekis") }}</strong></td>
        							<td class="text-center"><strong>{{ __("PVM") }}</strong></td>
        							<td class="text-right"><strong>{{ __("Viso") }}</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @foreach($item->lines as $line)
    							<tr>
    								<td>{{ $line->product_name }}</td>
    								<td class="text-center">{{ $line->product_price }}</td>
    								<td class="text-center">{{ $line->product_qty }}</td>
                                    <td class="text-center">{{ ($line->product_price *$line->vat - $line->product_price) *$line->product_qty }}</td>
    								<td class="text-right">{{ $line->product_price * $line->vat * $line->product_qty  }}</td>
    							</tr>
                                @endforeach

    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>{{ __("Viso") }}</strong></td>
    								<td class="thick-line text-right">{{ $item->invoice_total  }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>{{__("PVM")}}</strong></td>
    								<td class="no-line text-right">{{ $item->invoice_vat }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>{{ __("Viso su PVM") }}</strong></td>
    								<td class="no-line text-right">{{ $item->invoice_total_with_vat }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>


    		</div>

            <div class="row">
                <div class="col-xs-6">
                    <strong>{{ __("Sąskaitą išrašė") }}</strong><br>
                    {{ $item->invoice_author}}<br><br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        @if($item->invoice_contrahent)
                        <strong>{{ __("Sąskaitą gavo") }}</strong><br>
                        {{ $item->invoice_contrahent }}<br><br>
                        @endif
                    </address>
                </div>
            </div>
            <div class="row">
                {{ $item->invoice_comment }}
            </div>
    	</div>
    </div>
</div>
</body>
</html>
