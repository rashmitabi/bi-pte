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
        <div style="padding:6px;margin-bottom:40px;">
            <p style="float:left;">GSTIN:{{ $data['company_gst_number'] }}</p>
            <p style="float:left; width: 50%;text-align: center;">TAX INVOICE</p>
            <p style="float:left;width: 22%;text-align: right;">M: {{ $data['company_mobile_number'] }}</p>
        </div>
        <div style="border-bottom: 1px solid #000;">
            <h2 style="text-align: center; margin-top: 20px;">{{ $data['company_name'] }}</h2>
            <h2 style="text-align: center;">{{ $data['company_address'] }}</h2>
        </div>
        <div>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Invoice No.:{{ $data ['payment_id'] }} <span
                    style="margin-left: 50px;">Reverse Charge (Y/N): N</span></p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Invoice Date: {{ $data['created'] }}</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">State:{{ $data['state'] }}&nbsp;Code:{{ $data['state_code'] }}</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Billed To: {{ $data['billed_to'] }}</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Name:{{ $data['name'] }}</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">Address: {{ $data['customer_address'] }}</p>
            <p style="border-bottom: 1px solid #000;padding-left: 10px;font-size: 17px;">GSTIN:{{ $data['customer_GSTIN'] }}</p>
        </div>
        <!-- <div style="height: 21px;border-bottom: 1px solid #000;padding:6px;">
            <p style="float:left;width: 22%;">State:</p>
            <p style="float:left; width: 50%;text-align: center;">PUNJAB</p>
            <p style="float:left;width: 22%;text-align: right;">Code:</p>
        </div> -->
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
                {{ $data['package'] }}<br>{{ $data['validity'] }} months
                </td>
                <td style="padding-bottom: 230px;">{{ $data['hsn_code'] }}</td>
                <td style="padding-bottom: 230px;">1</td>
                <td style="padding-bottom: 230px;">{{ $data['rate'] }}/-</td>
                <td style="padding-bottom: 230px;">{{ $data['rate'] }}</td> <!-- rowspan="2" -->
            </tr>
            <tr>
                <th colspan="2">Amount in Words</th>
                <th colspan="3">Total Amount before Tax</th>
                <th>{{ $data['rate'] }}</th>
            </tr>
            @if($data['state_code'] == 3)
            <tr>
                <td colspan="2" rowspan="2"></td>
                <td colspan="3">Add: CGST @ {{ $data['cgst'] }}%</td>
                <td colspan="3">{{ round($data['rate'] * $data['cgst'] / 100) }}</td>
            </tr>
            <tr>
                <td colspan="3">Add: STGST@ {{ $data['stgst'] }}%</td>
                <td colspan="3">{{ round($data['rate'] * $data['stgst'] / 100) }}</td>
            </tr>
            @else
            <tr>
                <td colspan="3">Add: IGST@ {{ $data['igst'] }}%</td>
                <td colspan="3">{{ round($data['rate'] * $data['igst'] / 100) }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="2" rowspan="3">Bank Details: YES BANK<br>
                    Account No.: 010985800004580<br>
                    IFSC Code: YESB0000109
                </td>
                <td colspan="3">Total Amount: GST</td>
                @if($data['state_code'] == 3)
                <td colspan="3">{{ (round($data['rate'] * $data['stgst'] / 100)) + (round($data['rate'] * $data['cgst'] / 100)) }}</td>
                @else
                <td colspan="3">{{ round($data['rate'] * $data['igst'] / 100) }}</td>
                @endif
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="3">.</td>
            </tr>
            <tr>
                <td colspan="3">Grand Total</td>
                <td colspan="3">{{ $data['amount'] }}</td>
            </tr>
            <tr style="border-bottom: 0px;">
                <td style="margin-top:0px" colspan="2">Terms & Conditions:<br>
                    All disputes subject to Mohali jurisdiction only.<br>
                    <span>Receiver’s Customer’s Signature</span>
                </td>
                <td style="border-bottom: 0px;" colspan="4">Certified that the particulars given above are true and correct<br>
                    <span ><strong>Aone Solutions</strong></span><br>
                    <span >Authorised Signatory</span>
                    @if ($data['digital_signature'] != '')
                        <!-- <img width="100" src="{{ $data['digital_signature'] }}"> -->
                    @endif                    
                </td>
            </tr>
        </table>
    </div>
</body>
