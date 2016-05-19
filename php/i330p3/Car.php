<?php
namespace i330p3;
require_once PHP_ROOT . '/i330p3/Setup.php';

/**
 * Class Car
 */
class Car {
	private static $cars = null;
	public static function getCars() {
		if (self::$cars == null) {
			self::$cars = [
					0 => new Car(0, "BMW", "M235 I", 2015, 39998, "15K", "Beaverton (OR)", 5, 19, "Brown", "Blue", "Manual 6 Speed", "2WD", "3.0L", 6, 320, 330, "https://img2.carmax.com/img/vehicles/12770945/1/v-0x8d34d032a651d87/800.jpg"),
					1 => new Car(1, "Subaru", "WRX STI", 2016, 36998, "6K", "Beaverton (OR)", 82, 17, "Black", "Gray", "Manual 6 Speed", "4WD", "2.5L", 4, 305, 290, "https://img2.carmax.com/img/vehicles/13007523/1/v-0x8d3657f3e62559b/800.jpg"),
					2 => new Car(2, "Ford", "F150 FX4", 2014, 39998, "20K", "Clackamas (OR)", 2, 15, "Black", "White", "Automatic", "4WD", "3.5L", 6, 365, 420, "https://img2.carmax.com/img/vehicles/13007738/1/v-0x8d37b6956e01daf/800.jpg"),
					3 => new Car(3, "Dodge", "Ram 1500 Laramie", 2014, 37998, "11K", "Clackamas (OR)", 1, 15, "Black", "Red", "Automatic", "4WD", "5.7L", 8, 395, 410, "https://img2.carmax.com/img/vehicles/13007730/1/v-0x8d37a9bd9947d5a/800.jpg"),
					4 => new Car(4, "BMW", "M3", 2015, 57998, "17K", "Beaverton (OR)", 0, 17, "Black", "White", "Manual 6 Speed", "2WD", "3.0L", 6, 425, 406, "https://img2.carmax.com/img/vehicles/12952016/1/v-0x8d351ed7afffe31/800.jpg"),
					5 => new Car(5, "Dodge", "Ram 1500 Laramie", 2015, 40998, "3K", "Spokane (WA)", 9, 15, "Black", "Silver", "Automatic", "4WD", '5.7L', 8, 395, 407, "https://img2.carmax.com/img/vehicles/13007778/1/v-0x8d3708194a42c40/800.jpg"),
					6 => new Car(6, "Porsche", "Cayenne GTS", 2010, 40998, "39K", "Beaverton (OR)", 1, 13, "Brown", "White", "Automatic", "4WD", "4.8L", 8, 405, 369, "https://img2.carmax.com/img/vehicles/12455858/1/v-0x8d2da6ace58a61b/800.jpg"),
					7 => new Car(7, "Dodge", "Durango Limited", 2015, 35998, "19K", "Clackamas (OR)", 1, 17, "Black", "White", "Automatic", "4WD", "3.6L", 6, 290, 260, "https://img2.carmax.com/img/vehicles/12613332/1/v-0x8d37a0628cd4f29/800.jpg"),
					8 => new Car(8, "Jeep", "Wrangler Unlimited", 2013, 30998, "46K", "Clackamas (OR)", 15, 16, "Brown", "Yellow", "Automatic", "4WD", "3.6L", 6, 285, 260, "https://img2.carmax.com/img/vehicles/12777554/1/v-0x8d342e2c75649d4/800.jpg"),
					9 => new Car(9, "Mercedes-Benz", "C300", 2015, 33998, "15K", "Spokane (WA)", 2, 25, "Tan", "White", "Automatic", "2WD", "2.0L", 4, 241, 273, "https://img2.carmax.com/img/vehicles/12342746/1/v-0x8d2c604b701a377/800.jpg"),
					10 => new Car(10, "BMW", "328 I", 2013, 25998, "15K", "Beaverton (OR)", 5, 23, "Black", "Silver", "Automatic", "2WD", "2.0L", 4, 240, 255, "https://img2.carmax.com/img/vehicles/12260378/1/v-0x8d2c9db8d442110/800.jpg")
			];
		}
		return self::$cars;
	}

	public $id;

	// Meta
	public $company;
	public $model;
	public $year;
	public $price;
	public $mileage;
	public $location;
	public $reviews;
	public $mpg;

	// Color
	public $interior;
	public $exterior;

	// Basic
	public $transmission;
	public $drive;
	public $engineLiters;
	public $engineCylinders;
	public $engineHp;
	public $engineTorque;

	//
	public $image;

	/**
	 * Car constructor.
	 *
	 * @param $id
	 * @param $company
	 * @param $model
	 * @param $year
	 * @param $price
	 * @param $mileage
	 * @param $location
	 * @param $reviews
	 * @param $mpg
	 * @param $interior
	 * @param $exterior
	 * @param $transmission
	 * @param $drive
	 * @param $engineLiters
	 * @param $engineCylinders
	 * @param $engineHp
	 * @param $engineTorque
	 * @param $image
	 */
	public function __construct($id,
			$company,
			$model,
			$year,
			$price,
			$mileage,
			$location,
			$reviews,
			$mpg,
			$interior,
			$exterior,
			$transmission,
			$drive,
			$engineLiters,
			$engineCylinders,
			$engineHp,
			$engineTorque,
			$image) {
		$this->id = $id;
		$this->company = $company;
		$this->model = $model;
		$this->year = $year;
		$this->price = $price;
		$this->mileage = $mileage;
		$this->location = $location;
		$this->reviews = $reviews;
		$this->mpg = $mpg;
		$this->interior = $interior;
		$this->exterior = $exterior;
		$this->transmission = $transmission;
		$this->drive = $drive;
		$this->engineLiters = $engineLiters;
		$this->engineCylinders = $engineCylinders;
		$this->engineHp = $engineHp;
		$this->engineTorque = $engineTorque;
		$this->image = $image;
	}

	public function makeCompareHtml() {
		$price = "$" . number_format($this->price);
		return <<<HTML
<a class="k-compare-table-entry" href="/recommendations/detail?car={$this->id}">
	<div class="k-comp-image"><img src="{$this->image}" alt="{$this->model}" /></div>
	<div class="k-comp-year-comp-model">
		{$this->year} <span class="k-comp-alt">{$this->company}</span><br />
		{$this->model}
	</div>
	<div class="k-comp-price-mileage-reviews">
		$price<br />
		{$this->mileage} <span class="k-comp-alt">Miles</span><br />
		{$this->reviews} <span class="k-comp-alt">Reviews</span>
	</div>
	<div class="k-comp-intext">
		<span class="k-comp-alt">Interior:</span> {$this->interior}<br />
		<span class="k-comp-alt">Exterior:</span> {$this->exterior}
	</div>
	<div class="k-comp-transmission-drive">
		{$this->transmission}<br />
		{$this->drive}
	</div>
	<div class="k-comp-mpg-liters-cylinders">
		{$this->mpg} <span class="k-comp-alt">MPG</span><br />
		{$this->engineLiters}<br />
		{$this->engineCylinders} <span class="k-comp-alt">Cylinder</span>
	</div>
	<div class="k-comp-engine-hp-torque">
		{$this->engineHp} <span class="k-comp-alt">HP</span><br />
		{$this->engineTorque} <span class="k-comp-alt">Torque</span>
	</div>
</a>
HTML;
	}
}
