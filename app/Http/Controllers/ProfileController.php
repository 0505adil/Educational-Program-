<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Discipline;
use App\Models\Student;
use App\Models\StudentDiscipline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('student/profile');
    }

    public function setData(Request $request) // getting data from table
    {
       $email = $request->input('email');
       if ($email){
           $id = Auth::user()->id;

           $user = User::query()->find($id);

           $user->update(
               [
                   'email' => $email,
               ]
           );
       }

        $email = $request->input('email');


       return redirect()->back();
    }

    public function syllabus(){
        $approved = Auth::user()->student->confirmed;

        $disciplinesN = Discipline::select('disciplines.title_en', 'disciplines.id', 'disciplines.code', 'disciplines.credits')
            ->join('student_disciplines', 'student_disciplines.discipline_id', '=', 'disciplines.id')
                ->where('.student_id', '=', Auth::user()->student->id)
                ->where('left', null)->get();

        $disciplinesLeft = Discipline::select('disciplines.title_en', 'disciplines.id', 'disciplines.code', 'disciplines.credits')
            ->join('student_disciplines', 'student_disciplines.discipline_id', '=', 'disciplines.id')
            ->where('.student_id', '=', Auth::user()->student->id)
            ->where('left', 1)->get();
        return view('student/syllabus')
            ->with('disciplines', $disciplinesN)
            ->with('disciplinesLeft', $disciplinesLeft)
            ->with('approved', $approved);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function confirm(Request $request){

        $sign = $request->file('sign');


            $disciplineIds = $request->input('toSend');
            $studentDisciplines = StudentDiscipline::all()
                ->where('student_id', Auth::user()->student->id)
                ->whereIn('discipline_id', $disciplineIds);
            Auth::user()->student->update(['confirmed' => 1]);
            foreach ($studentDisciplines as $confirmedOne){
                $confirmedOne->update(
                    [
                        'approved' => 1,
                    ]
                );
            }

        return view('/student/profile');


    }

    public function addDiscipline(Request $request){
        $disciplineIds = $request->input('toAdd');
        $studentDisciplines = StudentDiscipline::all()
            ->where('student_id', Auth::user()->student->id)
            ->whereIn('discipline_id', $disciplineIds);

        foreach ($studentDisciplines as $confirmedOne){
            $confirmedOne->update(
                [
                    'left' => null,
                ]
            );
        }
        return view('/student/profile');
    }

    public function keySign(){
        $contents = Auth::user()->getAuthPassword();
        $filename = 'test.txt';
        return response()->streamDownload(function () use ($contents) {
            echo $contents;
        }, $filename);
    }
}
