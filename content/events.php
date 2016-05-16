<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use common\session\Session;
use i330p2\SessionKVs;
use i330p2\template\StaticPage;

if (!Session::exists(SessionKVs::SURVEY_KEY)) {
	header("Location: /events/survey-optin");
	exit;
}

$currentCategory = $_GET["category"];
$selectedClass = "";

$eventContents = array(
	array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/outdoor/skyride-2.ashx", "SkyRide", "SkyRide is a bit like riding a bike — you’ll never forget it."),
	array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/cruise-entertainment/imax-1.ashx", "IMAX", "Catching a flick on your Carnival cruise just became a big, big deal."),
	array("http://static.carnivalcloud.com/~/media/Images/explore/fun-activities/havana-bar-1.ashx", "Havana Bar", "Step into the Havana Bar and enjoy an authentically Cuban experience as you cruise."),
	array("http://static.carnivalcloud.com/~/media/Images/explore/onboard/outdoor/serenity-1.ashx", "Serenity Adult Only Retreat", "Serenity's the faraway place... that's actually quite close to it all.")
);

// Make the events div first and store the HTML in a variable
$eventHtml = "";
for ($i = 0; $i <= 3; $i++) {
	$eventHtml .= ' 
<a href="/events/skyride" class="k-event">
	<div class="k-event-image">
		<img src="'.$eventContents[$i][0].'" alt="event image"/>
	</div>
	<div class="k-event-text">
		<div class="k-title">'.$eventContents[$i][1].'</div>
		<div>'.$eventContents[$i][2].'</div>
	</div>
</a>';
}

$eventCategories = [
	"All", "Kids", "Adults", "Singles", "Partners", "Groups", "Water", "Indoors", "Outdoors"
];
$eventCategoriesHtml = "";
foreach ($eventCategories as $cat) {
	if($cat == $currentCategory){
		$selectedClass = "d-selected-option";
	}else{
		$selectedClass = "k-option";
	}
	$eventCategoriesHtml .= '<a class="'.$selectedClass.'" href="?category='.$cat.'">'.$cat.'</a>';
}

// Php automatically spits out what's in the variable when it's between quotes
// Remember to treat what's in between <<<HTML and HTML; like quotes.
// This is the same as saying
// $body = "This is text before \r\n $eventHtml \r\n this is text after";
// Remember, \r\n means "newline"
$body = <<<HTML
<div class="k-container">
	<div class="k-page-header">
		<div class="k-title">Events &amp; Activities</div>
	</div>
</div>
<div class="k-events-categories">
	<div class="k-aligner"></div>
	<div class="k-padding"></div>
	$eventCategoriesHtml
	<a href="/events/advanced-filter">More Filters...</a>
	<div class="k-padding"></div>
</div>
<div class="k-container">
	<div class="k-events-sortby">
		<div class="k-title">Sort By: </div>
		<select class="k-inline-select">
			<option>Trending</option>
			<option>Top</option>
			<option>New</option>
			<option>Coming Up</option>
		</select>
	</div>
</div>
<div class="k-container">
	$eventHtml
</div>

HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Events &amp; Activities")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
