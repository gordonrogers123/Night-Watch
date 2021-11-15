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

let observer = { lat: document.getElementById('lat').value, long: document.getElementById('long').value }

if (observer.lat == '' || observer.long == '') {
    alert("VALUES CANNOT BE BLANK")
    return
}

let socket = new WebSocket('ws://18.222.139.190:8080');

socket.onopen = function(event) {
    socket.send(JSON.stringify(observer))
}