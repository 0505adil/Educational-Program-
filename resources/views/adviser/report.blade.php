<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        body{
            font-family: DejaVu Sans; font-size: 12px;
        }
        table .nomer {
            width: 100px  !important;
        }
        table .title {
            width: 300px  !important;
        }
        table .credit {
            width: 100px !important;
        }
        table .lector {
            width: 200px !important;
        }
        table{
            width: 60% !important;
        }
    </style>
</head>
<body class="report">
<div class="page">
    <div class="wi ">
        <p class="text-center font-weight-normal">
            Халықаралық ақпараттық технологиялар университеті / Международный университет информационных
            технологий / International information technology university</p>
        <p class="text-center font-weight-normal">
            Ақпараттық технологиялар факультеті / Факультет информационных технологий
            / Faculty of Information technology
        </p>
        <p class="text-center pt-3 font-weight-bold">
            2020 – 2021 оқу жылына білім алушының жеке оқу жоспары /
            Индивидуальный учебный план обучающегося на 2020 – 2021 учебный год /
            Individual curriculum of the student for the academic years 2020-2021

        </p>
    </div>
    <div class="wi pt-4">
        <p class="mb-1">Білім алушының аты-жөні/Ф.И.О. обучающегося/Student name <text class="font-weight-bold">{{$student->name. " " . $student->surname}}</text></p>
        <p class="mb-1">Білім алушының Id / Id студента / Student Id <text class="font-weight-bold"> {{$student->id}} </text>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            курс / курс / course <text class="font-weight-bold">{{ $student->group->course }}</text></p>
        <p class="mb-1">тобы/группа/group <text class="font-weight-bold">{{ $student->group->title }}</text></p>
        <p class="mb-1">Мамандықтың шифры және атауы / Шифр и наименование специальности / Code and name of the specialty</p>
        <p class="text-center font-weight-bold">B057 - Information technologies</p>
        <p class="mb-1">Білім беру бағдарламасы/Образовательная программа /Educational  program</p>
        <p class="text-center font-weight-bold">6В06101 Компьютерные науки</p>
    </div>
    <div class="wi">
        <table border="1" width="80%">
            <thead>
            <tr>
                <th class="nomer"><p class="text-center">№</p></th>
                <th class="title"><p class="text-center">Пән атауы/ Наименование дисциплины/ Course name</p></th>
                <th class="credit"><p class="text-center">Кредит/ <br> Credit</p></th>
                <th class="lector"><p class="text-center">Лектор/Lecturer</p></th>
            </tr>

            </thead>
            <tbody>{{ $i = 1 }}
            @foreach($disciplines as $d)
                <tr>
                    <td class="nomer">{{$i}}</td>
                    <td class="title">{{$d->title_en}}</td>
                    <td class="credit">{{$d->credits}}</td>
                    <td class="lector"></td>
                </tr>{{$i++}}
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="wi mt-4">
        <p class="mb-1">Білім алушының қолы/Подпись обучающегося/ Student Signature ____________________</p>
        <p class="mb-1">АТФ деканы / Декан ФИТ  / Dean of IT faculty    _________________ /  </p>
        <p class="mb-1">Кафедра меңгерушісі/Заведующий кафедрой/ Head of department ____________ /Ыдырыс А.Ж. </p>
        <p class="mb-1">Эдвайзер /Эдвайзер /Adviser ____________________________ /______________</p>
        <p class="mb-1">Күні/Дата/Date _______________        </p>
        <p class="mb-1">КТ қабылданды/ Принято ОР/ Accepted by OR: _____________________________  </p>

    </div>
</div>
</body>
</html>
