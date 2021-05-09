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
                    <li><a href="">News</a></li>
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
                            <td>{{ $student->name. " " .$student->surname }}</td>
                            <td>
                                <form action="/report/download">
                                    <input class="btn" type="text" value="Download IEP">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
