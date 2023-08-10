<?php 
	include_once dirname(__FILE__) . "/functions/database.php";
	include_once dirname(__FILE__) . "/functions/library.php";
	include_once dirname(__FILE__) . "/functions/action.php";

	$action = new action();

	$doc = new DOMDocument('1.0', 'utf-8');

	$root = $doc->createElement('urlset');

	$root->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
	$root->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
	$root->setAttribute('xsi:schemaLocation', '"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

	$doc->appendChild($root);

	$url = $doc->createElement('url');

	// $url->nodeValue = 'Tony Nguyen';
	// $from->xmlns = 'http://www.sitemaps.org/schemas/sitemap/0.';

	// $from->setAttribute('name', 'New york');
	// $from->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
	// $from->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
	// $from->setAttribute('xsi:schemaLocation', '"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

	$root->appendChild($url);

	$loc = $doc->createElement('loc');
	$protocol = $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
	$domain = $protocol.$_SERVER['SERVER_NAME'];
	$loc->nodeValue = $domain;
	$url->appendChild($loc);

	$lastmod = $doc->createElement('lastmod');
	$date = date('Y-m-d\TH:i:s').'+00:00';
	$lastmod->nodeValue = $date;
	$url->appendChild($lastmod);

	$priority = $doc->createElement('priority');
	$priority->nodeValue = '1.00';
	$url->appendChild($priority);

	//////////////////////////////

	// $list_procat = $action->getList('productcat', 'state', '1', 'productcat_id', 'desc', '', '', '');

	// foreach ($list_procat as $item) {
	// 	$url = $doc->createElement('url');
	// 	$root->appendChild($url);

	// 	$loc = $doc->createElement('loc');
	// 	$loc->nodeValue = $domain.'/'.$item['friendly_url'];
	// 	$url->appendChild($loc);

	// 	$lastmod = $doc->createElement('lastmod');
	// 	$date = date('Y-m-d\TH:i:s').'+00:00';
	// 	$lastmod->nodeValue = $date;
	// 	$url->appendChild($lastmod);

	// 	$priority = $doc->createElement('priority');
	// 	$priority->nodeValue = '0.80';
	// 	$url->appendChild($priority);
	// }


	//////////////////////////////

	// $list_pro = $action->getList('product', 'state', '1', 'product_id', 'desc', '', '', '');

	// foreach ($list_pro as $item) {
	// 	$url = $doc->createElement('url');
	// 	$root->appendChild($url);

	// 	$loc = $doc->createElement('loc');
	// 	$loc->nodeValue = $domain.'/'.$item['friendly_url'];
	// 	$url->appendChild($loc);

	// 	$lastmod = $doc->createElement('lastmod');
	// 	$date = date('Y-m-d\TH:i:s').'+00:00';
	// 	$lastmod->nodeValue = $date;
	// 	$url->appendChild($lastmod);

	// 	$priority = $doc->createElement('priority');
	// 	$priority->nodeValue = '0.80';
	// 	$url->appendChild($priority);
	// }

	//////////////////////////////

	$list_news = $action->getList('news', '', '', 'news_id', 'desc', '', '', '');

	foreach ($list_news as $item) {
		$url = $doc->createElement('url');
		$root->appendChild($url);

		$loc = $doc->createElement('loc');
		$loc->nodeValue = $domain.'/'.$item['friendly_url'];
		$url->appendChild($loc);

		$lastmod = $doc->createElement('lastmod');
		$date = date('Y-m-d\TH:i:s').'+00:00';
		$lastmod->nodeValue = $date;
		$url->appendChild($lastmod);

		$priority = $doc->createElement('priority');
		$priority->nodeValue = '0.80';
		$url->appendChild($priority);
	}

	//////////////////////////////

	$list_service = $action->getList('service', '', '', 'service_id', 'desc', '', '', '');

	foreach ($list_service as $item) {
		$url = $doc->createElement('url');
		$root->appendChild($url);

		$loc = $doc->createElement('loc');
		$loc->nodeValue = $domain.'/'.$item['friendly_url'];
		$url->appendChild($loc);

		$lastmod = $doc->createElement('lastmod');
		$date = date('Y-m-d\TH:i:s').'+00:00';
		$lastmod->nodeValue = $date;
		$url->appendChild($lastmod);

		$priority = $doc->createElement('priority');
		$priority->nodeValue = '0.80';
		$url->appendChild($priority);
	}

	//////////////////////////////

	$list_page = $action->getList('page', '', '', 'page_id', 'desc', '', '', '');

	foreach ($list_page as $item) {
		$url = $doc->createElement('url');
		$root->appendChild($url);

		$loc = $doc->createElement('loc');
		$loc->nodeValue = $domain.'/'.$item['friendly_url'];
		$url->appendChild($loc);

		$lastmod = $doc->createElement('lastmod');
		$date = date('Y-m-d\TH:i:s').'+00:00';
		$lastmod->nodeValue = $date;
		$url->appendChild($lastmod);

		$priority = $doc->createElement('priority');
		$priority->nodeValue = '0.80';
		$url->appendChild($priority);
	}

	//////////////////////////////

	$list_quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');

	foreach ($list_quoc_gia as $item) {
		if (empty($item['requirement_url'])) {
			continue;
		}
		// var_dump($item['requirement_url']);
		$url = $doc->createElement('url');
		$root->appendChild($url);

		$loc = $doc->createElement('loc');
		$loc->nodeValue = $domain.'/'.$item['requirement_url'];
		$url->appendChild($loc);

		$lastmod = $doc->createElement('lastmod');
		$date = date('Y-m-d\TH:i:s').'+00:00';
		$lastmod->nodeValue = $date;
		$url->appendChild($lastmod);

		$priority = $doc->createElement('priority');
		$priority->nodeValue = '0.80';
		$url->appendChild($priority);
	}

	foreach ($list_quoc_gia as $item) {
		if (empty($item['emabassy_url'])) {
			continue;
		}
		$url = $doc->createElement('url');
		$root->appendChild($url);

		$loc = $doc->createElement('loc');
		$loc->nodeValue = $domain.'/'.$item['emabassy_url'];
		$url->appendChild($loc);

		$lastmod = $doc->createElement('lastmod');
		$date = date('Y-m-d\TH:i:s').'+00:00';
		$lastmod->nodeValue = $date;
		$url->appendChild($lastmod);

		$priority = $doc->createElement('priority');
		$priority->nodeValue = '0.80';
		$url->appendChild($priority);
	}

	$doc->save('sitemap.xml');

	echo 'Tạo sitemap thanh cong';
	// echo $_SERVER['SERVER_PROTOCOL'];
	// var_dump($_SERVER['HTTPS'])
?>