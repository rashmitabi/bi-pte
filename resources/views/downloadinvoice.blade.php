<div>
      <div >
          <div >
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
            <p>GSTIN:{{ $data['customer_GSTIN'] }}</p>
           <!--  <p>State:<span>PUNJAB</span><span>Code:</span></p> -->
          </div>
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
            
        

    </div>