<?php
    // Check for "?lang=EN" or "?lang=DE" in URL and set language preference accordingly
    if (isset($_GET['lang'])) $lang = sanitizeString($_GET['lang']);
    else $lang = "EN";
    
    function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = htmlentities($var);
        $var = strip_tags($var);
        // Included because htmlentities() didn't catch single quote mark:
        $var = str_replace("'", "&#39;", $var);
    
        return $var;
    }
?>

<!DOCTYPE html>

<head>
	<!-- Basic page data
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title>[XX] & [XY] 2018</title>
	<meta name="description" content="All you need to know about our wedding!">
	<meta name="author" content="joldie">
	
	<!-- Mobile specific data
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSS, Font and Favicon
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="css/stylesheet.css">
	
	<!-- JavaScript libraries
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<script src="js/jquery-3.2.1.min.js"></script>
	
	
<?php

echo <<<_END
	
	<script>
	
	function changeLanguage()
	{
	    // Retrieve file with text strings for page elements in both English and German
	    $.getJSON('strings.json', function(strings){
	        
	        // Replace text strings common to all pages
	        for (j = 0; j < strings.common.length; ++j)
	        {
	            document.getElementById(strings.common[j].id)[strings.common[j].type] = strings.common[j]['$lang'];
	        }
	        
	        // Replace text strings specific to current page
	        for (j = 0; j < strings['$filename'].length; ++j)
	        {
	            document.getElementById(strings['$filename'][j].id)[strings['$filename'][j].type] = strings['$filename'][j]['$lang'];
	        }
	        
	    });
	}
	
	$(function () {
	    // On page load, set all text to appropriate language
	    changeLanguage();
	    
	    // Initialise value
	    var val = 1;
	    
	    // Side menu animation (small screens)
	    $(".nav-bar").click(function(e){
	        // Clicks within the nav area won't make it past the area itself
	        e.stopPropagation();
	        
	        if (val == 1) {
	            $("header nav").animate({ 'left' : '0' });
	            val = 0;
	        } else {
	            val = 1;
	            $("header nav").animate({ 'left' : '-100%' });
	        }
	    
	        return false;
	    });
	    
	    // Show/hide header and nav elements correctly when screen resizes
	    $( window ).resize(function() {
	        if ($(window).width() > 800) {
	            $("header nav").animate({ 'left' : '0%' },0);
	        }
	        else {
	            $("header nav").animate({ 'left' : '-100%' },0);
	        }
	    });
	    
	});
	
	/* Any clicks outside of menu area on mobiles will hide it */
	$(document).click(function(){
	    if ($(window).width() < 800) {
	        val = 1;
	        $("header nav").animate({ 'left' : '-100%' });
	    }
	});
    
    </script>

_END

?>