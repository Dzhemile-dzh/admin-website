<?
	class Images {
	public $im_id,$im_filename,$im_we_id,$im_type;
	function update($im){
			$im = new Images;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$im->$key = implode(',',$data);
				}else{
					$im->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'im_') && $key != 'im_id' && $im->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $im->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['im_id'] = $im->im_id;
	        DB::prepare("UPDATE im_images SET $setStr WHERE im_id = :im_id")->execute($params);
		}

	function insert($im_filename, $im_we_id,$im_type){

		$im = new Images;
		$params['im_filename'] = $im_filename;
		$params['im_we_id'] = $im_we_id;
		$params['im_type'] = $im_type;
		$setStr = "`im_filename`, `im_we_id`,`im_type`";
		$setParams = ":im_filename, :im_we_id, :im_type";
		$query = DB::prepare("INSERT INTO im_images ($setStr) VALUES ($setParams)")->execute($params);
		return DB::lastInsertId();
	}


	function getImages($we_id){
		$result = DB::query("SELECT * FROM im_images WHERE im_we_id = $we_id")->fetchAll();
		return $result;	
	}
	function getImage(){
		$result = DB::query("SELECT * FROM im_images")->fetchAll();
		return $result;	
	}
	function getImageById($im_id,$we_id) {
			$result = DB::query("SELECT * FROM  im_images WHERE im_id=$im_id AND im_we_id=$we_id")->fetch();
			return $result;
	}
}

?>