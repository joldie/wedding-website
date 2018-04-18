<?php
    // Save filename (without directory or ending) for later use
    $filename = substr(__FILE__, strrpos(__FILE__, "/")+1, strrpos(__FILE__, ".")-strrpos(__FILE__, "/")-1);
    
    include("common_top.php");
    include("common_middle.php");
?>

<h2 id="text1"></h2>
	
	<h4 id="text2"></h4>
	
	<table>
	<tr>
	<th width="50px">&emsp; - &emsp;</th>
	<th><b id="text3"></b></th>
	<th id="text4" style="text-align: left; font-weight: normal; vertical-align: text-top;"></th>
	</tr>
	<tr>
	<th>&emsp; -</th>
	<th><b id="text5"></b></th>
	<th id="text6" style="text-align: left; font-weight: normal; vertical-align: text-top;"></th>
	</tr>
	<tr>
	<th>&emsp; -</th>
	<th><b id="text7"></b></th>
	<th id="text8" style="text-align: left; font-weight: normal; vertical-align: text-top;"></th>
	</tr>
	</table>
	
	<br>
	<p>&emsp;&emsp;&emsp;<i><b id="text9"></i></b></p>
	<br>
	
	<h4 id="text10"></h4>
	<p id="text11"></p>
	
	<br>
	<p>&emsp;&emsp;&emsp;<i><b id="text12"></i></b></p>
	<br>

<?php
    include("common_bottom.php");
?>