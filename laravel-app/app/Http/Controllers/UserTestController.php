<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // For Query Builder

class UserController extends Controller
{
    public function __construct(){
        $this->users = [
            (object)[
                "id" => 1001,
                "profile" => "storage/images/users/ava1001.png",
                "fullname" => "Chumpol Mokarat",
                "email" => "chumpol_mo@rmutto.ac.th",
                "password" => "xxxxxxxx",
                "role" => 10,
                "active" => true
            ],
            (object)[
                "id" => 1002,
                "profile" => "storage/images/users/default.png",
                "fullname" => "Ann Mike",
                "email" => "ann_mi@rmutto.ac.th",
                "password" => "xxxxxxxx",
                "role" => 20,
                "active" => true
            ],
            (object)[
                "id" => 1003,
                "profile" => "storage/images/users/default.png",
                "fullname" => "Beritokai Smile",
                "email" => "beritokai_sm@rmutto.ac.th",
                "password" => "xxxxxxxx",
                "role" => 20,
                "active" => false
            ]
        ];
    }

    // Testing
    public function userTest(string $name = null)
    {
        return "Hi, khun $name.";
    }

    // Get a profile
    public function getProfile(string $id): View
    {
        $user = DB::table('users')->where('id', $id)->first();
        // $email = DB::table('users')->where('id', $id)->value('email');
        return view('users.profile', [
            'user' => $user
        ]);
    }

    // Retrieve all user profile
    public function getUsers(): View
    {
        $users = DB::table('users')->get();
        return view('users.getusers', [
            'users' => $users
        ]);
    }

    // User authentication
    public function userLogin(Request $request): RedirectResponse
    {
        $inEmail = $inPassword = "";

        $validated = Validator::make($request->all(),
            [
                'inputEmail' => 'required|email|min:8',
                'inputPassword' => 'required|min:8',
            ],
            [
                'inputEmail.required' => 'E-mail is required.',
                'inputEmail.email' => 'Your email format is wrong.',
                'inputEmail.min' => 'E-mail must be at least 8 characters.',
                'inputPassword.required' => 'Password is required.',
                'inputPassword.min' => 'Passwords must be at least 8 characters.',
            ]
        );

        if ($validated->fails()) {
            return redirect('/login')
                ->withErrors($validated)
                ->withInput();
        }

        if ($validated && $request->isMethod('post')) {
            $inEmail = $request->input('inputEmail');
            $inPassword = $request->input('inputPassword');

            $request->session()->put('keyEmail', $inEmail);
            $request->session()->put('keyLoggedin', true);
        } // HTML Form Validation

        return redirect('/');
    }

    public function userLogout(Request $request): RedirectResponse
    {
        $request->session()->forget(['keyEmail', 'keyLoggedin']);

        return redirect('/');
    }

    public function userCreateForm(Request $request): View
    {
        if ($request->session()->has('keyLoggedin')) {
            return view('users.create');
        } else {
            return view('errors.perm_denied');
        }
    }

    // Change user password
    public function updatePassword(Request $request, string $id): RedirectResponse
    {
        // Update the user...
        return redirect('/users');
    }

    // Example: Static method
    public static function getUserRole(int $val): string
    {
        $res = null;
        if($val == 10){
            $res = "Administrator";
        }else{
            $res = "User";
        }
        return $res;
    }

    public static function getUserActive(bool $val): string
    {
        $res = null;
        if($val == true){
            $res = "<i class=\"fa fa-check-square-o text-success\" title=\"Active\"></i>";
        }else{
            $res = "<i class=\"fa fa-times-rectangle-o text-warning\" title=\"Non-active\"></i>";
        }
        return $res;
    }

    /**
     * Update the avatar for the user.
     */
    public function updatePhoto(Request $request)
    {
        $file = $request->file('userAvatar');
        $extension = $file->getClientOriginalExtension();
        $path = $file->storeAs(
            'public/images/users',
            'ava'.$request->input('userId').'.'.$extension
        );
 
        return redirect('/users/'.$request->input('userId'));
    }
}



