$(document).ready(function () {
    $('.data-table').DataTable();

    window.copyCompanyInfoToPayeeInfo = function () {
        $("#carrier_payee_company").val($("#carrier_company").val()),
            $("#carrier_payee_phone").val($("#carrier_phone").val()),
            $("#carrier_payee_phone_extension").val($("#carrier_phone_extension").val()),
            $("#carrier_payee_cell_phone").val($("#carrier_cell_phone").val()),
            $("#carrier_payee_fax").val($("#carrier_fax").val()),
            $("#carrier_payee_address1").val($("#carrier_address1").val()),
            $("#carrier_payee_address2").val($("#carrier_address2").val()),
            $("#carrier_payee_city").val($("#carrier_city").val()),
            $("#carrier_payee_state").val($("#carrier_state").val()).trigger("chosen:updated"),
            $("#carrier_payee_zip_code").val($("#carrier_zip_code").val())
    };

    window.copyCompanyInfoToBillingInfo = function () {
        $("#customer_billing_company").val($("#customer_company").val()),
            $("#customer_billing_phone").val($("#customer_phone").val()),
            $("#customer_billing_phone_extension").val($("#customer_phone_extension").val()),
            $("#customer_billing_fax").val($("#customer_fax").val()),
            $("#customer_billing_address1").val($("#customer_address1").val()),
            $("#customer_billing_address2").val($("#customer_address2").val()),
            $("#customer_billing_city").val($("#customer_city").val()),
            $("#customer_billing_state").val($("#customer_state").val()).trigger("chosen:updated"),
            $("#customer_billing_zip_code").val($("#customer_zip_code").val())
    };
    window.copyCompanyInfoToDefaultLocation = function () {
        $("#defaultLocationCompany").val($("#customer_company").val()),
            $("#defaultLocationPhone").val($("#customer_phone").val()),
            $("#defaultLocationPhoneExtension").val($("#customer_phone_extension").val()),
            $("#defaultLocationFax").val($("#customer_fax").val()),
            $("#defaultLocationAddress1").val($("#customer_address1").val()),
            $("#defaultLocationAddress2").val($("#customer_address2").val()),
            $("#defaultLocationCity").val($("#customer_city").val()),
            $("#defaultLocationState").val($("#customer_state").val()).trigger("chosen:updated"),
            $("#defaultLocationZip").val($("#customer_zip_code").val()),
            $("#defaultLocationEmail").val($("#customer_email").val())
    };
    window.copyBillingInfoToDefaultLocation = function () {
        $("#defaultLocationCompany").val($("#customer_billing_company").val()),
            $("#defaultLocationPhone").val($("#customer_billing_phone").val()),
            $("#defaultLocationPhoneExtension").val($("#customer_billing_phone_extension").val()),
            $("#defaultLocationFax").val($("#customer_billing_fax").val()),
            $("#defaultLocationAddress1").val($("#customer_billing_address1").val()),
            $("#defaultLocationAddress2").val($("#customer_billing_address2").val()),
            $("#defaultLocationCity").val($("#customer_billing_city").val()),
            $("#defaultLocationState").val($("#customer_billing_state").val()).trigger("chosen:updated"),
            $("#defaultLocationZip").val($("#customer_billing_zip_code").val())
    };

    // $(".phoneMask").keyup(function() {
    //     $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d)+$/, "($1)$2-$3"));
    // });

    $(".phoneMask").mask('(000) 000-00000000000000');
});
