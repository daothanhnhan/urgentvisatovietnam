<?php 
 	$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);//var_dump($row['servicecat_id']);
    $_SESSION['sidebar'] = 'newsDetail';

    // if ($row['service_id'] == 71) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0001.php";
    // }

    // if ($row['service_id'] == 72) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0002.php";
    // }

    // if ($row['service_id'] == 73) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0003.php";
    // }

    // if ($row['service_id'] == 74) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0004.php";
    // }

    // if ($row['service_id'] == 75) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0005.php";
    // }

    // if ($row['service_id'] == 76) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0006.php";
    // }

    // if ($row['service_id'] == 77) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0007.php";
    // }

    // if ($row['service_id'] == 78) {
    // 	include DIR_SERVICE."MS_SERVICE_VISA_0008.php";
    // }

    // if ($row['service_id'] == 79) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0009.php";
    // }

    // if ($row['service_id'] == 80) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0010.php";
    // }

    // if ($row['service_id'] == 81) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0011.php";
    // }

    // if ($row['service_id'] == 82) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0012.php";
    // }

    if ($row['service_id'] == 83) {
        include DIR_SERVICE."MS_SERVICE_VISA_0013.php";
    } else {
        include DIR_SERVICE."MS_SERVICE_VISA_0018.php";
    }

    // if ($row['service_id'] == 84) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0014.php";
    // }

    // if ($row['service_id'] == 85) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0015.php";
    // }

    // if ($row['service_id'] == 86) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0016.php";
    // }

    // if ($row['service_id'] == 87) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0017.php";
    // }

    // if ($row['service_id'] == 91) {
    //     include DIR_SERVICE."MS_SERVICE_VISA_0019.php";
    // }

    // if ($row['servicecat_id'] == 3) {
        // include DIR_SERVICE."MS_SERVICE_VISA_0018.php";
    // }
?>