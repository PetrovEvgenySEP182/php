<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index(Request $request) {
        $students = Student::all();
        return view('index', compact('students'));
    }

    function add(){
        $data = request()->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'required',
            'age' => 'required',
            'group_name' => 'required'
        ]);
        Student::on()->create($data);

        return redirect()->route('index');
    }

}
