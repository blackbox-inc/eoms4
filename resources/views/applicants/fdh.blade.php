@extends('layouts.admin')



@section('content')
  

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>barcode</th>
                <th>applicant_name</th>
                <th>AO</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>

            @foreach ($fdh as $item)
                
            
            <tr>
                <td>{{$item->barcode}}</td>
                 <td>{{$item->applicant_name}}</td>
                  <td>{{$item->account_officer}}</td>
                <td>

                    @if($item->applicant_name == "_")
                        <button class="btn btn-outline-success"><i class="fas fa-plus"></i> ADD NEW</button>
                    
                        @else
                      <button class="btn btn-outline-info"> <i class="fas fa-edit"></i> EDIT RESUME</button>
                   <button class="btn btn-outline-warning"><i class="fas fa-upload"></i> DOCUMENT</button>
                      @endif


                    
                </td>
             
            </tr>

            @endforeach
         
        </tbody>
      
    </table>

   
@endsection
