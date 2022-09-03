<?php

$p = new BtgPactual();
$result =  $p->getFundos();

echo $result;


class BtgPactual{
	 
	 public function getFundos( )
    {
		$context = stream_context_create(
			array(
				"http" => array(
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
				)
			)
		);
		
        $data = file_get_contents(
            'https://www.btgpactualdigital.com/services/public/funds/2504'
			, false
			,$context
        );
         
		 $json = json_decode($data);
		 
		 echo $json->id ."<br/>" ;
		 echo $json ->product . "<br/>";
         
		 $data= json_decode( json_encode($data), true);
		 
		 return $data;
    }


}

?>