<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

Session::set(SessionKVs::SURVEY_KEY, SessionKVs::SURVEY_VALUE_ACTIVE);

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Welcome</div>
		<div class="k-alt-title">To the Carnival Cruise App</div>
	</div>
	<div class="k-block-text">Before you blast off, is it ok if we ask you a few questions? We'll
	use your answers to make your experience on this ship a thousands times better and we will
	never ever sell or share your answers with any 3rd parties (it'll be our little secret).</div>
	<div class="k-spacer k-spacer-content"></div>
	<a href="/events/survey" class="k-button k-button-full k-button-active">Yeah! Lets do it!</a>
	<a href="/events?category=All" class="k-button k-button-full">I'd rather not...</a>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Welcome!")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
