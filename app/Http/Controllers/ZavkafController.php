<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\AdviserDiscipline;
use App\Models\Discipline;
use App\Models\Student;
use App\Models\StudentDiscipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZavkafController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('zavkaf/zavkaf');
    }

    public function studentSyllabus(){
        $students = null;
        return view('zavkaf/iup')->with('students', $students);
    }

    public function pps(){
        $teachers = Adviser::all();


        return view('zavkaf/pps')->with('teachers', $teachers);
    }


    public function sFilter(Request $request){
        $courseId = $request->input('course');
        $eduProgramId = $request->input('eduProgram');
        $groupId = $request->input('groupId');

        $students = Student::all()
            ->where('gr_id', $groupId);
        return view('zavkaf/iup')->with('students', $students);
    }

    public function report(Request $request, $id){

        $student = Student::query()
            ->where('id', $id)
            ->first();

        $sid = $student->id;

        $disciplineIds = StudentDiscipline::query()->where('student_id', $sid)->pluck('discipline_id');
        $disciplines = Discipline::all()->whereIn('id', $disciplineIds);



//        dd($student);
//        $test = view('adviser.report')->render();
//        $pdf = App::make('dompdf.wrapper');
//
//        $pdf->loadHTML($test);
//        return $pdf->stream();
        return view('adviser/report')->with('student', $student)->with('disciplines', $disciplines);
    }

    public function itp($id){

        $teacher = Adviser::query()->where('id', $id)->first();
        $discipineIds = AdviserDiscipline::query()
            ->where('adviser_id', $id)
            ->pluck('discipline_id');

        $disciplines = Discipline::all()
            ->whereIn('id', $discipineIds);


        return view('adviser/pps')->with('disciplines', $disciplines)->with('teacher', $teacher);
    }

}
