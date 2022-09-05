<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name = "Description" content ="Enhancement 2 webpage"/>
        <meta name = "keyword" content="Hotel, Booking, Vietnam,Enhancement2"/>
        <meta name = "author" content ="Vu Thien Tri Phan"/>
        <title>Enhancement 2 webpage</title>
        <link rel="stylesheet" href = "styles/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
        <script src="scripts/part2.js"></script>
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
                <h1 id="heading">JAVASCRIPT ENHANCEMENTS OF THE WEBSITE</h1>
            <ol id="enhancements">
                <li class="list">  Implementing a count-down timer
                    <ul class="describe-enhancement">
                        <li>When the customers have already and correctly filled in the form on enquire.html page and clicked on <strong>Pay Now</strong> button,
                            the count-down timer, with 7 minutes last, will appear on payment.html page.</li>
                        <li>In this enhancement, I use the <strong>remainingSeconds variable (which is set at 420 seconds)</strong> and 2 keys method that are <strong>setInterval() and clearInterval()</strong>. After 1000 milliseconds (1 second) the <strong>setInterval()</strong> method 
                            will call the <strong>limitedTime() function</strong>, which calculate the remaining seconds and remaining minutes and print these out.</li>
                        <li>When a remaining seconds reach 0, the <strong>clearInterval()</strong> will be called so that the browser redirects to the home page.</li>
                        <li>This is the link to where I have applied that enhancement to my website: <a href="payment.html#minutes"><strong>Count-down Timer</strong></a> (but you have to fill in the form on enquire.html first).</li>
                        <li>I have learnt and edited the code base on this StackOverFlow page:<a href="https://stackoverflow.com/questions/5517597/plain-count-up-timer-in-javascript"><strong>Plain count up timer in javascript.</strong></a></li>
                    </ul>
                </li>
                <li class="list"> Disabling the ability to select the optional features according to the type of Room Selection
                    <ul class="describe-enhancement">
                        <li>When the customers have selected the <strong>Room Type</strong> in Price Details fieldset on Equiry Page, some <strong>Optional Features</strong> might be restricted base on which type of room they have chosen.</li>
                        <li>In this enhancement, I used onclick event because when the type of room has been clicked (selected), the <strong>checkOptionalFeatures() function</strong> will be called. In that function, the optional features, that are not provided, will turn to be <strong>disabled</strong>.
                            For instance, when the customers select "Classic Room", they wont be able to check on "TV Screen", "24-hour fitness center" and "Free champagne" checkboxes. </li>
                        <li>This is the link to where I have applied that enhancement to my website: <a href="enquire.html#price_details"><strong>Price Details Fieldset</strong></a> (Please select the type of room first).</li>
                        <li>I have learnt and edited the code base on this webpage:<a href="https://thisinterestsme.com/disable-text-field-javascript/#:~:text=Disabling%20the%20input%20field%20with%20regular%20JavaScript.&text=getElementById(%22name%22).,its%20disabled%20attribute%20to%20true."><strong>Disable an input text field using JavaScript.</strong></a></li>
                    </ul>
                </li>
            </ol>
            <hr id="break"/>
            </section>
        </div>   
        <?php 
            include("footer.inc");
        ?>
    </body>
</html>