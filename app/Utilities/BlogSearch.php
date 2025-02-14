<?php

namespace App\Utilities;

function isAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function diePage($msg){
    echo "<div style='padding: 30px; width: 80%; margin: 50px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
    die();
}

if (!isAjaxRequest()){
    diePage('invalid Request!');
}
echo 'search is OK';

//$keyword = $_POST['keyword'];
//if(!isset($keyword) or empty($keyword)){
//    die("نتیجه ای یافت نشد ...");
//}
//$locations = getLocations(['keyword' => $keyword]);
//
//if(sizeof($locations) == 0){
//    die("نتیجه ای یافت نشد ...");
//}

//foreach($locations as $loc){
//    echo "<a href='".BASE_URL."?loc=$loc->id'><div class='result-item' data-lat='$loc->lat' data-lng='$loc->lng' data-loc='$loc->id'>
//        <span class='loc-type'>".locationTypes[$loc->type]."</span>
//        <span class='loc-title'>$loc->title</span>
//    </div></a>";
//}



class BlogSearch
{

}
