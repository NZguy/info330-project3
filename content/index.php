<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;

$body = <<<HTML
<div class="k-page-title k-container">
	<div class="k-title">
		Welcome
	</div>
</div>

<div class="k-container">

	<h2 class="k-title">Introduction</h2>
	<div class="k-block-text">
		Welcome to the carmax app, the best car shopping solution on the app store. By 
		submitting a small amount of your personal information we will be able to accurately
		recommend your favorite car.
	</div>

	<div class="k-spacer k-normal"></div>

	<h2 class="k-title">Recommended Cars</h2>
	<div class="k-block-text">
		Bookmark recommended cars to save them to your profile and compare them directly 
		to other bookmarked cars.
	</div>

	<div class="k-spacer k-normal"></div>

	<a href="/forms/import" class="k-button k-fullscreen k-secondary">Lets get started</a>
</div>
HTML;

$navContent = <<<HTML
<img src='https://upload.wikimedia.org/wikipedia/en/thumb/b/bd/CarMax_Logo.svg/748px-CarMax_Logo.svg.png' alt='carmax'>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Asdf?")
		->with(StaticPage::FIELD_BODY, $body)
		->with(StaticPage::GLOBAL_NAV_CONTENT, $navContent)
		->render();
