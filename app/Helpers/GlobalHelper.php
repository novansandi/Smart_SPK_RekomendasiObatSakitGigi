<?php

function getCurrentSection(){
    $current = url()->current();
    $current = str_replace(['http://', 'https://'], '', $current);
    $chunk = explode('/', $current);
    return sizeof($chunk) > 1 ? $chunk[1] : 'dashboard';
}
