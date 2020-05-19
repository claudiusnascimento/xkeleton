<?php

namespace App\Support;


class Message
{

    /**
     *  Same request message
     */
    public static function add($message, $type = 'toastr', $level = 'success', $title = '', $options = []) {

        // validation
        $types = ['alert', 'toastr'];
        $type = in_array($type, $types) ? $type : 'toastr';

        //validation
        $levels = ['success', 'warning', ($type == 'toastr' ? 'error' : 'danger')];
        $level = in_array($level, $levels) ? $level : 'warning';

        $key = config('message.session_key') . '.' . $type;

        $message = [
            'message' => $message,
            'level' => $level,
            'title' => $title,
            'options' => $options
        ];

        $items = session()->pull($key, []);

        $items[] = $message;

        session([$key => $items]);
    }

}
