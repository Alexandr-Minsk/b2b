<?php

$inputString = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';

function processing_str($input){
    $parseUrl = parse_url($input);
    parse_str($parseUrl['query'], $parseQuery);
    $filterQuery = array_filter($parseQuery, function($v){return $v != 3; });
    asort($filterQuery);
    $filterQuery['url'] = $parseUrl['path'];
    
    return $parseUrl['scheme'].'://'.$parseUrl['host'].'/?'.http_build_query($filterQuery);
}

error_log(processing_str($inputString)."\n");