$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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

    $('.selectpickeraa').selectpicker();
    //Create Load start ---------------------

    window.createStopIndex = 0;

    window.addStop = function () {
        window.createStopIndex++;
        $('.selectpickeraa').selectpicker('destroy');
        var newForm = $( "#consigneeItem" ).clone();

        newForm.find('.consignee_company').attr('name', 'consignee['+ window.createStopIndex+'][company]');
        newForm.find('.consignee_phone').attr('name', 'consignee['+ window.createStopIndex+'][phone]');
        newForm.find('.consignee_phone_extension').attr('name', 'consignee['+ window.createStopIndex+'][phone_extension]');
        newForm.find('.consignee_contact_name').attr('name', 'consignee['+ window.createStopIndex+'][contact_name]');
        newForm.find('.consignee_fax').attr('name', 'consignee['+ window.createStopIndex+'][fax]');
        newForm.find('.consignee_address1').attr('name', 'consignee['+ window.createStopIndex+'][address1]');
        newForm.find('.consignee_delivered_number').attr('name', 'consignee['+ window.createStopIndex+'][delivered_number]');
        newForm.find('.consignee_address2').attr('name', 'consignee['+ window.createStopIndex+'][address2]');
        newForm.find('.consignee_delivery_date').attr('name', 'consignee['+ window.createStopIndex+'][delivery_date]');
        newForm.find('.consignee_city').attr('name', 'consignee['+ window.createStopIndex+'][city]');
        newForm.find('.consignee_delivery_time').attr('name', 'consignee['+ window.createStopIndex+'][delivery_time]');
        newForm.find('.consignee_delivery_state').attr('name', 'consignee['+ window.createStopIndex+'][delivery_state]');
        newForm.find('.consignee_BOL_payment_term').attr('name', 'consignee['+ window.createStopIndex+'][BOL_payment_term]');
        newForm.find('.consignee_delivery_location_zip_code').attr('name', 'consignee['+ window.createStopIndex+'][delivery_location_zip_code]');
        newForm.find('.consignee_delivery_location_bol_number').attr('name', 'consignee['+ window.createStopIndex+'][delivery_location_bol_number]');
        newForm.find('.consignee_freight_class').attr('name', 'consignee['+ window.createStopIndex+'][freight_class]');
        newForm.find('.consignee_national_motor_freight_class').attr('name', 'consignee['+ window.createStopIndex+'][national_motor_freight_class]');
        newForm.find('.consignee_bol_product').attr('name', 'consignee['+ window.createStopIndex+'][bol_product]');
        newForm.find('.consignee_delivery_location_quantity').attr('name', 'consignee['+ window.createStopIndex+'][delivery_location_quantity]');
        newForm.find('.consignee_item_type').attr('name', 'consignee['+ window.createStopIndex+'][item_type]');
        newForm.find('.consignee_length').attr('name', 'consignee['+ window.createStopIndex+'][length]');
        newForm.find('.consignee_width').attr('name', 'consignee['+ window.createStopIndex+'][width]');
        newForm.find('.consignee_height').attr('name', 'consignee['+ window.createStopIndex+'][height]');
        newForm.find('.consignee_delivery_location_weight').attr('name', 'consignee['+ window.createStopIndex+'][delivery_location_weight]');
        newForm.find('.consignee_haz_mat').attr('name', 'consignee['+ window.createStopIndex+'][haz_mat]');
        newForm.find('.consignee_bol_notes').attr('name', 'consignee['+ window.createStopIndex+'][bol_notes]');
        newForm.find('.consignee_delivery_location_notes').attr('name', 'consignee['+ window.createStopIndex+'][delivery_location_notes]');

        newForm.find('.consignee_company').val('');
        newForm.find('.consignee_phone').val('');
        newForm.find('.consignee_phone_extension').val('');
        newForm.find('.consignee_contact_name').val('');
        newForm.find('.consignee_fax').val('');
        newForm.find('.consignee_address1').val('');
        newForm.find('.consignee_delivered_number').val('');
        newForm.find('.consignee_address2').val('');
        newForm.find('.consignee_delivery_date').val('');
        newForm.find('.consignee_city').val('');
        newForm.find('.consignee_delivery_time').val('');
        newForm.find('.consignee_delivery_state').val('');
        newForm.find('.consignee_BOL_payment_term').val('');
        newForm.find('.consignee_delivery_location_zip_code').val('');
        newForm.find('.consignee_delivery_location_bol_number').val('');
        newForm.find('.consignee_freight_class').val('');
        newForm.find('.consignee_national_motor_freight_class').val('');
        newForm.find('.consignee_bol_product').val('');
        newForm.find('.consignee_delivery_location_quantity').val('');
        newForm.find('.consignee_item_type').val('');
        newForm.find('.consignee_length').val('');
        newForm.find('.consignee_width').val('');
        newForm.find('.consignee_height').val('');
        newForm.find('.consignee_delivery_location_weight').val('');
        newForm.find('.consignee_haz_mat').val('');
        newForm.find('.consignee_bol_notes').val('');
        newForm.find('.consignee_delivery_location_notes').val('');

        newForm.appendTo( "#consigneeContainer" );
        $('.selectpickeraa').selectpicker('refresh');
    };

    $( "#loadCreateForm" ).submit(function( event ) {
        event.preventDefault();
        var $inputs = $('#loadCreateForm :input');

        var values = {};
        $inputs.each(function () {
            values[this.name] = $(this).val();
        });
        $.ajax({
            type: "POST",
            url: "http://broker.me/loads",
            data: values,
            success: function (result) {
                if(result.success) {
                    location.href = location.origin + '/loads';
                }
                if (result.error) {
                    $( ".alert-danger" ).remove();
                    for (const [key, value] of Object.entries(result.error)) {
                        console.log(`${key}: ${value}`);
                    }
                    var list = '';
                    for (const [key, value] of Object.entries(result.error)) {
                        list += `<li>${value}</li>`
                    }
                    var html =
                        '<div class="alert alert-danger"><ul>' + list + '</ul></div>';
                    $("#ajaxErrorContainer").append(html);
                    window.scrollTo(0, 0);
                }
            }
        });
    });
    //Create Load end ---------------------

    //Edit Load start ---------------------
    window.addEditStop = function () {
        window.editStopIndex++;

        $('.selectpickeraa').selectpicker('destroy');
        var newForm = $( "#consigneeItem" ).clone();

        newForm.find('.is_new').attr('name', 'consignee['+ window.editStopIndex+'][is_new]');
        newForm.find('.is_new').val('true');

        newForm.find('.consignee_company').attr('name', 'consignee['+ window.editStopIndex+'][company]');
        newForm.find('.consignee_phone').attr('name', 'consignee['+ window.editStopIndex+'][phone]');
        newForm.find('.consignee_phone_extension').attr('name', 'consignee['+ window.editStopIndex+'][phone_extension]');
        newForm.find('.consignee_contact_name').attr('name', 'consignee['+ window.editStopIndex+'][contact_name]');
        newForm.find('.consignee_fax').attr('name', 'consignee['+ window.editStopIndex+'][fax]');
        newForm.find('.consignee_address1').attr('name', 'consignee['+ window.editStopIndex+'][address1]');
        newForm.find('.consignee_delivered_number').attr('name', 'consignee['+ window.editStopIndex+'][delivered_number]');
        newForm.find('.consignee_address2').attr('name', 'consignee['+ window.editStopIndex+'][address2]');
        newForm.find('.consignee_delivery_date').attr('name', 'consignee['+ window.editStopIndex+'][delivery_date]');
        newForm.find('.consignee_city').attr('name', 'consignee['+ window.editStopIndex+'][city]');
        newForm.find('.consignee_delivery_time').attr('name', 'consignee['+ window.editStopIndex+'][delivery_time]');
        newForm.find('.consignee_delivery_state').attr('name', 'consignee['+ window.editStopIndex+'][delivery_state]');
        newForm.find('.consignee_BOL_payment_term').attr('name', 'consignee['+ window.editStopIndex+'][BOL_payment_term]');
        newForm.find('.consignee_delivery_location_zip_code').attr('name', 'consignee['+ window.editStopIndex+'][delivery_location_zip_code]');
        newForm.find('.consignee_delivery_location_bol_number').attr('name', 'consignee['+ window.editStopIndex+'][delivery_location_bol_number]');
        newForm.find('.consignee_freight_class').attr('name', 'consignee['+ window.editStopIndex+'][freight_class]');
        newForm.find('.consignee_national_motor_freight_class').attr('name', 'consignee['+ window.editStopIndex+'][national_motor_freight_class]');
        newForm.find('.consignee_bol_product').attr('name', 'consignee['+ window.editStopIndex+'][bol_product]');
        newForm.find('.consignee_delivery_location_quantity').attr('name', 'consignee['+ window.editStopIndex+'][delivery_location_quantity]');
        newForm.find('.consignee_item_type').attr('name', 'consignee['+ window.editStopIndex+'][item_type]');
        newForm.find('.consignee_length').attr('name', 'consignee['+ window.editStopIndex+'][length]');
        newForm.find('.consignee_width').attr('name', 'consignee['+ window.editStopIndex+'][width]');
        newForm.find('.consignee_height').attr('name', 'consignee['+ window.editStopIndex+'][height]');
        newForm.find('.consignee_delivery_location_weight').attr('name', 'consignee['+ window.editStopIndex+'][delivery_location_weight]');
        newForm.find('.consignee_haz_mat').attr('name', 'consignee['+ window.editStopIndex+'][haz_mat]');
        newForm.find('.consignee_bol_notes').attr('name', 'consignee['+ window.editStopIndex+'][bol_notes]');
        newForm.find('.consignee_delivery_location_notes').attr('name', 'consignee['+ window.editStopIndex+'][delivery_location_notes]');

        newForm.find('.consignee_company').val('');
        newForm.find('.consignee_phone').val('');
        newForm.find('.consignee_phone_extension').val('');
        newForm.find('.consignee_contact_name').val('');
        newForm.find('.consignee_fax').val('');
        newForm.find('.consignee_address1').val('');
        newForm.find('.consignee_delivered_number').val('');
        newForm.find('.consignee_address2').val('');
        newForm.find('.consignee_delivery_date').val('');
        newForm.find('.consignee_city').val('');
        newForm.find('.consignee_delivery_time').val('');
        newForm.find('.consignee_delivery_state').val('');
        newForm.find('.consignee_BOL_payment_term').val('');
        newForm.find('.consignee_delivery_location_zip_code').val('');
        newForm.find('.consignee_delivery_location_bol_number').val('');
        newForm.find('.consignee_freight_class').val('');
        newForm.find('.consignee_national_motor_freight_class').val('');
        newForm.find('.consignee_bol_product').val('');
        newForm.find('.consignee_delivery_location_quantity').val('');
        newForm.find('.consignee_item_type').val('');
        newForm.find('.consignee_length').val('');
        newForm.find('.consignee_width').val('');
        newForm.find('.consignee_height').val('');
        newForm.find('.consignee_delivery_location_weight').val('');
        newForm.find('.consignee_haz_mat').val('');
        newForm.find('.consignee_bol_notes').val('');
        newForm.find('.consignee_delivery_location_notes').val('');

        newForm.appendTo( "#consigneeContainer" );
        $('.selectpickeraa').selectpicker('refresh');
    };


    $( "#loadEditForm" ).submit(function( event ) {
        event.preventDefault();
        var inputs = $('#loadEditForm :input');
        var loadId = $("#load_id").val();
        var values = {};
        inputs.each(function () {
            values[this.name] = $(this).val();
        });
        $.ajax({
            type: "PATCH",
            url: `http://broker.me/loads/${loadId}`,
            data: values,
            success: function (result) {
                if(result.success) {
                    location.href = location.origin + '/loads';
                }
                if (result.error) {
                    $( ".alert-danger" ).remove();
                    for (const [key, value] of Object.entries(result.error)) {
                        console.log(`${key}: ${value}`);
                    }
                    var list = '';
                    for (const [key, value] of Object.entries(result.error)) {
                        list += `<li>${value}</li>`
                    }
                    var html =
                        '<div class="alert alert-danger"><ul>' + list + '</ul></div>';
                    $("#ajaxErrorContainer").append(html);
                    window.scrollTo(0, 0);
                }
            }
        });
    });

    //Edit Load end -----------------------

    //review change
    $('.load-history-review').click(function() {
        var id = $(this).data('id');
        var reviewer_id = $(this).data('reviewer-id');
        $.ajax({
            type: "PATCH",
            url: `http://broker.me/load-history/${id}`,
            data: {
                reviewer_id: reviewer_id,
                confirmed: 1
            },
            success: function (result) {
                if(result.success) {
                    $(`#history-${result.id}`).html('Confirmed');
                    $(`#history-${result.id}`).addClass('btn-success');

                    if (result.changedLoadsExist === false) {
                        $('.header-notifications-item').removeClass('has-notification');
                    }
                }
            }
        });
    });

    //find customers
    $( "#customer_search" ).submit(function( event ) {
        event.preventDefault();
        var $inputs = $('#customer_search :input');

        var values = {};
        $inputs.each(function () {
            values[this.name] = $(this).val();
        });
        $.ajax({
            type: "GET",
            url: "http://broker.me/customers-search",
            data: values,
            success: function (result) {
                if(result.data && result.data.length) {
                    var html = '';
                    result.data.forEach(item => {
                        var itemHtml = `<li><a href="customers/${item.id}">${item.company}</a></li>`;
                        html += itemHtml;
                    });
                    $('#myUL').append(html);
                }
            }
        });
    });

    $(".phoneMask").mask('(000) 000-00000000000000');
});
