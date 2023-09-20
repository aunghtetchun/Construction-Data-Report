<?php


namespace App;


class Custom
{
    public static $info =  [

        "name" => "TZT",
        "short_name" => "TZT",
        "type" => "TZT",
        "phone" => "09691496115",
        "address" =>"တီတွတ် စံပြရွာအနီး ၊ ပြည် သီရိခေတ္တရာဂေါက်ကွင်",
        "meta-img" => "f/img/meta.jpg",
        "mms-logo" => "dashboard/images/mms-logo.jpg",
        "c-logo" => "dashboard/images/mms-logo.jpg",
        "main_css" => "dashboard/css/bootstrap.min.css",
    ];
    public static function toShort($text,$max=30){
        if(strlen($text) >= $max){
            return substr($text,0,$max)."...";
        }else{
            return $text;
        }
    }

}
