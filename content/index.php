<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;

$body = <<<HTML
We should put the introduction stuff here
<img id='home-title-img' src='https://upload.wikimedia.org/wikipedia/en/thumb/b/bd/CarMax_Logo.svg/748px-CarMax_Logo.svg.png' alt='carmax'>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Asdf?")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
