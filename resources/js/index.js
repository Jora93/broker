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
        if (confirm("Do you want to add stop ?")) {
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
        }
    };

    $( "#loadCreateForm" ).submit(function( event ) {
        event.preventDefault();
        var $inputs = $('#loadCreateForm :input');

        var values = {};
        $inputs.each(function () {
            if (this.name == 'shipper_pickup_time_appt' || this.name == 'shipper_pickup_time_fcfs') {
                values[this.name] = this.checked;
            } else {
                values[this.name] = $(this).val();
            }
        });
        $.ajax({
            type: "POST",
            url: `${window.APP_URL}/${window.currentCompanyId}/loads`,
            data: values,
            success: function (result) {
                if(result.success) {
                    location.href = `${location.origin}/${window.currentCompanyId}/loads/${result.loadId}`;
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

    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy'
    });
    $('.insuranceExpirationDate').on('change', function(e){
        var date1 = new Date();
        var date2 = new Date(e.target.value);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Math.round(Difference_In_Time / (1000 * 3600 * 24));
        if (Difference_In_Days <= 30) alert("Expiration Date must be less  than 30 days");
    });
    //Edit Load start ---------------------
    window.addEditStop = function () {
        if (confirm("Do you want to add stop ?")) {

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
        }
    };

    // $( ".removeConsegneeItem" ).on('click', function( event ) {
    //     $(this).closest('.consigneeItem').remove();
    // });
    $(document).on('click', '.removeConsegneeItem', function() {
        if (confirm("Do you want to delete consegnee ?")) {
            $(this).closest('.consigneeItem').remove();
        }
    }) ;
    // window.removeStop = function () {
    //     if (confirm("Do you want to delete stop ?")) {
    //         $('consigneeItem')
    //     }
    // };


    $( "#loadEditForm" ).submit(function( event ) {
        event.preventDefault();
        var inputs = $('#loadEditForm :input');
        var loadId = $("#load_id").val();
        var values = {};
        inputs.each(function () {
            if (this.name == 'shipper_pickup_time_appt' || this.name == 'shipper_pickup_time_fcfs') {
                values[this.name] = this.checked;
            } else {
                values[this.name] = $(this).val();
            }
        });
        $.ajax({
            type: "PATCH",
            url: `${window.APP_URL}/${window.currentCompanyId}/loads/${loadId}`,
            data: values,
            success: function (result) {
                if(result.success) {
                    location.href = `${location.origin}/${window.currentCompanyId}/loads`;
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
            url: `${window.APP_URL}/${window.currentCompanyId}/load-history/${id}`,
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
    $( "#carrier_search" ).submit(function( event ) {
        event.preventDefault();
        var $inputs = $('#carrier_search :input');

        var values = {};
        $inputs.each(function () {
            values[this.name] = $(this).val();
        });
        $.ajax({
            type: "GET",
            url: `${window.APP_URL}/${window.currentCompanyId}/global-search`,
            data: values,
            success: function (result) {
                if(result.data) {
                    $( "#myUL" ).empty();
                    var html = '';
                    var itemHtml = '';

                    if (result.data.carriers && result.data.carriers.length) {
                        result.data.carriers.forEach(carrier => {
                            itemHtml = `<li><a href="${window.APP_URL}/${window.currentCompanyId}/carriers/${carrier.id}">Carrier - ${carrier.company} (MC ${carrier.mc_number})</a></li>`;
                        });
                    }

                    if (result.data.loads && result.data.loads.length) {
                        result.data.loads.forEach(load => {
                            itemHtml += `<li><a href="${window.APP_URL}/${window.currentCompanyId}/loads/${load.id}">Load - ${load.load_number}</a></li>`;
                        });
                    }

                    if (result.data.invoices && result.data.invoices.length) {
                        result.data.invoices.forEach(invoice => {
                            itemHtml += `<li><a href="${window.APP_URL}/${window.currentCompanyId}/loads/${invoice.id}">Invoice - ${invoice.invoice_number}</a></li>`;
                        });
                    }

                    if (result.data.customers && result.data.customers.length) {
                        result.data.customers.forEach(customer => {
                            itemHtml += `<li><a href="${window.APP_URL}/${window.currentCompanyId}/loads/${customer.id}">Customer - ${customer.company}</a></li>`;
                        });
                    }


                    html += itemHtml;
                    $('#myUL').append(html);
                }
            }
        });
    });

    $(".phoneMask").mask('(000) 000-00000000000000');

    // =============confirmationNoteEditor============
    let confirmationNoteEditor;
    if (document.querySelector( '#confirmationNoteEditor' )) {
        ClassicEditor
            .create( document.querySelector( '#confirmationNoteEditor' ) )
            .then( newEditor => {
                console.log(newEditor);
                confirmationNoteEditor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );

    }
    $('#confirmationNoteEditorSubmit').click(function() {
        const editorData = {'confirmation_note' : confirmationNoteEditor.getData()};
        $.ajax({
            type: "PATCH",
            url: `${window.APP_URL}/${window.currentCompanyId}/general-settings-edit`,
            data: editorData,
            success: function (result) {
                if(result.success) {
                }
                if (result.error) {
                }
            }
        });
    });
    // =============confirmationNoteEditor============
    // =============confirmationNoteEditor============
    let rateQuoteTCEditor;
    if (document.querySelector( '#rateQuoteTCEditor' )) {
        ClassicEditor
            .create( document.querySelector( '#rateQuoteTCEditor' ) )
            .then( newEditor => {
                console.log(newEditor);
                rateQuoteTCEditor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );
    }

    $('#rateQuoteTCEditorSubmit').click(function() {
        const editorData = {'rate_quote_terms_conditions' : rateQuoteTCEditor.getData()};
        $.ajax({
            type: "PATCH",
            url: `${window.APP_URL}/${window.currentCompanyId}/general-settings-edit`,
            data: editorData,
            success: function (result) {
                if(result.success) {
                }
                if (result.error) {
                }
            }
        });
    });
    // =============confirmationNoteEditor============
    // =============confirmationNoteEditor============
    let BOLEditor;
    if (document.querySelector( '#BOLEditor' )) {
        ClassicEditor
            .create( document.querySelector( '#BOLEditor' ) )
            .then( newEditor => {
                console.log(newEditor);
                BOLEditor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );
    }

    $('#BOLEditorSubmit').click(function() {
        const editorData = {'bill_of_lading_terms_conditions' : BOLEditor.getData()};
        $.ajax({
            type: "PATCH",
            url: `${window.APP_URL}/${window.currentCompanyId}/general-settings-edit`,
            data: editorData,
            success: function (result) {
                if(result.success) {
                }
                if (result.error) {
                }
            }
        });
    });
    // =============confirmationNoteEditor============
    // =============confirmationNoteEditor============
    let invoiceEditor;
    if (document.querySelector( '#invoiceEditor' )) {
        ClassicEditor
            .create( document.querySelector( '#invoiceEditor' ) )
            .then( newEditor => {
                console.log(newEditor);
                invoiceEditor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );
    }

    $('#invoiceEditorSubmit').click(function() {
        const editorData = {'invoice_terms_conditions' : invoiceEditor.getData()};
        $.ajax({
            type: "PATCH",
            url: `${window.APP_URL}/${window.currentCompanyId}/general-settings-edit`,
            data: editorData,
            success: function (result) {
                if(result.success) {
                }
                if (result.error) {
                }
            }
        });
    });
    // =============confirmationNoteEditor============

    $( "#LoadCreateDocument" ).submit(function( event ) {
        event.preventDefault();
        $('#saveDocBtn').hide();
        $('#saveDocLoadBtn').show();
        var inputs = $('#LoadCreateDocument :input');
        var formData = new FormData(this);
        inputs.each(function () {
            formData[this.name] = $(this).val();
        });
        formData.append('file', $('#docummentFile')[0].files[0]);
        $.ajax({
            type: "POST",
            url: `${window.APP_URL}/${window.currentCompanyId}/documents`,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function (result) {
                if(result.success) {
                    $('#saveDocBtn').show();
                    $('#saveDocLoadBtn').hide();
                    $('#uploadDoumentModal').modal('toggle');
                    // location.href = `${location.origin}/${window.currentCompanyId}/loads`;
                    var data = result.success;
                    data.description = data.description || '';
                    var html =
                        `<tr class="document-row-${data.id}"">
                            <td>
                                <a href="${window.APP_URL}/document-download/${data.id}">
                                    <span aria-hidden="true" class="glyphicon glyphicon-download-alt"></span>
                                </a>
                                <span onclick="editDocument(${data})" aria-hidden="true" class="glyphicon glyphicon-edit document-edit"></span>
                            </td>
                            <th scope="row">
                                <a href="${data.file_path}" target="_blank">
                                    ${data.name}
                                </a>
                            </th>
                            <td>
                                ${data.type}
                            </td>
                            <td>
                                ${data.load_id}
                            </td>
                            <td>
                                 ${data.description}
                            </td>
                            <td>
                                ${data.created_at}
                            </td>
                            <td>
                                ${data.user_email}
                            </td>
                            <td>
                                <span data-id="2" aria-hidden="true" class="glyphicon glyphicon-trash document-delete"></span>
                            </td>
                        </tr>`;
                    $("#document-list-body").append(html);
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

    window.editDocument = function (document){
        $('#documentType').val(document.type).change();
        $('#documentDescription').val(document.description);
        $('#documentId').val(document.id);
        $('#documentCarrierId').val(document.carrier_id).change();
        $('#documentCustomerId').val(document.customer_id).change();
        $('#updateDoumentModal').modal('show');
    }

    $( "#LoadUpdateDocument" ).submit(function( event ) {
        event.preventDefault();
        $('#updateDocBtn').hide();
        $('#updateDocLoadBtn').show();
        var inputs = $('#LoadUpdateDocument :input');
        var formData = new FormData(this);
        inputs.each(function () {
            formData[this.name] = $(this).val();
        });
        formData.append('file', $('#docummentFile')[0].files[0]);
        $.ajax({
            type: "PATCH",
            url: `${window.APP_URL}/${window.currentCompanyId}/documents/${formData.id}`,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function (result) {
                if(result.success) {
                    $('#updateDocBtn').show();
                    $('#updateDocLoadBtn').hide();
                    $('#updateDoumentModal').modal('toggle');
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

    $('.document-delete').click(function() {
        let id = this.getAttribute('data-id')
        $.ajax({
            type: "DELETE",
            url: `${window.APP_URL}/${window.currentCompanyId}/documents/${id}`,
            cache:false,
            contentType: false,
            processData: false,
            success: function (result) {
                if(result.success) {
                    $(`.document-row-${id}`).remove();
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
    })

});
