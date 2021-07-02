<?php /*<html>
  <head>
    <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta content="template language" name="keywords">
      <meta content="" name="author">
      <meta content="" name="description">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <link href="favicon.png" rel="shortcut icon">
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('assets/fontawesome/js/all.min.js') }}" defer></script>
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

      <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}" defer></script>

      <script src="{{ asset('assets/js/admin-custom.js') }}" defer></script>
    

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/scss/admin-common.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/scss/admin-style.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
      
  </head>
  <body>*/?>
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
       </div>
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
  <!-- </body>
  </html> -->
