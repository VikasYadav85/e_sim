<?php

use Carbon\Carbon;


function pre($array, $exit = true)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';

    if ($exit) {
        exit();
    }
}

function prepareResult($status, $data, $errors, $msg, $status_code, $pagination = array())
{
    return response()->json(['status' => $status, 'data' => $data, 'message' => $msg, 'errors' => $errors, 'pagination' => $pagination], $status_code);
}

function ajax_response($status, $data, $errors, $msg, $status_code)
{
    return response(['status' => $status, 'data' => $data, 'message' => $msg, 'errors' => $errors, 'status_code' => $status_code]);
}