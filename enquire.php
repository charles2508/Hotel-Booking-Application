<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Enquiry form"/>
    <meta name = "keyword" content="Hotel, Booking, Vietnam, Enquiry"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>User's Enquiry</title>
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
            <h1 id="heading1">PRODUCT ENQUIRY FORM</h1>
        <!--Some below span elements with class="require" demonstrate that these input fields are attached with star symbol to indicate that these have to be filled in -->
        <form action="payment.php" method="post" id="form" novalidate="novalidate">
            <p>
                <label for ="fname">First Name <span class="require">&#9733;</span> :</label>
                <input id="fname" type="text" name="fname" maxlength="25" pattern="[A-Za-z]*" required="required"/>
            </p>
            <p>
                <label for ="lname">Last Name <span class="require">&#9733;</span> :</label>
                <input id="lname" type="text" name="lname" maxlength="25" pattern="[A-Za-z]*" required="required"/>
            </p>
            <p>
                <label for ="email">Email Address <span class="require">&#9733;</span> :</label>
                <input id="email" type="email" name="email" required="required" />
            </p>
            <fieldset>
                <legend>Address</legend>
                <p>
                    <label for = "street_address">Street Address <span class="require">&#9733;</span> :</label>
                    <input id ="street_address" type ="text" name ="street_address" maxlength="40" required="required">
                </p>
                <p>
                    <label for = "suburb">Suburb/Town <span class="require">&#9733;</span> :</label>
                    <input id ="suburb" type ="text" name="Suburb/Town" maxlength="20" required="required">
                </p>
                <p>
                    <label for = "state">State <span class="require">&#9733;</span> :</label>
                    <select id="state" name="state">
                        <option value="">Please Select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </p>
                <p>
                    <label for = "postcode">Postcode <span class="require">&#9733;</span> :</label>
                    <input type="text" id="postcode" name="Postcode" pattern="\d{4}" maxlength="4" required="required"/>
                </p>
            </fieldset>
            <p>
                <label for="phone_num">Phone Number <span class="require">&#9733;</span> :</label>
                <input id="phone_num" name="phone_num" type="text" maxlength="10" pattern="\d{10}" placeholder="##########" required="required"/>
            </p>
            <div class="sentence">Preferred contact <span class="require">&#9733;</span> :</div>
            <p>
            <input id="emailcontact" type="radio" name="contact" value="email" required="required"/>
            <label for="emailcontact">Email</label><br/>
            <input id="post_contact" type="radio" name="contact" value="post" />
            <label for="post_contact">Post </label><br/>
            <input id="phone_contact" type="radio" name="contact" value="phone" />
            <label for="phone_contact">Phone</label><br/>
            </p>
            <fieldset id="price_details">
                <legend>Price Details </legend>
                <div class = "sentence">Room Selection <span class="require">&#9733;</span>:</div>
                <p>
                    <input id="classic_price" type="radio" name="prices_per_day" value="100$">
                    <label for="classic_price">100$ per night for a person for Classic Room</label>
                </p>
                <p>
                    <input id="grand_price" type="radio" name="prices_per_day" value="150$">
                    <label for="grand_price">150$ per night for a person for Grand Room</label>
                </p>
                <p>
                    <input id="deluxe_price" type="radio" name="prices_per_day" value="190$">
                    <label for="deluxe_price">190$ per night for a person for Deluxe Room</label>
                </p>
                <p>
                    <input id="master_price" type="radio" name="prices_per_day" value="250$">
                    <label for="master_price">250$ per night for a person for Master Room</label>
                </p>
                <fieldset id = "extra_options">
                    <legend>Extra options</legend>
                    <p>
                        <input id ="breakfast" type="checkbox" name="extra_options[]" value="breakfast" >
                        <label for="breakfast">Breakfast (+10.5$)</label>
                    </p>
                    <p>
                        <input id ="swimming" type="checkbox" name="extra_options[]" value="swimming" >
                        <label for="swimming">Go To Swim (+5.6$)</label>
                    </p>
                </fieldset>
                <p>
                    <label for="partySize">Number of Beings <span class="require">&#9733;</span> :</label>
                    <input type="text" id="partySize" name="number_of_beings" maxlength="3" size="2"/>
                </p>
                <p>
                    <label for="days_of_travelling">Days of Travelling <span class="require">&#9733;</span> :</label>
                    <input type="text" id="days_of_travelling" name="days_of_travelling" maxlength="3" size="2"/>
                </p>
            </fieldset>
            <div class="sentence"><strong>In-room Features:</strong></div>
            <p>
                <input id="wifi" type="checkbox" name="features[]" value="Wifi"/>
                <label for ="wifi">In-room Wifi</label>
            </p>
            <p>
                <input id="concierge" type="checkbox" name="features[]" value="visual concierge"/>
                <label for ="concierge">Visual concierge</label>
            </p>
            <p>
                <input id="charging" type="checkbox" name="features[]" value="inductive charging"/>
                <label for ="charging">Inductive charging</label>
            </p>
            <p>
                <input id="fitness" type="checkbox" name="features[]" value="fitness_center"/>
                <label for ="fitness">24-hour fitness center</label>
            </p>
            <p>
                <input id="champagne" type="checkbox" name="features[]" value="champagne"/>
                <label for ="champagne">Free champagne</label>
            </p>
            <label for="comment">What is your particular interest about the hotel?</label>
            <textarea id="comment" name="comment" placeholder="I'd love to ..." rows="10" cols="30"></textarea> <br/>
            <p>
                <input class="button" type="submit" value="Pay Now"/>
                <input class="button" type="reset" value="Reset"/>
            </p>
        </form>
        <hr id="break" />
        </section>
    </div>
    <?php
        include('footer.inc');
    ?>
</body>
</html>