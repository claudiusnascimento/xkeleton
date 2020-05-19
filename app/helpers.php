<?php

/**
 *  NOTIFICATIONS HELPERS
 */

if (! function_exists('message')) {

    function message($message, $type = 'toastr', $level = 'success', $title = '', $options = []) {

        \App\Support\Message::add($message, $type, $level, $title, $options);
    }
}


/**
 *  TIME HELPERS
 */
if (! function_exists('hoursAgo')) {

    function hoursAgo($hours = 1) {

        $hours = is_int($hours) ? $hours : 1;

        return now()->subHours($hours);
    }
}
