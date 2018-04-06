// two global variables
var secondsRemaining;
var intervalHandle;

function resetPage() {
    document.getElementById("form").style.display = "block";
}

function tick() {
    // grab the h1
    var timeDisplay = document.createElement("label");
    inputMinutes.setAttribute("id", "minutes");
    inputMinutes.content("0:00");
    
    // turn seconds into mm:ss
    var min = Math.floor(secondsRemaining / 60);
    var sec = secondsRemaining - (min * 60);
    
    // add a leading zero (as a string value) if seconds less than 10
    if (sec < 10) {
        sec = "0" + sec;
    }
    // concatenate with colon
    var message = min + ":" + sec;
    // now change the display
    timeDisplay.innerHTML = message;
    
    // stop if down to zero
    if (secondsRemaining === 0) {
        alert("Done!");
        clearInterval(intervalHandle);
        resetPage();
    }
    // subtract from seconds remaining
    secondsRemaining--;
}

function startCountdown() {
    // get contents of the "minutes" text box
    var minutes =1;
    // check if not a number
    if (isNaN(minutes)) {
        alert("Please enter a number!");
        return;
    }
    // how many seconds?
    secondsRemaining =  minutes * 60;
    // every second, call the "tick" function
    intervalHandle = setInterval(tick, 1000);
    // hide the form
    document.getElementById("form").style.display = "none";
}

// as soon as the page is loaded...
window.onload =  function () {
    // create input text box and give it an id of "minutes"
   /* var inputMinutes = document.createElement("input");
    inputMinutes.setAttribute("id", "minutes");
    inputMinutes.setAttribute("type", "text");*/
    // create a button
    var startButton = document.getElementById(submit);
    };
    // add to the DOM, to the div called "form"
   /* document.getElementById("form").appendChild(inputMinutes);*/
   /* document.getElementById("form").appendChild(startButton);*/
