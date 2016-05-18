<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\template\StaticPage;

$body = <<<HTML
<div class="k-page-title k-container">
	<div class="k-title">
		Personality Quiz
	</div>
</div>
<div class="k-container">
	<h2 class="k-title">Let us get to know you!</h2>
	<div class="k-block-text">
		We use your answers here to tailor our recommendations to your personal lifestyle. Feel free
		to answer as few or as many questions as you want.
	</div>
	
	<div class="k-spacer k-normal"></div>
	<input class="k-controller" type="checkbox" id="k-p-personal" />
	<div class="k-form-collapser-wrapper">
		<div class="k-form-identifier">[<span class="k-plus">+</span><span class="k-minus">-</span>]</div>
		<label class="k-form-collapser" for="k-p-personal">Personal</label>
	</div>
	<div class="k-form-content">
		<select class="k-input">
			<option>How old are you?</option>
			<option>&lt; 18</option>
			<option>18-22</option>
			<option>23-29</option>
			<option>30-39</option>
			<option>40-54</option>
			<option>55+</option>
		</select>
		<select class="k-input">
			<option>Gender?</option>
			<option>Male</option>
			<option>Female</option>
			<option>Trans - MtF</option>
			<option>Trans - FtM</option>
			<option>Other</option>
		</select>
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
	<a href="/forms/questionnaire" class="k-button k-fullscreen k-secondary">Continue to Car Questionnaire</a>
</div>

HTML;

StaticPage::createContent()
		->with(StaticPage::FIELD_TITLE, "Import")
		->with(StaticPage::FIELD_BODY, $body)
		->render();
