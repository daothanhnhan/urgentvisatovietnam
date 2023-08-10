<?php 
	$title_arr = explode(" ", $title);
	$title_arr_count = count($title_arr);//var_dump($title_arr_count);
	$title_5 = '';
	if ($title_arr_count > 5) {
		$d = 0;
		foreach ($title_arr as $item) {
			$d++;
			$title_5 .= $item." ";
			if ($d == 5) {
				break;
			}
		}
		$title_mb = $title_5;
		// var_dump($title_5);
	} else {
		$title_mb = $title;
	}
?>
<div class="gb-breadcrumbs_cuanhom">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/services">Services</a></li>

            <li class="hidden-xs"><a href="#"><?= $title ?></a></li>
            <li class="hidden-sm hidden-md hidden-lg"><a href="#"><?= $title_mb ?></a></li>
            
        </ul>
    </div>
</div>