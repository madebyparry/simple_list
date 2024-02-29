<?php
    // include 'constants.php';

    if(array_key_exists('clear_cache_check', $_POST)) { 
        clear_php_cache();
        echo 'caches cleared... boop';
    } 

    class devel
    {
        public $context;
        public $target;
        public $target_data;

        public function print_devel($ele) {
            $ele_type = gettype($ele);
            if ($ele_type == "array") {
                echo "devel";
            }
        }
    }
    
    header('Location: index.php');
