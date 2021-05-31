<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class tProfileController extends Controller
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
        return view('adviser/tProfile');
    }

    public function syllabus(){
        $discipilines = Discipline::all();
        $groups = Group::query()->where('groups.adviser_id', Auth::user()->adviser->id);
        $semestr = 0;
        return view('adviser/tSyllabus')->with('disciplines', $discipilines)
            ->with('semestr', $semestr)
            ->with('groups', $groups);
    }

    public function filter(Request $request){
        $semestr = $request->input('semestr');
        $course = $request->input('course');
        $eduProgram = $request->input('eduProgram');
        $id = Auth::user()->id;

        $filteredDisc = Discipline::all()->where('semestr',$semestr)
                                            ->where('edProgram_id', $eduProgram);
        $filteredDisc = Discipline::with('rup')
            ->join('r_u_p_s', 'r_u_p_s.id', 'disciplines.rup_id')
            ->where('r_u_p_s.edProgram_id', $eduProgram)
            ->where('semestr',$semestr)
            ->get();


        return view('adviser/tSyllabus')->with('disciplines', $filteredDisc)->with('semestr', $semestr)
            ->with('eduProgram', $eduProgram)->with('course', $course);
    }

    public function send(Request $request){
        $groupId = $request->input('groupId');
        $students = Student::all()->where('gr_id', $groupId);
        $disciplineIds = $request->input('toSend');

        foreach ($students as $student){
            $student->disciplines()->attach($disciplineIds);
        }
        return view('adviser/tProfile');
    }

    public function myGroups()
    {
        $groups = Group::with('students')
            ->where('groups.adviser_id', Auth::user()->adviser->id)
            ->get();

        $i = 1;

        return view('adviser/myGroups')
            ->with('groups', $groups)
            ->with('i', $i);
    }

    public function reports()
    {
        $students = Student::with('group')
            ->join('groups', 'groups.id', 'students.gr_id')
            ->where('groups.adviser_id', Auth::user()->adviser->id)
            ->get();
        return view('adviser/reports')
            ->with('students', $students);
    }

    public function reportDownload(){

    }

    public function report(Request $request, $id){

        $student = Student::with(['group' => function ($groups)  {
            return $groups->where('adviser_id', Auth::user()->adviser->id);

        }])
            ->where('id', $id)
            ->first();

        $sid = $student->id;
        $disciplines = Discipline::with(['users' => function($sd) use ($sid){
            return $sd->where('student_id', $sid);
        }])->get();

//        dd($student);
//        $test = view('adviser.report')->render();
//        $pdf = App::make('dompdf.wrapper');
//
//        $pdf->loadHTML($test);
//        return $pdf->stream();
        return view('adviser/report')->with('student', $student)->with('disciplines', $disciplines);
    }


    public function pps(){
        return view('adviser/pps');
    }
}
