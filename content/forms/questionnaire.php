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
	$bottomButton = '<a href="/recommendations" class="k-button k-fullscreen k-secondary">Finish - Show me the Cars!</a>';
	$skipButton = '<a href="/recommendations" class="k-button k-form-inline">Skip And Just Show Me Some Cars  &gt;</a>';
	// Add another button for skipping this step and tutorial
}

$body = <<<HTML
<div class="k-spacer k-normal"></div>
<div class="k-container">
	<h2 class="k-title">Tell us about your dream car</h2>

	<div class="k-form-skip">
		$skipButton
	</div>
	
	<div class="k-spacer k-normal"></div>
	<input class="k-controller" type="checkbox" id="k-p-standard" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-standard">Standard</label>
	</div>
	<div class="k-form-content">
		<div class="k-form-group k-nospace">
			<div class="k-title">Car Type</div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Convertible" /><label for="kfct-Convertible">Convertible</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Coup" /><label for="kfct-Coup">Coup</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Crossover" /><label for="kfct-Crossover">Crossover</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Diesel" /><label for="kfct-Diesel">Diesel</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Hybrid" /><label for="kfct-Hybrid">Hybrid</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Luxury" /><label for="kfct-Luxury">Luxury</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Van" /><label for="kfct-Van">Van/Minivan</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Truck" /><label for="kfct-Truck">Truck</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Sedan" /><label for="kfct-Sedan">Sedan</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-Sports" /><label for="kfct-Sports">Sports</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-SUV" /><label for="kfct-SUV">SUV</label></div>
			<div class="kfct-input"><input type="checkbox" id="kfct-StationWagon" /><label for="kfct-StationWagon">Station Wagon</label></div>
		</div>
		<div class="k-form-group">
			<div class="k-title">Price Range</div>
			<div id="k-msrp-slider" class="ui-slider ui-slider-horizontal">
				<div class="ui-slider-handle" style="margin-left: 0;"></div>
				<div class="ui-slider-handle" style="margin-left: -.8em;"></div>
				<div class="ui-slider-range"></div>
			</div>
			<div class="k-ui-slider-values"><span id="k-msrp-low">$0</span> to <span id="k-msrp-high">no maximum</span></div>
		</div>
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
		<div class="k-form-group">
			<div class="k-title">Fuel Economy</div>
			<div id="k-mpg-slider" class="ui-slider ui-slider-range-max ui-slider-horizontal">
				<div class="ui-slider-handle" style="margin-left: 0;"></div>
				<div class="ui-slider-range"></div>
			</div>
			<div class="k-ui-slider-values"><span id="k-mpg-low">no minimum</span></div>
		</div>
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
<script>
	$(function() {
		var msrpMaxValue = 100000;
		$("#k-msrp-slider").slider({
			range: true,
			step: 1000,
			min: 0,
			max: msrpMaxValue,
			values: [0, msrpMaxValue],
			slide: function(e, u) {
				$('#k-msrp-low').html("$" + u.values[0]);
				$('#k-msrp-high').html((u.values[1] == msrpMaxValue) ? "no maximum" : "$" + u.values[1]);
			}
		});
		var mpgMaxValue = 100;
		$("#k-mpg-slider").slider({
			range: "max",
			step: 1,
			min: 0,
			max: mpgMaxValue,
			slide: function(e, u) {
				$('#k-mpg-low').html((u.value == 0) ? "no minimum" : "at least " + u.value + " mpg");
			}
		});

	});
</script>
HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Questionnaire")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
