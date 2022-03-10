<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
    	.title{
    		font-weight: bold;
    	}
    </style>
</head>
<body>
<table>
	<tr>
		<td class="title">First Name : </td>
		<td>	{!!  $step1_fname !!}</td>
	</tr>
	@if(isset($step1_mname))
	<tr>
		<td class="title">Middle Name : </td>
		<td>	{!!  $step1_mname !!}</td>
	</tr>
	@endif
	<tr>
		<td class="title">Last Name : </td>
		<td>	{!! $step1_lname !!}</td>
	</tr>
	<tr>
		<td class="title">Email : </td>
		<td>	{!! $step1_email !!}</td>
	</tr>
	<tr>
		<td class="title">Best phone to contact:  </td>
		<td>	{!! $step1_mno !!}</td>
	</tr>
	<tr>
		<td class="title">Address:   </td>
		<td>	{!! $step1_paddress !!}</td>
	</tr>
	<tr>
		<td class="title">City:   </td>
		<td>	{!!$step1_city  !!}</td>
	</tr>

	<tr>
		<td class="title">State :   </td>
		<td>	{!!$step1_state_info  !!}</td>
	</tr>

	<tr>
		<td class="title">Zip:   </td>
		<td>	{!!$step1_zip  !!}</td>
	</tr>
	
		
	<tr>
		<td class="title">Credit Report Start Date :   </td>
		<td>	{!! $credit_report_date !!}</td>
	</tr>
	<tr>
		<td class="title">Services Selected :   </td>
		<td>	{!! $step2_package !!}</td>
	</tr>	
	<tr>
		<td class="title">First Payment Date :   </td>
		<td>	{!! $first_payment_date !!}</td>
	</tr>
	<tr>
		<td class="title">Services Start Date :   </td>
		<td>	{!! $service_start_date !!}</td>
	</tr>
	
	<tr>
		<td class="title">Have you been in the Military :</td>
		<td>	{!! ($step1_ml == "1" ? "Yes": "No") !!}</td>
	</tr>
    	
    	<tr>
		<td class="title">How Did You Hear About Us :</td>
		<td>	{!! $step1_hau !!}</td>
	</tr>
    	<tr>
		<td class="title">What are you interested in :</td>
		<td>	{!! $step1_in !!}</td>
	</tr>
    	<tr>
		<td class="title">Best time to contact you :</td>
		<td>	{!! $step1_btc !!}</td>
	</tr>

</table>
</body>
</html>