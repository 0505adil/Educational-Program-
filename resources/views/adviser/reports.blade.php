@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">
                <h3 class="widget-title"></h3>
                <ul class="widget-list">
                    <li><a href="/tProfile">Account Data</a></li>
                    <li><a href="/tProfile/myGroups">My Groups</a></li>
                    <li><a href="/tSyllabus ">Syllabus For Students</a></li>
                    <li><a href="/tProfile/reports">Reports</a></li>
                    <li><a href="/pps">Individual Teacher Plan</a></li>
                </ul>
            </div>
            <div class="col-10 ">
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
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
