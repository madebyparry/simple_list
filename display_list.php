<?php
    // include 'constants.php';
    clear_php_cache();

    // print list
    $list_handler = fopen($cwd . '/' . $list_file, 'r');
    while (($line = fgets($list_handler)) !== false) {
        $item_key = str_replace(' ', '_', str_replace('\n', '', $line));
        echo '<input type="checkbox" name="'.$item_key.'" value="checked" class="list_item_checkbox" id="checkbox_'.$item_key.'" onclick="check_item(this)"/>';
        echo '<label class="'.$item_key.'" for="checkbox_'.$item_key.'">';
        echo $line;
        echo '</label>';
        echo '<hr/>';
    }
    fclose($list_handler);
    


