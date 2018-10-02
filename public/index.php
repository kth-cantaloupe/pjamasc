<?php
require '../util/includeHeader.php';

var_dump(DBHandler::getInstance()->getUserByEmail('benter@kth.se', 'test'));
