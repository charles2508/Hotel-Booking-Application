"use strict";
// enquire.php page
var debug = false; // Intialize the variable in order to novalidate the form in javascript
function validate() {
    var errMsg = "";
    var result = true;
    //enquire.php validation
    var classicPrice = document.getElementById("classic_price").checked;
    var grandPrice = document.getElementById("grand_price").checked;
    var deluxePrice = document.getElementById("deluxe_price").checked;
    var masterPrice = document.getElementById("master_price").checked;
    //figure out the name of the room type from the input
    var roomType ="";
    if (classicPrice) {
        roomType = "classic"; //If classic room are checked, then roomType is assigned with "classic"
    }
    else if (grandPrice) {
        roomType = "grand"; //If grand room are checked, then roomType is assigned with "grand"
    }
    else if (deluxePrice) {
        roomType = "deluxe"; //If deluxe room are checked, then roomType is assigned with "deluxe"
    }
    else if (masterPrice) {
        roomType = "master"; //If master room are checked, then roomType is assigned with "master"
    }

    var breakfast = document.getElementById("breakfast").checked;
    var swimming = document.getElementById("swimming").checked;
    var extraOptions = "nothing";
    // Figure out the extra options from the input
    if (breakfast) {
        extraOptions = "breakfast"; 
    }
    if (!breakfast && swimming) { //If breakfast isn't ticked, then the extra options is just ="swimming"
        extraOptions = "swimming";
    } else if (breakfast && swimming) {
        extraOptions += ", swimming"; //If both the breakfast and swimming are ticked, the extra options will be ="breakfast, swimming" 
    }
    var extraPrice = 0;
    if (extraOptions != "nothing") {
        extraPrice = getExtraPrice(extraOptions); //get the extra price after getting extra options
    }

    var days_of_travelling = document.getElementById("days_of_travelling").value;     
    var partySize = document.getElementById("partySize").value; 
    var state = document.getElementById("state").value;
    var postcode = document.getElementById("postcode").value;

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var streetAddress = document.getElementById("street_address").value;
    var suburb = document.getElementById("suburb").value;
    var phoneNum = document.getElementById("phone_num").value;
    var emailContact = document.getElementById("emailcontact").checked;
    var postContact = document.getElementById("post_contact").checked;
    var phoneContact = document.getElementById("phone_contact").checked;
    var preferredContact =""; 
    // Figure out the preferred contact from the input
    if (emailContact) { 
        preferredContact = "email";
    }
    else if(postContact) {
        preferredContact = "post";
    }
    else if(phoneContact) {
        preferredContact = "phone";
    }
    var wifi = document.getElementById("wifi").checked;
    var concierge = document.getElementById("concierge").checked;
    var charging = document.getElementById("charging").checked;
    var fitness = document.getElementById("fitness").checked;
    var champagne = document.getElementById("champagne").checked;
    var optionalFeatures = "";
    optionalFeatures = getOptionalFeatures(wifi,concierge,charging,fitness,champagne); //this function will figure out the preferred contact value from the input by passing all of the checkbox-value
    if (roomType != "") {
        var roomPrice = getRoomPrice(roomType); // After getting the room type, we will get the price of each room
    } else {
        var roomPrice = 0; //If the roomType can not be found, the result will be false
    }
    var partySize = document.getElementById("partySize").value;
    var days_of_travelling = document.getElementById("days_of_travelling").value;
    var comment = document.getElementById("comment").value;
    if (debug) {
        if (!(classicPrice || grandPrice || deluxePrice || masterPrice)) { //If none of the room Type are checked, then it will be a alert message
            errMsg += "You must choose the type of room to stay.\n";
            result = false;
        }
        if ( !days_of_travelling.match(/^[0-9]{1,3}$/)) { //if days of travelling is not an positve integer=> result = false
            errMsg += "The days of travelling must be filled in with a positive integer.\n";
            result = false; 
        }
        if ( !partySize.match(/^[0-9]{1,3}$/)) {  //if party size is not an positve integer=> result = false
            errMsg += "The number of beings must be filled in with a positive integer.\n";
            result = false;
        }
        var message = stateMatchPostcode(state,postcode); //Check whether the state match with the postcode or not
        if (message !="") {
        errMsg += message;
        result = false;
        }
    }
    if (errMsg !="") {
        alert(errMsg);
    }
    //If result is true, all of the input fields (value) will then be stored on session storage
    if (result) {
        storeBooking(fname,lname,email,streetAddress,suburb,state,postcode,phoneNum,preferredContact,optionalFeatures,roomType,roomPrice,extraOptions,extraPrice,partySize,days_of_travelling,comment);
    }
    return result;
}
// Get the optional features value from the user's input
function getOptionalFeatures (wifi,concierge,charging,fitness,champagne) {
    var optionalFeatures = "";
    if (wifi) {
        optionalFeatures = "wifi";
    }
    //the reasons why I divide each checkbox value into 2 condition statements is that I want to make the string value stored on database as clear as possible
    if ((wifi) && concierge) {
        optionalFeatures += ", concierge";
    } else if (!wifi && concierge) {
        optionalFeatures = "concierge";
    }
    if ((wifi || concierge) && charging) {
        optionalFeatures += ", charging";
    } else if (!wifi && !concierge && charging) {
        optionalFeatures = "charging";
    }
    if ((wifi || concierge || charging) && fitness) {
        optionalFeatures += ", free-fitness";
    } else if (!wifi && !concierge && !charging && fitness) {
        optionalFeatures = "free-fitness";
    }
    if ((wifi || concierge || charging || fitness) && champagne) {
        optionalFeatures += ", champagne";
    } else if (!wifi && !concierge && !charging && !fitness && champagne) {
        optionalFeatures = "champagne";
    }
    return optionalFeatures;
}
// get room price by checking the room type string value
function getRoomPrice(roomType) {
    var roomPrice = 0;
    if (roomType.search("classic") != -1) roomPrice = 100.0; //If room type string has the word "classic" in it, the room price would be 100.0 dollars
    if (roomType.search("grand") != -1) roomPrice = 150.0; //If room type string has the word "classic" in it, the room price would be 100.0 dollars
    if (roomType.search("deluxe") != -1) roomPrice = 190.0; //If room type string has the word "classic" in it, the room price would be 100.0 dollars
    if (roomType.search("master") != -1) roomPrice = 250.0; //If room type string has the word "classic" in it, the room price would be 100.0 dollars
    return roomPrice;
}
//get extra price by checking the extra options string value
function getExtraPrice(extraOptions) {
    var extraPrice = 0;
    if (extraOptions.search("breakfast") != -1) extraPrice = 10.5; //Similar as the above function
    if (extraOptions.search("swimming") != -1) extraPrice += 5.6;
    return extraPrice;
}
//checking whether the state matches with the postcode
function stateMatchPostcode(state,postcode) {
    var errMsg = "";
    //It will first check the value of the state, and then check the first character of the postcode by using postcode.charAt(0)
    switch(state) {
        case "VIC":
            if (postcode.charAt(0)!=3 && postcode.charAt(0)!=8) {
                errMsg = "VIC must have a postcode starting with 3 or 8.\n ";
            }
            break;
        case "NSW":
            if (postcode.charAt(0)!=1 && postcode.charAt(0)!=2) {
                errMsg = "NSW must have a postcode starting with 1 or 2.\n ";
            }
            break;
        case "QLD":
            if (postcode.charAt(0)!=4 && postcode.charAt(0)!=9) {
                errMsg = "QLD must have a postcode starting with 4 or 9.\n ";
            }
            break;
        case "NT":
            if (postcode.charAt(0)!=0) {
                errMsg = "NT must have a postcode starting with 0.\n ";
            } 
            break;
        case "WA":
            if (postcode.charAt(0)!=6) {
                errMsg = "WA must have a postcode starting with 6.\n";
            } 
            break;
        case "SA":
            if (postcode.charAt(0)!=5) {
                errMsg = "SA must have a postcode starting with 5.\n";
            } 
            break;
        case "TAS":
            if (postcode.charAt(0)!=7) {
                errMsg = "TAS must have a postcode starting with 7.\n ";
            }
            break;
        case "ACT":
            if (postcode.charAt(0)!=0) {
                errMsg = "ACT must have a postcode starting with 0.\n ";
            }        
    }
    return errMsg;
}
//Storing the booking by using session storage with syntax : sessionStorage.key = value
function storeBooking (fname,lname,email,streetAddress,suburb,state,postcode,phoneNum,preferredContact,optionalFeatures,roomType,roomPrice,extraOptions,extraPrice,partySize,days_of_travelling,comment) {
    sessionStorage.fname = fname;
    sessionStorage.lname = lname;
    sessionStorage.email = email;
    sessionStorage.streetAddress = streetAddress;
    sessionStorage.suburb = suburb;
    sessionStorage.state = state;
    sessionStorage.postcode = postcode;
    sessionStorage.phoneNum = phoneNum;
    sessionStorage.preferredContact = preferredContact;
    sessionStorage.optionalFeatures = optionalFeatures;
    sessionStorage.roomType = roomType;
    sessionStorage.roomPrice = roomPrice;
    sessionStorage.extraOptions = extraOptions;
    sessionStorage.extraPrice = extraPrice;
    sessionStorage.partySize = partySize;
    sessionStorage.days_of_travelling = days_of_travelling;
    sessionStorage.comment = comment;
}

