<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use common\base\Http;
use i330p3\template\StaticPage;
use i330p3\Car;

$carIndex = Http::getGetParamValue("car");
$car = Car::getCars()[$carIndex];

$confirmationHtml = '
<div class="d-conf-top">
    <div>
        <div class="d-conf-top-name">Location</div>
        <div class="d-conf-top-number">'.$car->location.'</div>
    </div>
</div>
';

$body = <<<HTML

<img class="d-conf-img" src="http://liveinportland.net/wp-content/uploads/2012/12/Cedar-Hills-Beaverton-OR-Google-Maps.jpg" alt="map" />

<h2 class="d-detail-title">Hold Confirmed</h2>

$confirmationHtml

HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Detail")
    ->with(StaticPage::FIELD_BODY, $body)
    ->render();
