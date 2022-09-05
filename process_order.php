<?php 
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
    session_start();
    if (!isset($_POST["submit"])) {
        header ("location: enquire.php");
    } else {
        $errors = array( // Initialize the error of each input data that need to be validated, keep these into an array
            'firstname' => false,
            'lastname' => false,
            'email' => false,
            'streetAddress' => false,
            'suburb' => false,
            'state' => false,
            'postcode' => false,
            'phonenum' => false,
            'contact' => false,
            'partySize' => false,
            'daysOfTravelling' => false,
            'roomtype' => false,
            'cardtype' => false,
            'cardname' => false,
            'cardnumber' => false,
            'expiry' => false,
            'cvv' => false,
        );
        $result = true;
        //Get the user's inputs if these are set
        if (isset($_POST["first_name"])) {
            $firstname = $_POST["first_name"];
        }
        if (isset($_POST["last_name"])) {
            $lastname = $_POST["last_name"];
        }
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
        }
        if (isset($_POST["street_address"])) {
            $streetAddress = $_POST["street_address"];
        }
        if (isset($_POST["suburb"])) {
            $suburb = $_POST["suburb"];
        }
        if (isset($_POST["state"])) {
            $state = $_POST["state"];
        }
        if (isset($_POST["postcode"])) {
            $postcode = $_POST["postcode"];
        }
        if (isset($_POST["phone_num"])) {
            $phonenum = $_POST["phone_num"];
        }
        if (isset($_POST["contact"])) {
            $contact = $_POST["contact"];
        }
        if (isset($_POST["extra_options"])) {
            $extraOptions = $_POST["extra_options"]; //Because extra options is a checkbox type, so the $extraOptions will be the array
            //I'll check if each extra option item is included in the array or not, then separate the array into strings
            if (in_array('breakfast', $extraOptions)) { 
                $breakfast = 'breakfast';
            }
            if (in_array('swimming', $extraOptions)) {
                $swimming = 'swimming';
            }
            //Then concat different strings into 1 string called extraOptions
            if (in_array('breakfast', $extraOptions) || in_array('swimming', $extraOptions)) {
                $extraOptions = "";
                if ($breakfast != "") {
                    $extraOptions .= "$breakfast";
                }
                if ($breakfast != "" && $swimming != "") {
                    $extraOptions .= ", $swimming";
                } else if ($breakfast == "" && $swimming != "") {
                    $extraOptions .= "$swimming";
                }
            }
        }
        if (isset($_POST["optional_features"])) {
            $optionalFeatures = $_POST["optional_features"]; //Because optional features is a checkbox type, so the $optionalFeatures will be the array
            //I'll check if each optional feature item is included in the array or not, then separate the array into strings
            if (in_array('wifi', $optionalFeatures)) {
                $wifi = "wifi";
            }
            if (in_array('concierge', $optionalFeatures)) {
                $concierge = "concierge";
            }
            if (in_array('charging', $optionalFeatures)) {
                $charging = "charging";
            }
            if (in_array('free-fitness', $optionalFeatures)) {
                $fitness = "free-fitness";
            }
            if (in_array('champagne', $optionalFeatures)) {
                $champagne = "champagne";
            }
            //Then I concat different strings into 1 string called optionalFeatures
            if ( in_array('wifi', $optionalFeatures) || in_array('concierge', $optionalFeatures) ||  in_array('charging', $optionalFeatures) || in_array('free-fitness', $optionalFeatures) || in_array('champagne', $optionalFeatures)) {
                $optionalFeatures = "";
                if ($wifi != "") {
                    $optionalFeatures = "wifi";
                }
                if ($wifi == "" && $concierge != "") {
                    $optionalFeatures .= "$concierge";
                } else if ($wifi != "" && $concierge != "" ) {
                    $optionalFeatures .= ", $concierge";
                }if (($wifi != "" || $concierge != "") && $charging != "") {
                    $optionalFeatures .= ", $charging";
                } else if ($wifi == "" && $concierge == "" && $charging != "") {
                    $optionalFeatures .= "$charging";
                }
                if (($wifi != "" || $concierge != "" || $charging != "") && $fitness != "") {
                    $optionalFeatures .= ", $fitness";
                } else if ($wifi == "" && $concierge == "" && $charging == "" && $fitness != "") {
                    $optionalFeatures = "$fitness";
                }
                if (($wifi != "" || $concierge != "" || $charging != "" || $fitness != "") && $champagne != "") {
                    $optionalFeatures .= ", $champagne";
                } else if ($wifi == "" && $concierge == "" && $charging == "" && $fitness == "" && $champagne != "") {
                    $optionalFeatures = "$champagne";
                }
            }
        }
        if (isset($_POST["comment"])) {
            $comment = $_POST["comment"];
        }
        if (isset($_POST["number_of_beings"])) {
            $partySize = $_POST["number_of_beings"];
        }
        if (isset($_POST["days_of_travelling"])) {
            $daysOfTravelling = $_POST["days_of_travelling"];
        }
        if (isset($_POST["room_type"])) {
            $roomtype = $_POST["room_type"];
        }
        if (isset($_POST["credit_type"])) {
            $cardtype = $_POST["credit_type"];
        }
        if (isset($_POST["card_name"])) {
            $cardname = $_POST["card_name"];
        }
        if (isset($_POST["card_number"])) {
            $cardnumber = $_POST["card_number"];
        }
        if (isset($_POST["expiry_date"])) {
            $expiry = $_POST["expiry_date"];
        }
        if (isset($_POST["cvv"])) {
            $cvv = $_POST["cvv"];
        }
        //Sanitise input
        $firstname = sanitise_input($firstname);
        $lastname = sanitise_input($lastname);
        $email = sanitise_input($email);
        $streetAddress = sanitise_input($streetAddress);
        $suburb = sanitise_input($suburb);
        $state = sanitise_input($state);
        $postcode = sanitise_input($postcode);
        $phonenum = sanitise_input($phonenum);
        $contact = sanitise_input($contact);
        if (isset($_POST["extra_options"])) {
            $extraOptions = sanitise_input($extraOptions);
        }
        if (isset($_POST["optional_features"])) {
            $optionalFeatures = sanitise_input($optionalFeatures);
        }
        $comment = sanitise_input($comment);
        $partySize = sanitise_input($partySize);
        $daysOfTravelling = sanitise_input($daysOfTravelling);
        $roomtype = sanitise_input($roomtype);
        if (isset($_POST["cardtype"])) {
            $cardtype = sanitise_input($cardtype);
        }
        $cardname = sanitise_input($cardname);
        $cardnumber = sanitise_input($cardnumber);
        $expiry = sanitise_input($expiry);
        $cvv = sanitise_input($cvv);
        // Display errors:
        $firstnameError = "";
        $lastnameError = "";
        $emailError = "";
        $addressError = "";
        $suburbError = "";
        $stateError = "";
        $postcodeError = "";
        $phonenumError = "";
        $contactError = "";
        $roomtypeError = "";
        $partySizeError = "";
        $daysOfTravellingError = "";
        $cardtypeError = "";
        $cardnameError = "";
        $cardnumberError = "";
        $expiryError = "";
        $cvvError = "";
        //Validation as specified requirements in assignment 1 and 2
        if (!preg_match('/^[a-zA-Z]{1,25}$/',$firstname)) {
            $firstnameError .= "Your first name must be filled in with only alphabetical with maximum of 25 characters.";
            $errors['firstname'] = true;
            $result = false;
        }
        if (!preg_match('/^[a-zA-Z]{1,25}$/',$lastname)) {
            $lastnameError .= "Your last name must be filled in with only alphabetical with maximum of 25 characters.";
            $errors['lastname'] = true;
            $result = false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError .= "Please enter a valid email format.";
            $errors['email'] = true;
            $result = false;
        }
        if ($streetAddress == "" || strlen($streetAddress) > 40) {
            $addressError .= "Please enter street address with no more than 40 characters.";
            $errors['streetAddress'] = true;
            $result = false;
        }
        if ($suburb == "" || strlen($suburb) > 20) {
            $suburbError .= "Please enter your suburb/town with no more than 20 characters.";
            $errors['suburb'] = true;
            $result = false;
        }
        if ($state == ""){
            $stateError .= "Please choose your state from the selected list.";
            $errors['state'] = true;
            $result = false;
        }
        if (!preg_match('/^\d{4}$/',$postcode)){
            $postcodeError .= "The postcode must exactly be filled in with 4 digits.";
            $errors['postcode'] = true;
            $result = false;
        }
        if ($phonenum == "" || !preg_match('/^\d{10}$/',$phonenum)) {
            $phonenumError .= "Please enter your phone number with exactly 10 characters.";
            $errors['phonenum'] = true;
            $result = false;
        }
        if ($contact == ""){
            $contactError .= "Please enter your preferred contact.";
            $errors['contact'] = true;
            $result = false;
        }
        if ($roomtype == ""){
            $roomtypeError .= "Please enter a type of room you would like to stay.";
            $errors['roomtype'] = true;
            $result = false;
        }
       if (!preg_match('/^[0-9]+$/',$partySize) || ($partySize == 0)) {
            $partySizeError .= "The number of perons must be filled in with a positive integer.";
            $errors['partySize'] = true;
            $result = false;
        }
        if (!preg_match('/^[0-9]+$/',$daysOfTravelling) || ($daysOfTravelling == 0) ) {
            $daysOfTravellingError .= "The days of travelling must be filled in with a positive integer.";
            $errors['daysOfTravelling'] = true;
            $result = false;
        }
        if ($cardtype == "") {
            $cardtypeError .= "You must select a credit card type.";
            $errors['cardtype'] = true;
            $result = false;
        }
        if (!preg_match('/^[a-zA-Z\ ]+(\s{0,1}[a-zA-Z ])*$/' , $cardname)) {
            $cardnameError .= "Credit card name must be filled in with maximum of 40 characters, alphabetical and space only.";
            $errors['cardname'] = true;
            $result = false;
        }
        if (!preg_match('/^\d{15,16}$/' , $cardnumber)) {
            $cardnumberError .= "Credit card number must exactly be filled in with 15 or 16 digits.";
            $errors['cardnumber'] = true;
            $result = false;
        }
        if (!preg_match('/^\d{2}-\d{2}$/' , $expiry)) {
            $expiryError .= "Your credit card's expiry date should be 'mm-yy'.";
            $errors['expiry'] = true;
            $result = false;
        }
        //The check expiry date whether the card has expired or not
        if (!$errors['expiry']) {
            $expiryDate = explode("-",$expiry);
            $expiryMonth = $expiryDate[0];
            $expiryYear = $expiryDate[1];
            if ($expiryMonth < 1 || $expiryMonth > 12) {
                $expiryError .= "Invalid expiry month.\n";
                $errors['expiry'] = true;
                $result = false;
            }
            if ($expiryYear < 21) {
                $expiryError .= "Your credit card has been expired.";
                $errors['expiry'] = true;
                $result = false;
            }
        }
        if (!preg_match('/^\d{3}$/' , $cvv)) {
            $cvvError .= "The card verification value must be filled in with 3 digits.";
            $errors['cvv'] = true;
            $result = false;
        }
        if ($state != "" && preg_match('/^\d{4}$/',$postcode)) {
            $message = stateMatchPostcode($state,$postcode); //Check whether the state match with the postcode or not
            if ($message !="") {
                $postcodeError .= $message;
                $errors['postcode'] = true;
                $result = false;
            }   
        }
        if (isset($_POST["credit_type"]) && $cardtype !="" && preg_match('/^\d{15,16}$/' , $cardnumber)) {
            $message = checkCreditCard($cardtype, $cardnumber); //Check whether the cardtype matches with the card number or not
            if ($message != "") {
                $cardnumberError .= $message;
                $errors['cardnumber'] = true;
                $result = false;
            }
        }
        $_SESSION["result"] = $result;
        /* Calculate the total cost by PHP */
        if (!$errors['partySize'] && !$errors['daysOfTravelling'] && !$errors['roomtype'] ) {
            $extraprice = 0;
            if (isset($_POST["extra_options"])) {
                if (strpos($extraOptions,"breakfast") !== false) { $extraprice += 10.5;}
                if (strpos($extraOptions,"swimming") !== false) { $extraprice += 5.6;}
            }
            if ($roomtype == "classic") {$roomprice = 100;}
            else if ($roomtype == "grand") {$roomprice = 150;}
            else if ($roomtype == "deluxe") {$roomprice = 190;}
            else if ($roomtype == "master") {$roomprice = 250;}
            $totalcost = ($roomprice + $extraprice) * $partySize * $daysOfTravelling;
            $totalcost = sprintf('%.2f', $totalcost); //Get 2 digits after decimal 
        } else {
            $totalcost = 0;
        }
        //Store booking and errors into session storage
        storeBooking($firstname,$lastname,$email,$streetAddress,$suburb,$state,$postcode,$phonenum,$contact,$roomtype,$partySize,$daysOfTravelling,$extraOptions,$optionalFeatures,$totalcost,$comment,$cardtype,$cardname,$cardnumber,$expiry,$cvv);
        storeErrors($firstnameError,$lastnameError,$emailError,$addressError,$suburbError,$stateError,$postcodeError,$phonenumError,$contactError,$roomtypeError,$partySizeError,$daysOfTravellingError,$cardtypeError,$cardnameError,$cardnumberError,$expiryError,$cvvError);
        if ($result == false) { //If there is any error, the user will be sent to fix_order.php page
            $_SESSION["errors"] = array();
            $_SESSION["errors"] = $errors;
            header("location: fix_order.php");
        } else { //If there is no error, all input data will be inserted into the orders table
            /* Actually I have already calculated the total cost in this page above */
            $order_cost = $totalcost;
            $_SESSION["order_cost"] = $order_cost;
            require_once("settings.php");
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn) {
                echo "<p>Database connection failure</p>";
            } else {
                $sql_table="orders";
                $fieldDefinition="order_id INT AUTO_INCREMENT PRIMARY KEY, fname VARCHAR(25), lname VARCHAR(25), email VARCHAR(50), street_address VARCHAR(40), suburb VARCHAR(20), state VARCHAR(3), postcode INT(4) ZEROFILL, phone_num VARCHAR(10), contact VARCHAR(5), room_type VARCHAR(10),
                extra_options VARCHAR(20), optional_features VARCHAR(100), partysize INT(3), days_travelling INT(3), card_type VARCHAR(17), card_name VARCHAR(40), card_number VARCHAR(16), expiry_date VARCHAR(5), cvv INT(3) ZEROFILL ,comment VARCHAR(100), order_cost FLOAT(8,2), order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP, order_status VARCHAR(9)";

		    // check: if table does not exist, create it
		    $sqlString = "show tables like '$sql_table'";
		    $result = @mysqli_query($conn, $sqlString);
		    // checks if any tables of this name
		    if(mysqli_num_rows($result)==0) {
			    $sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";
			    $result2 = @mysqli_query($conn, $sqlString);
		    }
            //
		$query = "insert into $sql_table"
						."(fname, lname, email, street_address, suburb, state, postcode, phone_num, contact, room_type, extra_options, optional_features, partysize, days_travelling, card_type, card_name, card_number, expiry_date, cvv, comment, order_cost, order_status )"
					. " values "
						."('$firstname', '$lastname', '$email', '$streetAddress', '$suburb', '$state', '$postcode', '$phonenum', '$contact', '$roomtype', '$extraOptions', '$optionalFeatures', '$partySize', '$daysOfTravelling', '$cardtype', '$cardname', '$cardnumber', '$expiry', '$cvv', '$comment', '$order_cost', 'PENDING' )";
		$result = mysqli_query($conn, $query);
		mysqli_close($conn);
        header("location:receipt.php"); //After all, the user will be redirected to the receipt page
            }
        }
    }
