<?php
	class WebsiteContent{
	public  $wc_id, $wc_domain_id, $wc_ab_id, $wc_we_id, $wc_wm_id, $wc_title, $wc_body, $wc_image, $wc_category, $wc_verticals, $wc_locale, $wc_timestamp, $wc_im_id;

		function insert($wc){
			$wc = new WebsiteContent;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$wc->$key = implode(',',$data);
				}else{
					$wc->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'wc_') && $key != 'wc_id' && $wc->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $wc->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO wc_website_content ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();

		}

		function update($wc){
			$wc = new WebsiteContent;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$wc->$key = implode(',',$data);
				}else{
					$wc->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'wc_') && $key != 'wc_id' && $wc->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $wc->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['wc_id'] = $wc->wc_id;
	        DB::prepare("UPDATE wc_website_content SET $setStr WHERE wc_id = :wc_id")->execute($params);
		}

		function getWebsitesContents() {
			$result = DB::query("SELECT * FROM wc_website_content")->fetchAll();
			return $result;
		}
		function getWebsitesContentsImage($wc_we_id) {
			$result = DB::query("SELECT * FROM wc_website_content left JOIN im_images ON im_id=wc_im_id AND wc_we_id = $wc_we_id")->fetch();
			return $result;
		}

				function getWebsiteContentByWMid($wc_wm_id, $wc_we_id){ 
			return DB::query("SELECT * FROM wc_website_content WHERE wc_wm_id = $wc_wm_id AND wc_we_id = $wc_we_id")->fetchAll();
		}

		function getWebsiteContents($we_id) {
			$result = DB::query("SELECT * FROM wc_website_content WHERE wc_we_id = $we_id")->fetchAll();
			return $result;
		}

		function getContentByID($wc_id,$wc_we_id) {
			$result = DB::query("SELECT * FROM wc_website_content WHERE wc_id = $wc_id AND wc_we_id = $wc_we_id")->fetch();
			return $result;
		}
		function getWebsiteContentByLimit($we_id, $in, $out) {
			$result = DB::query("SELECT * FROM wc_website_content LEFT JOIN im_images ON im_id=wc_im_id WHERE wc_we_id = $we_id LIMIT $in,$out")->fetchAll();
			return $result;
		}
		/* FRONT END FUNCTIONS */
				
		function getWebsiteContentByID($wc_id, $we_id, $locale) {
			$result = DB::query("SELECT * FROM wc_website_content WHERE wc_id = $wc_id AND wc_we_id = $we_id")->fetch();
		
			return $result;

		}
		function getWebsiteBrandContent($we_id, $ab_id, $locale ='en') {
			$result = DB::query("SELECT * FROM wc_website_content WHERE wc_we_id = $we_id AND wc_ab_id = $ab_id AND wc_locale = '".$locale."'")->fetch();
			return $result;
		}
		function getDomainLastId($we_id){
			$result = DB::query("SELECT max(wc_domain_id)as last_id  FROM wc_website_content")->fetch();
			return $result;
		}
	}
?>