@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">
                <h3 class="widget-title"></h3>
                <ul class="widget-list">
                    <li><a href="/tProfile">Account Data</a></li>
                    <li><a href="/tProfile/myGroups">My Groups</a></li>
                    <li><a href="/tSyllabus">Syllabus For Students</a></li>
                    <li><a href="/tProfile/reports">Reports</a></li>
                    <li><a href="/pps">Individual Teacher Plan</a></li>
                </ul>
            </div>
            <div class="col-10 ">
                <div class="p-3 row">
                    <div class="col-7">
                        <form action="{{ route('profile/syllabus/filter') }}">

                        <div class="row pl-3">
                            <h1>Students Syllabus</h1>
                        </div>
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
                                <h4 class="mr-3">Semestr:</h4>
                                <select name="semestr" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="semestr">

                                    <option>1</option>
                                    <option>2</option>

                                </select>
                            </div>
                            <button class="btn btn-success" type="submit">Show</button>
                        </form>
                    </div>
                    <div class="col-5">
                        <form action="/tProfile/syllabus/send">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dicipline</th>
                                    <th scope="col">Credits</th>
                                    <th scope="col">Code</th>
                                </tr>
                            </thead>
                            @if($disciplines != null)
                            <tbody {{$tdisciplines = $disciplines}}>

                                @foreach($tdisciplines as $discipline)
                                    <tr>
                                        <th scope="row"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="toSend[]" value="{{$discipline->id}}"></th>
                                        <td>{{$discipline->title_en}}</td>
                                        <td>{{$discipline->credits}}</td>
                                        <td>{{$discipline->code}}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                            @endif
                        </table>

                            <select name="groupId" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                                <option{{$groups = \App\Models\Group::all()}}>Group:</option>

                                @foreach ($groups as $group ){
                                <option  @if(!empty($groupId) && $groupId == $group->id) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="btn success">Send</button>
                        </form>
                    </div>



                </div>

            </div>
        </div>
    </div>
@endsection
