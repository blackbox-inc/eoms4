@extends('layouts.admin')



@section('content')
    <style>
        .card {

            max-width: 800px;
            margin: 0 auto;
        }
    </style>

     <div class="card">
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-6 text-center">
                    <a href="/applicants/fdh" class="btn btn-outline-secondary btn-lg btn-block">DOMESTIC HELPER</a>
                </div>
                <div class="col-lg-6 text-center">
                      <button class="btn btn-outline-warning btn-lg btn-block">SKILLED WORKER</button>
                </div>
            </div>
        </div>
    </div>

    <br>



    <div class="card">
        <div class="card-header">
            Choose Category
        </div>
        <div class="card-body">


            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><small>Check Availability</small></button>
                </div>

            </div>


            <hr>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><small>Surname</small></span>
                                </div>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><small>Firstname</small></span>
                                </div>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><small>M.Initial</small></span>
                                </div>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">DOMESTIC HELPER</button>
                            <button class="btn btn-outline-secondary" type="button">SKILLED WORKER</button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-addon1">
                    </div>
                </div>

            </div>






        </div>
    </div>



   
@endsection
