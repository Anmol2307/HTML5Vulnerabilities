<?php 
#header('X-Frame-Options:SAMEORIGIN'); 
header('X-Frame-Options:DENY'); 

?>
<html>
<head><title>Sensitive information</title></head>
<body>

<table>
	<tr>
		<td align="left">Name:</td>
		<td align="left">My Name</td>		
	</tr>
	
	<tr>
		<td align="left">Dob:</td>
		<td align="left">dd-mm-yyyy</td>		
	</tr>
	
	<tr>
		<td align="left">Email Id:</td>
		<td align="left">xyz@abcd.com</td>		
	</tr>		
	
	<tr>
		<td align="left">Mobile Number:</td>
		<td align="left">0000000000</td>		
	</tr>			
</table>

<br>

<h3>Messages</h3>
<p style="color:bluel">This is your OTP <b>(abcd)</b> to get the movie tickets. Please do not share it with anybody.</p>


</body>
</html>
