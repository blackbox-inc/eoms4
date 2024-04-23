@extends('layouts.admin')



@section('content')
    <table id="example" class="table table-striped table-bordered example" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Status</th>
                <th>Resume</th>
                <th>Date LineUp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getCompany as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td title="{{ $company->position }}"
                        @if (strlen($company->position) > 20) data-toggle="tooltip" data-placement="top" @endif>
                        {{ Illuminate\Support\Str::limit($company->position, 20) }}
                    </td>
                    <td>{{ $company->history }}</td>
                    <td>
                        <a href="{{ $company->resume }}"class="">VIEW RESUME</a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($company->date_created)->format('M d, Y') }}</td>

                    <td>
                        <button id="selected" data-id="{{ $company->id }}" class="btn btn-warning btn-sm"> <i
                                class="fas fa-hand-pointer"></i> </button>
                        <button id="rejected" data-id="{{ $company->id }}" class="btn btn-danger btn-sm"><i
                                class="fas fa-times"></i> <small>REJECTED</small></button>
                        <button id="backup" data-id="{{ $company->id }}" class="btn btn-info btn-sm"><i
                                class="far fa-save"></i> <small>BACKUP</small> </button>
                        <button id="backout" data-id="{{ $company->id }}" class="btn btn-secondary btn-sm"> <i
                                class="far fa-hand-paper"></i> <small>BACKOUT</small></button>


                        @if (Auth::user()->role == 1)
                            <button id="delete" data-id="{{ $company->id }}" class="btn btn-outline-danger btn-sm"><i
                                    class="fas fa-trash"></i></button>
                        @endif
                    </td>
                </tr>
            @endforeach


        </tbody>

    </table>

    <script>
      

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function handleButtonClick(buttonId, route) {
            $('#example').on('click', buttonId, function() {
                var dataId = $(this).attr('data-id');

                $.ajax({
                    url: route + '/' + dataId,
                    method: 'POST', // or 'GET' depending on your server-side route configuration
                    success: function(response) {
                        alert(response); // Handle the response from the server
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log any errors
                    }
                });
            });
        }

        $(document).ready(function() {
            handleButtonClick('#selected', '/selected-route');
            handleButtonClick('#rejected', '/rejected-route');
            handleButtonClick('#backup', '/backup-route');
            handleButtonClick('#backout', '/backout-route');
            handleButtonClick('#delete', '/delete-route');
        });
    </script>
@endsection
