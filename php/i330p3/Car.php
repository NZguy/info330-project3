<?php
namespace i330p3;
require_once PHP_ROOT . '/i330p2/Setup.php';

/**
 * Class Car
 */
class Car {
	private static $cars = null;
	public static function getCars() {
		if (self::$cars == null) {
			self::$cars = [
					0 => new Car(0, "BMW", "M235", 2015, 39998, "15K", "Beaverton (OR)", 5, 19, "Brown", "Blue", "Manual 6 Speed", "2WD", "3.0L", 6, 320, 330, "https://img2.carmax.com/img/vehicles/12770945/1/v-0x8d34d032a651d87/800.jpg"),
					1 => new Car(1, "Dodge", "Ram 1500 Laramie", 2014, 37998, "11K", "Clackamas (OR)", 1, 15, "Black", "Red", "Automatic", "4WD", "5.7L", 8, 395, 410, "https://img2.carmax.com/img/vehicles/13007730/1/v-0x8d37a9bd9947d5a/800.jpg"),
					2 => new Car(2, "Ford", "F150 FX4", 2014, 39998, "20K", "Clackamas (OR)", 2, 15, "Black", "White", "Automatic", "4WD", "3.5L", 6, 365, 420, "https://img2.carmax.com/img/vehicles/13007738/1/v-0x8d37b6956e01daf/800.jpg"),
					3 => new Car(3, "Subaru", "WRX STI", 2016, 36998, "6K", "Beaverton (OR)", 82, 17, "Black", "Gray", "Manual 6 Speed", "4WD", "2.5L", 4, 305, 290, "https://img2.carmax.com/img/vehicles/13007523/1/v-0x8d3657f3e62559b/800.jpg")
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


}
