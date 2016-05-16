<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use i330p2\template\StaticPage;

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Help</div>
	</div>
	<div class="k-danger-block">
		<div class="k-title">Danger Zone</div>
		
		<a href="#" class="k-button-full k-button k-button-inverse">Boat 911</a>
		<a href="#" class="k-button-full k-button k-button-inverse">Man Overboard</a>
		<a href="/help/lost-person" class="k-button-full k-button k-button-inverse">Lost Person</a>
	</div>
	
	<div class="k-spacer k-spacer-content"></div>
	<div class="k-title k-help-subtitle">Helpful Links</div>
	
	<a href="#" class="k-button k-button-table">What does ShipSpace do with my information?</a>
	<a href="#" class="k-button k-button-table">How do I order room service?</a>
	<a href="#" class="k-button k-button-table">How do I specify a vegetarian meal?</a>
	<a href="#" class="k-button k-button-table">Where is the medic center?</a>
	<a href="#" class="k-button k-button-table">Where can I get food at midnight?</a>
	<a href="#" class="k-button k-button-table">What are today's planned events and activities?</a>
	<a href="#" class="k-button k-button-table">What are the allergy warnings to today's meals?</a>
	<a href="#" class="k-button k-button-table">How do I make a complaint?</a>
	<a href="#" class="k-button k-button-table">How do I report broken equipment?</a>
	
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Help")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
