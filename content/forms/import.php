<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;

$body = <<<HTML
<div class="k-page-title k-container">
	<div class="k-title">
		Import Profiles
	</div>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Import")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
