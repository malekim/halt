<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

if (!function_exists('halt')) {
    function halt($var)
    {
        if (!Configure::read('debug')) {
            return;
        }

        $trace = Debugger::trace(['start' => 1, 'depth' => 2, 'format' => 'array']);
        $halt = [
            'line' => $trace[0]['line'],
            'file' => $trace[0]['file'],
            'var' => $var
        ];

        // add uniqid() to prevent halt
        // from overwriting other halts
        Configure::write('halt.' . uniqid(), $halt);

        return true;
    }
}
