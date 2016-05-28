<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\Car;
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;

Session::set(SessionKVs::TUTORIAL_KEY, SessionKVs::TUTORIAL_VALUE_ACTIVE);

// If there isn't a car array in session, create one of the correct size
if(!Session::exists(SessionKVs::CAR_BOOKMARK_ARRAY)){
    $bookmarkArray = array();
    for($i = 0; $i < sizeof(Car::getCars()); $i++){
        $bookmarkArray[$i] = false;
    }
    $bookmarks = Session::set(SessionKVs::CAR_BOOKMARK_ARRAY, $bookmarkArray);
}

// Make the events div first and store the HTML in a variable
$carHtml = "";
for ($i = 0; $i < sizeof(Car::getCars()); $i++) {
    $currentCar = Car::getCars()[$i];
    $carHtml .= "<a href=\"/recommendations/detail?car={$currentCar->id}\" class=\"d-car\">
	<div class=\"d-car-image\">
		<img src=\"{$currentCar->image}\" alt=\"car\"/>
	</div>
	<div class=\"d-car-text\">
		<h2 class=\"d-title\">" .$currentCar->year." ".$currentCar->company." ".$currentCar->model. "</h2>
		<div class=\"d-desc\">$" .number_format($currentCar->price). "</div>
	</div>
	<label>
	    <input type=\"checkbox\" class=\"d-car-bookmark-button\"/> 
        <div class=\"d-car-icon d-car-bookmark-empty\"><i class=\"fa fa-star-o fa-lg\"></i></div>
        <div class=\"d-car-icon d-car-bookmark-full\"><i class=\"fa fa-star fa-lg\"></i></div>
	</label>
	<div class='k-clearfix'></div>
</a>
";
}

$body = <<<HTML
<div class="d-rec-container">
    <div class="k-spacer k-normal"></div>

    <div id="k-compare-hover"><a href="/bookmarks" class="k-button">Compare Selected</a></div>
    <div class='k-container'>
        <h2 class='k-title'>Here's What We Found For You</h2>
        <div class='k-block-text'>
            Protip: <i style="color: #999;" class="fa fa-star"></i> your favorite vehicles to compare them!
        </div>
    </div>
    
    <div class="k-spacer k-normal"></div>
    $carHtml
    <div class="k-spacer k-normal"></div>
</div>


<script src="/js/bookmarks.js" type="text/javascript"></script>
HTML;

$navContent = <<<HTML
<div>Recommendations</div>
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Recommendations")
    ->with(StaticPage::FIELD_BODY, $body)
    ->with(StaticPage::GLOBAL_NAV_CONTENT, $navContent)
    ->render();
