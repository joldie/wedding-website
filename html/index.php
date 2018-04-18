<?php
    // Save filename (without directory or ending) for later use
    $filename = substr(__FILE__, strrpos(__FILE__, "/")+1, strrpos(__FILE__, ".")-strrpos(__FILE__, "/")-1);
    
    include("common_top.php");
    include("common_middle.php");
?>

	<div id="home_content" align="center">
	
	    <div id="home_box">
     	    <h1>[XX] and [XY]</h1>
     	    <br>
     	    <img id="img_portrait" src="images/portrait.jpg">
     	    <h5>[Date] 2018</h5>
	    </div>
	    
	    <br> <br>
	    <h5 id="text1"></h5>
	    <br> <br> <br> <br>
	    
	</div>

<?php
    include("common_bottom.php");
?>