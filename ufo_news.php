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
        <div class="column" id="news-ticker-news">
            <h2 class="news-header">Latest News from the United States</h1>
                <ul class="news-clip-list-bing">
                  <?php
                  libxml_use_internal_errors(true);
                  $html = "";
                  $url = "https://www.bing.com/news/search?q=ufos&FORM=HDRSC6&format=rss";
                  $xml = simplexml_load_file($url);
                  for($i = 0; $i < 20; $i++){
                    if ($xml->channel->item[$i] != NULL){
                      $title =        $xml->channel->item[$i]->title;
                      $link =         $xml->channel->item[$i]->link;
                      $pubDate =      $xml->channel->item[$i]->pubDate;
                      $description =  $xml->channel->item[$i]->description;
                      $image =        $xml->channel->item[$i]->children('News', true)->Image;

                      $html .= "<div class='news-clip' id='news-clip'>";
                      $html .= "<a href=$link   class='clip-title'><h3>$title</h3></a>";
                      $html .= "<p class='clip-date'>$pubDate</p>";
                      #$html .= "<img class='clip-img' src='$image'>";
                      $html .= "<p class='clip-body'>$description</p>";
                      $html .= "</div>";
                    }
                  }
                  echo $html;
                  ?>
                </ul>
            <div class="news-footer">
                <h3 id="news-footer-text"></h3>
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

