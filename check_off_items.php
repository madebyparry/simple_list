<?php
include 'devel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get list of checked off items
    $checked_items = array();
    foreach ($_POST as $key => $value) {
        if (isset($key)) {
            array_push($checked_items, $key);
        }
    }
    // Get list of all items at submit
    $current_list_items = array();
    $list_handler = fopen($cwd . '/' . $list_file, 'r');
    // reset handler pointer
    while(!feof($list_handler)) {
        $current_list_items[] = fgets($list_handler);
    }
    // while (($line = fgets($list_handler)) !== false) {
    //     $current_list_items[] = $line;
    // }
    // reset handler pointer
    fclose($list_handler);
    $list_handler = fopen($cwd . '/' . $list_file, 'w');
    // rewind($list_handler);
    // Calculate remaining items to rewrite to list
    $remaining = array_diff($current_list_items, $checked_items);
    // Write to list
    foreach ($remaining as $key => $value) {
        fwrite($list_handler, $value);
    }
    // Close handler
    fclose($list_handler);
}

header('Location: index.php');
