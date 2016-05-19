<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;

$body = <<<HTML

HTML;


StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Compare")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
