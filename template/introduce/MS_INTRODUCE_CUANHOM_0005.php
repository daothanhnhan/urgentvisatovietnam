<?php 
	$home_say_page = $action->getDetail('page', 'page_id', 54);

	$home_say = $action->getList('say', '', '', 'day', 'desc', '', '6', '');

	$home_revew_link = $action->getDetail('page', 'page_id', 55);

	$now = date('Y-m-d');
?>
<style>
.say {
	margin-bottom: 40px;
}
.say .box {
	background-color: #fafafa;
	border-radius: 4px;
	padding: 20px;
	margin-top: 10px;
	margin-bottom: 10px;
}
.say .box .box-1 {
	display: flex;
}
.say .box .box-1 img {
	width: 59px;
	height: 59px;
	border-radius: 50%;
	margin-right: 10px
}
.say .box .box-1 .info {
	width: calc(100% - 69px);
}
.say .box .box-1 .info .name {
	font-weight: bold;
}
.say .box .box-1 .info .name a {
	color: #000;
}
.say .box .box-1 .info .star i {
	color: #fc713f;
}
.say .box .box-1 .info .date {
	font-size: 12px;
}
.say .box .box-1 svg {
	height: 17px;
}
.say .box .box-2 {
	height: 176px;
	overflow-y: auto;
}
.say .box .box-2::-webkit-scrollbar {
  width: 5px;
}
.say .box .box-2::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
.say .box .box-2::-webkit-scrollbar-thumb {
  background: #888; 
}

.say .client-say-title {
	font-size: 32px;
    line-height: 40px;
    font-weight: bold;
    text-align: center;
    margin-top: 50px;
    margin-bottom: 10px;
}
.say .client-say-des {
	/*width: 76%;*/
    margin: auto;
    text-align: center;
}
.view_all {
	border: 1px solid #1dc675;
	padding: 20px 30px;
	color: #1dc675;
	font-weight: bold;
	border-radius: 4px;
	display: inline-block;
}
@media screen and (max-width: 768px) {
	.say .client-say-title {
		margin-top: 25px;
	}
}
@media screen and (max-width: 991px) {
    .say .client-say-des {
        padding-left: 15px;
        padding-right: 15px;
    }
}
</style>
<div class="say">
	<div class="container">
		<div class="row">
			<h2 class="hd-1 mb-2 client-say-title resp-title"><?= $home_say_page['page_name'] ?></h2>
			<p class="mb-0 client-say-des"><?= $home_say_page['page_des'] ?></p>
		</div>
		<div class="row">
			<?php 
			foreach ($home_say as $item) { 
				 $date1 = new DateTime($now);   
				 $date2 = new DateTime($item['day']);   
				 $interval = $date1->diff($date2);   
				 // echo $interval->y . " năm, " . $interval->m . " tháng, " . $interval->d . " ngày ";
				 if ($interval->y > 0) {
				 	if ($interval->y == 1) {
				 		$day = "a year ago";
				 	} else {
				 		$day = $interval->y." years ago";
				 	}
				 } else {
				 	if ($interval->m > 0) {
				 		if ($interval->m == 1) {
					 		$day = "a month ago";
					 	} else {
					 		$day = $interval->m." months ago";
					 	}
				 	} else {
				 		$day = $interval->d." days ago";
				 	}
				 }
			?>
			<div class="col-md-4">
				<div class="box">
					<div class="box-1">
						<img src="/images/<?= $item['image'] ?>">
						<div class="info">
							<p class="name"><a href="<?= $item['link'] ?>"><?= $item['name'] ?></a></p>
							<p class="star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></p>
							<p class="date"><?= $day ?></p>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="44" width="44"><g fill="none" fill-rule="evenodd"><path d="M482.56 261.36c0-16.73-1.5-32.83-4.29-48.27H256v91.29h127.01c-5.47 29.5-22.1 54.49-47.09 71.23v59.21h76.27c44.63-41.09 70.37-101.59 70.37-173.46z" fill="#4285f4"></path><path d="M256 492c63.72 0 117.14-21.13 156.19-57.18l-76.27-59.21c-21.13 14.16-48.17 22.53-79.92 22.53-61.47 0-113.49-41.51-132.05-97.3H45.1v61.15c38.83 77.13 118.64 130.01 210.9 130.01z" fill="#34a853"></path><path d="M123.95 300.84c-4.72-14.16-7.4-29.29-7.4-44.84s2.68-30.68 7.4-44.84V150.01H45.1C29.12 181.87 20 217.92 20 256c0 38.08 9.12 74.13 25.1 105.99l78.85-61.15z" fill="#fbbc05"></path><path d="M256 113.86c34.65 0 65.76 11.91 90.22 35.29l67.69-67.69C373.03 43.39 319.61 20 256 20c-92.25 0-172.07 52.89-210.9 130.01l78.85 61.15c18.56-55.78 70.59-97.3 132.05-97.3z" fill="#ea4335"></path><path d="M20 20h472v472H20V20z"></path></g></svg>
					</div>
					<div class="box-2">
						<p><?= $item['note'] ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="row text-center">
			<a href="/<?= $home_revew_link['friendly_url'] ?>" title="" class="view_all">View all</a>
		</div>
	</div>
</div>