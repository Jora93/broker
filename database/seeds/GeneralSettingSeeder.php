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
            "name" => "American Success Trans",
            "time_zone" => "UTC",
            "first_name" => "Eric",
            "last_name" => "Greg",
            "address1" => "1810 e sahara ave ste 701",
            "address2" => null,
            "city" => "Las Vegas",
            "toll_free_phone" => null,
            "state" => "NV",
            "fax" => null,
            "zip_code" => "89104",
            "email" => "americansuccessinvoice@gmail.com",
            "website" => null,
            "default_currency" => "0",
            "fed_id" => null,
            "scac" => null,
            "confirmation_note" => '<p>CARRIER TERMS AND CONDITIONS CONTINUED:</p><p>/////EMAIL BACK THIS CONFIRMATION SIGNED &amp; COMPLETED TO EMAIL:&nbsp; <a href="mailto:americansuccesstrans@gmail.com">americansuccesstrans@gmail.com</a></p><p>//// SHOULD A PROBLEM OR CHANGE ARISE AT ANY TIME, NOTIFY AMERICAN SUCCESS TRANS</p><p>IMMEDIATELY</p><p>24/7. RATE IS FOR EXCLUSIVE TRUCK ONLY UNLESS STATED IN WRITING.</p><p>ALL FREIGHT TRAILERS MUST BE 10 YEARS OR NEWER.</p><p>DO NOT SIGN FOR DAMAGED GOODS.</p><p>AMERICAN SUCCESS TRANS IS NOT RESPONSIBLE FOR OVERWEIGHT/GROSS TRAILERS AFTER DRIVER HAS LEFT THE</p><p>SHIPPER.</p><p>IT IS CARRIER’S RESPONSIBILITY TO CONFIRM OR MAKE ANY NECESSARY APPOINTMENTS 24 HOURS IN ADVANCE AND CONFIRM DELIVERY ADDRESS ON BILLS. IF DIFFERENT, CALL BOOKING OFFICE IMMEDIATELY FOR APPROVAL.</p><p>ANY APPROVED CHANGES OR CHARGES MUST BE NOTED ON A NEW RATE CONFIRMATION PROVIDED BY AMERICAN SUCCESS TRANS</p><p>AMERICAN SUCCESS TRANS&nbsp; THROUGH A NEW RATE CONFIRMATION MUST PREAPROVE ALL LUMPERS AND/OR ASSESSORIA FEES AND AN ORIGINAL RECEIPT SENT IN WITH CARRIER’S INVOICE IN ORDER TO BE REIMBURSED.</p><p>DRIVER ASSIST AND FUEL SURCHARGE IS INCLUDED IN RATE.</p><p>CARRIER VERIFIES THAT THERE ARE NO EXCLUSIONS IN THEIR INSURANCE POLICY THAT WOULD APPLY TO THE FREIGHT BEING TRANSPORTED.</p><p>AMERICAN SUCCESS TRANS&nbsp; &nbsp;DOES NOT ADVANCE FUNDS FOR ANY REASON.</p><p>CARRIER SHALL COMPLY WITH ALL APPLICABLE FEDERAL, STATE, AND LOCAL LAWS AND REGULATIONS, AS WELL AS ALL ELD COMPLIANCE REGULATIONS, CONCERNING THE TRANSACTIONS CONTEMPLATED BY THIS AGREEMENT.</p><p>THIS CONFIRMATION MUST BE SIGNED BY CARRIER AND RECEIVED BACK BY OUR BOOKING OFFICE FOR PAYMENT.</p><p>CARRIER CERTIFIES THAT THE TRANSPORT REFRIGERATION UNIT (TRU OR REEFER) EQUIPMENT FURNISHED FOR LOADING</p><p>THIS SHIPMENT IS IN COMPLIANCE WITH APPLICABLE REGULATIONS. FURTHERMORE, YOUR DRIVER’S SIGNATURE ON THE BILL OF LADING IS AN</p><p>ACKNOWLEDGEMENT OF THE ABOVE STATEMENT AND CERTIFICATION THAT THE EQUIPMENT SUPPLIED BY SAID</p><p>COMPANY FOR LOADING IS IN COMPLIANCE.</p><p>By doing business with AMERICAN SUCCESS TRANS you fully agree with American Success Trans&nbsp;broker agreement, carrier packet, terms and conditions document.</p><p>Layover - $150,</p><p>Detention - $ 25 per hour after 3 hour waiting if appointment</p><p>TONU - $150</p><p>Please include our load number on your invoice with a&nbsp;<strong>CLEAR SCAN</strong>&nbsp;of&nbsp;proof of delivery&nbsp;<strong>(POD)</strong>.</p><p>Invoices will not be paid without a&nbsp;<strong>CLEAR SCAN&nbsp;</strong>of&nbsp;<strong>P.O.D</strong>.!</p><p>SEND ALL INVOICES and PODS TO:&nbsp;<a href="mailto:podamericansuccess@gmail.com">podamericansuccesstrans@gmail.com</a></p><p>Broker agreement &amp; rate confirmation must be completed, signed, and on file for payment on this load.<br>$200 WILL BE DEDUCTED FROM RATE IF&nbsp;<strong>CLEAR SCAN OF POD&nbsp;</strong>IS NOT RECEIVED&nbsp;<strong>WITHIN 48 HOURS</strong>&nbsp;OF SCHEDULED DELIVERY, OR IF THIS RATE CONFIRMATION IS USED AS A POD!</p>',
            "rate_quote_terms_conditions" => '<p>This letter serves as notice of an initial quote only. Prices contained herein are subject to change because of weight, different destination, change in service standard or equipment required. This quote is intended for the individual/company named above and cannot be assigned to another party, individual or company.&nbsp;</p>',
            "bill_of_lading_terms_conditions" => '<p>Received, subject to the classifications and lawfully filled tariffs in effect on the date of issue of this Bill of Lading</p><p><br>&nbsp;</p><p>The property described below is in apparent good order, except as noted (content and condition of packages unknown), marked, consigned, and indicated below which said carrier (the word CARRIER being understood throughout this contract as meaning any person or corporation in possession of the property under the contract) agrees to carry to its usual place of delivery at said destination, if on its route, otherwise to deliver to another carrier on the route to said destination. It is mutually agreed as to each carrier of all or any of said property over all are any portion of said route to destination, and as to each party at any time interested in all of any said property, that every service to be performed here under shall be subject to all the terms and conditions of the Uniform Domestic Straight Bill of Lading set forth (1) in Uniform Freight Classifications in effect on the date hereof. If this is a rail or rail water shipment, or (2) in the applicable motor carrier classification or tariff if this is a motor carrier shipment. Shipper hereby certifies that he is familiar with all the terms and conditions of the said bill of lading, set forth in the classification or tariff which governs the transportation of this shipment. The said terms and conditions are hereby agreed to by the shipper and accepted for himself and his assigns.</p><p>"This is to certify that the above named material are properly classified, described, packaged, marked and labeled, and are in proper condition to the applicable regulations of Department of Transportation."</p>',
            "invoice_terms_conditions" => ""



        ]);
    }
}
