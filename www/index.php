<?php
define('PHP_ROOT', $_SERVER['DOCUMENT_ROOT'] . "/../php", true);
define('CONTENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . "/../content", true);
require_once PHP_ROOT . '/i330p2/Setup.php';

use common\session\Session;
use common\template\TemplateUtils;
Session::setup("i330p2-carnival-cruise");
TemplateUtils::renderContentFromUrl(CONTENT_ROOT, "index.php");
