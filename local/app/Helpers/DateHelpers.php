<?php
if (!function_exists('generateTimeSlots')) {
    
    function generateTimeSlots($startTime, $endTime, $interval) {
        $timeSlots = [];
        $start = strtotime($startTime);
        $end = strtotime($endTime);
        
        while ($start <= $end) {
            $timeSlots[] = date("g:iA", $start);
            $start = strtotime("+$interval minutes", $start);
        }
        
        return $timeSlots;
    }
    
    /* $startTime = "10:00 AM"; // Start time
    $endTime = "12:15 PM"; // End time
    $interval = 15; // Interval in minutes
    
    $timeSlots = generateTimeSlots($startTime, $endTime, $interval);
    
    foreach ($timeSlots as $slot) {
        echo $slot . "\n";
    } */
}

