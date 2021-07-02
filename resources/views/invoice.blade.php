@extends('layouts.appSuperAdmin')
@section('content')
   <!-- Page Content  -->
   <div id="content">
      <div class="tax-invoice">
          <div class="header">
             <p>GSTIN:03BMAPK3343M1Z8</p>
             <p class="mr-5">TAX INVOICE</p>
             <p>M: +91 70097 83468</p>
          </div>
          <div class="main-heading">
              <h4>AONE SOLUTIONS</h4>
              <h4>1648, Sector 60, Phase- 3B2, SAS Nagar, Punjab, 160059</h4>
          </div>
          <div class="invoice-detail">
            <p>Invoice No.:  02<span>Reverse Charge (Y/N):</span></p> 
            <p>Invoice Date:  11-10-2020</p>
            <p>State:Code:</p>
            <p>Billed To: MOHIT ACADEMY OF PTE</p>
            <p>Name: MOHIT ACADEMY OF PTE</p>
            <p>Address: PATIALA</p>
            <p>GSTIN:</p>
            <p>State:<span>PUNJAB</span><span>Code:</span></p>
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
                  <td>PTE SOFWARE SUBSCRIPTION 1 year</td>
                  <td>Sac 9983</td>
                  <td>1</td>
                  <td>4238/-</td>
                  <td>4238</td>
                </tr>
            </tbody>
            <tbody class="border-top">
                <tr>
                  <td  scope="row" colspan="2">Amount in Words</td>
                  <td  colspan="3">Total Amount before Tax</td>
                  <td>4238</td>
                </tr>
            </tbody>
            <tbody class="border-top">
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2"></td>
                  <td  colspan="3">Add: CGST @ 9%</td>
                  <td >381</td>
                </tr>
                <tr>
                  <td class="border-bottom-0 border-top-0"; scope="row" colspan="2"></td>
                  <td  colspan="3">Add: CGST @ 9%</td>
                  <td >381</td>
                </tr>
                <tr>
                  <td class="border-top-0" scope="row" colspan="2"></td>
                  <td  colspan="3">Add: CGST @ 9%</td>
                  <td ></td>
                </tr>
            </tbody>
            <tbody class="border-top">
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2">Bank Details: YES BANK</td>
                  <td  colspan="3">Total Amount: GST</td>
                  <td >762</td>
                </tr>
                <tr>
                  <td class="border-bottom-0 border-top-0"; scope="row" colspan="2">Account No.: 010985800004580</td>
                  <td colspan="3"></td>
                  <td ></td>
                </tr>
                <tr>
                  <td class="border-top-0" scope="row" colspan="2">IFSC Code: YESB0000109</td>
                  <td  colspan="3">Grand Total</td>
                  <td >5000</td>
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
                  <td class="border-top-0 border-bottom-0 text-center" colspan="4"><strong>For Aone Solutions</strong></td>
                </tr>
            </tbody>
            <tbody class="border-top-0 text-center pt-3">
                <tr>
                  <td class="border-bottom-0 border-top-0" scope="row" colspan="2">Receiver’s Customer’s Signature</td>
                  <td class="border-bottom-0 border-top-0" colspan="4">Authorised Signatory</td>     
                </tr>
            </tbody>
        </table>

    </div>  
@endsection
