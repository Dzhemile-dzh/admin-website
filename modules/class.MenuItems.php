<?php
	class MenuItems{
	public $wm_id, $wm_we_id, $wm_menu_item, $wm_order;

		function getMenuItems() {
			$result = DB::query("SELECT * FROM  wm_website_menu")->fetchAll();
			return $result;
		}

		function insert($wm){

			$wm = new MenuItems;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$wm->$key = implode(',',$data);
				}else{
					$wm->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'wm_') && $key != 'wm_id' && $we->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $wm->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO wm_website_menu ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();
		}

		function update($wm){
			$wm = new MenuItems;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$wm->$key = implode(',',$data);
				}else{
					$wm->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'wm_') && $key != 'wm_id' && $we->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $wm->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['wm_id'] = $wm->wm_id;
	        DB::prepare("UPDATE wm_website_menu SET $setStr WHERE wm_id = :wm_id")->execute($params);
		}
	}
?>