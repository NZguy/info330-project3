<?php
namespace i330p3;
require_once PHP_ROOT . '/i330p3/Setup.php';

class CarArray {
    public static function getArray() {
        return array(
            array("https://img2.carmax.com/img/vehicles/12770945/1/v-0x8d34d032a651d87/800.jpg", "2015 BMW M235 I", "$39,998"),
            array("https://img2.carmax.com/img/vehicles/13007523/1/v-0x8d3657f3e62559b/800.jpg", "2016 Subaru WRX STI", "$36,998"),
            array("https://img2.carmax.com/img/vehicles/13007738/1/v-0x8d37b6956e01daf/800.jpg", "2014 Ford F150 FX4", "$39,998"),
            array("https://img2.carmax.com/img/vehicles/13007730/1/v-0x8d37a9bd9947d5a/800.jpg", "2014 Dodge Ram 1500 Laramie", "$37,998")
        );
    }
}
