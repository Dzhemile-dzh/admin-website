<?
 class Verticals{
 	public $ve_id,$ve_verical;

 	function getVerticals(){
			$result = DB::query("SELECT * FROM ve_verticals")->fetchAll();
			return $result;
	}

	function getVertical(){
		$resut=DB::query("SELECT *, GROUP_CONCAT(ve_vertical) as verticals
						  FROM ve_verticals
						  JOIN ab_affiliate_brand
						  ON FIND_IN_SET(ve_id,ab_verticals)")->fetch(PDO::FETCH_OBJ);
		return $result;
	}
 }
?>