?>

<?php 
    function stateMatchPostcode($state,$postcode) {
        $errMsg = "";
        switch($state) {
            case "VIC":
                if ($postcode[0]!=3 && $postcode[0]!=8) {
                    $errMsg = "VIC must have a postcode starting with 3 or 8.\n ";
                }
                break;
            case "NSW":
                if ($postcode[0]!=1 && $postcode[0]!=2) {
                   $errMsg = "NSW must have a postcode starting with 1 or 2.\n ";
                }
                break;
            case "QLD":
                if ($postcode[0]!=4 && $postcode[0]!=9) {
                    $errMsg = "QLD must have a postcode starting with 4 or 9.\n ";
                }
                break;
            case "NT":
                if ($postcode[0]!=0) {
                    $errMsg = "NT must have a postcode starting with 0.\n ";
                } 
                break;
            case "WA":
                if ($postcode[0]!=6) {
                    $errMsg = "WA must have a postcode starting with 6.\n";
                } 
                break;
            case "SA":
                if ($postcode[0]!=5) {
                    $errMsg = "SA must have a postcode starting with 5.\n";
                } 
                break;
            case "TAS":
                if ($postcode[0]!=7) {
                    $errMsg = "TAS must have a postcode starting with 7.\n ";
                }
                break;
            case "ACT":
                if ($postcode[0]!=0) {
                    $errMsg = "ACT must have a postcode starting with 0.\n ";
                }        
        }
        return $errMsg;
    }
