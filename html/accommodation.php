<?php
    // Save filename (without directory or ending) for later use
    $filename = substr(__FILE__, strrpos(__FILE__, "/")+1, strrpos(__FILE__, ".")-strrpos(__FILE__, "/")-1);
    
    include("common_top.php");
    include("common_middle.php");
?>

<h2 id="text1"></h2>
	
	<h5 id="text2"></h5>
	
	<p id="text3"></p>
	
	<h5 id="text4"></h5>
	
	<p id="text5"></p>
	
	<h5 id="text6"></h5>
	
	<p id="text7"></p>
	<p id="text8"></p>
    
    <br>
    <p align="center"><i><b id="text9"></b></i></p>
    <br>
    
<?php
    include("common_bottom.php");
?>