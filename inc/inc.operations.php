<? 
	/*ADD OR EDIT WEBSITE */
	if (isset($_POST['ADD_WEBSITE'])){
		$we_id = $we->insert($_POST);
	}
	if (isset($_POST['UPDATE_WEBSITE'])){
		$we_id = $we->update($_POST);
	}
	/*ADD OR EDIT CONTENT */
	if (isset($_POST['ADD_CONTENT'])){
		$wc_id = $wc->insert($_POST);
	}
	if (isset($_POST['UPDATE_CONTENT'])){
		$wc_id = $wc->update($_POST);
	}
	/*ADD OR EDIT AFFILIATE PROGRAM */	
	if (isset($_POST['ADD_AFFILIATE'])){
		$ap_id = $ap->insert($_POST);
	}
	if (isset($_POST['UPDATE_AFFILIATE'])){
		$ap_id = $ap->update($_POST);
	}
	//
	if (isset($_POST['UPDATE_TOP_PICKS'])){
		$we_id = $we->update($_POST);
	}
	/*ADD OR EDIT AFFILIATE BRAND */
	if (isset($_POST['ADD_AFFILIATE_BRAND'])){
		$ab_id = $ab->insert($_POST);
	}
	if (isset($_POST['UPDATE_AFFILIATE_BRAND'])){
		$ab_id = $ab->update($_POST);
	}
	/*ADD OR EDIT MENU ITEMS */
	if (isset($_POST['ADD_MENU_ITEM'])){
		$wm_id = $wm->insert($_POST);
	}
	if (isset($_POST['UPDATE_MENU_ITEM'])){
		$wm_id = $wm->update($_POST);

	}

	/*ADD OR EDIT BRAND OFFERS */
	if (isset($_POST['ADD_BRAND_OFFERS'])){
		$bo_id = $bo->insert($_POST);
	}
	if (isset($_POST['UPDATE_BRAND_OFFERS'])){
		$bo_id = $bo->update($_POST);

	}
	if (isset($_POST['ADD_GAME'])){
		$gm_id = $gm->insert($_POST);
	}
	if (isset($_POST['UPDATE_GAME'])){
		$gm_id = $gm->update($_POST);

	}

	/*UPLOADING IMAGES */
	if (isset($_POST['UPDATE_IMAGE'])){
		$im_id = $im->update($_POST);

	}
	if (isset($_POST['UPLOAD_IMAGE'])){
        $file_name = $_FILES['im_image']['name'];
        $tmp_dir = $_FILES['im_image']['tmp_name'];
        $upload_dir = 'img/content/';
        $file_extension = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $im_filename = $file_name;
        move_uploaded_file($tmp_dir, $upload_dir.$im_filename); 
		$im_id = $im->insert($im_filename, $current_we_id,$im_type);
	}
	
?>