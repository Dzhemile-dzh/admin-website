<?php
	class Website{
	public $we_id, $we_domain, $we_title, $we_description, $we_format, $we_verticals, $we_active;

		function insert($we){

			$we = new Website;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$we->$key = implode(',',$data);
				}else{
					$we->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'we_') && $key != 'we_id' && $we->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $we->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO we_website ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();
		}

		function update($we){
			$we = new Website;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$we->$key = implode(',',$data);
				}else{
					$we->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'we_') && $key != 'we_id' && $we->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $we->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['we_id'] = $we->we_id;
	        DB::prepare("UPDATE we_website SET $setStr WHERE we_id = :we_id")->execute($params);
		}

		function getWebsites() {

			$result = DB::query("SELECT *FROM we_website ORDER BY we_domain")->fetchAll();
			return $result;
		}

		function getWebsite($we_id) {

			$result = DB::query("SELECT * FROM we_website WHERE we_id = $we_id")->fetch();
			return $result;
		}

		function getWebsiteImage() {

			$result = DB::query("SELECT * FROM we_website RIGHT JOIN im_images ON we_id=im_we_id ")->fetchAll();
			return $result;
		}

		function getWebsiteBrand($we_id) {

			$result = DB::query("SELECT *,concat(we_top_picks) FROM we_website left join ab_affiliate_brand on  find_in_set( ab_id,we_top_picks) where we_id=$we_id ")->fetchAll();
			return $result;
		}

	}
?>