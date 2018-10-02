<?php
require '../util/includeHeader.php';

$pages = DBHandler::getInstance()->getAllPages();

echo "<ol>";
foreach ($pages as $page) {
  echo "<li><a href=\"cms.php?page={$page->id}\">{$page->title}</li>";
}
echo "</ol>";
