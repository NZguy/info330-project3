<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\Car;
use i330p3\template\StaticPage;

$carCompareHtml = "";
foreach (Car::getCars() as $car) {
	$carCompareHtml .= $car->makeCompareHtml();
}
$body = <<<HTML
<div class="k-spacer k-normal"></div>
<div class="k-block-text k-container">
	Let's take a look at what you selected. Tap on any vehicle to see more details.
</div>
<div class="k-spacer k-normal"></div>

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


StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Compare")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
