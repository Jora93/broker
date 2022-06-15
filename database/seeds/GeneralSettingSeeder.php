<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            "name" => "Eternal Logistics Inc",
            "time_zone" => "UTC",
            "first_name" => "Sophie",
            "last_name" => "Wood",
            "address1" => "Howard Hughes Pkwy Ste 200",
            "address2" => null,
            "city" => "Las Vegas",
            "toll_free_phone" => null,
            "state" => "NV",
            "fax" => null,
            "zip_code" => "89169",
            "email" => "invoice@eternallogisticsinc.com",
            "website" => null,
            "default_currency" => "0",
            "fed_id" => null,
            "scac" => null,
            "confirmation_note" => '<p>EMAIL BACK THIS confirmation signed &amp; completed to:</p><p>service@eternallogisticsinc.com</p><p>Any problem in regards with the contract conduct, or in case problems with its exercise arise Eternal Logistics INC needs to be notified promptly.<br>Terms and Conditions Brief:</p><p>Please note that signing the following agreement, Carrier further verifies/ consents, that:</p><ul><li>That there are no exclusions in their insurance policy that would apply to the freight being transported,</li><li>COMPLIES with all applicable federal, state, and local laws and regulations, as well as all ELD compliance regulations, concerning the transactions contemplated by this agreement,</li><li>Rate is for exclusive truck only unless instructed otherwise in a written statement,</li><li>Trailers must be 10 years or newer,</li><li>that the transport refrigeration unit (TRU or reefer) equipment is furnished for loading,</li><li>The carrier is solely responsible for the implications arising as result of signing a BOL, with a damaged or inconsistent with the BOL cargo, if not instructed otherwise by the BROKER.</li><li>Eternal Logistics INC will not be held RESPONSIBLE FOR OVERWEIGHT/GROSS TRAILERS related implications after the driver leaves the venue of shipping.</li><li>it is Carrier’s responsibility to confirm or make any necessary appointments 24 hours in advance and confirm delivery address on bills. if different, call booking office immediately for approval.</li><li>do not share this rate confirmation with our customer.</li><li>Carrier is responsible for confirming or making necessary appointments 24 hours in advance and confirm delivery address on BOL, if third party has notified or instructed a change in the schedule or address (other than instructed by the BROKER), Eternal Logistics INC needs to be notified promptly by<br>the Carrier.<br>Changes to charges and Paperwork</li><li>The final rate includes All the fuel, accessorial, driver assist charges/ surcharges.</li><li>Charges and rate changes are subject to be stipulated in a new RATE CONFIRMATION SHEET.</li><li>All the accessorial charges, including the lumper fee needs to be advised with BROKER, before paying. All the receipts need to be compiled and saved for the reimbursement eligibility.</li><li>Eternal Logistics INC does not advance funds for any reason.</li><li>This confirmation must be signed by carrier and received back by our billing office for payment.<br>Accessorial payments:</li><li>Layover - $150</li><li>Detention - $ 25 per hour, in case of preset appointment, after 3 hours wait, where those start running upon Carrier’s notification to BROKER,</li><li>TONU - $150<br>Paperwork instructions:</li><li>Load number needs to be noted on your invoice with a CLEAR SCAN of proof of delivery (POD), otherwise invoices will not be eligible for payment, or delays may occur in the payment process, where the burden of implications is at Carrier’s fault,</li><li>This confirmation must be signed by carrier and received back by our booking office for payment.</li><li>PODS should be sent to: <a href="mailto:pod@eternallogisticsinc.com">pod@eternallogisticsinc.com</a></li><li>INVOICES, including POD, LUMPER RECEIPTS should be sent to: <a href="mailto:invoice@eternallogisticsinc.com">invoice@eternallogisticsinc.com</a></li><li>Billing and payment information is available at: <a href="mailto:invoice@eternallogisticsinc.com">invoice@eternallogisticsinc.com</a></li><li>Broker agreement &amp; rate confirmation must be completed, signed, and on file for the Carrier to BE ELIGIBLE FOR PAYMENT ON THIS LOAD<br>*The POD SCAN is CLEAR, if the picture is not blurred, is not cropped, includes all the info and fields stated on the ORIGINAL BOL.<br>$200 will be deducted from rate if clear scan of pod is not received within 48 hours of scheduled delivery, or the BOL(s), POD(s) are not signed by relevant third parties (including but not limited to shipper, receiver). By doing business with Eternal Logistics INC the Carrier gives its consents to broker agreement, carrier packet, terms and conditions document, ANNEXES/ ADDENDUMS (if applicable, they are attached to the Rate sheet).<br><br><br><br>&nbsp;</li></ul>',
            "rate_quote_terms_conditions" => '<p>This letter serves as notice of an initial quote only. Prices contained herein are subject to change because of weight, different destination, change in service standard or equipment required. This quote is intended for the individual/company named above and cannot be assigned to another party, individual or company.&nbsp;</p>',
            "bill_of_lading_terms_conditions" => '<p>Received, subject to the classifications and lawfully filled tariffs in effect on the date of issue of this Bill of Lading</p><p><br>&nbsp;</p><p>The property described below is in apparent good order, except as noted (content and condition of packages unknown), marked, consigned, and indicated below which said carrier (the word CARRIER being understood throughout this contract as meaning any person or corporation in possession of the property under the contract) agrees to carry to its usual place of delivery at said destination, if on its route, otherwise to deliver to another carrier on the route to said destination. It is mutually agreed as to each carrier of all or any of said property over all are any portion of said route to destination, and as to each party at any time interested in all of any said property, that every service to be performed here under shall be subject to all the terms and conditions of the Uniform Domestic Straight Bill of Lading set forth (1) in Uniform Freight Classifications in effect on the date hereof. If this is a rail or rail water shipment, or (2) in the applicable motor carrier classification or tariff if this is a motor carrier shipment. Shipper hereby certifies that he is familiar with all the terms and conditions of the said bill of lading, set forth in the classification or tariff which governs the transportation of this shipment. The said terms and conditions are hereby agreed to by the shipper and accepted for himself and his assigns.</p><p>"This is to certify that the above named material are properly classified, described, packaged, marked and labeled, and are in proper condition to the applicable regulations of Department of Transportation."</p>',
            "invoice_terms_conditions" => ""
        ]);
    }
}
