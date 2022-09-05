<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Fixing form"/>
    <meta name = "keyword" content="Fixing Orders, Booking"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Fixing Orders</title>
    <link rel="stylesheet" href = "styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>
<body>
    <div id="pages" class="all_but_footer">
        <?php
            include("header.inc");
        ?>
        <?php
            include("menu.inc");
        ?>
        <section>
            <h1 id="heading">Fixing Orders</h1>
        <?php
            session_start();  
            if (!isset($_SESSION["errors"]) ) { /* if the user go to this page directly through URL, then the errors havent been set ( or this means the data hasnt been processed in the process_order.php page) then user will be redirected to enquire.php) */
                header ("location: enquire.php");
            } else {
                /* Get all the infomation of the customer, product, payment details and errors stored in the session by process_order page */
                $firstname = $_SESSION["firstname"];
                $lastname = $_SESSION["lastname"];
                $email =  $_SESSION["email"];
                $streetAddress = $_SESSION["streetAddress"];
                $suburb = $_SESSION["suburb"];
                $state = $_SESSION["state"];
                $postcode = $_SESSION["postcode"];
                $phonenum = $_SESSION["phonenum"];
                $contact = $_SESSION["contact"];
                $roomtype = $_SESSION["roomtype"]; 
                $partySize = $_SESSION["partySize"];
                $daysOfTravelling = $_SESSION["daysOfTravelling"];
                $extraOptions = $_SESSION["extraOptions"];
                $optionalFeatures = $_SESSION["optionalFeatures"];
                $totalcost = $_SESSION["totalcost"];
                $comment = $_SESSION["comment"];
                $cardtype = $_SESSION["cardtype"];
                $cardname = $_SESSION["cardname"];
                $cardnumber = $_SESSION["cardnumber"];
                $expiry = $_SESSION["expiry"];
                $cvv = $_SESSION["cvv"];
                $errors = $_SESSION["errors"];
                $firstnameError = $_SESSION["firstnameError"];
                $lastnameError = $_SESSION["lastnameError"];
                $emailError = $_SESSION["emailError"];
                $addressError = $_SESSION["addressError"];
                $suburbError = $_SESSION["suburbError"];
                $stateError = $_SESSION["stateError"];
                $postcodeError = $_SESSION["postcodeError"];
                $phonenumError = $_SESSION["phonenumError"];
                $contactError = $_SESSION["contactErrorr"];
                $roomtypeError = $_SESSION["roomtypeError"];
                $partySizeError = $_SESSION["partySizeError"];
                $daysOfTravellingError = $_SESSION["daysOfTravellingError"];
                $cardtypeError = $_SESSION["cardtypeError"];
                $cardnameError = $_SESSION["cardnameError"];
                $cardnumberError = $_SESSION["cardnumberError"];
                $expiryError = $_SESSION["expiryError"];
                $cvvError = $_SESSION["cvvError"];
            }
        ?>
        <!-- Displayed data and errors in form -->
        <form action='process_order.php' method='post' id='bookingform' novalidate='novalidate'>
            <fieldset>
                <legend>Your booking</legend>
                <p>
                <label for ='fname'>First Name<span class='require'>&#9733;</span> :</label>
                <input id='fname' type='text' name='first_name' value='<?php echo $firstname; ?>'/>
                </p>
                <?php 
                /* If there is any errors => display them */
                if ($errors["firstname"]) {
                    echo "<p class='error'>$firstnameError</p>";
                }
                ?>
                <p>
                <label for ='lname'>Last Name<span class='require'>&#9733;</span> :</label>
                <input id='lname' type='text' name='last_name' value='<?php echo $lastname; ?>'/>
                </p>
                <?php 
                if ($errors["lastname"]) {
                    echo "<p class='error'>$lastnameError</p>";
                }
                ?>
                <p>
                <label for ='email'>Email address<span class='require'>&#9733;</span> :</label>
                <input id='email' type='text' name='email' value='<?php echo $email; ?>'/>
                </p>
                <?php
                if ($errors['email']) {
                    echo "<p class='error'>$emailError</p>";
                }
                ?>
                <p>
                <label for ='street_address'>Street Address <span class='require'>&#9733;</span> :</label>
                <input id='street_address' type='text' name='street_address' value='<?php echo $streetAddress; ?>' />
                </p>
                <?php
                if ($errors['streetAddress']) {
                    echo "<p class='error'>$addressError</p>";
                }
                ?>
                <p>
                <label for ='suburb'>Suburb/Town <span class='require'>&#9733;</span> :</label>
                <input id='suburb' type='text' name='suburb' value='<?php echo $suburb; ?>'/>
                </p>
                <?php
                if ($errors['suburb']) {
                    echo "<p class='error'>$suburbError</p>";
                }
                ?>
                <p>
                <label for = 'state'>State <span class='require'>&#9733;</span> :</label>
                <select id='state' name='state'>
                    <option value='' <?php if ($state == "") {echo "selected='selected'";} ?>>Please Select</option>
                    <option value='VIC' <?php if ($state == "VIC") {echo "selected='selected'";} ?>>VIC</option>
                    <option value='NSW' <?php if ($state == "NSW") {echo "selected='selected'";} ?>>NSW</option>
                    <option value='QLD' <?php if ($state == "QLD") {echo "selected='selected'";} ?>>QLD</option>
                    <option value='NT' <?php if ($state == "NT") {echo "selected='selected'";} ?>>NT</option>
                    <option value='WA' <?php if ($state == "WA") {echo "selected='selected'";} ?>>WA</option>
                    <option value='SA' <?php if ($state == "SA") {echo "selected='selected'";} ?>>SA</option>
                    <option value='TAS' <?php if ($state == "TAS") {echo "selected='selected'";} ?>>TAS</option>
                    <option value='ACT' <?php if ($state == "ACT") {echo "selected='selected'";} ?>>ACT</option>
                </select>
                </p>
                <?php if ($errors['state']) {
                    echo "<p class='error'>$stateError</p>";
                }
                ?>
                <p>
                <label for ='postcode'>Postcode <span class='require'>&#9733;</span> :</label>
                <input id='postcode' type='text' name='postcode' value='<?php echo $postcode; ?>'/>
                </p>
                <?php
                if ($errors['postcode']) {
                    echo "<p class='error'>$postcodeError</p>";
                }
                ?>
                <p>
                <label for ='phone_num'>Phone Number <span class='require'>&#9733;</span> :</label>
                <input id='phone_num' type='text' name='phone_num' value='<?php echo $phonenum; ?>'/>
                </p>
                <?php
                if ($errors['phonenum']) {
                    echo "<p class='error'>$phonenumError</p>";
                }
                ?>
                <div class="sentence">Preferred contact <span class="require">&#9733;</span> :</div>
                <p>
                <input id="emailcontact" type="radio" name="contact" value="email" <?php if ($contact == "email") {echo "checked";} ?>/>
                <label for="emailcontact">Email</label><br/>
                <input id="post_contact" type="radio" name="contact" value="post" <?php if ($contact == "post") {echo "checked";} ?> />
                <label for="post_contact">Post </label><br/>
                <input id="phone_contact" type="radio" name="contact" value="phone" <?php if ($contact == "phone") {echo "checked";} ?> />
                <label for="phone_contact">Phone</label><br/>
                </p>
                <?php
                if ($errors['contact']) {
                    echo "<p class='error'>$contactError</p>";
                }
                ?>
                <fieldset>
                <legend class = "sentence">Room Selection <span class="require">&#9733;</span>:</legend>
                <p>
                    <input id="classic_price" type="radio" name="room_type" value="classic" <?php if ($roomtype == "classic") {echo "checked";} ?>>
                    <label for="classic_price">Classic Room ($100)</label>
                </p>
                <p>
                    <input id="grand_price" type="radio" name="room_type" value="grand" <?php if ($roomtype == "grand") {echo "checked";} ?>>
                    <label for="grand_price">Grand Room ($150)</label>
                </p>
                <p>
                    <input id="deluxe_price" type="radio" name="room_type" value="deluxe" <?php if ($roomtype == "deluxe") {echo "checked";} ?>>
                    <label for="deluxe_price">Deluxe Room ($190)</label>
                </p>
                <p>
                    <input id="master_price" type="radio" name="room_type" value="master" <?php if ($roomtype == "master") {echo "checked";} ?>>
                    <label for="master_price">Master Room ($250)</label>
                </p>
                <?php
                if ($errors['roomtype']) {
                    echo "<p class='error'>$roomtypeError</p>";
                }
                ?>
                </fieldset>
                <fieldset id = "extra_options">
                    <legend>Extra options</legend>
                    <p>
                        <input id ="breakfast" type="checkbox" name="extra_options[]" value="breakfast"  <?php if(strpos($extraOptions, "breakfast") !== false) {echo "checked";} ?>>
                        <label for="breakfast">Breakfast (+10.5$)</label>
                    </p>
                    <p>
                        <input id ="swimming" type="checkbox" name="extra_options[]" value="swimming" <?php if(strpos($extraOptions, "swimming") !== false) {echo "checked";} ?> >
                        <label for="swimming">Go To Swim (+5.6$)</label>
                    </p>
                </fieldset>
                <div class="sentence"><strong>In-room Features:</strong></div>
                <p>
                    <input id="wifi" type="checkbox" name="optional_features[]" value="wifi" <?php if(strpos($optionalFeatures, "wifi") !== false) {echo "checked";} ?>/>
                    <label for ="wifi">In-room Wifi</label>
                </p>
                <p>
                    <input id="concierge" type="checkbox" name="optional_features[]" value="concierge" <?php if(strpos($optionalFeatures, "concierge") !== false) {echo "checked";} ?>/>
                    <label for ="concierge">Visual concierge</label>
                </p>
                <p>
                    <input id="charging" type="checkbox" name="optional_features[]" value="charging" <?php if(strpos($optionalFeatures, "charging") !== false) {echo "checked";} ?>/>
                    <label for ="charging">Inductive charging</label>
                </p>
                <p>
                    <input id="fitness" type="checkbox" name="optional_features[]" value="free-fitness" <?php if(strpos($optionalFeatures, "free-fitness") !== false) {echo "checked";} ?>/>
                    <label for ="fitness">24-hour fitness center</label>
                </p>
                <p>
                    <input id="champagne" type="checkbox" name="optional_features[]" value="champagne" <?php if(strpos($optionalFeatures, "champagne") !== false) {echo "checked";} ?>/>
                    <label for ="champagne">Free champagne</label>
                </p>
                    <p>
                    <label for ='number_of_beings'>Number of beings <span class='require'>&#9733;</span> :</label>
                    <input id='number_of_beings' type='text' name='number_of_beings' value='<?php echo $partySize; ?>'/>
                    </p>
                <?php
                if ($errors['partySize']) {
                    echo "<p class='error'>$partySizeError</p>";
                }
                ?>
                <p>
                <label for ='days_of_travelling'>Days of Travelling <span class='require'>&#9733;</span> :</label>
                <input id='days_of_travelling' type='text' name='days_of_travelling' value='<?php echo $daysOfTravelling; ?>'/>
                </p>
                <?php
                if ($errors['daysOfTravelling']) {
                    echo "<p class='error'>$daysOfTravellingError</p>";
                }
                ?>
                <label for="total_cost"><strong>Total Cost:</strong></label>
                <input id="total_cost" type="text" name="total_cost" value="<?php echo $totalcost;?>"/>
                <p>
                <label for="comment">What is your particular interest about the hotel?</label>
                <textarea id="comment" name="comment" placeholder="I'd love to ..." rows="10" cols="30"><?php echo $comment; ?></textarea> <br/>
                </p>
                <fieldset>
                <legend>Credit Card Payment Details</legend>
                <div id='card_type'>Please Select a Credit Card Type <span class='require'>&#9733;</span>:
                    <p>
                    <input id='visa' type='radio' name='credit_type' value='visa'/>
                    <label for='visa'>Visa</label>
                    </p>
                    <p>
                    <input id='mastercard' type='radio' name='credit_type' value='mastercard'/>
                    <label for='mastercard'>Master Card</label>
                    </p>
                    <p>
                    <input id='american_express' type='radio' name='credit_type' value='american_express'/>
                    <label for='american_express'>American Express</label>
                    </p>
                    <?php
                    if ($errors['cardtype']) {
                        echo "<p class='error'>$cardtypeError</p>";
                    }
                    ?>
                </div>
                <p>
                    <label for='card_name'>Credit Card Name <span class='require'>&#9733;</span> :</label> 
                    <input type='text' id='card_name' name='card_name'/> <!-- If there isnt any error for the card name, then will still keep the value (the user dont need to enter again)-->
                </p>
                <?php
                if ($errors['cardname']) {
                    echo "<p class='error'>$cardnameError</p>";
                }
                ?>
                <p>
                    <label for='card_number'>Credit Card Number <span class='require'>&#9733;</span> :</label>
                    <input type='text' id='card_number' name='card_number'/>
                </p>
                <?php
                if ($errors['cardnumber']) {
                    echo "<p class='error'>$cardnumberError</p>";
                }
                ?>
                <p>
                    <label for='expiry_date'>Expiry Date <span class='require'>&#9733;</span> :</label>
                    <input type='text' id='expiry_date' name='expiry_date'/>
                </p>
                <?php
                if ($errors['expiry']) {
                    echo "<p class='error'>$expiryError</p>";
                }
                ?>
                <p>
                <label for='cvv'>Card verification value <span class='require'>&#9733;</span> :</label>
                <input type='text' id='cvv' name='cvv'/>
                </p>
                <?php
                if ($errors['cvv']) {
                    echo "<p class='error'>$cvvError</p>";
                }
                ?>
                </fieldset>
            </fieldset>
            <input type='submit' name = 'submit' value='Check Out' class='button'/>
            <button type='button' id='cancelbutton' class='button'>Cancel Order</button>
        </form>
        <hr id='break'/>
        </section>
    </div>
    <?php 
        include("footer.inc");
    ?>
    <?php
        unset($_SESSION["errors"]); /*Unset the errors stored in the session after all infomaton is displayed */
    ?>
</body>
</html>