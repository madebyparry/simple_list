<?php
    // important bits
    $cwd = getcwd();
    $list_file = 'list.txt';
    $devel_messages = array();

    function clear_php_cache() {
        clearstatcache();
    }

    function devel($arr) {
        global $devel_messages;
        $devel_messages = $arr;
    }