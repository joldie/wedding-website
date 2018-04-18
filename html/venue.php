<?php
    // Save filename (without directory or ending) for later use
    $filename = substr(__FILE__, strrpos(__FILE__, "/")+1, strrpos(__FILE__, ".")-strrpos(__FILE__, "/")-1);
    
    include("common_top.php");
    include("common_middle.php");
?>

<h2 id="text1"></h2>
	
	<h4 id="text2"></h4>
	
	<p id="text3"></p>
	
	<figure>
	    <div style="font-style:italic;font-size:small" align="center">
	        <img id="venue_img" src="images/venue.jpg" width="400px" alt="">
	        <figcaption>Credit: <a href="">Photo credit text</a></figcaption>
	    </div>
	</figure>
	
	<p id="text4"></p>
	
	<p id="text5"></p>
	
    <div align="center">
        <iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=...&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    
<?php
    include("common_bottom.php");
?>