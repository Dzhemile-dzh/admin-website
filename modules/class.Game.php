<?	
	class Game
	{
		public $gm_id, $gm_title, $gm_paylines_num, $gm_rtp, $gm_paylines, $gm_providers, $gm_reels, $gm_free_spins, $gm_bonus_rounds, $gm_wild_symbol, $gm_scatter_symbol, $gm_multiplier, $gm_progressive, $gm_autoplay, $gm_mobile, $gm_min_bonus, $gm_max_bonus;

		public function getGames($wc_we_id){
			$games = DB::query("SELECT * FROM gm_game aleft 
				left join wc_website_content 
				on wc_gm_id = gm_id 
				WHERE wc_we_id = $wc_we_id")->fetchAll();
			return $games;
		}
		public function getGamesById($wc_we_id,$gm_id){
			$games = DB::query("SELECT * FROM gm_game aleft 
				left join wc_website_content 
				on wc_gm_id = gm_id 
				WHERE wc_we_id = $wc_we_id
				AND gm_id = $gm_id")->fetch();
			return $games;
		}
		function insert($gm){
			$gm = new Game;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$gm->$key = implode(',',$data);
				}else{
					$gm->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'gm_') && $key != 'gm_id' && $gm->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $gm->$key;
					}
			}
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = DB::prepare("INSERT INTO gm_game ($setStr) VALUES ($setParams)")->execute($params);
			return DB::lastInsertId();

		}

		function update($gm){
			$gm = new Game;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$gm->$key = implode(',',$data);
				}else{
					$gm->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'gm_') && $key != 'gm_id' && $gm->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $gm->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['gm_id'] = $gm->gm_id;
	        DB::prepare("UPDATE gm_game SET $setStr WHERE gm_id = :gm_id")->execute($params);
		}

	}
?>