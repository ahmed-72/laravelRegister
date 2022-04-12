<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        $query = "SELECT * from courses";
        $query2 = "SELECT * from register";
        $courses = DB::select($query);
        $registedCourses = DB::select($query2);
        return view('register')->with('courses', $courses)->with('Rcourses', $registedCourses);
    }

    public function details(Request $request)
    {
        $name = $request['courseName'];
        $query = "SELECT * from courses WHERE CourseName='$name' ";
        $courses = DB::select($query);
        //  dd($courses);
        return view('courses')->with('courses', $courses);
    }

    public function store(Request $request, $CourseID, $CourseName)
    {
        $id = $CourseID;
        $name = $CourseName;
        $status = "Registered";
        $query = "INSERT INTO register (CourseID, CourseName, RegisterStatus) VALUES ('$id','$name','$status')";
        DB::statement($query);

        return redirect('registrationPanel');
    }
    public function delete(Request $request, $CourseID)
    {
        $id = $CourseID;
        $query = "DELETE FROM register WHERE CourseID='$id' ";
        DB::statement($query);
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
        $query = "SELECT * FROM accounts WHERE StudentID='$id' AND StudentPassword='$pass' ";
        $checker = DB::select($query);
        // dd($checker);
        if (count($checker) > 0) return redirect('registrationPanel');
        else {
            $result = "Access denide";
            return view('login')->with('result', $result);
        }
    }
}