?>
<?php 
    function checkCreditCard($cardtype, $cardnumber) {
        $message = "";
        $firstTwoNumber = substr($cardnumber,0,2); // get the first two number from the card number
    //Then checking the validation of the card number depends on selected card type
    switch($cardtype) {
        case "visa":
            if (strlen($cardnumber) != 16 || $cardnumber[0] != "4") {
                $message = "Visa card has 16 digits and starts with a 4.\n";
            }
            break;
        case "mastercard":
            if (strlen($cardnumber) != 16 || $firstTwoNumber < 51 || $firstTwoNumber >55) {
                $message = "MasterCard has 16 digits and starts with digits 51 through to 55.\n";
            }
            break;
        case "american_express":
            if (strlen($cardnumber) != 15 || ($firstTwoNumber != 34 && $firstTwoNumber != 37)) {
                $message = "American Express has 15 digits and starts with 34 or 37.\n";
            }
    }
    return $message;
    }
?>

<?php
    function storeBooking($firstname,$lastname,$email,$streetAddress,$suburb,$state,$postcode,$phonenum,$contact,$roomtype,$partySize,$daysOfTravelling,$extraOptions,$optionalFeatures,$totalcost,$comment,$cardtype,$cardname,$cardnumber,$expiry,$cvv) {
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["email"] = $email;
        $_SESSION["streetAddress"] = $streetAddress;
        $_SESSION["suburb"] = $suburb;
        $_SESSION["state"] = $state;
        $_SESSION["postcode"] = $postcode;
        $_SESSION["phonenum"] = $phonenum;
        $_SESSION["contact"] = $contact;
        $_SESSION["roomtype"] = $roomtype;
        $_SESSION["partySize"] = $partySize;
        $_SESSION["daysOfTravelling"] = $daysOfTravelling;
        $_SESSION["extraOptions"] = $extraOptions;
        $_SESSION["optionalFeatures"] = $optionalFeatures;
        $_SESSION["totalcost"] = $totalcost;
        $_SESSION["comment"] = $comment;
        $_SESSION["cardtype"] = $cardtype;
        $_SESSION["cardname"] = $cardname;
        $_SESSION["cardnumber"] = $cardnumber;
        $_SESSION["expiry"] = $expiry;
        $_SESSION["cvv"] = $cvv;
        
    }
