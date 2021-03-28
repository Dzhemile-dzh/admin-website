<?php
	class WebsitePage{
	public $wp_id, $wp_page, $wp_description, $wp_body;
		function getWebsitePages() {
			$result = DB::query("SELECT * FROM wp_website_page")->fetchAll();
			return $result;
		}
	}

?>