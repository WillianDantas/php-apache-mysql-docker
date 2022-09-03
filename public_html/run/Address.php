<?php
class Address
{
    public  $street;
    public  $city;

    public function getGeoCoords()
    {
		$context = stream_context_create(
			array(
				"http" => array(
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
				),
			    "ssl"=>array(
						"verify_peer"=>false,
						"verify_peer_name"=>false,
				)
			)
		);
		
		/*
		$url =  ('http://nominatim.openstreetmap.org/search?q='
            . urlencode($this->street)
            . ',' . urlencode($this->city)
            . '&format=json&addressdetails=1');
		
		echo($url);
		*/
		
		# https://nominatim.openstreetmap.org/ui/search.html?street=2311+N.+Los+Robles+Avenue&city=Pasadena
		
        $data = file_get_contents(
            'http://nominatim.openstreetmap.org/search?q='
            . urlencode($this->street)
            . ',' . urlencode($this->city)
            . '&format=json&addressdetails=1', false,$context
        );
        $json = json_decode($data);
        return array(
            'lat' => $json[0]->lat,
            'lon' => $json[0]->lon
        );
    }
}
?>
