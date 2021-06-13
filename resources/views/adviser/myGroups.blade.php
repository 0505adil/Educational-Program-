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
                <table class="table-bordered table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">title</th>
                            <th scope="col">number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$group->title}}</td>
                                <td>{{ count($group->students) }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
