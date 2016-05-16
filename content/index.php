<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use i330p2\template\StaticPage;

$body = <<<HTML
<div id="home-scoreboard">
	<label id="home-scoreboard-settings"><i class="fa fa-cog"></i></label>
	<div id="home-scoreboard-header">311<span>pts</span></div>
	<div id="home-scoreboard-trio-container">
		<div class="home-scoreboard-trio">
			<div class="k-aligner"></div>
			<div class="k-aligned">
				<div class="k-top">+18</div>
				<div class="k-bottom">Points Today</div>
			</div>
		</div>
		<div class="home-scoreboard-trio">
			<div class="k-aligner"></div>
			<div class="k-aligned">
				<div class="k-top">5<span>th</span></div>
				<div class="k-bottom">Place (Overall)</div>
			</div>
		</div>
		<div class="home-scoreboard-trio">
			<div class="k-aligner"></div>
			<div class="k-aligned">
				<div class="k-top">2</div>
				<div class="k-bottom">Unique Activities</div>
			</div>
		</div>
	</div>
</div>
<div id="home-recent-activities">
	<div class="k-container">
		<div class="k-title">Recent Activity</div>
		
		<div class="home-activity-element">
			<div class="k-left"><img src="http://i.imgur.com/EWpbZF6.gif" alt="fun fun fun" /></div>
			<div class="k-center">
				<div class="k-title">Twin Fury Water Slides</div>
				<div class="k-time">9:40AM</div>
			</div>
			<div class="k-right">+25</div>
		</div>
		<div class="home-activity-element">
			<div class="k-left"><img src="http://i.imgur.com/5flL7JH.gif" alt="fun fun fun" /></div>
			<div class="k-center">
				<div class="k-title">Pool-side Lounging</div>
				<div class="k-time">10:30AM</div>
			</div>
			<div class="k-right">+10</div>
		</div>
		<div class="home-activity-element">
			<div class="k-left"><img src="http://i.imgur.com/3dGnGGb.gif" alt="fun fun fun" /></div>
			<div class="k-center">
				<div class="k-title">Adult Entertainment</div>
				<div class="k-time">1:00AM</div>
			</div>
			<div class="k-right">+99</div>
		</div>
	</div>
</div>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Home")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
