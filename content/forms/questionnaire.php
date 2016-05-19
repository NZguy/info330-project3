<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;

$bottomButton = "";
if (Session::exists(SessionKVs::TUTORIAL_KEY)) {
	$bottomButton = '<a href="/recommendations" class="k-button k-fullscreen k-secondary">Return to Recommendations</a>';
}else{
	$bottomButton = '<a href="/recommendations" class="k-button k-fullscreen k-secondary">Finish - Show me the Cars!</a>';
	// Add another button for skipping this step and tutorial
}

$body = <<<HTML
<div class="k-spacer k-normal"></div>
<div class="k-container">
	<h2 class="k-title">Tell us what you want.</h2>
	<div class="k-block-text">
		Alongside our personality and sophisticated import algorithms, we'd like to hear what you
		want directly because, well, you know you best.
	</div>
	
	<div class="k-spacer k-normal"></div>
	<input class="k-controller" type="checkbox" id="k-p-standard" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-standard">Standard Features</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>Type</option>
			<option>Convertible</option>
			<option>Coup</option>
			<option>Crossover</option>
			<option>Diesel</option>
			<option>Hybrid</option>
			<option>Luxury</option>
			<option>Van/Minivan</option>
			<option>Truck</option>
			<option>Sedan</option>
			<option>Sports</option>
			<option>SUV</option>
			<option>Station Wagon</option>
		</select>
		<select class="k-input">
			<option>Base MSRP</option>
			<option>&lt; $10,000</option>
			<option>&lt; $20,000</option>
			<option>&lt; $30,000</option>
			<option>&lt; $50,000</option>
			<option>&lt; $100,000</option>
			<option>&lt; $500,000</option>
		</select>
		<select class="k-input">
			<option>Doors</option>
			<option>2-Door</option>
			<option>4-Door</option>
		</select>
		<select class="k-input">
			<option>Transmission</option>
			<option>Semi Automatic</option>
			<option>Manual</option>
			<option>Automatic</option>
			<option>Continuous Variable</option>
			<option>Direct Shift Gearbox</option>
		</select>
		<select class="k-input">
			<option>MPG</option>
			<option>&gt; 10</option>
			<option>&gt; 20</option>
			<option>&gt; 30</option>
			<option>&gt; 40</option>
		</select>
	</div>

	<input class="k-controller" type="checkbox" id="k-p-addons" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-addons">Add-Ons</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>Windows</option>
			<option>Manual</option>
			<option>Power</option>
		</select>
		<select class="k-input">
			<option>Alarm</option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>

	<input class="k-controller" type="checkbox" id="k-p-engine" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-engine">Engine</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>Horsepower</option>
			<option>&lt; 100</option>
			<option>&lt; 200</option>
			<option>&lt; 300</option>
			<option>&gt; 100</option>
			<option>&gt; 200</option>
			<option>&gt; 300</option>
			<option>&gt; 400</option>
		</select>
		<select class="k-input">
			<option>Liters</option>
			<option>&lt; 1</option>
			<option>&lt; 2</option>
			<option>&lt; 3</option>
			<option>&lt; 4</option>
			<option>&gt; 1</option>
			<option>&gt; 2</option>
			<option>&gt; 3</option>
			<option>&gt; 4</option>
		</select>
		<select class="k-input">
			<option>Type</option>
			<option>Inline</option>
			<option>V-Type</option>
			<option>Boxer</option>
			<option>Rotary</option>
		</select>
	</div>

	<input class="k-controller" type="checkbox" id="k-p-sus" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-sus">Suspension/Handling</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>Front Tire BSW</option>
			<option>100+</option>
			<option>200+</option>
			<option>300+</option>
		</select>
		<select class="k-input">
			<option>Rear Tire BSW</option>
			<option>100+</option>
			<option>200+</option>
			<option>300+</option>
		</select>
	</div>

	<input class="k-controller" type="checkbox" id="k-p-safety" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-safety">Safety</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option></option>
		</select>
		<select class="k-input">
			<option>Rear Tire BSW</option>
			<option>100+</option>
			<option>200+</option>
			<option>300+</option>
		</select>
	</div>


	<div class="k-spacer k-normal"></div>
	$bottomButton
</div>

HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Questionnaire")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
