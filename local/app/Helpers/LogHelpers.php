<?php

if (!function_exists('background_verify_log')) {
    
    function background_verify_log($log_txt) {
        $file = "local/storage/background/background_" . date('m-Y') . "_log.txt";
        file_put_contents($file, "[" . date('Y-m-d H:i:s') . "]: " . $log_txt . PHP_EOL, FILE_APPEND);
    }
    
}

