<?php
/**
 * Countries controller class
 * Versão 1.0
 * @author André Nankran <andrenankran@gmail.com.br>
 */

namespace Controller;

use Model\Country;

class CountryController {

	/**
   	* Requires all results
   	* @uses Country
   	* @access public
   	* @return json
  	*/
	public function all()
	{
		$records = Country::all();
		$arrayRecords = explode("\n",$records);
		return json_encode($arrayRecords);
	}

}
