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
                <form action="/depAdmin/uploadDiscipline">
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
                        @for($i = 1; $i <= 5; $i++)
                        <tbody >
                            <tr>
                                <td>
                                    <input type="text" name="tkz[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="tru[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="ten[]" id="">
                                </td>
                                <td>
                                    <select name="eduProgram[]" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                        <option>Educational Programs:</option>
                                        {{$eduPrograms = \App\Models\EducationalProgram::all()}}
                                        @foreach ($eduPrograms as $program ){
                                        <option  @if(!empty($eduProgram) && $eduProgram == $program->id) selected @endif value="{{$program->id}}">{{$program->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="course[]" id="">
                                </td>
                                <td>
                                    <select name="group[]" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                        <option>Groups:</option>
                                        {{$groups = \App\Models\Group::all()}}
                                        @foreach ($groups as $gr ){
                                        <option  @if(!empty($group) && $group == $gr->id) selected @endif value="{{$gr->id}}">{{$gr->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="semestr[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="credits[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="lec[]" id="lec0">
                                </td>
                                <td>
                                    <input type="text" name="prac[]" id="prac0">
                                </td>
                                <td>
                                    <input type="text" name="lab[]" id="lab0">
                                </td>
                                <td>
                                    <input type="text" name="credit_load[]"   class="lab" id="sum0"
                                           value="0">
                                </td>
                                <td>
                                    <select name="teacher[]" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                        <option>Teachers:</option>
                                        {{$teachers = \App\Models\Adviser::all()}}
                                        @foreach ($teachers as $t ){
                                        <option  @if(!empty($teacher) && $teacher == $t->id) selected @endif value="{{$t->id}}">{{$t->name. " " . $t->surname}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        @endfor
{{--                        <tfoot>--}}
{{--                            <tr>--}}
{{--                                <td colspan="13" style="text-align: left;">--}}
{{--                                    <input type="button" class="btn btn-lg btn-block" id="addrowOther" value="add" />--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        </tfoot>--}}

                    </table>
                    <button type="submit" class="btn btn-success">Upload Disciplines</button>
                </form>
            </div>

        </div>
    </div>


@endsection
