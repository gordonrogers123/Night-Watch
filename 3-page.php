<!DOCTYPE html>
<html>
  <head>
    <title>DEMO GUEST BOOK PAGE</title>
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
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

    <!-- (B) GUEST BOOK ENTRIES -->
    <div id="gb-entries">
    <?php if (count($entries)>0) { foreach ($entries as $e) { ?>
    <div class="gb-row">
      <div class="gb-datetime"><?=$e['datetime']?></div>
      <div class="gb-name">
        <span class="gb-name-a"><?=$e['name']?></span>
        <span class="gb-name-b">signed:</span>
      </div>
      <div class="gb-comment"><?=$e['comment']?></div>
    </div>
    <?php }} ?></div>
    
    <!-- (C) ADD NEW ENTRY -->
    <form method="post" target="_self" id="gb-form">
      <label for="name">Name:</label>
      <input type="text" name="name" required/>
      <label for="email">Email:</label>
      <input type="email" name="email" required/>
      <label for="comment">Comment:</label>
      <textarea name="comment" required></textarea>
      <input type="submit" value="Sign Guestbook"/>
    </form>
  </body>
</html>