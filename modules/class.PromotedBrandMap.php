<?php
	class PromotedBrandMap extends AffiliateBrand{
	public $pbm_id, $pbm_we_id, $pbm_ab_order, $pbm_locale;

		function getPromotedBrands($we_id, $visitor_locale = NULL) {

			if ($visitor_locale == NULL){
				$visitor_locale = 'XX';
			}

			$promoted_brands = DB::query("SELECT * FROM pbm_promoted_brands_map 
										  WHERE pbm_we_id = $we_id 
										  AND pbm_locale = '".$visitor_locale."'")->fetch();
			$promoted_brands->pbm_ab_order = unserialize($promoted_brands->pbm_ab_order);

			foreach ($promoted_brands->pbm_ab_order as $k => $pbm_ab_id){
				
				$brand = DB::query("SELECT ab_affiliate_brand.*, im_images.*,bo_type,bo_max,bo_min,bo_min_deposit,bo_currency, GROUP_CONCAT(ve_vertical) AS brand_verticals  
					                FROM ab_affiliate_brand 
									LEFT JOIN im_images 
									ON ab_im_id = im_id 
									LEFT JOIN ve_verticals
									ON find_in_set(ve_id,ab_verticals) 
									LEFT JOIN bo_brand_offers
									ON ab_id = bo_ab_id
									WHERE ab_id = $pbm_ab_id ")->fetch();
				$promoted_brands->pbm_ab_order[$k] = $brand;
			}
		   foreach ($promoted_brands->pbm_ab_order as $key => $vertical) {
				$verticals = explode(',',$vertical->brand_verticals);
				$promoted_brands->pbm_ab_order[$key]->brand_verticals = $verticals;
			} 
			return $promoted_brands;
		}
	}
?>