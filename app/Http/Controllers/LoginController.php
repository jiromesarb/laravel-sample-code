<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
// use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function login(){

        // return view('pages.users.index');
        return view('pages.login');
    }

    public function logout(){
        session()->flush();

        $link = env('API_URL') . "api/logout";
        // return $link;
        $data = guzzle('POST', $link);
        return redirect()->route('login');
    }

    public function postLogin(Request $request){

        // Call API
        $link = env('API_URL') . "api/login";
        $data = guzzle('POST', $link, $request->all());

        if($data['status'] == 'success'){
            // Store User Data on session
            storeLoggedUser($data['data']);

            // Redirect user
            if($data['data']['default_password'] == 0){

                return redirect()->route('new-password');
            } else {
                return redirect()->route('user.index');
            }
        } else {

            return back()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => $data['message'],
            ]);
        }

        return $data;


    }

    public function newPassword(){

        return view('pages.new-password');
    }

    public function postNewPassword(Request $request){

        // Call API
        $link = env('API_URL') . "api/new-password";
        $data = guzzle('POST', $link, $request->all());
        // return $data;

        if($data['status'] == 'success'){
            return redirect()->route('user.index');

        } else {
            $errors = (array)$data['errors'][0];
            // return $errors;
            $get_error = [];
            if(count($errors) > 1){

                if(!empty($errors['new_password'])){
                    $get_error[] = $errors['new_password'][0];
                }
                if(!empty($errors['confirm_password'])){
                    $get_error[] = $errors['confirm_password'][0];
                }
            } else {

                $get_error[] = $errors[0];
            }

            return back()->with([
                'validation_errors' => $get_error,
            ]);
        }
    }

    public function forgotPassword(){
        return view('pages.forgot-password');
    }

    public function postForgotPassword(Request $request){

        // Call API
        $link = env('API_URL') . "api/forgot-password";
        $data = guzzle('POST', $link, $request->all());
        // return $data;

        if($data['status'] == 'success'){
            // Redirect user
            return redirect()->route('login')->with([
                'notif.style' => 'success',
                'notif.icon' => 'check',
                'notif.message' => 'Check your email to reset your password.',
            ]);
        } else {

            return back()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => $data['message'],
            ]);
        }
    }

    public function resetPassword($token){

        return view('pages.reset-password', compact('token'));
    }

    public function postResetPassword($token, Request $request){

        // Call API
        $link = env('API_URL') . "api/reset-password/" . $token;
        $data = guzzle('POST', $link, $request->all());
        // return $data;

        if($data['status'] == 'success'){
            return redirect()->route('login')->with([
                'notif.style' => 'success',
                'notif.icon' => 'check',
                'notif.message' => 'Successfully changed your password!',
            ]);

        } else {
            $errors = (array)$data['errors'][0];
            // return $errors;
            $get_error = [];
            if(count($errors) > 1){

                if(!empty($errors['new_password'])){
                    $get_error[] = $errors['new_password'][0];
                }
                if(!empty($errors['confirm_password'])){
                    $get_error[] = $errors['confirm_password'][0];
                }
            } else {

                $get_error[] = $errors[0];
            }

            return back()->with([
                'validation_errors' => $get_error,
            ]);
        }
    }
}
