<?php
/*
Plugin Name: Codes Postaux - API Geo
Plugin URI: https://github.com/camillejg/wp-api-geo-codes-postaux
Description: Plugin de v&eacute;rification des codes postaux et retour des villes pr&eacute;sentent sur le code postal
Author: Camille JULES GASTON
Author URI: https://www.sw-developpement.com/
Text Domain: wp-api-geo-codes-postaux
Version: 1.0
Licence : GPL
*/

class apigeo{
	public function __construct(){
	}
  
	function get_city_name_with_zip_code($cp){
		if(strlen($cp) == 5 && is_numeric($cp)){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://geo.api.gouv.fr/communes?codePostal=".$cp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                           
			$content = curl_exec($ch);      
            $header  = curl_getinfo( $ch );
			curl_close($ch);    
                              
			$obj = json_decode($content);
            return $obj;   
		}else return false;
	}
    
}
if (class_exists('apigeo')) {
   $apigeo = new apigeo();
}
?>