<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use App\Models\Registed;
use App\Models\RegisterModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {

        $courses = RegisterModel::select()->get();

        $registedCourses = Registed::select()->get();

        return view('register')->with('courses', $courses)->with('Rcourses', $registedCourses);
    }

    
    public function details(Request $request)
    {
        $name = $request['courseName'];
        $courses = RegisterModel::select()
            ->WHERE('CourseName', $name)
            ->get();
        //  dd($courses);
        return view('courses')->with('courses', $courses);
    }


    public function store(Request $request, $CourseID, $CourseName)
    {
        $id = $CourseID;
        $name = $CourseName;
        $status = "Registered";

        $course = new Registed();
        $course->CourseID = $id;
        $course->CourseName = $name;
        $course->RegisterStatus = $status;

        Registed::insert(['CourseID' => $id, 'CourseName' => $name, 'RegisterStatus' => $status]);

        return redirect('registrationPanel');
    }


    public function delete(Request $request, $CourseID)
    {
        $id = $CourseID;

        Registed::select()
            ->where('CourseID', $id)
            ->delete();

        return redirect('registrationPanel');
    }


    public function login(Request $request)
    {
        $result = "";
        return view('login')->with('result', $result);
    }


    public function loginCheck(Request $request)
    {
        $id = $request['id'];
        $pass = $request['password'];

        $checker = LoginModel::select()
            ->where('StudentID', $id)->where('StudentPassword', $pass)
            ->get();


        // dd($checker);
        if (count($checker) > 0) return redirect('registrationPanel');
        else {
            $result = "Access denide";
            return view('login')->with('result', $result);
        }
    }
}
