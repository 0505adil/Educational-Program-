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
                <form action="/depAdmin/addRup">
                <select name="eduProgram" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                    <option>Educational Programs:</option>
                    {{$eduPrograms = \App\Models\EducationalProgram::all()}}
                    @foreach ($eduPrograms as $program ){
                    <option  @if(!empty($eduProgram) && $eduProgram == $program->id) selected @endif value="{{$program->id}}">{{$program->title}}</option>
                    @endforeach
                </select>
                <div class="d-flex mb-3">

                        <label for="dateFrom" class="col-md-2 col-form-label">{{ __('Date From:') }}</label>

                        <div class="col-md-4">
                            <input type="text" name="fromDate">
                        </div>

                    <label for="dateTo" class="col-md-2 col-form-label">{{ __('Date to:') }}</label>

                    <div class="col-md-4">
                        <input type="text" name="toDate">
                    </div>
                </div>



                <table class="table table-bordered rup fTable">
                    <thead>
                        <tr>
                            <th scope="col">Discipline Cycle</th>
                            <th scope="col">Discipline Component</th>
                            <th scope="col">Discipline Code</th>
                            <th scope="col">Discipline Title(kz)</th>
                            <th scope="col">Discipline Title(ru)</th>
                            <th scope="col">Discipline Title(en)</th>
                            <th scope="col">Semestr</th>
                            <th scope="col">Credits</th>
                            <th scope="col">Lectures</th>
                            <th scope="col">Practises</th>
                            <th scope="col">Lab hours</th>
                        </tr>
                    </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <input class="cycle" type="text" name="cycle[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="component[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="code[]" id="">
                                </td>
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
                                    <input type="text" name="semestr[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="credits[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="lec[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="prac[]" id="">
                                </td>
                                <td>
                                    <input type="text" name="lab[]" id="" >
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="11" style="text-align: left;">
                                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        </tfoot>

                </table>
                    <button type="submit" class="btn btn-success">Add RUP</button>
                </form>
            </div>

        </div>
    </div>


@endsection
