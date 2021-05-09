// noinspection JSUnusedLocalSymbols

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$(document).ready(function () {
    let id;
    var counter = 0;



    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input class="cycle" type="text" name="cycle[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="component[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="code[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="tkz[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="tru[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="ten[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="semestr[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="credits[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="lec[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="prac[]" id=""></td>';
        cols += '<td><input class="cycle" type="text" name="lab[]" id=""></td>';

        cols += '<td ><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';
        newRow.append(cols);
        $("table.fTable").append(newRow);
        counter++;
    });


    $("table.fTable").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });

    var i = 1;
    id = 0;

    $("#addrowOther").on("click", function () {

        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" name="tkz[]" id=""></td>';
        cols += '<td><input type="text" name="tru[]" id=""></td>';
        cols += '<td><input type="text" name="ten[]" id=""></td>';
        cols += '<td><input type="eduProgram" name="course[]" id=""></td>';
        cols += '<td><input type="text" name="course[]" id=""></td>';
        cols += '<td><input type="text" name="group[]" id=""></td>';
        cols += '<td><input type="text" name="semestr[]" id=""></td>';
        cols += '<td><input type="text" name="credits[]" id=""></td>';
        cols += '<td><input type="text" name="lec[]" id="lec'+i+'"></td>';
        cols += '<td><input type="text" name="prac[]" id="prac'+i+'"></td>';
        cols += '<td><input type="text" name="lab[]" id="lab'+i+'" ></td>';
        cols += '<td><input type="text" name="credit_load[]"  class="lab" id="sum'+i+'"  value="0"></td>';
        cols += '<td><input type="text" name="teacher[]" id=""></td>';

        cols += '<td ><input type="button" class="ibtnDel btn btn-danger"  value="Delete"></td>';

        newRow.append(cols);
        $("table.othrDis").append(newRow);
        i++;
    });

    $("table.othrDis").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
    });

    $("table.othrDis").on("keyup", ".lab", function (){

        var idd = $(this).closest("")
        var lec = $("#lec" + id.toString()).val();
        var prac = $("#prac" + id.toString()).val();
        var lab = $("#lab" + id.toString()).val();

        var total = parseInt(lec, 10) + parseInt(prac, 10) + parseInt(lab, 10);

        $('#sum'+id).val(total);
        id = i;
    } );

});




