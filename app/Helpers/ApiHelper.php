<?php

namespace App\Helpers;

/**
 * Class HttpHelper
 * @package App\Helpers
 *
 */
class ApiHelper
{

    /**
     * Return array for api response
     *
     * @param string $status
     * @param array|object $data
     * @param int $responseStatus
     * @param mixed $mess
     * @param mixed $err
     * @return array
     */
    public static function response($status, $data, $responseStatus, $mess = null, $err = null)
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            (is_object($mess) || is_array($mess) ? 'messages' : 'message') => $mess,
            (is_object($err) || is_array($err) ? 'errors' : 'error') => $err
        ],
        $responseStatus);
    }
}
