<!-- <div>
      <div >
          <div style="display: flex; justify-content:space-between; padding: 6px;">
             <p>GSTIN:{{ $data['company_gst_number'] }}</p>
             <p >TAX INVOICE</p>
             <p>M: {{ $data['company_mobile_number'] }}</p>
          </div>
          <div >
              <h4>{{ $data['company_name'] }}</h4>
              <h4>{{ $data['company_address'] }}</h4>
          </div>
          <div>
            <p>Invoice No.: {{ $data ['payment_id'] }} <span>Reverse Charge (Y/N): N</span></p> 
            <p>Invoice Date:  {{ $data['created'] }}</p>
            <p>State:{{ $data['state'] }}&nbsp;Code:{{ $data['state_code'] }}</p>
            <p>Billed To: {{ $data['billed_to'] }}</p>
            <p>Name: {{ $data['name'] }}</p>
            <p>Address: {{ $data['customer_address'] }}</p>
            <p>GSTIN:{{ $data['customer_GSTIN'] }}</p> -->
           <!--  <p>State:<span>PUNJAB</span><span>Code:</span></p> -->
          <!-- </div>
       </div>
       <table>
          <thead>
              <tr>
                  <th>S.No.</th>
                  <th>Description of Goods/Service</th>
                  <th>HSN Code</th>
                  <th>Qty.</th>
                  <th>Rate</th>
                  <th>Amount/Taxable<br>Value (Rs.)</th>
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
            </table>

    </div> -->
    
<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    table,th,td {
        border-bottom: 1px solid #000;
        border-right: 1px solid #000;
        border-collapse: collapse;
    }

    th,td {
        padding: 5px;
        text-align: left;
    }
    th {
        border-bottom: 1px solid #000;
        border-right: 1px solid #000;
    }
</style>

<body>
    <div style="border: 1px solid #000; margin:20px'">
        <div style="display:flex; justify-content:space-between; padding: 6px;">
           <div>
              <p>GSTIN:03BMAPK3343M1Z8</p>
           <div>
           <div>
              <p>TAX INVOICE</p>
           <div>
           <div>
              <p>M: +91 70097 83468</p>
           <div>
        </div>
        <div style="border-bottom: 1px solid #000;">
            <h2 style="text-align: center; margin-top: 20px;">AONE SOLUTIONS</h2>
            <h2 style="text-align: center;">1648, Sector 60, Phase- 3B2, SAS Nagar, Punjab, 160059</h2>
        </div>
        <div>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Invoice No.: 02 <span
                    style="margin-left: 50px;">Reverse Charge (Y/N): N</span></p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Invoice Date: 11-10-2020</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">State:Code:</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Billed To: MOHIT ACADEMY OF PTE
            </p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Name: MOHIT ACADEMY OF PTE</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Address: PATIALA</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">GSTIN:</p>
        </div>
        <div style="display: flex; justify-content:space-between; padding: 0px 10px;border-bottom: 1px solid #000;">
            <p>State:</p>
            <p>PUNJAB</p>
            <p>Code:</p>
        </div>
        <table style="width:100%;">
            <tr>
                <th>S.No.</th>
                <th>Description of Goods/Service</th>
                <th>HSN Code</th>
                <th>Qty.</th>
                <th>Rate</th>
                <th>Amount/Taxable Value (Rs.)</th>
            </tr>
            <tr>
                <td style="padding-bottom: 230px;">1</td>
                <td style="padding-bottom: 230px;">PTE SOFWARE SUBSCRIPTION
                    1 year
                </td>
                <td style="padding-bottom: 230px;">Sac 9983</td>
                <td style="padding-bottom: 230px;">1</td>
                <td style="padding-bottom: 230px;">4238/-</td>
                <td style="padding-bottom: 230px;">4238</td> <!-- rowspan="2" -->
            </tr>
            <tr>
                <th colspan="2">Amount in Words</th>
                <th colspan="3">Total Amount before Tax</th>
                <th>4238</th>
            </tr>
            <tr>
                <td colspan="2" rowspan="3"></td>
                <td colspan="3">Add: CGST @ 9%</td>
                <td colspan="3">381</td>
            </tr>
            <tr>
                <td colspan="3">Add: STGST@ 9%</td>
                <td colspan="3">381</td>
            </tr>
            <tr>
                <td colspan="3">Add: IGST@</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="2" rowspan="3">Bank Details: YES BANK<br>
                    Account No.: 010985800004580<br>
                    IFSC Code: YESB0000109
                </td>
                <td colspan="3">Total Amount: GST</td>
                <td colspan="3">762</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="3">.</td>
            </tr>
            <tr>
                <td colspan="3">Grand Total</td>
                <td colspan="3">5000</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="3">Terms & Conditions:<br>
                    All disputes subject to Mohali jurisdiction only.<br>
                    <span>Receiver’s Customer’s Signature</span>
                </td>
                <td style="border-bottom: 0px;" colspan="4">Certified that the particulars given above are true and correct<br>
                    <span style="display: flex;justify-content: center;margin-top: 18px;font-size: 18px;"><strong>Aone Solutions</strong></span><br>
                    <span style="display: flex;justify-content: center;margin-top: 10px;font-size: 18px;">Authorised Signatory</span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
