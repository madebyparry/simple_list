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
        fwrite($list_handler, "\r\n" . $entry);
        fclose($list_handler);
        }
    }

    // print list
    // $list_handler = fopen(getcwd() . '/' . $list_file, 'r');
    // $list_content = fread($list_handler, filesize($cwd . '/' . $list_file));
    // var_dump($list_content);
    // fclose($list_handler);
    
    header('Location: index.php');
