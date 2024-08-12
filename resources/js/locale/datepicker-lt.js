/* Lithuanian (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* @author Arturas Paleicikas <arturas@avalon.lt> */
( function( factory ) {
	"use strict";

	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
} )( function( datepicker ) {
"use strict";

datepicker.regional.lt = {
	closeText: "Uždaryti",
	prevText: "Ankstesnis mėnuo",
	nextText: "Sekantis mėnuo",
	currentText: "Šiandien",
	monthNames: [ "sausis", "vasaris", "kovas", "balandis", "gegužė", "birželis",
	"liepa", "rugpjūtis", "rugsėjis", "spalis", "lapkritis", "gruodis" ],
	monthNamesShort: [ "Sau", "Vas", "Kov", "Bal", "Geg", "Bir",
	"Lie", "Rugp", "Rugs", "Spa", "Lap", "Gru" ],
	dayNames: [
		"sekmadienis",
		"pirmadienis",
		"antradienis",
		"trečiadienis",
		"ketvirtadienis",
		"penktadienis",
		"šeštadienis"
	],
	dayNamesShort: [ "sek", "pir", "ant", "tre", "ket", "pen", "šeš" ],
	dayNamesMin: [ "Sk", "Pr", "An", "Tr", "Kt", "Pn", "Št" ],
	weekHeader: "SAV",
	dateFormat: "yy-mm-dd",
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: true,
	yearSuffix: " m." };
datepicker.setDefaults( datepicker.regional.lt );

return datepicker.regional.lt;

} );
