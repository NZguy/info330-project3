<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use common\session\Session;
use i330p3\Car;
use i330p3\SessionKVs;
use i330p3\template\StaticPage;

$outHtml = "";

$carCompareHtml = "";
$isInComparison = Session::get(SessionKVs::CAR_BOOKMARK_ARRAY);
for ($i = 0; $i < count($isInComparison); $i++) {
	if ($isInComparison[$i]) {
		$carCompareHtml .= Car::getCars()[$i]->makeCompareHtml();
	}
}

if (\common\base\Preconditions::isStringNullWhitespaceOrEmpty($carCompareHtml)) {
	$outHtml = <<<HTML
<div class="k-spacer k-normal"></div>
<div class='k-container'>
	<div class='k-block-text'>It seems like you haven't chosen any vehicles to compare...</div>
	<div class="k-spacer k-normal">
	<a class='k-button k-fullscreen k-secondary' href='/recommendations'>Select Cars</a>
</div>
HTML;
} else {
	$outHtml = <<<HTML
<div id="k-compare-table-wrapper">
	<div class="k-compare-table-entry" id="k-compare-table-header">
		<div class="k-comp-image"></div>
		<div class="k-comp-year-comp-model">Year<br />Company<br />Model</div>
		<div class="k-comp-price-mileage-reviews">Price<br />Mileage<br />Reviews</div>
		<div class="k-comp-intext">Interior<br />Exterior</div>
		<div class="k-comp-transmission-drive">Transmission<br />Drive</div>
		<div class="k-comp-mpg-liters-cylinders">MPG<br />Engine Size<br />Engine Cylinders</div>
		<div class="k-comp-engine-hp-torque">Horse Power<br />Engine/Torque</div>
	</div>
	$carCompareHtml
</div>
HTML;
}





$body = <<<HTML
<div class="k-spacer k-normal"></div>
<div class="k-container">
	<h2 class="k-title">Compare Your Selection</h2>
	<div class="k-block-text">
		Let's take a look at what you selected. Tap on any vehicle to see more details.
	</div>
</div>
<div class="k-spacer k-normal"></div>
$outHtml

HTML;


StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Bookmarks")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
