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
        if($i <= 1){
            $bookmarkArray[$i] = true;
        }else{
            $bookmarkArray[$i] = false;
        }
    }
    $bookmarks = Session::set(SessionKVs::CAR_BOOKMARK_ARRAY, $bookmarkArray);
}

// Make the events div first and store the HTML in a variable
$carHtml = "";
for ($i = 0; $i < sizeof(Car::getCars()); $i++) {
    $currentCar = Car::getCars()[$i];
    $carHtml .= ' 
<a href="/recommendations/detail?car=' .$i. '" class="d-car">
	<div class="d-car-image">
		<img src="' .$currentCar->image. '" alt="car"/>
	</div>
	<div class="d-car-text">
		<h2 class="d-title">' .$currentCar->year.' '.$currentCar->company.' '.$currentCar->model. '</h2>
		<div class="d-desc">$' .number_format($currentCar->price). '</div>
	</div>
	<label>
	    <input type="checkbox" class="d-car-bookmark-button"/> 
        <div class="d-car-icon d-car-bookmark-empty"><i class="fa fa-star-o fa-lg"></i></div>
        <div class="d-car-icon d-car-bookmark-full"><i class="fa fa-star fa-lg"></i></div>
	</label>
</a>
';
}

$body = <<<HTML
<div class="k-spacer k-normal"></div>

<div class='k-container'>
    <h2 class='k-title'>Here's What We Found For You</h2>
    <div class='k-block-text'>
        We've sent our highly trained staff to find cars that fit your each and ever need and
        here are the results. Star (bookmark) each vehicle that looks nice and to compare with our
        patent pending car-parer-er in the Bookmarks tab.
    </div>
</div>

<div class="k-spacer k-normal"></div>
$carHtml
<div class="k-spacer k-normal"></div>
<div class="k-container">
    <a class="k-button k-fullscreen k-secondary" href="/bookmarks">Compare Bookmarked</a>
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
