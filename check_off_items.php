<?php
// include 'devel.php';
include 'constants.php';

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
    $current_list_items = explode("\n", file_get_contents($list_file));
    // $list_handler = fopen($cwd . '/' . $list_file, 'r');
    // // reset handler pointer
    // while(!feof($list_handler)) {
    //     $current_list_items[] = fgets($list_handler);
    // }
    // // reset handler pointer
    // fclose($list_handler);
    // Calculate remaining items to rewrite to list
    $remaining = array_diff($current_list_items, $checked_items);
    $list_handler = fopen($cwd . '/' . $list_file, 'w');
    // Write to list
    foreach ($remaining as $key => $value) {
        fwrite($list_handler, $value);
    }
    // Close handler
    fclose($list_handler);
    $debug_array = array();
    $debug_array['checked'] = $checked_items;
    $debug_array['current'] = $current_list_items;
    $debug_array['remaining'] = $remaining;
}

session_start();
$_SESSION['debug_messages'] = $debug_array;
header('Location: index.php');
exit;