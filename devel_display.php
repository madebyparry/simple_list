<?php
    // include 'constants.php';
    // global $devel_messages;
    // $msg = $devel_messages;
    echo "DEVEL LOG";
    if (isset($devel_messages)) {
        $counter = 0;
        foreach ($devel_messages as $key => $value) {
            echo "[".$counter."]";
            echo "KEY: " . $key;
            echo "VAL: " . $value;
            echo "<hr/>";
            $counter++;
        }
    }