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
	$bottomButton = '<a href="/forms/questionnaire" class="k-button k-fullscreen k-secondary">Continue to Car Questionnaire</a>';
	$skipButton = '<a href="/forms/questionnaire" class="k-button k-form-inline">No thanks, I want to skip this &gt;</a>';
	// Add another button for skipping this step and tutorial
}

$body = <<<HTML
<div class="k-spacer k-normal"></div>
<div class="k-container">
	<h2 class="k-title">Let us get to know you!</h2>
	<div class="k-form-skip">
		$skipButton
	</div>
	
	<div class="k-spacer k-normal"></div>
	<input class="k-controller" type="checkbox" id="k-p-personal" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-personal">Personal</label>
	</div>
	<div class="k-form-content">
		<div class="k-form-group k-nospace">
			<div class="k-title">How old are you?</div>
			<div class="kfct-input"><input type="radio" name="kage" id="kfct-18" /><label for="kfct-18">&lt; 18</label></div>
			<div class="kfct-input"><input type="radio" name="kage" id="kfct-1822" /><label for="kfct-1822">18 - 22</label></div>
			<div class="kfct-input"><input type="radio" name="kage" id="kfct-2329" /><label for="kfct-2329">23 - 29</label></div>
			<div class="kfct-input"><input type="radio" name="kage" id="kfct-3039" /><label for="kfct-3039">30 - 39</label></div>
			<div class="kfct-input"><input type="radio" name="kage" id="kfct-4054" /><label for="kfct-4054">40 - 54</label></div>
			<div class="kfct-input"><input type="radio" name="kage" id="kfct-55" /><label for="kfct-55">55 +</label></div>
		</div>
		<div class="k-form-group k-nospace">
			<div class="k-title">Gender</div>
			<div class="kfct-input"><input type="radio" name="kgender" id="kfct-Male" /><label for="kfct-Male">Male</label></div>
			<div class="kfct-input"><input type="radio" name="kgender" id="kfct-Female" /><label for="kfct-Female">Female</label></div>
			<div class="kfct-input"><input type="radio" name="kgender" id="kfct-TransMtF" /><label for="kfct-TransMtF">Trans - MtF</label></div>
			<div class="kfct-input"><input type="radio" name="kgender" id="kfct-TransFtM" /><label for="kfct-TransFtM">Trans - FtM</label></div>
			<div class="kfct-input"><input type="radio" name="kgender" id="kfct-Other" /><label for="kfct-Other">Other</label></div>
		</div>
		<select class="k-input">
			<option>Which condiment do you like the most?</option>
			<option>Ketchup</option>
			<option>Mustard</option>
			<option>Oreo</option>
			<option>Whipped Cream</option>
		</select>
		<select class="k-input">
			<option>Do you own a mobile phone?</option>
			<option>Yes</option>
			<option>No</option>
		</select>
		<select class="k-input">
			<option>Is the answer to this question no?</option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>

	<input class="k-controller" type="checkbox" id="k-p-occupation" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-occupation">Occupational</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>What kind of job do you have?</option>
			<option>A boring one</option>
			<option>An exciting one</option>
			<option>A teaching one</option>
			<option>The one where you browse Reddit all day</option>
		</select>
		<select class="k-input">
			<option>What's your salary?</option>
			<option>&lt; $1,000,000</option>
			<option>$1,000,000</option>
			<option>&gt; $1,000,000</option>
		</select>
		<select class="k-input">
			<option>How many miles is it to work?</option>
			<option>1</option>
			<option>3</option>
			<option>1000</option>
			<option>Yes</option>
		</select>
		<select class="k-input">
			<option>Do you enjoy your commute?</option>
			<option>No</option>
			<option>No</option>
		</select>
		<select class="k-input">
			<option>Do you regularly take public transportation?</option>
			<option>Maybe?</option>
			<option>I don't know.</option>
		</select>
		<select class="k-input">
			<option>Are you happy with your job?</option>
			<option>No</option>
			<option>No</option>
			<option></option>
			<option></option>
		</select>
		<select class="k-input">
			<option>Do you want to show off your car to coworkers?</option>
			<option>What?</option>
			<option>What kind of question is that?</option>
			<option>Of course!</option>
		</select>
	</div>

	<input class="k-controller" type="checkbox" id="k-p-social" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-social">Social</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>Do you go out a lot?</option>
			<option>Yes</option>
			<option>Yes</option>
		</select>
		<select class="k-input">
			<option>Can I get your phone number?</option>
			<option>Yes</option>
			<option>Yes</option>
		</select>
		<select class="k-input">
			<option>Swipe...</option>
			<option>Left</option>
			<option>Left</option>
		</select>
		<select class="k-input">
			<option>How much time do you spend on Facebook?</option>
			<option>1</option>
			<option>3</option>
			<option>100</option>
			<option>40000+</option>
		</select>
		<select class="k-input">
			<option>Do you use Google+?</option>
			<option>No</option>
		</select>
		<select class="k-input">
			<option>Do you play video games?</option>
		</select>

	</div>

	<input class="k-controller" type="checkbox" id="k-p-family" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-family">Family</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>Are you married?</option>
			<option>Yes</option>
			<option>No</option>
			<option>It's complicated</option>
		</select>
		<select class="k-input">
			<option>How many kids do you have?</option>
			<option>-1</option>
			<option>0</option>
			<option>1</option>
			<option>100</option>
		</select>
	</div>
	<div class="k-spacer k-normal"></div>
	$bottomButton
</div>

HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Personality Quiz")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
