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
                <div class="p-3 row">

                    <h1 class="mt-3">Teachers List</h1>
                    <table class="table-borderless table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Fullname</th>
                            <th scope="col">Individual teacher program</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($teachers != null)
                            @foreach($teachers  as $teacher)
                                <tr>
                                    <td></td>
                                    <td>{{ $teacher->name. " " .$teacher->surname, $id = $teacher->id }}</td>
                                    <td>

                                        <a href="itp/{{$id}}">Dowload ITP</a>

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
@endsection
