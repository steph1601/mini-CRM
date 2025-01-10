@extends('adminlte::page')

@section('title', 'Mini CRM | Companies')

@section('content_header')
    <h3>Company Details</h3>
@stop

@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="d-flex justify-content-center m-3">
        <div class="card text-center">
            <div class="card-header">
                <h2 class="font-weight-bold">{{ $companies->company_name }}</h2>
            </div> 
            <div class="p-3 border m-2"style="height: 250px;">
                <img class="card-img-top h-100" src="{{ asset('storage/logo_img/' . $companies->logo) }}"  alt="Card image cap">
            </div> 
           <hr>
            <div class="card-body text-center m-0">      
               <p><h5><i class="fas fa-globe" aria-hidden="true"></i> :{{$companies->website}} </h5></p> 
               <p><h5><i class="far fa-envelope"></i> : {{$companies->email}}</h5></p>
            </div>
            <div class="card-footer text-muted">
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="d-flex justify-content-start m-2"> 
            <h2 class="font-weight-bold">List of Employees</h2>
         </div>   
            <div class="container m-2 bg-white">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <th>Name</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)                      
                        <tr>
                            <td>{{ $employee->first_name }}  {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No employees listed</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
              <!-- Pagination links -->
              <div class="pagination-container float-right">
                {{ $employees->links('pagination::bootstrap-4') }}
            </div>
    </div>
  </div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop