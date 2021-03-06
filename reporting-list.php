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
    <link rel="shortcut icon" type="image/jpg" href="img/favicon.png" />

</head>

<body>
    <?php
    require "core.php";
    $pid = 1;

    // GET GUEST BOOK ENTRIES
    $entries = $_GB->get($pid);
    ?>

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
                <li class="nav-link" onclick="window.location.href='blog.html'">
                    <a href="blog.html"></a>Blog Posts</li>
                <li class="nav-link" onclick="window.location.href='ufo_news.php'">
                    <a href="ufo_news.php"></a>Latest News</li>
                <li class="nav-link" onclick="window.location.href='historical.html'">
                    <a href="historical.html"></a>Historical Events</li>
                <li class="nav-link" onclick="window.location.href='tracker.html'">
                    <a href="tracker.html"></a>UFO Tracker</li>
                <li class="nav-link" onclick="window.location.href='reporting.php'">
                    <a href="reporting.php"></a>Report a Sighting</li>
                <li class="nav-link" onclick="window.location.href='reporting-list.php'">
                    <a href="reporting-list.php"></a>List of Sightings</li>
            </ul>
        </nav>
        </div>
    </header>

    <!--Body of Website-->
    <div class="main-content">

        <!--News Ticker Sidebar-->
        <div class="column" id="news-ticker">
            <h2 class="news-header">News from r/UFO</h1>
                <ul class="news-clip-list">

                </ul>
                <div class="news-footer">
                    <h3 id="news-footer-text" onclick="window.location.href='ufo_news.php'">More News</h3>
                </div>
        </div>

        <!--Reported Sightings Section-->
        <div class="column" id="blog-entries">
            <h2 class="blog-header">List of Sightings Reported to Night Watch</h2>

              <!-- GUEST BOOK ENTRIES -->
              <div id="entries">
              <?php 
              // PHP "Guestbook" aka UFO Reporting Form and display has been referenced and modified from:
              // https://code-boxx.com/simple-php-guest-book/
              if (count($entries)>0) { foreach ($entries as $e) { ?>
              <div id="entry">
                <div>On <?=$e['datetime']?></div>
                <span><?=$e['name']?> from </span>
                <span><?=$e['city']?>, <?=$e['state']?></span>
                <span>reported:</span>
                <div><?=$e['comment']?></div>
                <br><br>
              </div>
              <?php }} ?></div>

            <div class="blog-footer">
                <h3 class="blog-footer-text"></h3>
            </div>
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