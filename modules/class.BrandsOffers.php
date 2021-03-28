<?php
	class BrandOffers{
	public $bo_id, $bo_ab_id,$bo_type,$bo_min,$bo_max,$bo_min_deposit,$bo_time,$bo_requirments,$bo_min_odds,$bo_overal_rating,$bo_country_id,$bo_currency,$bo_small_print,$bo_description,$bo_custum_link, $bo_color;

		function getBrandOffers($bo_id) {
			$result = DB::query("SELECT * FROM  bo_brand_offers JOIN ab_affiliate_brand ON (bo_ab_id=ab_id)  WHERE bo_id = $bo_id")->fetch();
			return $result;
		}

		function getAllBrandOffers() {
			$result = DB::query("SELECT * FROM  bo_brand_offers JOIN ab_affiliate_brand ON (bo_ab_id=ab_id)")->fetchAll();
			return $result;
		}

		function getCountry() {
			$result = DB::query("SELECT bo_country_id,id,nicename FROM  bo_brand_offers RIGHT JOIN country ON (bo_country_id=id)")->fetchAll();
			return $result;

		}

		function insert($bo){
			$bo = new BrandOffers;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$bo->$key = implode(',',$data);
				}else{
					$bo->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'bo_') && $key != 'bo_id' && $bo->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $bo->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO bo_brand_offers ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();
		}

		function update($bo){
			$bo = new BrandOffers;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$bo->$key = implode(',',$data);
				}else{
					$bo->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'bo_') && $key != 'bo_id' && $bo->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $bo->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['bo_id'] = $bo->bo_id;
	        DB::prepare("UPDATE bo_brand_offers SET $setStr WHERE bo_id = :bo_id")->execute($params);
		}

	}
?>