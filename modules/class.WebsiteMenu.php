<?php
	class WebsiteMenu{
	public $wm_id, $wm_we_id, $wm_menu_item, $wm_order,$wm_active;
		function insert($wm){
			$wm = new WebsiteMenu;
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
				if (strstr($key, 'wm_') && $key != 'wm_id' && $wm->$key != "")
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
			$wm = new WebsiteMenu;
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
	            if (strstr($key, 'wm_') && $key != 'wm_id' && $wm->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $wm->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['wm_id'] = $wm->wm_id;
	        DB::prepare("UPDATE wm_website_menu SET $setStr WHERE wm_id = :wm_id")->execute($params);
		}
		function getMenuItems() {
			$result = DB::query("SELECT * FROM  wm_website_menu")->fetchAll();
			return $result;
		}
		function getMenuItemById($wm_id,$wm_we_id) {
			$result = DB::query("SELECT * FROM  wm_website_menu WHERE wm_id=$wm_id AND wm_we_id=$wm_we_id")->fetch();
			return $result;
		}
		function getMenuItem($wm_we_id) {

			$menu_items = DB::query("SELECT * FROM wm_website_menu WHERE wm_we_id = $wm_we_id AND wm_active = 'y' ORDER BY wm_order ASC")->fetchAll();

			foreach ($menu_items as $k => $menu_item){

				$menu_item_content = DB::query("SELECT wc_id, wc_title, wc_category,wc_image FROM wc_website_content WHERE wc_wm_id = $menu_item->wm_id")->fetchAll();
				$menu_items[$k]->wm_wc_content = $menu_item_content;

			}
		//	echo"<pre>.`.`.`.`.`.";print_r($menu_items);exit;

			return $menu_items;






/*
			$menu_items = DB::query("SELECT wm_website_menu.*,wc_im_id,
									 GROUP_CONCAT(wc_title  SEPARATOR '|') AS content_title,
									 GROUP_CONCAT(wc_id) AS content_id,
									 GROUP_CONCAT(wc_category) AS content_category,
									 GROUP_CONCAT(wc_image) AS content_image 
									 FROM wm_website_menu 
									 LEFT JOIN wc_website_content
									 ON find_in_set(wc_wm_id,wm_id)
									 WHERE wm_we_id=$wm_we_id
									 GROUP BY wm_id 
									 ORDER BY wm_order")->fetchAll();
			foreach ($menu_items as $key => $menu_item) {
				$titles = explode('|',$menu_item->content_title);
				$menu_items[$key]->content_title = $titles;
				$ids = explode(',',$menu_item->content_id);
				$menu_items[$key]->content_id = $ids;
				$categories = explode(',',$menu_item->content_category);
				$menu_items[$key]->content_category = $categories;
				$images = explode(',',$menu_item->content_image);
				$menu_items[$key]->content_image= $images;
			} 
			return $menu_items;*/
		}
		function getMenuItemContents($wm_we_id) {
			$result = DB::query("SELECT * FROM wm_website_menu LEFT JOIN wc_website_content ON wm_id=wc_wm_id LEFT JOIN im_images ON im_id=wc_image WHERE wm_we_id = $wm_we_id  AND wm_menu_item='Homepage'")->fetchAll();
			return $result;
		}
	   function getAllMenuItems($wm_we_id) {
			$result = DB::query("SELECT * FROM wm_website_menu LEFT JOIN  wc_website_content ON wm_id=wc_wm_id WHERE wm_we_id = $wm_we_id")->fetchAll();
			return $result;
		}		
	}
?>