<?
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require('../conf/affiliatecms/conf-affmanager.php');

	/* CHANGE WEBSITE MANAGEMENT */
	$current_we_id = 0;
	if (isset($_POST['change_we_id']) || isset($_GET['change_we_id'])){
		setcookie("current_we_id", "", time()-10, "/");
		if ($_POST['change_we_id'] > 0 || $_GET['change_we_id'] > 0){
			//CHANGING DOMAIN
			if ($_POST['change_we_id'] > 0){
				$current_we_id = $_POST['change_we_id'];
			}else{
				$current_we_id = $_GET['change_we_id'];
			}
			setcookie('current_we_id', $current_we_id);
		}else{
			//CHANGING TO NO DOMAIN
			setcookie("current_we_id", "", time()-10, "/");
		}
	}elseif (isset($_COOKIE["current_we_id"]) && $_COOKIE["current_we_id"] > 0){
		//DOMAIN SET
		$current_we_id = $_COOKIE["current_we_id"];
	}
	/* CHANGE WEBSITE MANAGEMENT */
	require(ROOT_PATH.'modules/class.Game.php');
	$gm = new Game;
	include('inc/inc.operations.php');
	//REQUIRED FOR ALL
	$websites = $we->getWebsites();
	$verticals = $ve->getVerticals();
	$affiliate_brands = $ab->getBrandName();		
	$affiliate_programs = $ap->getAffiliateProgram();
	$brand_programs = $ab->getBrandProgram();
	$menu_items_co = $wm->getMenuItems();
    $countries = $bo->getCountry();
    $images = $im->getImage();
    $offers = $bo->getAllBrandOffers();


	if ($current_we_id > 0){
		//WHEN WEBSITE SELECTED GET RELEVANT DATA
		$website = $we->getWebsite($current_we_id);
		$imagesi = $im->getImages($current_we_id);
		$verticalscon = $ve->getVerticals();
		$affiliate_brands = $ab->getBrandName();
		$get_last_domain_id = $wc->getDomainLastId($current_we_id);
	    $menu_items_con = $wm->getMenuItem($current_we_id);
		$all_menu_items = $wm->getAllMenuItems($current_we_id);
		// $topBrands=$pmd->getPromotedBrands($current_we_id);print_r($topBrands);
        $contents = $wc->getWebsiteContents($current_we_id);
        $games = $gm->getGames($current_we_id);	
    
		if (isset($_GET['page']) && $_GET['page'] == 'content' && $_GET['edit'] > 0){
			//EDITING ONE ARTICLE
			$wc_id = $_GET['edit'];
			$contentedit = $wc->getContentByID($wc_id,$current_we_id);

			if ($current_we_id != $contentedit->wc_we_id) {
				header("Location: https://affiliate.playersmedia.net");
			}
		}else{
			//NOT EDITING GET ALL		
		}
	}else{
		if ($_GET['page'] == 'content-all'){
			//WHEN NO WEBSITE SELECTED
			$contents = $wc->getWebsitesContents();
		}elseif ($_GET['page'] == 'content'){
			//NO WEBSITE ID SET BUT ON CONTENT PAGE RELOCATE TO HOMEPAGE
			header("Location: https://affiliate.playersmedia.net");
		}
	}
	if (isset($_GET['page']) && $_GET['page'] == 'game' && $_GET['edit'] > 0){
		$gm_id= $_GET['edit'];
		$game_edit =$gm->getGamesById($current_we_id, $gm_id);
		if ($current_we_id != $game_edit->wc_we_id) {
			header("Location: https://affiliate.playersmedia.net");
		}
	}else{
		if ($_GET['page'] == 'games-all'){
			$all_games = $gm->getGames();
			if ($current_we_id) {
				header("Location: https://affiliate.playersmedia.net");
			}
		}
	}
    //AFFILIATE PROGRAM PAGES 
	if (isset($_GET['page']) && $_GET['page'] == 'affiliate' && $_GET['edit'] > 0){
		$ap_id= $_GET['edit'];
		$affiliate_program_edit =$ap->getAffiliateById($ap_id);
		if ($current_we_id) {
			header("Location: https://affiliate.playersmedia.net");
		}	
	}else{
		if ($_GET['page'] == 'affiliate-all'){
			$affiliate_programs = $ap->getAffiliateProgram();
			if ($current_we_id) {
				header("Location: https://affiliate.playersmedia.net");
			}
		}
	}

	//MENU ITEMS PAGES 
	if (isset($_GET['page']) && $_GET['page'] == 'menu-item' && $_GET['edit'] > 0){
		$wm_id = $_GET['edit'];
		$menu_item_edit = $wm->getMenuItemById($wm_id,$current_we_id);
		if (!($current_we_id)) {
			header("Location: https://affiliate.playersmedia.net");
		}	
	}else{
		if ($_GET['page'] == 'menu-items-all'){
			$menu_items = $wm->getMenuItem($current_we_id);
			if (!($current_we_id)) {
				header("Location: https://affiliate.playersmedia.net");
			}
		}
	}
	if (isset($_GET['page']) && $_GET['page'] == 'delete' && $_GET['wm_id'] > 0){
		$wm_id = $_GET['wm_id'];
		$all_menu_items = $wm->getMenuItemById($wm_id,$current_we_id);
		if (!($current_we_id)) {
			header("Location: https://affiliate.playersmedia.net");
		}
	}

   //IMAGE DELETE
	if (isset($_GET['page']) && $_GET['page'] == 'delete' && $_GET['im_id'] > 0){
		$im_id = $_GET['im_id'];
		$all_images = $im->getImageById($im_id,$current_we_id);
		if (!($current_we_id)) {
			header("Location: https://affiliate.playersmedia.net");
		}
	}


    //BRAND OFFERS PAGES
	/*if (isset($_GET['page']) && $_GET['page'] == 'brand-offers' && $_GET['bo_id'] > 0){
		$bo_id = $_GET['bo_id'];
	$brand_offer = $bo->getBrandOffers($bo_id);
		if ($current_we_id) {
			header("Location: https://affiliate.playersmedia.net");
		}
	}	*/
	if (isset($_GET['page']) && $_GET['page'] == 'brand-offers' && $_GET['edit'] > 0){
		$bo_id = $_GET['edit'];
		$brand_offers = $bo->getBrandOffers($bo_id);

		if ($current_we_id) {
			header("Location: https://affiliate.playersmedia.net");
		}	
	}
	else{
		if ($_GET['page'] == 'brand-offers-all'){
			$brand_offersi = $bo->getAllBrandOffers();
			if ($current_we_id) {
				header("Location: https://affiliate.playersmedia.net");
			}
		}
	}

	
    //AFFILIATE PROGRAM BRAND PAGES
	if (isset($_GET['page']) && $_GET['page'] == 'affiliate-brand' && $_GET['ap_id'] > 0){
		$ab_ap_id= $_GET['ap_id'];
		$aff_program_brand = $ab->getBrand($ab_ap_id);
		if ($current_we_id) {
			header("Location: https://affiliate.playersmedia.net");
		}
	}	
	elseif (isset($_GET['page']) && $_GET['page'] == 'affiliate-brand' && $_GET['edit'] > 0){
		$ab_id= $_GET['edit'];
		$aff_program_brand =$ab->getBrandById($ab_id);
		if ($current_we_id) {
			header("Location: https://affiliate.playersmedia.net");
		}
	}
	else{
		if ($_GET['page'] == 'affiliate-brands'){
			$brand_programs = $ab->getBrandProgram();
			if ($current_we_id) {
				header("Location: https://affiliate.playersmedia.net");
			}
		}
	}

    //IMAGES PAGES
	if (isset($_GET['page']) && $_GET['page'] == 'image-upload' && $current_we_id > 0){ 
		$images = $im->getImages($current_we_id);
			if (!($current_we_id)) {
				header("Location: https://affiliate.playersmedia.net");
			}
	}else{
		if ($_GET['page'] == 'image-all'){
			$images = $im->getImages($current_we_id);
				if (!($current_we_id)) {
					header("Location: https://affiliate.playersmedia.net");
				}
		}
	}

	if (isset($_GET['page']) && $_GET['page'] == 'top-positions' && $_GET['edit'] > 0){
		$current_we_id= $_GET['edit'];
        $affiliate_bran=$we->getWebsiteBrand($current_we_id);
		/*$pbm_we_id= $_GET['edit'];*/
		$topBrands=$pbm->getPromotedBrands($current_we_id,'GB');print_r($topBrands);
	}


	if (isset($_GET['page']) && $_GET['page'] == 'cv-generator'){
		$current_we_id= $_GET['edit'];
        $affiliate_bran=$we->getWebsiteBrand($current_we_id);

	}
?>
