<script>

    $(document).ready(function () {
        $('.contrahent_name, .contrahent_code, .contrahent_vat').autocomplete({
            source: '/contrahents/search',
            minLength: 2,
            select: function (event, ui) {
                setTimeout(function () {
                    $("input[name=contrahent_name]").val(ui.item.label);
                    $("input[name=contrahent_code]").val(ui.item.code);
                    $("input[name=contrahent_vat]").val(ui.item.vat);
                    $("input[name=contrahent_email]").val(ui.item.email);
                    $("input[name=contrahent_phone]").val(ui.item.phone);
                    $("input[name=contrahent_address]").val(ui.item.address);
                    $("input[name=contrahent_country]").val(ui.item.country);
                }, 10);
            }
        });

        window.bindproductSearch = function() {


        //     $('.product-searchable').autocomplete({
        //         source: '/products/search',
        //         minLength: 2,
        //         select: function (event, ui) {
        //             const klass = "." + $(this).attr("class").split(" ")[2];
        //             setTimeout(function () {
        //                 $(klass).filter(".product-price").val(ui.item.price);
        //                 $(klass).filter(".product-vat").val(ui.item.vat);
        //                 $(klass).filter(".product-unit").val(ui.item.unit)
        //
        //                 window.dispatchEvent(new CustomEvent('hehe'));
        //             }, 100);
        //         }
        //     });
        }
        // window.bindproductSearch();

        // $('#id-761741, #id-458066').autocomplete({
        //     source: '/contrahents/search',
        //     minLength: 2,
        //     select: function (event, ui) {
        //         console.log(ui.item);
        //         $("input[name=clientid]").val(ui.item.id);
        //         setTimeout(function () {
        //             $("input[name=client_name]").val(ui.item.name);
        //             $("input[name=client_phone]").val(ui.item.phone);
        //         }, 20);
        //     }
        // });

        // $('.atime').autocomplete({
        //     source: '/completions/timetodecimal',
        //     minLength: 2,
        // });
    });

/*
    window.addEventListener("visibilitychange", function () {
        console.log("Visibility changed");
        if (document.visibilityState === "visible") {
            console.log("APP resumed");
            window.location.reload();
        }
    });
    */
</script>
