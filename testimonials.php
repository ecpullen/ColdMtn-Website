<?php 
include "headfoot.php";

head("<link rel=\"stylesheet\" type=\"text/css\" href=\"testimonials.css\">");
?>
<div class="sidebar">
	<a href="#FWCK"><span class="line">Frederic Whittmann</span> 
					<span class="line">Christine Kondoleon</span> 
					<span class="title">Owners</span></a>
	<a href="#JG"><span class="line">John Gillespie</span> 
				<span class="title">Architect</span></a>
	<a href="#DW"><span class="line">Deborah Weisgall</span>
				<span class="title">Owner</span></a>
	<a href="#CG"><span class="line">Christopher Glass</span>
				<span class="title">Owner</span></a>
	<a href="#LL"><span class="line">Larry Lasser</span>
				<span class="title">Owner</span></a>
	<a href="#LRKS"><span class="line">Liv Rockefeller</span>
				<span class="line">Ken Shure</span>
				<span class="title">Owner</span></a>
	<a href="#TG"><span class="line">Tony Grassi</span>
				<span class="title">Owner</span></a>
	<a href="#BN"><span class="line">Bruce Norelius</span>
				<span class="title">Owner</span></a>
	<a href="#SVD"><span class="line">Sam Van Dam</span>
				<span class="title">Architect</span></a>
</div>
<div class="testimonies">
	<div id="intro">
		<p id="header-intro">In Our Clients’ Words</p>
		<p id="main-intro">
			Cold Mountain Builders has worked with owners, architects and consultants from all over the United States. We understand that we are only as good as our last project.<br /><br />To that end, we share with you an unvarnished look at what our clients and partners have to say about their experiences working with Cold Mountain Builders.
		</p>
	</div>
<?php 
$file = fopen("testimonial.txt","r") or die("could not find file");
$name;
$title;
$para;
$loc;
while($line = fgets($file)){
	switch ($line[0]) {
		case '@':
			$title = '<span class="line" id="title">'.substr($line, 1).'</span';
			break;
		case '*':
			$name .= '<span class="line">'.substr($line, 1).'</span>';
			break;
		case '~':
			$para = "<p class=\"testimony\">".substr($line,1);
			break;
		case '#':
			$loc = substr($line,1,strlen($string)-1);
			break;
		case ':':
?>
		<div class="loc" id='<?=$loc?>'></div>	
		<div class="testimonial">
			<?=$para?>
			<p class = "client">
				<?=$name?>
				<?=$title?>
			</p>	
		</div>
<?php
			$name = "";
			$title = "";
			$para = "";
			$loc = "";
			break;
		default:
			$para .= $line;
			break;
	}
}
?>
<div class="loc"></div>
</div>
<?php
foot();
?>