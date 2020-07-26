<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'asc');

        // Filter Users

        $show = !empty($request->show) ? $request->show : 10;
        $users = $users->paginate($show);

        $link = env('API_URL') . "api/user";
        $users = guzzle('GET', $link, $request)['data'];
        // return apiReturn($users);
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // Call API
        $link = env('API_URL') . "api/user";
        $data = guzzle('POST', $link, $request->all());

        if($data['status'] == 'success'){
            // Redirect user
            return back()->with([
                'notif.style' => 'success',
                'notif.icon' => 'check',
                'notif.message' => $data['message'],
            ]);
        } else {

            $errors = (array)$data['errors'][0];
            $get_errors = [];
            if(count($errors) >= 1){

                if(!empty($errors['name'])){
                    $get_errors[] = $errors['name'][0];
                }
                if(!empty($errors['email'])){
                    $get_errors[] = $errors['email'][0];
                }
            } else {
                $get_errors[] = $errors[0];
            }

            return back()->withInput()->with([
                'validation_errors' => $get_errors,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Call API
        $link = env('API_URL') . "api/user/" . $id;
        $data = guzzle('GET', $link);


        if($data['status'] == 'success'){
            // Redirect user
            $user = $data['data'];
            return view('pages.users.show', compact('user'));
        } else {

            return back()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => $data['message'],
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Call API
        $link = env('API_URL') . "api/user/" . $id . '/edit';
        $data = guzzle('GET', $link);

        if($data['status'] == 'success'){
            // Redirect user
            $user = $data['data'];
            return view('pages.users.edit', compact('user'));
        } else {

            return back()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => $data['message'],
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        // Call API
        $link = env('API_URL') . "api/user/" . $id;
        $data = guzzle('POST', $link, $request->all());
        // return $data;

        if($data['status'] == 'success'){
            // Redirect user
            return back()->with([
                'notif.style' => 'success',
                'notif.icon' => 'check',
                'notif.message' => $data['message'],
            ]);
        } else {

            $errors = (array)$data['errors'][0];
            $get_errors = [];
            if(count($errors) >= 1){

                if(!empty($errors['name'])){
                    $get_errors[] = $errors['name'][0];
                }
                if(!empty($errors['email'])){
                    $get_errors[] = $errors['email'][0];
                }
            } else {
                $get_errors[] = $errors[0];
            }

            return back()->withInput()->with([
                'validation_errors' => $get_errors,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Call API
        $link = env('API_URL') . "api/user/" . $id;
        $data = guzzle('DELETE', $link);
        // return $data;

        if($data['status'] == 'success'){
            // Redirect user
            return back()->with([
                'notif.style' => 'success',
                'notif.icon' => 'check',
                'notif.message' => $data['message'],
            ]);
        } else {

            return back()->with([
                'notif.style' => 'danger',
                'notif.icon' => 'times-circle',
                'notif.message' => $data['message'],
            ]);
        }
    }
}
