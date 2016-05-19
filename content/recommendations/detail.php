<?php
require_once PHP_ROOT . '/i330p3/Setup.php';
use common\base\Http;
use i330p3\template\StaticPage;
use i330p3\Car;

$carIndex = Http::getGetParamValue("car");
$car = Car::getCars()[$carIndex];

$detailHtml = '

<div class="d-detail-image">
    <img src="'.$car->image.'" href="car" >
</div>

<h2 class="d-detail-title">'.$car->year.' '.$car->company.' '.$car->model.'</h2>

<div class="d-detail-top">
    <div>
        <div class="d-detail-top-name">Price</div>
        <div class="d-detail-top-number">$'.number_format($car->price).'</div>
    </div>
    <div>
        <div class="d-detail-top-name">Mileage</div>
        <div class="d-detail-top-number">'.$car->mileage.'</div>
    </div>
</div>

<div class="d-detail-button">Hold this car</div>

<div class="d-detail-container">
    <h2>Specifications</h2>
    
    <h3>Color</h3>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Interior</div>
        <div class="d-detail-spec-data">'.$car->interior.'</div>
    </div>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Exterior</div>
        <div class="d-detail-spec-data">'.$car->exterior.'</div>
    </div>
    
    <h3>Technical</h3>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Transmission</div>
        <div class="d-detail-spec-data">'.$car->transmission.'</div>
    </div>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Drive</div>
        <div class="d-detail-spec-data">'.$car->drive.'</div>
    </div>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Engine</div>
        <div class="d-detail-spec-data">'.$car->engineLiters.'</div>
    </div>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Cylinders</div>
        <div class="d-detail-spec-data">'.$car->engineCylinders.'</div>
    </div>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Horsepower</div>
        <div class="d-detail-spec-data">'.$car->engineHp.'</div>
    </div>
    <div class="d-detail-spec">
        <div class="d-detail-spec-name">Torque</div>
        <div class="d-detail-spec-data">'.$car->engineTorque.'</div>
    </div>
    
</div>

<!--
<div class="d-detail-container">
    <h2>Reviews</h2>
    
</div>
-->

';

$body = <<<HTML
$detailHtml
HTML;

$navContent = <<<HTML
<div>Detail</div>
HTML;

StaticPage::createContent()
    ->with(StaticPage::FIELD_TITLE, "Asdf?")
    ->with(StaticPage::FIELD_BODY, $body)
    ->with(StaticPage::GLOBAL_NAV_CONTENT, $navContent)
    ->render();
