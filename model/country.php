<?php
/**
 * Countries model class
 * Versão 1.0
 * @author André Nankran <andrenankran@gmail.com.br>
 */

namespace Model;

class Country {

  	/**
   	* Search all results
   	* @access public
   	* @return string
  	*/
	public static function all()
	{
		$records = file_get_contents('cache/countries.csv');
    return $records;
	}

}