?>
<?php
    function storeErrors($firstnameError,$lastnameError,$emailError,$addressError,$suburbError,$stateError,$postcodeError,$phonenumError,$contactError,$roomtypeError,$partySizeError,$daysOfTravellingError,$cardtypeError,$cardnameError,$cardnumberError,$expiryError,$cvvError) {
        $_SESSION["firstnameError"] = $firstnameError;
        $_SESSION["lastnameError"] = $lastnameError;
        $_SESSION["emailError"] = $emailError;
        $_SESSION["addressError"] = $addressError;
        $_SESSION["suburbError"] = $suburbError;
        $_SESSION["stateError"] = $stateError;
        $_SESSION["postcodeError"] = $postcodeError;
        $_SESSION["phonenumError"] = $phonenumError;
        $_SESSION["contactErrorr"] = $contactError;
        $_SESSION["roomtypeError"] = $roomtypeError;
        $_SESSION["partySizeError"] = $partySizeError;
        $_SESSION["daysOfTravellingError"] = $daysOfTravellingError;
        $_SESSION["cardtypeError"] = $cardtypeError;
        $_SESSION["cardnameError"] = $cardnameError;
        $_SESSION["cardnumberError"] = $cardnumberError;
        $_SESSION["expiryError"] = $expiryError;
        $_SESSION["cvvError"] = $cvvError;
    }
?>
