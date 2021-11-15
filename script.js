// Toggle showing and hiding the navigation menu when the user clicks on the bars/X icon
function navExpand() {
    var x = document.getElementById("nav-link-list");
    var y = document.getElementById("bars");
    if (x.style.display === "flex") {
        x.style.display = "none";
        y.classList.remove("fa-times")
        y.classList.add("fa-bars");
    } else {
        x.style.display = "flex";
        y.classList.remove("fa-bars")
        y.classList.add("fa-times");
    }
}

// Set the date we're counting up to
var countUpDate = new Date("Oct 19, 2021 15:37:25").getTime();

// Update the count up every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count up date
    var distance = now - countUpDate;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="timer"
    if (document.getElementById("timer") != null) {
        document.getElementById("timer").innerHTML = days + "d : " + hours + "h : " + minutes + "m : " + seconds + "s";
    }
}, 1000);


// Display John's Ship data Json data
$.getJSON('https://cs361iotspacecraft.azurewebsites.net/api/shipstatus/current', function(data) {
    var lifesigns = Math.floor(data.engine_Temperature.value / 2 + 3);
    var text = `
                <h2>System Information:</h2>
                <p>// Propulsion Status>> <em id="threat">${data.propulsionSystem.value}</em></p>
                <p>// Ship Temperature >> &#9 <em id="temp">${data.internalTemperature.value} &#176 C</em></p>
                <p>// Engine RPM >> <em id="energy">${data.engine_RPM.value}</em></p>
                <p>// Possible Life Signs >> ${lifesigns}</p>
                <p id="weapons"><< Weapon Systems Detected>></p>
              `

    $("#div14").html(text);
});



// Display Nick's News
$.getJSON('https://prawsome-sauce1.herokuapp.com/', function(data) {
    var text = `
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url0}" target="_blank">${data.entry.title0}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url1}" target="_blank">${data.entry.title1}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url2}" target="_blank">${data.entry.title2}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url3}" target="_blank">${data.entry.title3}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url4}" target="_blank">${data.entry.title4}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url5}" target="_blank">${data.entry.title5}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url6}" target="_blank">${data.entry.title6}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url7}" target="_blank">${data.entry.title7}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url8}" target="_blank">${data.entry.title8}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url9}" target="_blank">${data.entry.title9}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url10}" target="_blank">${data.entry.title10}</a></h2>
                </li>
                <li class="news-clip">
                  <h4 class="clip-title"><a class="news-links" href="${data.entry.url11}" target="_blank">${data.entry.title11}</a></h2>
                </li>
              `
    $(".news-clip-list").html(text);
});

// zipcode to gps
function getZip() {
    var zipcode = document.getElementById("userInput").value;
    var JSONURL = "https://service-361.herokuapp.com/locate/" + zipcode
    var getJSON = $.getJSON(JSONURL, function() {
        var text = "<p id='latitude'>Latitude: " + getJSON.responseJSON[zipcode].lat + "</p><p id='longitude'>Longitude: " + getJSON.responseJSON[zipcode].lng + "</p>"
        var lat = getJSON.responseJSON[zipcode].lat
        var lng = getJSON.responseJSON[zipcode].lng
        $("#gps-output").html(text);
    })
};