<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\AdviserDiscipline;
use App\Models\Discipline;
use App\Models\RUP;
use App\Models\Teacher;
use App\Models\TeacherDiscipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepAdminController extends Controller
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
        return view('/depAdmin/RUP');
    }

    public function addRup(Request $request){
        $eduProgramId = $request->input('eduProgram');
        $dateFrom = $request->input('fromDate');
        $dateTo = $request->input('toDate');
//        dd($dateFrom);
        $cycle = $request->input('cycle');
        $component = $request->input('component');

        $code = $request->input('code');
        $tkz = $request->input('tkz');
        $tru = $request->input('tru');
        $ten = $request->input('ten');
        $semestr = $request->input('semestr');
        $credits = $request->input('credits');
        $lectures = $request->input('lec');
        $practises = $request->input('prac');
        $labs = $request->input('lab');

        for($i = 0; $i < count($cycle); $i++){


            $rup = array(
                'disCycle' => $cycle[$i],
                'disComponent' => $component[$i],
                'fromDate' => $dateFrom,
                'toDate' => $dateTo,
                'edProgram_id' => $eduProgramId,
                );
            RUP::query()->create($rup);

            $r_id = RUP::query()->orderBy('id', 'DESC')->first()->id;
            $discipline = array(
                'title_kz' => $tkz[$i],
                'title_ru' => $tru[$i],
                'title_en' => $ten[$i],
                'code' => $code[$i],
                'credits' => $credits[$i],
                'semestr' => $semestr[$i],
                'lectures' => $lectures[$i],
                'practises' => $practises[$i],
                'labs' => $labs[$i],
                'rup_id' => $r_id,
            );
            Discipline::query()->create($discipline);
        }
        return view('/depAdmin/otherDepDisciplines')->with('r_id', $r_id);
    }

    public function otherDepDis() {
        return view('/depAdmin/otherDepDisciplines');
    }

    public function uploadDiscipline(Request $request) {
        $eduProgram = $request->input('eduProgram');
        $course = $request->input('course');
        $gr_id = $request->input('group');

        $tkz = $request->input('tkz');
        $tru = $request->input('tru');
        $ten = $request->input('ten');
        $semestr = $request->input('semestr');
        $credits = $request->input('credits');
        $lectures = $request->input('lec');
        $practises = $request->input('prac');
        $labs = $request->input('lab');

        $teacherId = $request->input('teacher');

        if($tkz)
        for($i = 0; $i < count($tkz); $i++) {
            if($tkz[$i] != null && $tru[$i] != null && $ten[$i] != null) {
                $discipline = array(
                    'title_kz' => $tkz[$i],
                    'title_ru' => $tru[$i],
                    'title_en' => $ten[$i],
                    'code' => 1,
                    'credits' => $credits[$i],
                    'semestr' => $semestr[$i],
                    'lectures' => $lectures[$i],
                    'practises' => $practises[$i],
                    'labs' => $labs[$i],
                );
                Discipline::query()->create($discipline);
                $d_id = Discipline::query()->orderByDesc('id')->first()->id;
                $teacher = Adviser::all()->where('id', $teacherId[$i])->first();
                $teacher->disciplines()->attach($d_id);

                $teacherDisciplines = AdviserDiscipline::all()
                    ->where('adviser_id', $teacherId[$i])
                    ->where('discipline_id', $d_id);

                foreach ($teacherDisciplines as $temp) {
                    $temp->update(
                        [
                            'course' => $course[$i],
                            'gr_id' => $gr_id[$i],
                        ]
                    );
                }
            }
        }
        return view('/depAdmin/otherDepDisciplines');
    }

    public function teacherLoad() {

        $disciplineIds = AdviserDiscipline::query()->pluck('discipline_id');


        $rups = RUP::with(['discipline' => function($disciplines) use ($disciplineIds) {
            return $disciplines->whereNotIn('id', $disciplineIds);
        }])->has('discipline')->get();


//            ->select('r_u_p_s.*', 'disciplines.*')
//            ->join('disciplines', 'disciplines.rup_id', '=', 'r_u_p_s.id')
//            ->whereNotIn('disciplines.id', $disciplineIds)



//            ->join('teacher_disciplines', 'teacher_disciplines.teacher_id', '=', 'r_u_p_s.id')
//            ->where('.student_id', '=', Auth::user()->student->id)
//            ->get();
        return view('/depAdmin/teacherLoad')->with('rups', $rups);
    }

    public function uploadTeacherLoad(Request $request) {

        $did = $request->input('tid');

        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $ten = $request->input('ten');
        $teacherId = $request->input('teacher');
        $course = $request->input('course');
        $gr_id = $request->input('group');

        for($i = 0; $i < count($ten); $i++) {
            $teacher = Adviser::all()->where('id', $teacherId[$i])->first();
            $teacher->disciplines()->attach($did[$i]);

            $teacherDisciplines = AdviserDiscipline::all()
                ->where('adviser_id',$teacherId[$i])
                ->where('discipline_id', $did[$i]);
            foreach ($teacherDisciplines as $temp){
                $temp->update(
                    [
                        'fromDate' => $fromDate,
                        'toDate' => $toDate,
                        'course' => $course[$i],
                        'gr_id' => $gr_id[$i],
                    ]
                );
            }
        }

        return view('/depAdmin/RUP');
    }


}
