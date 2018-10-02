<?php
class Page {
  public $id, $title, $body, $weight;

  public function __construct() {
    $this->id = $row['page_id'];
    $this->title = $row['page_title'];
    $this->body = $row['page_body'];
    $this->weight = $row['page_weight'];
  }
}
