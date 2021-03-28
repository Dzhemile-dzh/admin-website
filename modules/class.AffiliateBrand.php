<?php
	class AffiliateBrand{
	public $ab_id, $ab_ap_id, $ab_brand_name, $ab_verticals, $ab_markets,$ab_im_id,$ab_link,$ab_restricted, $ab_languages, $ab_licenses, $ab_currencies;

		function getBrandName() {
			$result = DB::query("SELECT * FROM  ab_affiliate_brand")->fetchAll();
			return $result;
		}

		function getBrandById($ab_id) {
			$result = DB::query("SELECT * FROM  ab_affiliate_brand LEFT JOIN ap_affiliate_program ON ap_id= ab_ap_id WHERE ab_id = $ab_id")->fetch();
			return $result;
		}

		function getBrand($ab_ap_id) {
			$result = DB::query("SELECT * 
								 FROM ab_affiliate_brand 
								 LEFT JOIN ap_affiliate_program 
								 ON ab_ap_id=ap_id 
								 WHERE ab_ap_id = $ab_ap_id")->fetch();
			return $result;
		}

		function getBrandProgram() {
			$result = DB::query("SELECT *FROM ab_affiliate_brand LEFT JOIN ap_affiliate_program ON ab_ap_id=ap_id LEFT JOIN im_images ON im_id=ab_im_id")->fetchAll();
			return $result;
		}
		function insert($ab){
			$ab = new AffiliateBrand;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$ab->$key = implode(',',$data);
				}else{
					$ab->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'ab_') && $key != 'ab_id' && $ab->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $ab->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO ab_affiliate_brand ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();
		}

		function update($ab){
			$ab = new AffiliateBrand;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$ab->$key = implode(',',$data);
				}else{
					$ab->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'ab_') && $key != 'ab_id' && $ab->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $ab->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['ab_id'] = $ab->ab_id;
	        DB::prepare("UPDATE ab_affiliate_brand SET $setStr WHERE ab_id = :ab_id")->execute($params);
		}


		function getAffiliateBrands($we_id, $we_verticals, $vistor_locale) {

			$reSQL = "OR ab_markets LIKE '%".$vistor_locale."%' ";

			$we_verticals = explode(',',$we_verticals);
			$i=0;
			foreach ($we_verticals as $vertical){
				if ($i == 0){
					$sql .= "ab_verticals LIKE '%".$vertical."%'";
				}else{
					$sql .= " OR ab_verticals LIKE '%".$vertical."%'";
				}
			$i=1;
			}

			$results = DB::query("SELECT * FROM ab_affiliate_brand WHERE ".$sql." AND ab_markets LIKE '%International%' ".$reSQL." ORDER BY ab_brand_name ASC")->fetchAll();

			foreach ($results as $result){

				if (is_numeric($result->ab_brand_name[0])){
					$key = '#';
				}else{
					$key = $result->ab_brand_name[0];
				}

				//FIND CONTENT FOR THIS BRAND & WEBSITE
				$wc = new WebsiteContent;
				$content = $wc->getWebsiteBrandContent($we_id, $result->ab_id, 'en');

				$alpha_array[$key][] = (object)array(
					'ab_id' => $result->ab_id,
					'ab_ap_id' => $result->ab_ap_id,
					'ab_content' => $content,
					'ab_brand_name' => $result->ab_brand_name,
					'ab_verticals' => $result->ab_verticals,
					'ab_markets' => $result->ab_markets
				);

			}
			return $alpha_array;
		}



	}




?>