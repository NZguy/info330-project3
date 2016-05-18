<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;


$bottomButton = "";
if (Session::exists(SessionKVs::TUTORIAL_KEY)) {
	$bottomButton = '<a href="/recommendations" class="k-button k-fullscreen k-secondary">Return to Recommendations</a>';
}else{
	$bottomButton = '<a href="/forms/personality" class="k-button k-fullscreen k-secondary">Continue to Personality Survey</a>';
	// Add another button for skipping this step and tutorial
}

$body = <<<HTML
<div class="k-page-title k-container">
	<div class="k-title">
		Importing Profiles
	</div>
</div>
<div class="k-container">
	<h2 class="k-title">Social Media</h2>
	<div class="k-block-text">
		We use social media to take a small peek at how you interact with friends and family, and
		search for vehicles that would best suit your social and personal needs.
	</div>
	<div class="k-button k-fullscreen"><i class="fa fa-facebook"></i>Facebook</div>
	<div class="k-button k-fullscreen"><i class="fa fa-google-plus"></i>Google Plus</div>
	<div class="k-button k-fullscreen"><i class="fa fa-twitter"></i>Twitter</div>
	<div class="k-button k-fullscreen"><i class="fa fa-instagram"></i>Instagram</div>
	
	<div class="k-spacer k-normal"></div>
	<h2 class="k-title">Platforms</h2>
	<div class="k-block-text">
		These various other sources allow us to get a feel for how you'd like the car the handle.
		This proprietary import algorithm selects your best interests, and lets us search for your
		most desired vehicle.
	</div>
	<div class="k-button k-fullscreen"><i class="fa fa-steam"></i>Steam</div>
	<div class="k-button k-fullscreen"><i class="fa fa-android"></i>Android</div>
	<div class="k-button k-fullscreen"><i class="fa fa-deviantart"></i>DeviantArt</div>


	<div class="k-spacer k-normal"></div>
	$bottomButton
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Import")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
