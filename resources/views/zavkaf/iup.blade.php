@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">
                <h3 class="widget-title"></h3>
                <ul class="widget-list">
                    <li><a href="/studentSyllabus">ИУП</a></li>
                    <li><a href="/zpps">ИПП</a></li>
                </ul>
            </div>
            <div class="col-10 ">
                <div class="row p-3 ">
                    <div class="col-8">
                        <form action="{{route('sFilter')}}">
                            <div class="d-flex">
                                <h4 class="mr-3">Course:</h4>
                                <select name="course" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="course">
                                    @for($i = 1; $i <= 4; $i++)
                                        <option @if(!empty($course) && $course == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="d-flex">
                                <h4 class="mr-3">Educational Programs:</h4>
                                <select name="eduProgram" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                    {{$eduPrograms = \App\Models\EducationalProgram::all()}}
                                    @foreach ($eduPrograms as $program ){
                                    <option  @if(!empty($eduProgram) && $eduProgram == $program->id) selected @endif value="{{$program->id}}">{{$program->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex">
                                <h4 class="mr-3">Group:</h4>
                                <select name="groupId" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                    <option{{$groups = \App\Models\Group::all()}}>Group:</option>

                                    @foreach ($groups as $group ){
                                    <option  @if(!empty($groupId) && $groupId == $group->id) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success" type="submit">Show</button>
                        </form>

                        <h1 class="mt-3">Students List</h1>
                        <table class="table-borderless table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student Fullname</th>
                                <th scope="col">Individual educational program</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($students != null)
                            @foreach($students  as $student)
                                <tr>
                                    <td></td>
                                    <td>{{ $student->name. " " .$student->surname, $id = $student->id }}</td>
                                    <td>

                                        @if($student->abroad == 1)
                                            <a href="report/for/abroad/{{$id}}">Dowload IEP</a>
                                        @else
                                            <a href="report/{{$id}}">Dowload IEP</a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
