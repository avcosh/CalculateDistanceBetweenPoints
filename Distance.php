<?php

class Distance 
{
	public function calculateDist(string $first, string $second) :float
	{
		$distance = self::calculate($first['lat'], $first['lng'], $second['lat'], $second['lng']);
		return $distance/1000;
	}
	
	private static function calculate(float $lat1, float $lng1, float $lat2, float $lng2) :float
	{
		// переводим координаты в радианы
		$lat1 = $lat1 * M_PI / 180;
		$lat2 = $lat2 * M_PI / 180;
		$lng1 = $lng1 * M_PI / 180;
		$lng2 = $lng2 * M_PI / 180;
		// косинусы и синусы широт и разницы долгот
		$cl1 = cos($lat1);
		$cl2 = cos($lat2);
		$sl1 = sin($lat1);
		$sl2 = sin($lat2);
		$delta = $lng2 - $lng1;
		$cdelta = cos($delta);
		$sdelta = sin($delta);
		// вычисления длины большого круга
		$y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
		$x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
		// получаем расстояние, 6372795 = радиус Земли
		$ad = atan2($y, $x);
		$dist = round($ad * 6372795);
		
		return $dist;
	}
}
