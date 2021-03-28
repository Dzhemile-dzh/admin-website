<?
	if(isset($_GET['wm_id']) ){
	  $wm_id = $_GET['wm_id'];

	  $sql = 'DELETE FROM wm_website_menu WHERE wm_id=:wm_id';
	  $statement = DB::prepare($sql);
	  
	  if ($statement->execute([':wm_id' => $wm_id])) {
		  header("Location: https://affiliate.playersmedia.net");
	  }
	} 

	if(isset($_GET['im_id'])){
	  $im_id = $_GET['im_id'];

	  $sql = 'DELETE FROM im_images WHERE im_id=:im_id';
	  $statement = DB::prepare($sql);
	  
	  if ($statement->execute([':im_id' => $im_id])) {
		  header("Location: https://affiliate.playersmedia.net");
	  }
	}

	if(isset($_GET['wc_id'])){
	  $wc_id = $_GET['wc_id'];

	  $sql = 'DELETE FROM wc_website_content WHERE wc_id=:wc_id';
	  $statement = DB::prepare($sql);
	  
	  if ($statement->execute([':wc_id' => $wc_id])) {
		  header("Location: https://affiliate.playersmedia.net");
	  }
	} 

	if(isset($_GET['ab_id'])){
	  $ab_id = $_GET['ab_id'];

	  $sql = 'DELETE FROM ab_affiliate_brand WHERE ab_id=:ab_id';
	  $statement = DB::prepare($sql);
	  
	  if ($statement->execute([':ab_id' => $ab_id])) {
		  header("Location: https://affiliate.playersmedia.net");
	  }
	} 

    if(isset($_GET['ap_id'])){
	  $ap_id = $_GET['ap_id'];

	  $sql = 'DELETE FROM ap_affiliate_program WHERE ap_id=:ap_id';
	  $statement = DB::prepare($sql);
	  
	  if ($statement->execute([':ap_id' => $ap_id])) {
		  header("Location: https://affiliate.playersmedia.net");
	  }
	}

	if(isset($_GET['bo_id'])){
	  $bo_id = $_GET['bo_id'];

	  $sql = 'DELETE FROM bo_brand_offers WHERE bo_id=:bo_id';
	  $statement = DB::prepare($sql);
	  
	  if ($statement->execute([':bo_id' => $bo_id])) {
		  header("Location: https://affiliate.playersmedia.net");
	  }
	} 
?>