<?php
require '../util/includeHeader.php';

$page = DBHandler::getInstance()->getPageById($_GET['page']);

require '../views/cms_page.html';
