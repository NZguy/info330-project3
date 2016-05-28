<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;


$bottomButton = "";
$skipButton = "";
if (Session::exists(SessionKVs::TUTORIAL_KEY)) {
	$bottomButton = '<a href="/recommendations" class="k-button k-fullscreen k-secondary">Return to Recommendations</a>';
}else{
	$bottomButton = '<a href="/forms/personality" class="k-button k-fullscreen k-secondary">Continue to Personality Survey</a>';
	$skipButton = '<a href="/forms/personality" class="k-button k-form-inline">Nah, maybe later &gt;</a>';
	// Add another button for skipping this step and tutorial
}

$body = <<<HTML
<div class="k-container">
	<div class="k-spacer k-normal"></div>
	<h2 class="k-title">Social Media</h2>
	<div class="k-form-skip">
		$skipButton
	</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-facebook"></i>Facebook</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-google-plus"></i>Google Plus</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-twitter"></i>Twitter</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-instagram"></i>Instagram</div>
	
	<div class="k-spacer k-normal"></div>
	<h2 class="k-title">Connect Other Platforms</h2>
	<div class="k-block-text">
		These various other sources allow us to get a feel for how you'd like the car the handle.
		This proprietary import algorithm selects your best interests, and lets us search for your
		most desired vehicle.
	</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-steam"></i>Steam</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-android"></i>Android</div>
	<div class="k-button k-fullscreen k-clickedon-trigger"><i class="fa fa-deviantart"></i>DeviantArt</div>


	<div class="k-spacer k-normal"></div>
	$bottomButton
	
	<div id="k-clickedon">
		<div>
			<div>Bam. You're connected.</div>
			<i class="fa fa-thumbs-up"></i>
		</div>
	</div>
</div>

<script>
$(function() {
	$('#k-clickedon').click(function() {
		$(this).css('display', 'none');
	});
	$('.k-clickedon-trigger').click(function() {
		$('#k-clickedon').css('display', 'block');
	});
});
</script>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Connect Accounts")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
