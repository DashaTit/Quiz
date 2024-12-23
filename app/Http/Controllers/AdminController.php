<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdmin() {
        $subjects = Subject::all();
        return view('admin', ['subjects' => $subjects]);
    }

    public function setSubject(Request $request) {
        Subject::create(['subject_name' => $request->subject]);

        return back();
    }

    public function showSubject($id) {
        $subjectName = Subject::where('id', $id)->first()->subject_name;
        return view('subject', ['subjectName' => $subjectName]);
    }
}
