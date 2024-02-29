<?php
    include 'constants.php';
    clear_php_cache();

    // devel
    // var_dump($_POST);
    // printf($cwd . "\n");
    // echo "\n\n";
    // echo "<hr/>";

    // get post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entry = htmlspecialchars($_POST['new_list_entry']);
        if (empty($entry)) {
        echo "Name is empty";
        } else {
        // echo $entry;
        $list_handler = fopen(getcwd() . '/' . $list_file, 'a+');
        fseek($list_handler, -2, SEEK_END);
        fwrite($list_handler, "\r\n" . $entry);
        fclose($list_handler);
        }
        $status_message = 'List item added: ' . $entry;
    }

    // print list
    // $list_handler = fopen(getcwd() . '/' . $list_file, 'r');
    // $list_content = fread($list_handler, filesize($cwd . '/' . $list_file));
    // var_dump($list_content);
    // fclose($list_handler);
    session_start();
    if (!empty($debug_array)) {
        $_SESSION['debug_messages'] = $debug_array;
    }
    if (!empty($status_message)) {
        $_SESSION['status_message'] = $status_message;
    }
    header('Location: index.php');
    exit;