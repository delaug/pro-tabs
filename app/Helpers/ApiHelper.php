<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
     * @return \Illuminate\Http\Response|JsonResponse
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

    /**
     * Return 404:Not found
     *
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    public static function response404($message = 'Resource not found!') {
        return self::response('error', null, Response::HTTP_NOT_FOUND, null, $message);
    }

    /**
     * Return 401:Unauthorized error
     *
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    public static function response401($message = 'Unauthorized!') {
        return self::response('error', null, Response::HTTP_UNAUTHORIZED, null, $message);
    }

    /**
     * Return 403:Forbidden
     *
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    public static function response403($message = 'Forbidden!') {
        return self::response('error', null, Response::HTTP_FORBIDDEN, null, $message);
    }

    /**
     * Return 400:Bad request
     *
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    public static function response400($message = 'Bad request!') {
        return self::response('error', null, Response::HTTP_BAD_REQUEST, null, $message);
    }
}
