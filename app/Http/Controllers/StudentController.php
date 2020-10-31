<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{

    public function index()
    {

        return view('frontend.students.index');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Student $student)
    {
        //
    }


    public function edit(Student $student)
    {
        //
    }


    public function update(Request $request, Student $student)
    {
        //
    }


    public function destroy(Student $student)
    {
        //
    }
}
