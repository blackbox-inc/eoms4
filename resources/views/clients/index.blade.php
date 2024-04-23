@extends('layouts.admin')



@section('content')
    <table id="client" class="table table-striped table-bordered" style="width:100%;font-size: 12px">
        <thead>
            <tr>
                <th>company_name</th>
                <th>Country</th>
                <th>demands</th>
                <th>NOC</th>
                <th>account_officer</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>



        </tbody>

    </table>


    {{-- MODAL ADD APPLICANTS --}}

    <!-- Modal -->
    <div class="modal fade" id="ModalInformation" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ADD LINEUP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <select class="js-example-basic-multiple namelist" name="states[]" multiple="multiple"
                        style="width: 100%">
                        @foreach ($c_information as $item)
                            <option value="{{ $item->fullname }}">{{ $item->fullname }}</option>
                        @endforeach
                    </select>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">CLIENT NAME</label>
                                <input type="text" class="form-control fra_name" name="" id="companyclient"
                                    placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="">ACCOUNT OFFICER</label>
                                <input type="text" class="form-control pra_officer" name="" id=""
                                    placeholder="" value="{{ Auth::user()->username }}" readonly>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary sbmit_to_lineup btn-block">SUBMIT TO LINEUP</button>


                </div>



                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">SUBMIT </button> --}}
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            var clientsData = {!! $clients !!};

            $('#client').DataTable({
                data: clientsData,
                ordering: false,
                columns: [{
                        data: 'company_name',
                        render: function(data) {
                            if (data.length > 20) {
                                return data.substring(0, 17) + '...';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'Country',
                        render: function(data) {
                            return data.toUpperCase();
                        }
                    },
                    {
                        data: 'demands',
                        render: function(data) {
                            if (data.length > 20) {
                                return data.substring(0, 17) + '...';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'noc',
                    },
                    {
                        data: 'contact_person',
                    },
                    {
                        data: 'position_applied',
                        render: function(data, type, row) {
                            var buttonsHtml =
                                '<button class="btn btn-info btn-add btn-sm"  data-toggle="modal" data-target="#ModalInformation" data-company="' +
                                row.company_name + '"><i class="fas fa-plus"></i> ADD</button>';

                            // Append "VIEW LIST" button
                            buttonsHtml +=
                                '<a href="/clients/list/'+row.company_name+'" class="btn btn-warning btn-view-list btn-sm ml-1" data-company="' +
                                row.company_name + '">VIEW LIST</a>';

                            return buttonsHtml;
                        }
                    }
                ]


            });
            $('.btn-add').on('click', function() {
                var client = $(this).attr('data-company')
                $('#companyclient').val(client);
            });




            $(function() {
                $('.js-example-basic-multiple').each(function() {
                    $(this).select2({
                        theme: "classic"
                    });
                });
            });


            $('.sbmit_to_lineup').on('click', function() {
                var fra_name = $('.fra_name').val();
                var pra_officer = $('.pra_officer').val();

                var s = $('.namelist').val().toString();
                var match = s.split(',')

                console.log(match)

                for (var a in match) {
                    var variable = match[a]
                    // console.log(variable)

                    $.ajax({
                        type: 'POST',
                        url: "/addtolineup",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'appname': variable,
                            'fra_name': fra_name,
                            'pra_officer': pra_officer,

                        },
                        success: function(data) {

                            if (data == 2) {
                                alert(" ALREADY ADDED TO THIS COMPANY: " + fra_name
                                .toUpperCase());
                            } else {
                                location.reload();
                            }

                        }

                    });
                }



            });
        });
    </script>
@endsection
