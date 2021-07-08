
<div class="modal" id="updateDoumentModal">
    <div class="modal-dialog" style="left:0">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Doument</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="POST" id="LoadUpdateDocument"  enctype="multipart/form-data" action="">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="load_id" value="{{$load->id}}">
                    <input id="documentId" type="hidden" name="id" value="">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="logoInput">Document*</label>
                            <input id="docummentFile" type="file" name="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-laCbel">Doument Type</label><br>
                        <select id="documentType" name="type" class="selectpicker col-sm-12" required="true" data-live-search="true">
                            <option disabled selected value>Select Doc Type</option>
                            <option value="Carrier Confirmation">Carrier Confirmation</option>
                            <option value="Carrier Freight Bill">Carrier Freight Bill</option>
                            <option value="Claim">Claim</option>
                            <option value="Customer Agreement">Customer Agreement</option>
                            <option value="Customer Confirmation">Customer Confirmation</option>
                            <option value="Customer Invoice">Customer Invoice</option>
                            <option value="Customer Packet">Customer Packet</option>
                            <option value="Bill of Lading">Bill of Lading</option>
                            <option value="Customs Paperwork">Customs Paperwork</option>
                            <option value="Insurance">Insurance</option>
                            <option value="Load Sheet">Load Sheet</option>
                            <option value="MC Authority">MC Authority</option>
                            <option value="Notice of Assignment">Notice of Assignment</option>
                            <option value="Payment Documents">Payment Documents</option>
                            <option value="Picture">Picture</option>
                            <option value="Proof of Delivery">Proof of Delivery</option>
                            <option value="Purchase Order">Purchase Order</option>
                            <option value="Rate Quote">Rate Quote</option>
                            <option value="Receipt">Receipt</option>
                            <option value="References">References</option>
                            <option value="Release">Release</option>
                            <option value="W9 Form">W9 Form</option>
                            <option value="Weight Ticket">Weight Ticket</option>
                            <option value="Other">Other</option>
                            <option value="Unknown">Unknown</option></select>
                    </div>
                    <div class="form-group">
                        <label for="customer-load-value" class="col-form-label">Description</label>
                        <input id="documentDescription" type="text" name="description" class="form-control">
                    </div>
                    <hr>
                    <p>Attach this document to a load, customer, and/or arrier.</p>
                    <div class="form-group carrierMsg">
                        <label class="control-label">Carrier</label>
                        {{-- todo poxel ajax searchov--}}
                        <select id="documentCarrierId"  name="carrier_id" class="selectpicker form-control editMainField" tabindex="66" data-live-search="true">
                            <option value="">-- No Carrier Selected --</option>
                            @foreach($carriers as $carrier)
                                <option value="{{$carrier->id}}">{{$carrier->company}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group carrierMsg">
                        <label class="control-label">Carrier</label>
                        {{-- todo poxel ajax searchov--}}
                        <select id="documentCustomerId" name="customer_id" class="selectpicker form-control editMainField" tabindex="66" data-live-search="true">
                            <option value="">-- No Customer Selected --</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->company}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="saveDocBtn" type="submit" class="btn btn-primary">Save</button>
                    <button id="saveDocLoadBtn" style="display: none;" class="btn btn-primary" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
