<?php
class DBHandler {
  private static $instance;
  private $mysqli;

  public function __construct() {
    $this->mysqli = new mysqli('localhost', 'pjamasc', 'f2msaS9QKyplfwOh', 'pjamasc');
  }

  public function getUserByEmail($email) {
    $stmt = $this->mysqli->prepare('SELECT * FROM user WHERE user_email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_array(MYSQLI_ASSOC))
      return new User($row);

    return null;
  }

  public function getAllPages($includeBodies = false) {
    $selectList = '*';
    if ($includeBodies)
      $selectList = 'page_id, page_title, page_weight';

    $sql = sprintf('SELECT %s FROM page ORDER BY page_weight ASC', $selectList);

    $stmt = $this->mysqli->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    $pages = [];
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
      if (!$includeBodies)
        $row['page_body'] = null;

      $pages[] = new Page($row);
    }

    return $pages;
  }

  public function getPageById($id) {
    $stmt = $this->mysqli->prepare('SELECT * FROM page WHERE page_id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_array(MYSQLI_ASSOC))
      return new Page($row);

    return null;
  }

  public static function getInstance() {
    if (self::$instance !== null)
      return self::$instance;

    self::$instance = new DBHandler();

    return self::$instance;
  }
}
