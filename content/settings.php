<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;

$resetParam = \common\base\Http::getGetParamValue("reset");
$resetMessageHtml = "";
if (!is_null($resetParam)) {
    Session::delete($resetParam);
    $resetMessageHtml = "<div class='k-notification'><div class='k-container'>Reset session key: $resetParam</div></div>";
}

$tutorialKey = SessionKVs::TUTORIAL_KEY;

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Settings</div>
	</div>
</div>
$resetMessageHtml
<div class="k-container">
	<div class="k-question-container">
		<a href="/settings?reset=$tutorialKey" class="k-button k-button-full k-button-active">Reset tutorial completion</a>
	</div>
</div>
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Settings")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
