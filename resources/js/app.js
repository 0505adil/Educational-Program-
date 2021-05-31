// noinspection JSUnusedLocalSymbols

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
//

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

    $("table.pps").on("keyup", "#sumac", function (){

        var idd = $(this).closest("")
        var lec = $("#a" + id.toString()).val();
        var prac = $("#b" + id.toString()).val();
        var lab = $("#c" + id.toString()).val();

        var total = parseInt(lec, 10) + parseInt(prac, 10) + parseInt(lab, 10);

        $('#sumac'+id).val(total);

    } );

    // $("table.pps").input(".row", function (){
    //
    // });
    // for (let j = 1; j <= 6; j++){
    //
    //     for (let i = 1; i <= 2; i++) {
    //         let sums = 0;
    //         $(`.f${j} .row${i}`).on('input', function (event) {
    //             let sum = 0;
    //             $(`.f${j} .row${i}`).each(function() {
    //                 var val = $.trim( $(this).val() );
    //                 if ( val ) {
    //                     val = parseFloat( val.replace( /^\$/, "" ) );
    //
    //                     sum += !isNaN( val ) ? val : 0;
    //                 }
    //             });
    //             $(`.f${j} .row${i}`).val(sum);
    //             const sum2Index = i % 2 === 0 ? i - 1 : i + 1
    //             let sum2 = $.trim($(`.f${j} #sum` + (sum2Index)).val())
    //             sum2 = (sum2) ? sum2 : 0;
    //             sums += parseFloat(sum) + parseFloat(sum2)
    //             $(`.f${j} #sum${ i % 2 !== 0 ? `${i}${sum2Index}` : `${sum2Index}${i}` }`).val(sums)
    //             // $("#sum12").val(sums);
    //             sums = 0
    //             sum = 0
    //         })
    //     }
    //
    //
    // }

    for (let j = 1; j <= 6; j++){
            for (let i = 1; i <= 2; i++) {
                let sums = 0;
                $(`.f${j} .row${i}`).on('input', function (event) {
                    let sum = 0;
                    $(`.f${j} .row${i}`).each(function() {
                        var val = $.trim( $(this).val() );
                        if ( val ) {
                            val = parseFloat( val.replace( /^\$/, "" ) );

                            sum += !isNaN( val ) ? val : 0;
                            console.log(sum)
                        }
                    });
                    $(`.f${j} #sum${i}`).val(sum);
                    $(`.f${j} #sum12`).val(parseFloat($(`.f${j} #sum1`).val()) +
                        ((parseFloat($(`.f${j} #sum2`).val())) ? (parseFloat($(`.f${j} #sum2`).val())) : 0))
                    // const sum2Index = i % 2 === 0 ? i - 1 : i + 1
                    // let sum2 = $.trim($(`.f${j} #sum` + (sum2Index)).val())
                    // console.log(sum2)
                    // sum2 = (sum2) ? sum2 : 0;
                    // sums += parseFloat(sum) + parseFloat(sum2)
                    // console.log(sums)
                    // console.log(sum2Index)
                    // $(`.f${j} #sum${ i % 2 !== 0 ? `${i}${sum2Index}` : `${sum2Index}${i}` }`).val(sums)
                    // $("#sum12").val(sums);

                })
            }

    }

    for (let k = 1; k <= 6; k++) {
        for (let j = 1; j <= 4; j++) {
            $(`.pps2r${k} .part${j}`).on('input', function (event){
                let res = 1
                let val = $.trim($(this).val())
                let valSplit = val.split("*");
                for (var i = 0; i < valSplit.length; i++) {
                    res *= parseFloat(valSplit[i])
                }

                $(`.pps2r${k} .partRes${j}`).val(res)
                let sum = 0;

                $(`.pps2r${k} .forSum`).each(function (){
                    let val = $.trim( $(this).val() );
                    if ( val ) {
                        val = parseFloat( val.replace( /^\$/, "" ) );

                        sum += !isNaN( val ) ? val : 0;
                    }
                })
                $(`.pps2r${k} .sum`).val(sum)
            })
        }
    }


        $(".pps3").on('input', function (){
            let sum = 0;
            $(`.pps3 .part`).each(function (){
                let val = $.trim( $(this).val() );
                if ( val ) {
                    val = parseFloat(val.replace(/^\$/, ""));

                    sum += !isNaN(val) ? val : 0;
                }
            })
            $('.pps3 .res31').val(sum);
            sum = 0
            $(`.pps3 .res`).each(function (){
                let val = $.trim( $(this).val() );
                if ( val ) {
                    val = parseFloat(val.replace(/^\$/, ""));

                    sum += !isNaN(val) ? val : 0;
                }
            })
            $('.pps3 .res32').val(sum);
        })


    $(".pps4").on('input', function (){

        for (let j = 1; j <= 2; j++) {
            let sum = 0
            $(`.pps4 .part${j}`).each(function (){
                let val = $.trim( $(this).val() );
                if ( val ) {
                    val = parseFloat(val.replace(/^\$/, ""));

                    sum += !isNaN(val) ? val : 0;
                }
            })
            $(`.pps4 .res${j}`).val(sum)
        }
    })

    $(".pps42").on('input', function (){
        for (let j = 1; j <= 2; j++) {
            let sum = 0
            $(`.pps42 .part${j}`).each(function (){
                let val = $.trim( $(this).val() );
                if ( val ) {
                    val = parseFloat(val.replace(/^\$/, ""));

                    sum += !isNaN(val) ? val : 0;
                }
            })
            $(`.pps42 .res${j}`).val(sum)
        }
    })


    $(".pps5").on('input', function (){
        for (let j = 1; j <= 2; j++) {
            let sum = 0
            $(`.pps5 .part${j}`).each(function (){
                let val = $.trim( $(this).val() );
                if ( val ) {
                    val = parseFloat(val.replace(/^\$/, ""));

                    sum += !isNaN(val) ? val : 0;
                }
            })
            $(`.pps5 .res${j}`).val(sum)
        }
    })

    $(".pps6").on('input', function (){
        for (let j = 1; j <= 2; j++) {
            let sum = 0
            $(`.pps6 .part${j}`).each(function (){
                let val = $.trim( $(this).val() );
                if ( val ) {
                    val = parseFloat(val.replace(/^\$/, ""));

                    sum += !isNaN(val) ? val : 0;
                }
            })
            $(`.pps6 .res${j}`).val(sum)
        }
    })
});




