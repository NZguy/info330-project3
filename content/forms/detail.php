<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;

$body = <<<HTML
Hi
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Recommendations")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
