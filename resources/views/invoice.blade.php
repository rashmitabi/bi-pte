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
	<p>Add: STGST@ 9% - {{ round($data['rate']*9/100) }}</p>

	<!-- if state != punjab  -->
	<p>Add: IGST@ 18% - {{ round($data['rate']*18/100) }}</p>

	<p>Total Amount: GST - {{ round($data['rate']*18/100) }}</p>

	<p>Grand Total: {{ $data['amount'] }}</p>

	<p>Terms & Conditions: All disputes subject to Mohali jurisdiction only. </p>