<?php
define('PHP_ROOT', $_SERVER['DOCUMENT_ROOT'] . "/../php", true);
define('CONTENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . "/../content", true);
require_once PHP_ROOT . '/i330p3/Setup.php';
use common\template\TemplateUtils;

TemplateUtils::renderContentFromUrl(CONTENT_ROOT, "index.php");
