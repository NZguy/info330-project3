<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

Session::set(SessionKVs::SURVEY_KEY, SessionKVs::SURVEY_VALUE_ACTIVE);

$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Preparing The Most</div>
		<div class="k-alt-title">Awesome Experience...</div>
	</div>
	<div class="k-block-text">Any and all of these questions are optional. Feel free to skip!</div>
	
	<div class="k-question-container">
		<div class="k-question">What's your favorite step in Plumbus making?</div>
		<div class="k-answer">
			<select class="k-select">
				<option class="k-default">No preference</option>
				<option>The Dinglebop</option>
				<option>Recycled Schleem</option>
				<option>The Grumbo</option>
				<option>The Fleeb/Fleeb Juice</option>
				<option>Schlamie</option>
				<option>Hizzard Removal</option>
				<option>Chumbal/Plubis/Grumbo Removal/Shaving</option>
			</select>
		</div>
	</div>
	<div class="k-question-container">
		<div class="k-question">Most favorite Harry Potter book?</div>
		<div class="k-answer">
			<select class="k-select">
				<option class="k-default">No preference</option>
				<option>...and the Philosopher's Stone</option>
				<option>...and the Chamber of Secrets</option>
				<option>...and the Prisoner of Azkaban</option>
				<option>...and the Goblet of Fire</option>
				<option>...and the Order of the Phoenix</option>
				<option>...and the Half-Blood Prince</option>
				<option>...and the Deathly Hallows - Part 1</option>
				<option>...and the Deathly Hallows - Part 2</option>
			</select>
		</div>
	</div>
	<div class="k-question-container">
		<div class="k-question">Complete this sentence: "Nobody..."</div>
		<div class="k-answer">
			<select class="k-select">
				<option class="k-default">No preference</option>
				<option>...Got time fo' that.</option>
				<option>...Expects the Spanish inquisition.</option>
				<option>...'s gonna break my stride.</option>
				<option>...'s gonna slow me down.</option>
				<option>Oh, no. I've got to keep on movin'.</option>
			</select>
		</div>
	</div>
	<div class="k-question-container">
		<div class="k-question">What's Twitch doing today?</div>
		<div class="k-answer">
			<select class="k-select">
				<option class="k-default">No preference</option>
				<option>Playing Pokémon</option>
				<option>Installing Gentoo</option>
				<option>Watching Bob Ross</option>
			</select>
		</div>
	</div>
	<div class="k-question-container">
		<div class="k-question">What's your favorite video game?</div>
		<div class="k-answer">
			<select class="k-select">
				<option class="k-default">Runescape</option>
				<option>Old School Runescape</option>
				<option>Iron Man Runescape</option>
				<option>Hard Core Iron Man Runescape</option>
				<option>Defense of the League of: Global Offensive</option>
			</select>
		</div>
	</div>
	<div class="k-question-container">
		<div class="k-question">What's your favorite AGDQ/SGDQ moment?</div>
		<div class="k-answer">
			<select class="k-select">
				<option class="k-default">No preference</option>
				<option>TASBot Block</option>
				<option>WitWix plays Boshi</option>
				<option>Glitchless Any %</option>
			</select>
		</div>
	</div>
	
	
	
	<div class="k-spacer k-spacer-content"></div>
	<a href="/events?category=All" class="k-button k-button-full k-button-active">Submit</a>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Welcome!")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
