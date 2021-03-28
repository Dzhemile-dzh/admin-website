<?php
	class AffiliateProgram{
	public $ap_id, $ap_name, $ap_website, $ap_super_affiliate_link;

		function getAffiliatePrograms() {
			$result = DB::query("SELECT * FROM ap_affiliate_program")->fetchAll();
			return $result;
		}

		function getAffiliateById($ap_id) {
			$result = DB::query("SELECT * FROM ap_affiliate_program WHERE ap_id = $ap_id")->fetch();
			return $result; 
		}

		function getAffiliateProgram() {
			$result = DB::query("SELECT *,group_concat(ab_brand_name)as brand_name 
								 FROM ab_affiliate_brand 
								 RIGHT JOIN ap_affiliate_program 
								 ON ab_ap_id=ap_id 
								 GROUP BY ab_ap_id")->fetchAll();
			return $result;
		}
		function insert($ap){
			$ap = new AffiliateProgram;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$ap->$key = implode(',',$data);
				}else{
					$ap->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'ap_') && $key != 'ap_id' && $ap->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $ap->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO ap_affiliate_program ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();
		}

		function update($ap){
			$ap = new AffiliateProgram;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$ap->$key = implode(',',$data);
				}else{
					$ap->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'ap_') && $key != 'ap_id' && $ap->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $ap->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['ap_id'] = $ap->ap_id;
	        DB::prepare("UPDATE ap_affiliate_program SET $setStr WHERE ap_id = :ap_id")->execute($params);
		}

	}




?>