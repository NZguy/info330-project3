<?php
use i330p2\template\StaticPage;

require_once PHP_ROOT . '/i330p2/Setup.php';

/**
 * skyride.php
 */


$body = <<<HTML
<div class="k-event-banner">
	<img src="http://static.carnivalcloud.com/~/media/Images/explore/onboard/outdoor/skyride-2.ashx" />
	<div class="k-container">
		<div class="k-title">SkyRide</div>
		<div>SkyRide is a bit like riding a bike — you’ll never forget it.</div>
		<div class="k-spacer k-spacer-button"></div>
		<a href="/events?category=All" class="k-button k-button-reserve">Reserve</a>
		<a href="/shipspace" class="k-button k-button-share">Share</a>
	</div>
</div>
<div class="k-spacer-content k-spacer"></div>
<div class="k-well k-event-facts">
	<div class="k-container">
		<div class="k-title k-event-subtitle">SkyRide Information</div>
		<div class="k-fact"><span class="k-title">Cost: </span>Free</div>
		<div class="k-fact"><span class="k-title">Group Size: </span>1+</div>
		<div class="k-fact"><span class="k-title">Ages: </span>5+</div>
		<div class="k-fact"><span class="k-title">Points Earned: </span>40</div>
		<div class="k-fact"><span class="k-title">Tags: </span>Outdoors, Calm</div>
	</div>
</div>
<div class="k-spacer k-spacer-content"></div>
<div class="k-container">
	<div class="k-title k-event-subtitle">Fun Facts</div>
	<ul class="k-event-fun-facts">
		<li>This was one of the first rides ever built on this ship.</li>
		<li>No maintenance has ever been scheduled for this attraction since it's grand opening.</li>
		<li>Only 3 people have ever died on this ride!</li>
	</ul>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Events - SkyRide")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