// payment.php
function payment_validation() {
    var errMsg = "";
    var result = true;
    var visa = document.getElementById("visa").checked;
    var mastercard = document.getElementById("mastercard").checked;
    var american_express = document.getElementById("american_express").checked;
    var card_name = document.getElementById("card_name").value;
    var card_number = document.getElementById("card_number").value;
    if (debug) {
        if (!(visa || mastercard || american_express)) { //If none the the card type are checked, there would be an alert message and result will turn to be false
            errMsg += "You must select a credit card type.\n";
            result = false;
        }
        if ((!card_name.match(/^[a-zA-Z\ ]+(\s{0,1}[a-zA-Z ])*$/)) || (card_name.length > 40)) { //Check the validation of the card name value : The first condition is to check the alphabetical and space only requirement, and the second check the length of the value (it can not > 40 in length)
            errMsg += "Credit card name must be filled in and contain maximum of 40 characters, alphabetical and space only.\n";
            result = false;
        }
        if (!card_number.match(/^\d{15,16}$/)) { // Check the validation of the card number, it must be exactly 15 or 16 digits
            errMsg += "Credit card number must be filled in with exactly 15 or 16 digits.\n";
            result = false;
        }
        var message = checkCreditCard(card_number); // check with each single card type by passing card number into the function
        if (message != "") {
            errMsg += message;
            result = false;
        }
    }
    if (errMsg != "") {
        alert(errMsg);
    }
    return result;
}
// this function will return the card type that is checked by the user
function getCardType() {
    var cardType;
    var cardTypeArray = document.getElementById("card_type").getElementsByTagName("input"); 
    for (var i=0; i<cardTypeArray.length; i++) { //Use for loop to check which card type is selected
        if (cardTypeArray[i].checked) {
            cardType = cardTypeArray[i].value;
        }
    }
    return cardType;
}
// Check whether the card number matches the validation requirement depends on card type
function checkCreditCard (card_number) {
    var message = "";
    var cardType = getCardType(); //get the selected card type
    var firstTwoNumber = card_number.slice(0,2); //Use the slice method in order to get the first two number from the card number
    //Then checking the validation of the card number depends on selected card type
    switch(cardType) {
        case "visa":
            if (card_number.length <16 || card_number.charAt(0)!= "4") {
                message = "Visa cards have 16 digits and start with a 4.\n";
            }
            break;
        case "mastercard":
            if (card_number.length <16 || firstTwoNumber < 51 || firstTwoNumber >55) {
                message = "MasterCard have 16 digits and start with digits 51 through to 55.\n";
            }
            break;
        case "american_express":
            if ( card_number.length >15 || (firstTwoNumber != 34 && firstTwoNumber != 37)) {
                message = "American Express has 15 digits and starts with 34 or 37.\n";
            }
    }
    return message;
}
//Calculate the total price 
function calculateTotalCost(roomPrice, partySize, days_of_travelling, extraPrice) {
    var totalPrice = (Number(roomPrice) + Number(extraPrice)) * partySize * days_of_travelling; // the price of each person stays in 1 day = roomPrice + extraPrice => So we have to multiply this by partySize and days of travelling in order to get total cost
    return totalPrice.toFixed(2); //take 2 decimal digits of the total cost
}
// Display the customer’s details, together with the product selection details that a user has entered in the form
function getBooking() {
    document.getElementById("confirm_name").textContent = sessionStorage.fname + " " + sessionStorage.lname;
    document.getElementById("confirm_email").textContent = sessionStorage.email;
    document.getElementById("confirm_address").textContent = sessionStorage.streetAddress + " "+ sessionStorage.suburb;
    document.getElementById("confirm_state").textContent = sessionStorage.state;
    document.getElementById("confirm_postcode").textContent = sessionStorage.postcode;
    document.getElementById("confirm_phone_number").textContent = sessionStorage.phoneNum;
    document.getElementById("confirm_contact").textContent = sessionStorage.preferredContact;
    document.getElementById("confirm_room_type").textContent = sessionStorage.roomType + " room with " + sessionStorage.roomPrice + "$ per person";
    document.getElementById("confirm_extra_options").textContent = sessionStorage.extraOptions + " with total extra of " + sessionStorage.extraPrice + "$ per person";
    document.getElementById("confirm_optional_features").textContent = sessionStorage.optionalFeatures;
    document.getElementById("confirm_partySize").textContent = sessionStorage.partySize;
    document.getElementById("confirm_days_of_travelling").textContent = sessionStorage.days_of_travelling;
    var totalCost = calculateTotalCost(sessionStorage.roomPrice,sessionStorage.partySize,sessionStorage.days_of_travelling, sessionStorage.extraPrice);
    document.getElementById("confirm_cost").textContent = totalCost + "$";
    document.getElementById("confirm_comment").textContent = sessionStorage.comment;
    // Put the value into the "hidden" input so that the data could be sent to the server
    document.getElementById("first_name").value = sessionStorage.fname;
    document.getElementById("last_name").value = sessionStorage.lname;
    document.getElementById("email").value = sessionStorage.email;
    document.getElementById("street_address").value = sessionStorage.streetAddress;
    document.getElementById("suburb").value = sessionStorage.suburb;
    document.getElementById("state").value = sessionStorage.state;
    document.getElementById("postcode").value = sessionStorage.postcode;
    document.getElementById("phone_num").value = sessionStorage.phoneNum;
    document.getElementById("contact").value = sessionStorage.preferredContact;
    document.getElementById("room_type").value = sessionStorage.roomType;
    document.getElementById("extra_options").value = sessionStorage.extraOptions;
    document.getElementById("optional_features").value = sessionStorage.optionalFeatures;
    document.getElementById("partySize").value =  sessionStorage.partySize;
    document.getElementById("days_of_travelling").value = sessionStorage.days_of_travelling;
    document.getElementById("comment").value = sessionStorage.comment;
    document.getElementById("total_cost").value = totalCost + "$";
}
//This function is called when the customer click on cancel button
function cancelBooking() {
    sessionStorage.clear(); //All the infomation in session storage will be cleared
    window.location = "index.php"; //return to the home page (index page)
}
//This is the main function for the website
function init() {
    var path = window.location.pathname; //Take the path name of the page
    var page = path.split("/").pop(); //Pop the last part of the pathname and assign it to the page variable
    //Set the id for the menu, the id will be set according to the page that user is currently visitting.
    if (page == "index.php") {
        var current = document.getElementsByClassName("menu");
        current[0].id = "current";
    }else if (page == "product.php") {
        var current = document.getElementsByClassName("menu");
        current[1].id = "current";
    }else if (page == "enquire.php") {
        var current = document.getElementsByClassName("menu");
        current[2].id = "current";
    }else if (page == "about.php") {
        var current = document.getElementsByClassName("menu");
        current[4].id = "current";
    }else if (page == "enhancements.php") {
        var current = document.getElementsByClassName("menu");
        current[5].id = "current";
    }else if (page == "enhancements2.php") {
        var current = document.getElementsByClassName("menu");
        current[6].id = "current";
    }else if (page == "manager.php") {
        var current = document.getElementsByClassName("menu");
        current[3].id = "current";
    }else if (page == "enhancements3.php") {
        var current = document.getElementsByClassName("menu");
        current[7].id = "current";
    }
    if (page == "enquire.php") { //if the last part of the pathname is "enquire.php", it will run the validate function
        var regForm = document.getElementById("form");
        regForm.onsubmit = validate;
        enhancement();
    }
    if (page == "payment.php") { //if the last part of the pathname is "payment.php", it will run the payment function
        getBooking(); //first it will get the booking from Session Storage
        var bookingForm = document.getElementById("bookingform");
        bookingForm.onsubmit = payment_validation;
        var cancel = document.getElementById("cancelbutton");
        cancel.onclick = cancelBooking; //If clicking on cancel button, then it will run the cancel booking function
        enhancement();
    }
    if (page == "manager_registration.php") {
        //This will enable the manager to show/hide the password when signing up the account
        var show_password = document.getElementById("show_password");
        show_password.onclick = function() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
              } else {
                password.type = "password";
              }
        }
        var show_confirm_password = document.getElementById("show_confirm_password");
        show_confirm_password.onclick = function() {
            var confirm_password = document.getElementById("confirm_password");
            if (confirm_password.type === "password") {
                confirm_password.type = "text";
              } else {
                confirm_password.type = "password";
              }
        }
    }
    if (page == "manager_login.php") {
        //This will enable the manager to show/hide the password when logging in the account
        var show_password = document.getElementById("show_password");
        show_password.onclick = function() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
              } else {
                password.type = "password";
              }
        }
    }
}
window.onload = init;