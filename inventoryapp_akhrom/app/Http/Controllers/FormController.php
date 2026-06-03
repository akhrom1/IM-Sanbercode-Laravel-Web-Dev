<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function daftar()
    {
        return view('biodata');
    }
    public function welcome(Request $request)
    {
        $first = $request->input("first");
        $last = $request->input("last");
        $gender = $request->input("gender");
        $nationality = $request->input("nationality");
        $language = $request->input("language");
        $bio = $request->input("bio");

        return view('welcome', [
            'first' => $first,
            'last' => $last,
            'gender' => $gender,
            'nationality' => $nationality,
            'language' => $language,
            'bio' => $bio
        ]);
    }
}
