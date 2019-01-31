<?php 
include "headfoot.php";
/*
* File: contactus.php
* Authors: Ethan Pullen & Dhruv Joshi
* Date: 2/2019
*/
head("<link rel=\"stylesheet\" type=\"text/css\" href=\"contactus.css\">");
?>

<div class="contact">
	<h1>You can find us at</h1>
	<div class="text">
		<p>Cold Mountain Builders<br />
			33 Pendleton Street<br />
			Belfast, Maine 04915<br /><br />
			Office: 207.338.4552<br />
			Fax: 207.338.2520<br />
			Shop: 207.338.5565<br /><br />
			Email: <a href="mailto:coldmtn@coldmtn.com?Subject=Cold%20Mountain%20Inquiry">
			coldmtn@coldmtn.com</a></p>
	</div>
	<div class="map">
		<div class="mapouter">
			<div class="gmap_canvas">
				<iframe width="300" height="250" id="gmap_canvas" src="https://maps.google.com/maps
				?q=33%20Pendleton%20Street%20Belfast%2C%20Maine%2004915&t=&z=15&ie=UTF8&iwloc=&outp
				ut=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				<a href="https://www.embedgooglemap.net"></a>
			</div>
		</div>
	</div>
</div>
<?php
foot();
?>