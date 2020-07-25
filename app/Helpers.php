<?php
function apiReturn ($data = [], $message = 'Success', $status = 'success', $errors = []) {

    $return = [
        'data' => $data,
        'message' => $message,
        'status' => $status,
    ];

    if(!empty($errors)){
        $return['errors'] = $errors;
    }

    return response()->json($return);
}

function getLoggedUser(){
    // $user = auth()->user();
    // try {
    //     $user = auth()->userOrFail();
    // } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
    //     return apiReturn([], $e->getMessage(), 'failed');
    // }
    // return $user;
}
