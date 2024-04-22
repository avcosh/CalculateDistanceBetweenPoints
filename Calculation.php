<?php
class Calculation 
{
	public $distance;
	public $path;
	
	public function __construct($distance, $path)
	{
	    $this->distance = $distance;
        $this->path = $path;		
	}
	
	public function run(string $first, string $second)
	{
		$first_addres =  self::getCoords($first);
		$second_addres = self::getCoords($second);
		$distant = $this->$distance->calculateDist($first_addres, $second_addres);
		echo json_encode($distant);
	}
		
	private static function getCoords($address)
	{
	    if(!$address){
	    	return false; 
		}
		$address = preg_replace("/ /i", "%20", "Санкт-Петербург" . ',' . $address);
		$data = file_get_contents($path . $address);
		if (!$data) {
		    throw new Exception("Ошибка загрузки данных");
		}
		$json = json_decode($data);
		$result['lat'] = $json -> results[0] -> geometry -> location -> lat;
		$result['lng'] = $json -> results[0] -> geometry -> location -> lng;
		return $result;
	}
	
}

?>
