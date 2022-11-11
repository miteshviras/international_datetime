<?php

use Carbon\Carbon;

function returnResponse($title, $message, $status, $data, $dataset, $code)
{
    return response()->json([
        'title' => $title,
        'message' => $message,
        'status' => $status,
        'data' => $data,
        'dataset' => $dataset,
    ], $code);
}

function getTimeZoneOffset($timezone_name)
{
    return Carbon::now()
    // ->timezone($timezone_name)

    ->getOffSetString();
}

function get_date($date, $timezone_name)
{
    return Carbon::parse($date/*, $timezone_name*/)->setTimezone('UTC')->toDateString();
}

function set_date($date, $timezone_name)
{
    return Carbon::parse($date, 'UTC')
    // ->setTimezone($timezone_name)
    ->toDateString();
}
function get_date_between($date, $timezone_name)
{
    $time = Carbon::parse($date, $timezone_name);
    $start = $time->copy()->startOfDay()->setTimezone('UTC')->toDateTimeString();
    $end = $time->copy()->endOfDay()->setTimezone('UTC')->toDateTimeString();
    return [$start,$end];
    // dd($start);
    // ->setTimezone($timezone_name)
    // ->toDateString();
}

function get_datetime($datetime, $timezone_name)
{
    return Carbon::parse($datetime,'UTC')->setTimezone($timezone_name)->toDateTimeString();
}

function set_datetime($datetime, $timezone_name)
{
    return Carbon::parse($datetime, 'UTC')
    // ->setTimezone($timezone_name)
    ->toDateTimeString();
}

function check_is_empty()
{
    foreach (func_get_args() as $param) {
        if (!empty($param)) {
            return false;
        }
    }
    return true;
}
?>
