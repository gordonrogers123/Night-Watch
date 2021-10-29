<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.typekit.net/nbf7xef.css">
    <script src="https://kit.fontawesome.com/4e854f99b8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src=script.js></script>
    <title>The Night Watch</title>
</head>

<body>
    <!--Header-->
    <header>

        <div class="logo" onclick="window.location.href='index.html'">
            <img src="img/header.png" alt="UFO logo">
        </div>

        </div class="nav-bar">
        <nav id="nav-bar">
            <div class="nav-icon">
                <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                <a href="javascript:void(0);" class="icon" onclick="navExpand()">
                    <i class="fas fa-bars" id="bars"></i>
                </a>
            </div>
            <ul id="nav-link-list">
                <li class="nav-link" onclick="window.location.href='news.html'">
                    <a href="news.html"></a>Latest News</li>
                <li class="nav-link" onclick="window.location.href='historical.html'">
                    <a href="historical.html"></a>Historical Events</li>
                <li class="nav-link" onclick="window.location.href='tracker.html'">
                    <a href="tracker.html"></a>UFO Tracker</li>
                <li class="nav-link" onclick="window.location.href='reporting.html'">
                    <a href="reporting.php"></a>Report a Sighting</li>
                <li class="nav-link" onclick="window.location.href='reporting-list.html'">
                    <a href="reporting-list.php"></a>List of Sightings</li>
            </ul>
        </nav>
        </div>
    </header>


    <?php
    // (A) PAGE INIT
    // (A1) LOAD LIBRARY + SET PAGE ID
    // GIVE EVERY PAGE A "UNIQUE ID"
    // OR JUST USE "1" FOR A SINGLE GUESTBOOK FOR THE ENTIRE SITE
    require "core.php";
    $pid = 1;

    // (A2) SAVE GUEST BOOK ENTRY
    if (isset($_POST['name'])) {
      if ($_GB->save($pid, $_POST['email'], $_POST['name'], $_POST['comment'])) {
        echo "<div>Guest Book Entry Saved</div>";
      } else {
        echo "<div>$_GB->error</div>";
      }
    }

    // (A3) GET GUEST BOOK ENTRIES
    $entries = $_GB->get($pid);
    ?>


    <!--Body of Website-->
    <div class="main-content">

        <!--Reporting Section-->
        <div class="container">
            <form class="form" method="post" target="_self" id="gb-form">
                <h2 id="form-title">UFO Sighting Reporting Form</h2>
                <label for="name">Name</label> <br>
                <input type="text" id="fname" name="firstname" placeholder="Your name..." required>
                <br>
                <label class="control-label">Email</label> <br>
                <input type="email" id="email" name="email" placeholder="Your email..." required>
                <br>
                <label for="city">City</label> <br>
                <input type="text" id="city" name="city" placeholder="City..." required>
                <br>
                <label for="state">State</label> <br>
                <select id="state" name="state" placeholder="State..." required>
                  <option value="--">--</option>
                  <option value="AL">AL</option>
                  <option value="AK">AK</option>
                  <option value="AR">AR</option>
                  <option value="AZ">AZ</option>
                  <option value="CA">CA</option>
                  <option value="CO">CO</option>
                  <option value="CT">CT</option>
                  <option value="DC">DC</option>
                  <option value="DE">DE</option>
                  <option value="FL">FL</option>
                  <option value="GA">GA</option>
                  <option value="HI">HI</option>
                  <option value="IA">IA</option>
                  <option value="ID">ID</option>
                  <option value="IL">IL</option>
                  <option value="IN">IN</option>
                  <option value="KS">KS</option>
                  <option value="KY">KY</option>
                  <option value="LA">LA</option>
                  <option value="MA">MA</option>
                  <option value="MD">MD</option>
                  <option value="ME">ME</option>
                  <option value="MI">MI</option>
                  <option value="MN">MN</option>
                  <option value="MO">MO</option>
                  <option value="MS">MS</option>
                  <option value="MT">MT</option>
                  <option value="NC">NC</option>
                  <option value="NE">NE</option>
                  <option value="NH">NH</option>
                  <option value="NJ">NJ</option>
                  <option value="NM">NM</option>
                  <option value="NV">NV</option>
                  <option value="NY">NY</option>
                  <option value="ND">ND</option>
                  <option value="OH">OH</option>
                  <option value="OK">OK</option>
                  <option value="OR">OR</option>
                  <option value="PA">PA</option>
                  <option value="RI">RI</option>
                  <option value="SC">SC</option>
                  <option value="SD">SD</option>
                  <option value="TN">TN</option>
                  <option value="TX">TX</option>
                  <option value="UT">UT</option>
                  <option value="VT">VT</option>
                  <option value="VA">VA</option>
                  <option value="WA">WA</option>
                  <option value="WI">WI</option>
                  <option value="WV">WV</option>
                  <option value="WY">WY</option>
                </select>

                <label for="date">Date of Sighting</label><br><br>
                <input type="date" name="date" id="date" required>
                <br><br>
                <label for="time">Time of Sighting</label><br><br>
                <input type="time" name="time" id="time" required>
                <br><br>
                <label for="subject">Description:</label>
                <textarea id="subject" name="subject" placeholder="Describe what you saw..." style="height:200px" required></textarea>

                <input type="submit" value="Submit" id="submit">

            </form>
        </div>

    </div>

    <!--Footer-->
    <footer class="footer">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front" id="footer-item">
                    <h3>Contact</h3>
                </div>
                <div class="flip-card-back">
                    <h4>Gordon Rogers</h4>
                    <a id="email" href="mailto: gordon.rogers@night-watch.us">gordon.rogers@night-watch.us</a>
                    <p>316.680.1694</p>
                    <p>3018 Sycamore St</p>
                    <p>Rowlett, TX 75088</p>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front" id="footer-item">
                    <h3>Volunteer</h3>
                </div>
                <div class="flip-card-back">
                    <p>Email inquiries to:</p>
                    <a id="email" href="mailto: gordon.rogers@night-watch.us">gordon.rogers@night-watch.us</a>
                    <p>We are looking for a</p>
                    <p>webdesigner with some</p>
                    <p>actual talent.</p>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front" id="footer-item">
                    <h3>Events</h3>
                </div>
                <div class="flip-card-back">
                    <h4>McMenamins UFO Fest</h4>
                    <p>May 13th & 14th, 2022</p>
                    <p>Hotel Oregon in McMinnville, OR</p>
                    <a href="https://www.mcmenamins.com/ufo-festival" target="_blank">https://www.mcmenamins.com/ufo-festival</a>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front" id="footer-item">
                    <h3>Interesting Sites</h3>
                </div>
                <div class="flip-card-back">
                    <a href="https://www.seti.org/" target="_blank">SETI</a><br><br>
                    <a href="https://www.space.com/topics/ufos-extraterrestrials" target="_blank">Space.com</a><br><br>
                    <a href="http://www.nuforc.org/" target="_blank">UFO Reporting Center</a><br><br>
                    <a href="https://app.polymersearch.com/polymerexamples/UFO_Sightings" target="_blank">UFO Discovery</a><br><br>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front" id="footer-item">
                    <h3>Legal</h3>
                </div>
                <div class="flip-card-back">
                    <p>The content of this website</p>
                    <p>is for educational purposes</p>
                    <p>only. We are not responsible</p>
                    <p>for ANY abductions.</p>
                </div>
            </div>
        </div>
    </footer>

    <!--copyrite-->
    <div class="copy">Copyright 1995-2021 by Night Watch, LLC. All Rights Reserved.</div><br><br>
</body>

</html>