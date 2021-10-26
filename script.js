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


// Set the date we're counting down to
var countUpDate = new Date("Oct 19, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = now - countUpDate;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="timer"
    document.getElementById("timer").innerHTML = days + "d : " + hours + "h : " +
        minutes + "m : " + seconds + "s";
}, 1000);



// load more function referenced and modified from https://www.markuptag.com/javascript-load-more-content-on-click-button/
const loadmore = document.getElementById('#loadmore');
let currentItems = 2;
loadmore.addEventListener('click', (e) => {
    const elementList = [...document.querySelectorAll('.blog-entry-list .blog-entry')];
    for (let i = currentItems; i < currentItems + 2; i++) {
        if (elementList[i]) {
            elementList[i].style.display = 'block';
        }
    }
    currentItems += 2;

    // Load more button will be hidden after list fully loaded
    if (currentItems >= elementList.length) {
        event.target.style.display = 'none';
    }
})