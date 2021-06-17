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
                @if(Auth::user()->student->abroad == 1 && $approved == 0)
                    <div class="p-3">
                        <form action="{{route('/syllabus/load')}}" method="post" enctype="multipart/form-data">
                           @csrf
                            <h3 class="mb-2 ">Please load own individual plan</h3>
                            <input class="btn btn-dark" type="file" id="myFile" name="iup">
                            <button type="submit" class="btn success">Load Discipline</button>
                        </form>

                    </div>
                @elseif($approved == 0)
                    @if($message != null )
                        <h3>{{$message}}</h3>
                    @endif

                    <div class="col-7">
                        <form action="/syllabus/confirm" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dicipline</th>
                                    <th  scope="col">Credits</th>
                                    <th scope="col">Code</th>
                                </tr>
                                </thead>
                                <tbody {{$diss = $disciplines}}>
                                @if(count($diss)>0)
                                @foreach($diss  as $discipline)
                                    <tr>
                                        <th scope="row"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="toSend[]" value="{{$discipline->id}}"></th>
                                        <td>{{$discipline->title_en}}</td>
                                        <td>{{$discipline->credits}}</td>
                                        <td>{{$discipline->code}}</td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <input class="btn btn-dark" type="file" id="myFile" name="sign">
                            <button type="submit" class="btn success">Confirm</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="/syllabus/add">
                            <table class="table studSylla">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dicipline</th>
                                    <th scope="col" class="men">Credits</th>
                                    <th scope="col" class="men">Code</th>
                                </tr>
                                </thead>
                                <tbody {{$diss = $disciplinesLeft}}>
                                @if(count($diss)>0)
                                    @foreach($diss  as $discipline)
                                        <tr>
                                            <th scope="row"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="toAdd[]" value="{{$discipline->id}}"></th>
                                            <td>{{$discipline->title_en}}</td>
                                            <td >{{$discipline->credits}}</td>
                                            <td class="men">{{$discipline->code}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            <button type="submit" class="btn success">Add Discipline</button>
                        </form>
                    </div>


                @else
                    <h1>You're already confirmed own individual educational program</h1>
                @endif


            </div>
        </div>
    </div>
@endsection
