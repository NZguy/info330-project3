<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
require_once PHP_ROOT . '/i330p3/CarArray.php';
use i330p3\template\StaticPage;
use i330p3\SessionKVs;
use common\session\Session;

Session::set(SessionKVs::TUTORIAL_KEY, SessionKVs::TUTORIAL_VALUE_ACTIVE);

/*
if(Session::exists(SessionKVs::CAR_BOOKMARK_ARRAY)){
    $bookmarks = Session::get(SessionKVs::CAR_BOOKMARK_ARRAY);
}
*/

// Make the events div first and store the HTML in a variable
$carHtml = "";
for ($i = 0; $i <= 3; $i++) {
    $carHtml .= ' 
<a href="#" class="d-car">
	<div class="d-car-image">
		<img src="'.$carArray[$i][0].'" alt="car"/>
	</div>
	<div class="d-car-text">
		<div class="d-title">'.$carArray[$i][1].'</div>
		<div class="d-desc">'.$carArray[$i][2].'</div>
	</div>
	<div class="d-car-icon visible"><i class="fa fa-star-o fa-lg"></i></div>
	<div class="d-car-icon hidden"><i class="fa fa-star fa-lg"></i></div>
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
