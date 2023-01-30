<?php

namespace App\Services;

class ResponseService
{
  public static function success($data = [], $code = 200)
  {
    $request = request();
    $token = $request->request->get('userToken');

    return response()->json([
      'status' => 'success',
      'token' => $token,
      'expire-at' => date('Y-m-d H:i:s', time() + 86400),
      'data' => $data,
      'message' => null,
      'code' => $code
    ], $code);
  }

  public static function raw($text, $code = 200)
  {
    return response($text, $code);
  }

  public static function error($message, $code = 500)
  {
    $request = request();
    $token = $request->request->get('userToken');

    return response()->json([
      'status' => 'error',
      'token' => $token,
      'expire-at' => date('Y-m-d H:i:s', time() + 86400),
      'data' => null,
      'message' => $message,
      'code' => $code
    ], $code);
  }
}