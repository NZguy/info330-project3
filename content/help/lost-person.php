<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use i330p2\template\StaticPage;

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Lost Person</div>
	</div>
	<div>Call Ship Emergency</div>
	<a class="k-call" href="tel:111-222-3333"><i class="fa fa-phone"></i> +1 111-222-3333</a>
	
	<div class="k-spacer k-spacer-content"></div>
	<div>Other Help Tips</div>
	<ul class="k-other-help-tips">
		<li>Go back to the last place you saw your child.</li>
		<li>Notify a crew member.</li>
		<li>Do a quick, cursory search.</li>
		<li>Get help fast.</li>
	</ul>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Lost Person")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
