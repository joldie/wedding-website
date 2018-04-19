<?php

    // Save filename (without directory or ending) for later use
    $filename = substr(__FILE__, strrpos(__FILE__, "/")+1, strrpos(__FILE__, ".")-strrpos(__FILE__, "/")-1);

    include("common_top.php");

    // Connect to MySQL database
    require_once '../login.php';
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($connection->connect_error) die($connection->connect_error);

    $name = $number = $email = $comment = $coming = $ip = '';
    $posted = false;

    // If user inputted data, check and insert into database
    if (isset($_POST['name1']) && isset($_POST['number']))
    {
        $posted = true;
        $coming = sanitizeMySQL($connection, $_POST['coming']);
        $email = sanitizeMySQL($connection, $_POST['email']);
        $comment = sanitizeMySQL($connection, $_POST['comment']);
        $ip = $_SERVER['REMOTE_ADDR'];
        $date    = date("Y-m-d H-i-s", time());
        $number  = $_POST['number'];

        for ($j = 0 ; $j < $number ; ++$j)
        {
            $name = sanitizeMySQL($connection, $_POST['name' . ($j + 1)]);

            $query = "INSERT INTO guests(name, coming, email, comment, ip, date) VALUES" .
            "('$name', '$coming', '$email', '$comment', '$ip', '$date')";

            $result = $connection->query($query);
            if (!$result) die ("Database access failed: " . $connection->error);
        }
    }

    // Close database connection
    $connection->close();

    // Format text before input to database to avoid malicious attacks
    function sanitizeMySQL($connection, $var)
    {
        $var = $connection->real_escape_string($var);
        $var = sanitizeString($var);
        return $var;
    }

echo <<<_END
	
	<script>
	
	var MAX_GUESTS = 6;
	
	// jQuery code on page load
	$(function () {
        
        $('#number').val(1);  // Initialize value manually
	    
	    $('#radio1').click(function() {
	        // Reshow number of guests input field
	        $('#p1').show('fast');
	        $('#p2').show('fast');
	        $('#email').attr('required', 'required');
	        
	        // Revert placeholder in comment box to original text
	        $.getJSON('strings.json', function(strings){
	    
	            $.each(strings.rsvp, function(i, item) {
	            if (item.id == 'input4') {
	                $('#input4').attr('placeholder', item['$lang']);
	            }
	            if (item.id == 'name1') {
	                $('#name1').attr('placeholder', item['$lang']);
	            }
	        });
	    });
	    });
	    
	    $('#radio2').click(function() {
	        // Hide number of guests input field and change comment box placeholder
	        $('#p1').hide('fast');
	        $('#p2').hide('fast');
	        $('#email').removeAttr('required');
	        $('#name1').attr('placeholder', '');
	        $('#input4').attr('placeholder', '');
	        
	    // Remove all other name input boxes which exist
	    for (j = 2; j < MAX_GUESTS + 1; ++j)
	    {
	    if ($('#name' + j).length != 0) {
	    $('#name' + j).remove();
	    }
	    else {
	    break;
	    }
	    }
	    
	    $('#number').val(1);  // Re-initialise value
	    
	    });
	    
	    $('#plus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        
	        // Get the current value
	        var currentVal = parseInt($('#number').val());
	    
	        // If is not undefined and not above maximum number of guests, increment and add text box for guest name
	        if (!isNaN(currentVal)) {
	            if (currentVal < MAX_GUESTS) {
	                $('#number').val(currentVal + 1);
	                $('#name1')
	                    .clone()
	                    .attr({'id': 'name'+ (currentVal+1), 'name': 'name'+ (currentVal+1), 'placeholder': $('#name1').attr('placeholder').split(" ")[0] + ' '+(currentVal+1)})
	                    .val('')
	                    .insertAfter('[id^=name]:last');
	            }
	        } else {
	            // Otherwise set value to 1
	            $('#number').val(1);
	        }
	    });
	    
	    $('#minus').click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	    
	        // Get the current value
	        var currentVal = parseInt($('#number').val());
	    
	        // If it is not undefined or value is greater than 1, decrement and remove text box for guest name
	        if (!isNaN(currentVal) && currentVal > 1) {
	            $('#number').val(currentVal - 1);
	            $('#name'+(currentVal)).remove();
	        } else {
	            // Otherwise set value to 1
	            $('#number').val(1);
	        }
	    });
	    
	});
	
	</script>
    
_END
;

include("common_middle.php");

// Popup alert on successful submission of form data
if ($posted && $result) {

    if ($coming == 1) {
        if ($lang == 'EN') echo "<script>alert('Great to hear you\'re coming! We\'ll update you via email with more details as they\'re finalised.')</script>";
        elseif ($number == 1) echo "<script>alert('Wir freuen uns, dass Du kommst! Wir informieren Dich per E-Mail mit mehr Details, sobald diese feststehen.')</script>";
        else echo "<script>alert('Wir freuen uns, dass Ihr kommt! Wir informieren Euch per E-Mail mit mehr Details, sobald diese feststehen.')</script>";
    }
    else {
        if ($lang == 'EN') echo "<script>alert('Shame that you can\'t make it, but thanks for letting us know!')</script>";
        else echo "<script>alert('Danke für die Rückmeldung! Schade, dass Du/Ihr nicht kommst/kommt.')</script>";
    }
}

echo <<<_END
    
    <h2 id="text1"></h2>
    <h4 id="text2"></h4>
    <p id="text3" align="right"></p>
    
    <div align="center">
    <form id="formInput" method="post" action="">
        
        <br>
        <p>
        <label for="radio1">
        <input type="radio" value="1" name="coming" id="radio1" checked="checked"> <span><b id="radio1text"></b></span>
        </label>
        
        <label for="radio2">
        <input type="radio" value="0" name="coming" id="radio2"> <span><b id="radio2text"></b></span>
        </label>
        </p>
        <br>
        
        <p id="p1">
            <b id="input1"></b>
            <br>
            <input type="button" id="minus" value="-" class="plusminus" />
            <input type="text" id="number" name="number" value="1" class="number" readonly />
            <input type="button" id="plus" value="+" class="plusminus" />
        </p>
        
        <p>
        <b id="input2"></b>
        <br>
        <input type="text" id="name1" class="text_input" name="name1" required="required" size="50" maxlength="100" placeholder="" class="names" />
        </p>
        
        <p id="p2">
        <b id="input5"></b>
        <br>
        <input type="email" id="email" class="text_input" name="email" required="required" size="50" maxlength="100" placeholder="" class="email" />
        </p>
        
        <p>
        <b id="input3"></b><br>
        <textarea id="input4" rows="8" cols="50" name="comment" placeholder=""></textarea>
        </p>
        
        <input type="submit" name="submit" value="Send" />
    </form>
    </div>
    
    <br>
    <br>
    <p id="text4">Alternatively, feel free to <a href="mailto:address@mail.com?subject=Wedding RSVP">email</a> us directly</p>
    
_END
;

include("common_bottom.php"); 

?>