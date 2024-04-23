@extends('layouts.admin')



@section('content')
    <table id="applicants" class="table table-striped table-bordered display responsive nowrap search"
        style="width:100%; font-size: 13px">
        <thead>
            <tr>
                <th>Barcode</th>
                <th>Fullname</th>
                <th>Position</th>
                <th>Status</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>

            @foreach ($applicants as $item)
                <tr>
                    <td>{{ $item->bcode }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->cat2 }}</td>
                    <td> <i class="fas fa-exclamation-circle" style="color: green"></i>
                        {{ $item->thechecker }}
                        @if (strlen($item->company_name) > 20)
                            <strong title="{{ $item->company_name }}">@ {{ substr($item->company_name, 0, 20) }}...</strong>
                        @else
                            <strong>{{ $item->company_name }}</strong>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-outline-success btn-information btn-sm" data-toggle="modal"
                            data-target="#ModalInformation" data-bcode="{{ $item->bcode }}">View Information</button>
                    </td>
                </tr>
            @endforeach



        </tbody>

    </table>



    <!-- Modal -->
    <div class="modal fade" id="ModalInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Applicants Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="pre-loader" style="display: none">

                        <a href="" class="btn btn-outline-success btn-sm m-3 btn-lg edit_resume_error"
                            target="_blank">EDIT RESUME</a>
                        <div class="box-loader-image">
                            <img src="{{ asset('images/loading.gif') }}" alt="">
                        </div>
                    </div>

                    <style>
                        .pre-loader {
                            position: absolute;
                            background-color: rgb(255, 255, 255);
                            height: 100%;
                            width: 100%;
                            z-index: 5;
                            top: 40%;
                            left: 40%;
                            transform: translate(-40%, -40%);


                        }

                        .pre-loader .box-loader-image {
                            position: absolute;
                            height: 100%;
                            width: 300px;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);

                        }

                        .pre-loader img {

                            height: 100%;
                            width: 100%;

                        }
                    </style>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card text-left">
                                <img class="card-img- imgx" src="" alt="" style="height: 100%">
                                <div class="card-body">
                                    <h6 class="card-asdtitle text-center barcode">EOMS24A01234</h5>
                                        <p class="card-text text-center cat2">WEB DEVELOPER</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <button class="btn btn-warning btn-sm"><strong><i class="fas fa-id-card"
                                        style="font-size:1.3em"></i> <small>DOCUMENTS</small></strong></button>
                            <a href="#" class="btn btn-success btn-sm view_resume" target="_blank"><strong><i
                                        class="far fa-eye" style="font-size:1.3em"></i> <small>VIEW
                                        RESUME</small></strong></a>
                            <a href="#"class="btn btn-info btn-sm edit_resume" target="_blank"><strong><i
                                        class="fas fa-edit" style="font-size:1.3em"></i>
                                    <small>EDIT RESUME</small></strong></a>
                            <hr>
                            <div class="card">

                                <div class="card-header" style="background-color: rgb(105, 107, 0)">

                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="font-weight: 700">NAME: <span
                                            class="fullname">INCOMPLETE INFORMATION PLEASE UPDATE HIS/HER RESUME</span></li>
                                    <li class="list-group-item" style="font-weight: 700">AGE: <span class="age">24</span>
                                    </li>
                                    <li class="list-group-item" style="font-weight: 700">STATUS: <span
                                            class="thechecker">BACK-OUT (memyselfandi company)</span></li>
                                </ul>
                            </div>

                            <div class="card">
                                <div class="card-header" style="background-color: rgb(105, 107, 0)">

                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Mobile No.: <span class="cno1">-</span> / <span
                                            class="cno2">00000000000</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function() {

            var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $('#applicants').DataTable({
                ordering: false,
            });








            $('#applicants').on('click', '.btn-information', function() {
                var bcode = $(this).data('bcode');

                // Show the pre-loader
                $('.pre-loader').show();

                $.ajax({
                    url: '/applicants',
                    type: 'post',
                    dataType: 'json', // Specify the expected data type as JSON
                    data: {
                        'bcode': bcode,
                    },
                    success: function(data) {
                        console.log(data)

                        if ($.isEmptyObject(data)) {



                            Swal.fire({
                                icon: "error",
                                title: "WARNING WARNING",
                                text: "Incomplete data information please update his/her resume to view",

                            });



                            $('.edit_resume_error').attr('href',
                                '/resume_builder/dh_form/update.php?bcode=' + bcode);



                        } else {


                            // Convert cat2 value to uppercase
                            var cat2UpperCase = data[0].cat2.toUpperCase();

                            // Define base URLs for edit and view resume
                            var baseEditResumeUrl = '/resume_builder/';
                            var baseViewResumeUrl ='/resume_builder/resume-cv/resume-app.php?bcode=';

                            // Determine the appropriate URLs based on cat2 value
                            var editResumeUrl, viewResumeUrl;
                            if (["DOMESTIC HELPER", "HSW", "CARETAKER"].includes(cat2UpperCase)) {
                                editResumeUrl = '/resume_builder/dh_form/update.php?bcode=' + bcode;
                                viewResumeUrl = '/resume_builder/dh_form/resume_preview.php?bcode=' + bcode;
                            } else {
                                editResumeUrl = baseEditResumeUrl + '?barcode=' + bcode;
                                viewResumeUrl = baseViewResumeUrl + bcode;
                            }

                            // Set href attributes for edit_resume and view_resume links
                            $('.edit_resume').attr('href', editResumeUrl);
                            $('.view_resume').attr('href', viewResumeUrl);




                            $('.fullname').text(data[0].fullname.toUpperCase());

                            var birthday = new Date(data[0].birthday);
                            var today = new Date();

                            var age = today.getFullYear() - birthday.getFullYear();
                            var monthDifference = today.getMonth() - birthday.getMonth();

                            if (monthDifference < 0 || (monthDifference === 0 && today
                                    .getDate() <
                                    birthday.getDate())) {
                                age;
                            }


                            $('.age').text(age);

                            $('.barcode').text(data[0].bcode)
                            $('.cat2').text(data[0].cat2)

                            $('.thechecker').text(data[0].thechecker + " ( " + (data[0]
                                .company_name || '-') + " )");

                            $('.imgx').attr('src', "{{ asset('upload') }}" + "/" + data[0]
                                .idpic);

                            var img = new Image();
                            img.onload = function() {
                                var originalHeight = this.naturalHeight;
                                console.log('Original Height: ' + originalHeight +
                                    ' pixels');
                            };
                            img.src = "{{ asset('upload') }}" + "/" + data[0].idpic;


                            $('.cno1').text(data[0].cno1)
                            $('.cno2').text(data[0].cno2)

                            // Hide the pre-loader after the results are fetched
                            $('.pre-loader').hide();


                            // resume_builder/dh_form/resume_preview.php?bcode=222



                        }

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Hide the pre-loader in case of an error
                        $('.pre-loader').hide();

                        // Handle the error and display an appropriate message
                        alert('Error:', errorThrown);
                    },
                });
            });


        });
    </script>
@endsection
