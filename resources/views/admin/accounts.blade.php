@extends('layouts.admin')



@section('content')
   

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Code</th>
                <th>isactive</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)        
            <tr>
                <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->code}}</td>
                <td>{{$user->isactive}}</td>
                <td>
                    <button class="btn btn-danger btn-sm">DELETE</button>
                </td>
             
            </tr>    
            @endforeach   
        </tbody>
      
    </table>

   
@endsection
