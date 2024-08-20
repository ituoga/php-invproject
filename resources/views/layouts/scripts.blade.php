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
    });
</script>
