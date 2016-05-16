<?php
require_once PHP_ROOT . '/i330p2/Setup.php';
use i330p2\template\StaticPage;

// Php automatically spits out what's in the variable when it's between quotes
// Remember to treat what's in between <<<HTML and HTML; like quotes.
// This is the same as saying
// $body = "This is text before \r\n $eventHtml \r\n this is text after";
// Remember, \r\n means "newline"
$body = <<<HTML

<div class="k-container">
		<div class="d-page-title">Advanced Filter</div>
</div>

<div id="filter-content">
    <h2>Age Group</h2>
    <select id="filter-age">
    	<option>Any age</option>
        <option>Kids (5+)</option>
        <option>Teens (13+)</option>
        <option>Adults (21+)</option>
        <option>Seniors (60+)</option>
    </select>
    
    <h2>Party Size</h2>
    <select id="filter-size">
    	<option>Any amount</option>
        <option>Solo (1)</option>
        <option>Couple (2)</option>
        <option>Family</option>
        <option>Group (4+)</option>
        <option>Large Group (6+)</option>
    </select>
    
    <h2>Time</h2>
    <select id="filter-time">
    	<option>Any time</option>
        <option>Morning</option>
        <option>Mid Day</option>
        <option>Day</option>
        <option>Afternoon</option>
        <option>Late Night</option>
    </select>
    
    <h2>Interests</h2>
    <form id="filter-interests">
        <div class="filter-interest"><label><input type="checkbox" />Sports</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Relaxing</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Swim</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Food</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Drink</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Social</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Active</label></div>
        <div class="filter-interest"><label><input type="checkbox" />Sit Down</label></div>
    </form>
    
    
		<a href="/events?category=All"><div class="filter-button">Cancel</div></a>
		<a href="/events?category=All"><div class="filter-button">Accept</div></a>
    
<div/>
	
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Advanced Filter")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
