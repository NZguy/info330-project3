<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

Session::set(SessionKVs::CONNECT_KEY, SessionKVs::CONNECT_VALUE_ACTIVE);

$connectContents = array(
    array("Facebook", "fa-facebook-square"),
    array("Twitter", "fa-twitter-square"),
    array("Tumblr", "fa-tumblr-square"),
    array("Snapchat", "fa-snapchat-square"),
    array("Pinterest", "fa-pinterest-square"),
    array("Vimeo", "fa-vimeo-square"),
    array("Youtube", "fa-youtube-square"),
    array("Pied Piper", "fa-pied-piper-pp"),
    array("LinkedIn", "fa-linkedin-square"),
    array("Google +", "fa-google-plus-square")
);

// Make the events div first and store the HTML in a variable
$connectHtml = "";
for ($i = 0; $i <= 9; $i++) {
    $connectHtml .= '
<label>
    <div class="connect-social">
        <p>'.$connectContents[$i][0].'</p>
        <input type="checkbox" class="connect-social-button" /> 
        <i class="fa fa-plus-square fa-3x social-disconnect" aria-hidden="true"></i>
        <i class="fa '.$connectContents[$i][1].' fa-3x social-connect" aria-hidden="true"></i>
    </div>
</label>';

}

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Connect Your</div>
		<div class="k-alt-title">Social Media!</div>
	</div>
	<div class="k-block-text">This will help us deliver the best possible experience.</div>
	
	$connectHtml
	
	<div class="k-spacer k-spacer-content"></div>
	<a href="/shipspace" class="k-button k-button-full k-button-active">Submit</a>
</div>
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Welcome!")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
