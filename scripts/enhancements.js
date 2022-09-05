//Enhancement 1
"use strict";
var debug = false;
// Source:https://stackoverflow.com/questions/5517597/plain-count-up-timer-in-javascript
function limitedTime() {
    if (remainingSeconds != 0) { 
        remainingSeconds--; //This is the global variable. Each time this function is called, the remainingSeconds will be decreased by 1 
         // Use pad function  to calculate remaining seconds and remaining minutes
        secondsLabel.innerHTML = pad(remainingSeconds % 60); // remaining seconds is calculated by take the total remainingSeconds modulus by 60
        minutesLabel.innerHTML = pad(parseInt(remainingSeconds / 60)); // remaining minutes is calculated by take the total remainingSeconds divide by 60 and convert it to Integer
        if (remainingSeconds <= 300 && !lessThan5mins) { // If the remainingSeconds is less than 300, there would be an alert to notice the customer that you have 5 minutes left. After clicking "Okay", the alert will disapear and the timer will continue to count down
            alert ("You have 5 minutes left");
            lessThan5mins = true;
        }
        if (remainingSeconds <= 60 && !lessThan1min) { // If the remainingSeconds is less than 300, there would be an alert to notice the customer that you have 1 minute left. After clicking "Okay", the alert will disapear and the timer will continue to count down
            alert ("You have 1 minute left");
            lessThan1min = true;
        }
    } else { //When the remaining seconds reach 0, it will call the clear Interval to stop counting down 
        clearInterval(interval);
        window.location = "index.php"; // After stoping counting, the window will return back to the home page
    }
}

function pad(value) {
    var valString = value + ""; //convert value to string and name it as valString
    if (valString.length < 2) {
      return "0" + valString; // if the length of valString is less than 2, there would be a "0" before the value
    } else {
      return valString;
    }
  }

//Enhancement 2
//Source: https://thisinterestsme.com/disable-text-field-javascript/#:~:text=Disabling%20the%20input%20field%20with%20regular%20JavaScript.&text=getElementById(%22name%22).,its%20disabled%20attribute%20to%20true
function checkOptionalFeatures() {
    var classic = document.getElementById("classic_price").checked;
    var grand = document.getElementById("grand_price").checked;
    var deluxe = document.getElementById("deluxe_price").checked;
    var master = document.getElementById("master_price").checked;
    if (classic) { //If classic room is checked, the below optional features will be limited
        document.getElementById("tv_screens").disabled = true;
        document.getElementById("fitness").disabled = true;
        document.getElementById("champagne").disabled = true;
    }
    if (grand) { //If grand room is checked, the "fitness" and "champagne" optional features will be disable and the "tv_screens" will turn not be disable
        document.getElementById("tv_screens").disabled = false;
        document.getElementById("fitness").disabled = true;
        document.getElementById("champagne").disabled = true;
    }
    if (deluxe) { //If deluxe room is checked, the "fitness" optional feature will be disable and the "tv_screens" and "champagne" will turn not be disable
        document.getElementById("tv_screens").disabled = false;
        document.getElementById("fitness").disabled = true;
        document.getElementById("champagne").disabled = false;
    }
    if (master) { //If master room is checked, all of the features will not be disable
        document.getElementById("tv_screens").disabled = false;
        document.getElementById("fitness").disabled = false;
        document.getElementById("champagne").disabled = false;
    }
}
//Here are some global variables for the first enhancement 
var remainingSeconds;
var lessThan5mins;
var lessThan1min;
var minutesLabel;
var secondsLabel;
var interval;
function enhancement() {
    var path = window.location.pathname; //Take the path name of the page
    var page = path.split("/").pop(); //Pop the last part of the pathname 
    if (page == "enquire.php" && debug) {
        //If we click on 1 on these room type, the checkOptionalFeatures will be called
        document.getElementById("classic_price").onclick = checkOptionalFeatures; 
        document.getElementById("grand_price").onclick = checkOptionalFeatures;
        document.getElementById("deluxe_price").onclick = checkOptionalFeatures;
        document.getElementById("master_price").onclick = checkOptionalFeatures;
    }
    if (page == "payment.php") {
        alert ("You may get 7 minutes to check your details, selection details together with filling in the payment details. After which, the browser will redirect to the home page.");
        remainingSeconds = 420;
        lessThan5mins = false;
        lessThan1min = false;
        minutesLabel = document.getElementById("minutes");
        secondsLabel = document.getElementById("seconds");
        interval = setInterval(limitedTime , 1000);
    }
}



