<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registartion(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'regex:/.+( .+)+( .+)+/'],
            'age' => ['integer', 'between:4,90'],
            'status' => ['required'],
            'email' => ['required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'string', 'regex:/^.*(?=.{3,})(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'image' => 'nullable|max:512|dimensions:max_width=512'
        ]);
        if ($credentials) {
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extention = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = "image/" . $filename . "_" . time() . "." . $extention;
                $request->file('image')->storeAs('public', $fileNameToStore);
                $path = "storage/$fileNameToStore";
            } else {
                $path = 'storage/image/user.png';
            }
            // dd($path);
            $user = User::create([
                'name' => $request['name'],
                'age' => $request['age'],
                'status' => $request['status'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'image' => $path,
            ]);
            Auth::login($user);
            return \redirect('/');
        }
        return back()->withInput()->withErrors($credentials);
    }


    public function login(Request $request)
    {
        $credentials = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i'],
                'password' => ['required', 'string', 'regex:/^.*(?=.{3,})(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            ]
        );
        if (Auth::attempt($request->only('email', 'password'))) {
            return \redirect('/');
        }
        return back()->withInput()->withErrors($credentials);
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }

    public function change(Request $request)
    {
        $credentials = $request->validate([
            'image' => 'nullable|max:512|dimensions:max_width=512'
        ]);
        if ($credentials) {
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extention = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = "image/" . $filename . "_" . time() . "." . $extention;
                $request->file('image')->storeAs('public', $fileNameToStore);
                $path = "storage/$fileNameToStore";
            } else {
                $path = 'storage/image/user.png';
            }
            $affected = DB::table('users')->where('id', Auth::id())->update(['image' => $path]);
            return \redirect('/user');
        }
        return back()->withInput()->withErrors($credentials);
    }
}
