<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Booking form"/>
    <meta name = "keyword" content="Hotel, Booking, Vietnam, Booking"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Payment details</title>
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
            <h1 id="heading">BOOKING CONFIRMATION</h1>
        <div id="minutes">7</div>:<div id="seconds">00</div> <!--This one is set for a timer-->
        <div id="timeleft"></div>
        <form action="process_order.php" method="post" id="bookingform" novalidate="novalidate">
            <fieldset id="confirmation">
                <legend>Your booking</legend>
                <!--These below p elements are used to display read-only data from session storage-->
                <p>Your name: <span id="confirm_name"></span></p> <!--Combine first name and last name-->
                <p>Email address: <span id="confirm_email"></span></p>
                <p>Home address: <span id="confirm_address"></span></p><!--Combine Street Address and Suburb-->
                <p>State: <span id="confirm_state"></span></p>
                <p>Postcode: <span id="confirm_postcode"></span></p> 
                <p>Phone Number: <span id="confirm_phone_number"></span></p>
                <p>Preferred contact: <span id="confirm_contact"></span></p>
                <p>Room Type: <span id="confirm_room_type"></span></p>
                <p>Extra Options: <span id="confirm_extra_options"></span></p>
                <p>Optional Features: <span id="confirm_optional_features"></span></p>
                <p>Number of beings: <span id="confirm_partySize"></span></p>
                <p>Days of Travelling: <span id="confirm_days_of_travelling"></span></p>
                <p><strong>Total Cost: </strong><span id="confirm_cost"></span></p>
                <p>Comment: <span id="confirm_comment"></span></p>
                <!--These below hidden input elements are used to store value from session storage and then send to the server side-->
                <input type="hidden" name="first_name" id="first_name"/>
                <input type="hidden" name="last_name" id="last_name"/>
                <input type="hidden" name="email" id="email"/>
                <input type="hidden" name="street_address" id="street_address"/>
                <input type="hidden" name="suburb" id="suburb"/>
                <input type="hidden" name="state" id="state"/>
                <input type="hidden" name="postcode" id="postcode"/>
                <input type="hidden" name="phone_num" id="phone_num"/>
                <input type="hidden" name="contact" id="contact"/>
                <input type="hidden" name="room_type" id="room_type"/>
                <input type="hidden" name="extra_options" id="extra_options"/>
                <input type="hidden" name="optional_features" id="optional_features"/>
                <input type="hidden" name="number_of_beings" id="partySize"/>
                <input type="hidden" name="days_of_travelling" id="days_of_travelling"/>
                <input type="hidden" name="total_cost" id="total_cost"/>
                <input type="hidden" name="comment" id="comment"/>
                <fieldset>
                    <legend>Credit Card Payment Details</legend>
                    <div id="card_type">Please Select a Credit Card Type <span class="require">&#9733;</span>:
                        <p>
                            <input id="visa" type="radio" name="credit_type" value="visa"/>
                            <label for="visa">Visa</label>
                        </p>
                        <p>
                            <input id="mastercard" type="radio" name="credit_type" value="mastercard"/>
                            <label for="mastercard">Master Card</label>
                        </p>
                        <p>
                            <input id="american_express" type="radio" name="credit_type" value="american_express"/>
                            <label for="american_express">American Express</label>
                        </p>
                    </div>
                    <p>
                        <label for="card_name">Credit Card Name <span class="require">&#9733;</span> :</label>
                        <input type="text" id="card_name" name="card_name"/>
                    </p>
                    <p>
                        <label for="card_number">Credit Card Number <span class="require">&#9733;</span> :</label>
                        <input type="text" id="card_number" name="card_number"/>
                    </p>
                    <p>
                        <label for="expiry_date">Expiry Date <span class="require">&#9733;</span> :</label>
                        <input type="text" id="expiry_date" name="expiry_date" pattern="\d{2}-\d{2}" placeholder="mm-yy" maxlength="5" size="5" required="required"/>
                    </p>
                    <p>
                        <label for="cvv">Card verification value <span class="require">&#9733;</span> :</label>
                        <input type="text" id="cvv" name="cvv" maxlength="3" size="3" placeholder="xxx" pattern="\d{3}" required = "required"/>
                    </p>
                </fieldset>
            </fieldset>
            <input type="submit" name="submit" value="Check Out" class="button"/>
            <button type="button" id="cancelbutton" class="button">Cancel Order</button>
        </form>
        <hr id="break" />
        </section>
    </div>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>