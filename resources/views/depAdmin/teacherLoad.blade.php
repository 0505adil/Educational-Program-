@extends('layouts.app')

@section('content')

    <div class="container ml-1">
        <div class="row justify-content-center">
            <div class="col-2">
                <h3 class="widget-title"></h3>
                <ul class="widget-list">
                    <li><a href="/depAdmin">Uploading Working Syllabus</a></li>
                    <li><a href="/depAdmin/otherDepDisciplines">Uploading Disciplines from other Departments</a></li>
                    <li><a href="/depAdmin/teacherLoad">Uploadiong Teacher Load</a></li>
                </ul>
            </div>
            <div class="col-10 pt-4">
                <form action="/depAdmin/uploadTeacherLoad">
                    <p>
                        Teacer load for
                        <input type="text" name="fromDate">
                        -
                        <input type="text" name="toDate">
                        years
                    </p>
                    <table class="table table-bordered othrDis rup ">
                        <thead>
                        <tr>
                            <th scope="col">Discipline Title(kz)</th>
                            <th scope="col">Discipline Title(ru)</th>
                            <th scope="col">Discipline Title(en)</th>
                            <th scope="col">Educational Program</th>
                            <th scope="col">Course</th>
                            <th scope="col">Group</th>
                            <th scope="col">Semestr</th>
                            <th scope="col">Credits</th>
                            <th scope="col">Lectures</th>
                            <th scope="col">Practises</th>
                            <th scope="col">Lab hours</th>
                            <th scope="col">Credit Load</th>
                            <th scope="col">Teacher</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($rups as $rup)
                        <tr>
                            <td>
                                <input type="text" name="tkz[]" id="" value="{{ $rup->discipline->title_kz}}">
                            </td>
                            <td>
                                <input type="text" name="tru[]" id="" value="{{ $rup->discipline->title_ru}}">
                            </td>
                            <td>
                                <input type="text" name="ten[]" id="" value="{{ $rup->discipline->title_en}}">
                            </td>
                            <td>
                                <input type="text" name="eduProgram[]" id="" value="{{$rup->educationalProgram->title}}">
                            </td>
                            <td>
                                <input type="text" name="course[]" id="" >
                            </td>
                            <td>
                                <input type="text" name="group[]" id="">
                            </td>
                            <td>
                                <input type="text" name="semestr[]" id="" value="{{ $rup->discipline->semestr}}">
                            </td>
                            <td>
                                <input type="text" name="credits[]" id="" value="{{ $rup->discipline->credits}}">
                            </td>
                            <td>
                                <input type="text" name="lec[]" id="lec0" value="{{ $rup->discipline->lectures}}">
                            </td>
                            <td>
                                <input type="text" name="prac[]" id="prac0" value="{{ $rup->discipline->practises}}">
                            </td>
                            <td>
                                <input type="text" name="lab[]" id="lab0" value="{{ $rup->discipline->labs}}">
                            </td>
                            <td>
                                <input type="text" name="credit_load[]"   class="lab" id="sum0"
                                       value="{{$rup->discipline->lectures + $rup->discipline->practises + $rup->discipline->labs}}">
                            </td>
                            <td>
                                <input type="text" name="teacher[]" id="teacher" >
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="13" style="text-align: left;">
                                <input type="button" class="btn btn-lg btn-block" id="addrowOther" value="add" />
                            </td>
                        </tr>
                        </tfoot>

                    </table>
                    <button type="submit" class="btn btn-success">Upload Teacher Load</button>
                </form>
            </div>

        </div>
    </div>


@endsection
