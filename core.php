<?php
// PHP "Guestbook" aka UFO Reporting form and display has been referenced and modified from:
// https://code-boxx.com/simple-php-guest-book/
// (A) GUEST BOOK CLASS
class ReportingForm {
  // (A1) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo;
  private $stmt;
  public $error;
  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  // (A2) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  // (A3) GET GUEST BOOK ENTRIES
  function get ($pid) {
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reporting_form` WHERE `post_id`=? ORDER BY `datetime` DESC"
    );
    $this->stmt->execute([$pid]);
    return $this->stmt->fetchall(PDO::FETCH_NAMED);
  }

  // (A4) SAVE GUEST BOOK ENTRY
  function save($pid, $email, $name, $city, $state, $comment, $date=null) {
    if ($date==null) { $date = date("Y-m-d H:i:s"); }
    try {
      $this->stmt = $this->pdo->prepare(
        "REPLACE INTO `reporting_form` (`post_id`, `email`, `name`,`city`, `state`, `comment`, `datetime`) VALUES (?,?,?,?,?,?,?)"
      );
      $this->stmt->execute([$pid, $email, $name, $city, $state, $comment, $date]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
    return true;
  }
}

// (B) DATABASE SETTINGS
// ! CHANGE THESE TO YOUR OWN !
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '68VMyTO6LVca');

// (C) NEW GUEST BOOK OBJECT
$_GB = new ReportingForm();