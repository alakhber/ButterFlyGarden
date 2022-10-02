<?php

if (!function_exists('_asset')) {
    function _asset($path){
        return request()->secure() ? secure_asset($path) : asset($path);
    }
}


if (!function_exists('_adminCss')) {
    function  _adminCss($css){
        return _asset('project/backend/css/' . $css);
    }
}

if (!function_exists('_adminJs')) {
    function  _adminJs($js){
        return _asset('project/backend/js/' . $js);
    }
}


if (!function_exists('_adminPlugin')) {
    function  _adminPlugin($file){
        return _asset('project/backend/demo_data/' . $file);
    }
}


if (!function_exists('_adminStaticImg')) {
    function  _adminStaticImg($image){
        return _asset('project/backend/images/' . $image);
    }
}

if (!function_exists('_img')) {
    function  _img($image){
        return _asset('storage/' . $image);
    }
}




if (!function_exists('_frontCss')) {
    function  _frontCss($css){
        return _asset('project/front/stylesheet/' . $css);
    }
}

if (!function_exists('_frontJs')) {
    function  _frontJs($js){
        return _asset('project/front/javascript/' . $js);
    }
}


if (!function_exists('_frontPlugin')) {
    function  _frontPlugin($file){
        return _asset('project/front/' . $file);
    }
}


if (!function_exists('_frontStaticImg')) {
    function  _frontStaticImg($image){
        return _asset('project/front/images/' . $image);
    }
}
if (!function_exists('_frontIcon')) {
    function  _frontIcon($image){
        return _asset('project/front/icon/' . $image);
    }
}