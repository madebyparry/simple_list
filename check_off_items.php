<?php
// include 'devel.php';
include 'constants.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get list of checked off items
    $checked_items = array();
    foreach ($_POST as $key => $value) {
        if (isset($key)) {
            array_push($checked_items, trim($key));
        }
    }
    // Get list of all items at submit
    $current_list_items = array();
    $list_handler = fopen($cwd . '/' . $list_file, 'r');
    // reset handler pointer
    while(!feof($list_handler)) {
        $line = fgets($list_handler);
        if ($line != '') {
            $current_list_items[] = trim(str_replace(" ", "_", $line));
        }
    }
    // reset handler pointer
    fclose($list_handler);
    // Calculate remaining items to rewrite to list
    $remaining = array_diff($current_list_items, $checked_items);
    $remaining = array_filter($remaining);
    $list_handler = fopen($cwd . '/' . $list_file, 'w');
    // Write to list
    foreach ($remaining as $key => $value) {
        fwrite($list_handler, trim(str_replace("_", " ", $value))."\n");
    }
    // Close handler
    fclose($list_handler);
    $status_message = count($checked_items) . ' items successfully removed from Item List';
    $debug_array = array();
    $debug_array['checked'] = $checked_items;
    $debug_array['current'] = $current_list_items;
    $debug_array['remaining'] = $remaining;
}

session_start();
if (!empty($debug_array)) {
    $_SESSION['debug_messages'] = $debug_array;
}
if (!empty($status_message)) {
    $_SESSION['status_message'] = $status_message;
}
header('Location: index.php');
exit;