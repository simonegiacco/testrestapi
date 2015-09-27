<?php

/**
 * Returns UUID of 32 characters
 *
 * @return string
 */
function generateUUID()
{
    $currentTime = (string)microtime(true);

    $randNumber = (string)rand(10000, 1000000);

    $shuffledString = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");

    return md5($currentTime . $randNumber . $shuffledString);
}

/**
 * Generate success json response.
 *
 * @param $data
 * @param $message
 * @param int $status
 * @param array $headers
 * @return Response
 */
function success($data, $message, $status = 200, $headers = [])
{
    $result = [];

    $result['flag'] = true;
    $result['message'] = $message;
    $result['data'] = $data;

    return response()->json($result, $status, $headers);
}

/**
 * Generate error json response
 *
 * @param $code
 * @param $message
 * @param int $status
 * @param array $errors
 * @param array $headers
 * @return Response
 */
function error($code, $message, $status = 200, $errors = [], $headers = [])
{
    $error = [];

    $error['flag'] = false;
    $error['message'] = $message;
    $error['code'] = $code;

    if (!empty($errors))
        $error['errors'] = $errors;

    return response()->json($error, $status, $headers);
}