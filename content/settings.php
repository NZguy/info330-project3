<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

$resetParam = \common\base\Http::getGetParamValue("reset");
$resetMessageHtml = "";
if (!is_null($resetParam)) {
	Session::delete($resetParam);
	$resetMessageHtml = "<div class='k-notification'><div class='k-container'>Reset session key: $resetParam</div></div>";
}

$surveyKey = SessionKVs::SURVEY_KEY;
$connectKey = SessionKVs::CONNECT_KEY;

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Settings</div>
	</div>
</div>
$resetMessageHtml
<div class="k-container">
	<div class="k-question-container">
		<a href="/settings?reset=$surveyKey" class="k-button k-button-full k-button-active">Reset survey completion</a>
		<a href="/settings?reset=$connectKey" class="k-button k-button-full k-button-active">Reset social connection</a>
	</div>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Settings")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
