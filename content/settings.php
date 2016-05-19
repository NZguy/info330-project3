<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;

$resetParam = \common\base\Http::getGetParamValue("reset");
$resetMessageHtml = "";
if (!is_null($resetParam)) {
    Session::delete($resetParam);
    $resetMessageHtml = "<div class='d-settings-notification'>Reset session key: $resetParam</div>";
}

$tutorialKey = SessionKVs::TUTORIAL_KEY;

$body = <<<HTML
$resetMessageHtml
<div class="d-settings-button">
    <a href="/settings?reset=$tutorialKey">Reset tutorial completion</a>
</div>
HTML;

$navContent = <<<HTML
<div>Settings</div>
HTML;


StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Settings")
    ->with(StaticPage::FIELD_BODY, $body)
    ->with(StaticPage::GLOBAL_NAV_CONTENT, $navContent)
    ->render();
