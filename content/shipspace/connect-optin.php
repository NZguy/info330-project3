<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

Session::set(SessionKVs::CONNECT_KEY, SessionKVs::CONNECT_VALUE_ACTIVE);

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Welcome</div>
		<div class="k-alt-title">To Ship Space</div>
	</div>
	<div class="k-block-text">Ship Space is your gate to the world of social media. Before 
	you start, please take the time to connect some of your social media accounts. Then feel 
	free to brag to your friends!</div>
	<div class="k-spacer k-spacer-content"></div>
	<a href="/shipspace/connect" class="k-button k-button-full k-button-active">Yeah! Lets do it!</a>
	<a href="/shipspace" class="k-button k-button-full">I'd rather not...</a>
</div>
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Welcome!")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
