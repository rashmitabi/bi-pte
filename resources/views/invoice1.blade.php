<style>
	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
</style>
<div>
	<p>Company GSTIN - 03BMAPK3343M1Z8</p>
	<p>M: +91 70097 83468</p>
	<p>Company Name: A-One Solutions</p>
	<p>Company Address: 1648, Sector 60, Phase- 3B2, SAS Nagar, Punjab, 160059</p>
	<p>Invoice No. {{ $data ['payment_id'] }}</p>
	<p>Invoice Date: {{ $data['created'] }}</p>
	<p>State: ----</p>
	<p>Code: ----</p>
	<p>Billed To: {{ $data['billed_to'] }}</p>
	<p>Name: {{ $data['name'] }}</p>
	<p>Address: ----</p>
	<p>GSTIN: ----</p>
	<table>
		<tr>
			<td>S.No.</td>
			<td>Description of Goods/Service</td>
			<td>HSN Code</td>
			<td>Qty</td>
			<td>Rate</td>
			<td>Amount/Taxable Value (Rs.)</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>PTE Software Subscription<br>{{ $data['package'] }}<br>{{ $data['validity'] }} months</td>
			<td>Sac 9983</td>
			<td>1</td>
			<td>{{ $data['rate'] }}/-</td>
			<td>{{ $data['rate'] }}</td>
		</tr>
	</table>

	<p>Total Amount before Tax: {{ $data['rate'] }}</p>
	<!-- if state = punjab  -->
	<p>Add: CGST @ 9% - {{ round($data['rate']*9/100) }}</p>
	<p>Add: STGST@ 9% - {{ round($data['rate']* $data['stgst'] /100) }}</p>

	<!-- if state != punjab  -->
	<p>Add: IGST@ 18% - {{ round($data['rate']*18/100) }}</p>

	<p>Total Amount: GST - {{ round($data['rate']*18/100) }}</p>

	<p>Grand Total: {{ $data['amount'] }}</p>

	<p>Terms & Conditions: All disputes subject to Mohali jurisdiction only. </p>
<?php /*
	@extends('layouts.appSuperAdmin')
@section('content')
   <!-- Page Content  -->
   <div id="content">
      <div class="tax-invoice">
          <div class="header">
             <p>GSTIN:{{ $data['company_gst_number'] }}</p>
             <p class="mr-5">TAX INVOICE</p>
             <p>M: {{ $data['company_mobile_number'] }}</p>
          </div>
          <div class="main-heading">
              <h4>{{ $data['company_name'] }}</h4>
              <h4>{{ $data['company_address'] }}</h4>
          </div>
          <div class="invoice-detail">
            <p>Invoice No.: {{ $data ['payment_id'] }} <span>Reverse Charge (Y/N): N</span></p> 
            <p>Invoice Date:  {{ $data['created'] }}</p>
            <p>State:{{ $data['state'] }}&nbsp;Code:{{ $data['state_code'] }}</p>
            <p>Billed To: {{ $data['billed_to'] }}</p>
            <p>Name: {{ $data['name'] }}</p>
            <p>Address: {{ $data['customer_address'] }}</p>
            <p>GSTIN:{{ $data['customer_GSTIN'] }}</p>
           <!--  <p>State:<span>PUNJAB</span><span>Code:</span></p> -->
          </div>
       <div>
       <table class="table table-bordered">
          <thead>
              <tr>
                  <th scope="col">S.No.</th>
                  <th scope="col">Description of Goods/Service</th>
                  <th scope="col">HSN Code</th>
                  <th scope="col">Qty.</th>
                  <th scope="col">Rate</th>
                  <th scope="col">Amount/Taxable<br>Value (Rs.)</th>
                </tr>
            </thead>
            <tbody style="height:230px";>
                <tr>
                  <td scope="row">1</td>
                  <td>PTE SOFWARE SUBSCRIPTION <br>{{ $data['package'] }}<br>{{ $data['validity'] }} months</td>
                  <td>{{ $data['hsn_code'] }}</td>
                  <td>1</td>
                  <td>{{ $data['rate'] }}/-</td>
                  <td>{{ $data['rate'] }}</td>
                </tr>
            </tbody>
            <tbody class="border-top">
                <tr>
                  <td  scope="row" colspan="2">Amount in Words</td>
                  <td  colspan="3">Total Amount before Tax</td>
                  <td>{{ $data['rate'] }}</td>
                </tr>
            </tbody>
            <tbody class="border-top">
              @if($data['state_code'] == 3)
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2"></td>
                  <td  colspan="3">Add: CGST @ {{ $data['cgst'] }}%</td>
                  <td>{{ round($data['rate'] * $data['cgst'] / 100) }}</td>
                </tr>
                <tr>
                  <td class="border-bottom-0 border-top-0"; scope="row" colspan="2"></td>
                  <td  colspan="3">Add: STGST @ {{ $data['stgst'] }}%</td>
                  <td>{{ round($data['rate'] * $data['stgst'] / 100) }}</td>
                </tr>
              @else
                <tr>
                  <td class="border-top-0" scope="row" colspan="2"></td>
                  <td  colspan="3">Add: IGST @ {{ $data['igst'] }}%</td>
                  <td>{{ round($data['rate'] * $data['igst'] / 100) }}</td>
                </tr>
              @endif
            </tbody>
            <tbody class="border-top">
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2">Bank Details: YES BANK</td>
                  <td  colspan="3">Total Amount: GST</td>
                  @if($data['state_code'] == 3)
                  <td >{{ (round($data['rate'] * $data['stgst'] / 100)) + (round($data['rate'] * $data['cgst'] / 100)) }}</td>
                  @else
                  <td >{{ round($data['rate'] * $data['igst'] / 100) }}</td>
                  @endif
                </tr>
                <tr>
                  <td class="border-bottom-0 border-top-0"; scope="row" colspan="2">Account No.: 010985800004580</td>
                  <td colspan="3"></td>
                  <td ></td>
                </tr>
                <tr>
                  <td class="border-top-0" scope="row" colspan="2">IFSC Code: YESB0000109</td>
                  <td  colspan="3">Grand Total</td>
                  <td>{{ $data['amount'] }}</td>
                </tr>
            </tbody>
            <tbody class="border-top">
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2">Terms & Conditions:</td>
                  <td class="border-bottom-0 border-top-0" colspan="4">Certified that the particulars given above are true </td>     
                </tr>
                <tr>
                  <td class="border-bottom-0 border-top-0"; scope="row" colspan="2">All disputes subject to Mohali jurisdiction </td>
                  <td class="border-bottom-0 border-top-0" colspan="4">and correct</td>
                </tr>
                <tr>
                  <td class="border-top-0 border-bottom-0" scope="row" colspan="2">only.</td>
                  <!-- <td class="border-top-0 border-bottom-0 text-center" colspan="4"><strong>For Aone Solutions</strong></td> -->
                </tr>
            </tbody>
            <tbody class="border-top-0 text-center pt-3">
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2">Receiver’s Customer’s Signature</td>
                  <td class="border-bottom-0 border-top-0" colspan="4">
                    <img width="100" src="{{ $data['digital_signature'] }}">
                  </td>     
                </tr>
            </tbody>
        </table>

    </div>  
@endsection
*/?>