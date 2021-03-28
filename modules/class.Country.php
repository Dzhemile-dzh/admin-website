<?php
	class Countries{
	public $id ,$iso,$name,$nicename,$iso3,$numcode,$phonecode;
		function getCountries(){
			$result = DB::query("SELECT * FROM country")->fetchAll();
			return $result;
		}
	}
?>