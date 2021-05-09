@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">
                <h3 class="widget-title"></h3>
                <ul class="widget-list">
                    <li><a href="/profile">Account Data</a></li>
                    <li><a href="/syllabus">Individual Syllabus</a></li>

                </ul>
            </div>
            <div class="col-10 ">
                <div class="p-3 row">
                    <div class="col-7">
                        <div class="row pl-3">
                            <h1>Profile</h1>
                        </div>
                        <h2>{{Auth::user()->student->name . " " . Auth::user()->student->surname }}</h2>
                        <div class="row pl-3">
                            <h3 class="pr-3">{{Auth::user()->email}}</h3>
                        </div>
                        <div class="row pl-3">
                            <h4 class="pt-1">Group:</h4>
                            <h3 class="pl-3">{{Auth::user()->student->group->title}}</h3>
                        </div>
                        <div class="row pl-3">
                            <h4 class="pt-1">Course:</h4>
                            <h3 class="pl-3">{{Auth::user()->student->group->course}}</h3>
                        </div>
                        <div class="row pl-3">
                            <h4 class="pt-1">Educational Program:</h4>
                            <h3 class="pl-3">{{Auth::user()->student->group->educationalProgram->title}}</h3>
                        </div>
                        <div class="row pl-3">
                            <h4 class="pt-1 mr-3">Download Electronic Sign:</h4>
                            <form action="/profile/sign">
                                <input class="btn btn-success" type="submit" value="Sign">
                            </form>
                        </div>

                    </div>
                <div class="col-5">
                    <li class="nav-item dropdown list-group">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Edit Account Data
                        </a>

                        <div class="dropdown-menu stEditData" aria-labelledby="navbarDropdown">
                            <form method="post" action="/profile/edit">
                                @csrf
                                <div class="mb-3 ml-3 mr-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{Auth::user()->email}}" name="email">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3 ml-3 mr-3">
                                    <label for="password" class="form-label">Current Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 ml-3 mr-3">
                                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                                    <input type="password"name="password1" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 ml-3 mr-3">
                                    <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
                                    <input type="password" name="password2" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-success">Edit</button>
                            </form>
                        </div>
                    </li>
                </div>



                </div>

            </div>
        </div>
    </div>
@endsection
