<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use i330p3\CarArray;
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;

Session::set(SessionKVs::TUTORIAL_KEY, SessionKVs::TUTORIAL_VALUE_ACTIVE);

if(!Session::exists(SessionKVs::CAR_BOOKMARK_ARRAY)){
    $bookmarks = Session::set(SessionKVs::CAR_BOOKMARK_ARRAY, array(false, false, false, false));
}

// Make the events div first and store the HTML in a variable
$carHtml = "";
for ($i = 0; $i <= 3; $i++) {
    $carHtml .= ' 
<a href="/recommendations/detail?car=' .$i. '" class="d-car">
	<div class="d-car-image">
		<img src="' .CarArray::getArray()[$i][0]. '" alt="car"/>
	</div>
	<div class="d-car-text">
		<h2 class="d-title">' .CarArray::getArray()[$i][1]. '</h2>
		<div class="d-desc">' .CarArray::getArray()[$i][2]. '</div>
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
$carHtml
HTML;

$navContent = <<<HTML
<div>Recommendations</div>
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Recommendations")
    ->with(StaticPage::FIELD_BODY, $body)
    ->with(StaticPage::GLOBAL_NAV_CONTENT, $navContent)
    ->render();
