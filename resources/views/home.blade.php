@extends('adminlte::page')

@section('title', 'Mini CRM')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section>
    <div class="row">
        <div class="col">
            <div class="small-box  bg-info">
                <div class="inner">
                    <h3>410</h3>
                    <p>Companies</p>
                </div>
                <div class="icon">
                    <i class="far fa-building"></i>
                </div>
                <a href="" class="small-box-footer">
                    "More Info"
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>    

        <div class="col">
            <div class="small-box  bg-success">
                <div class="inner">
                    <h3>13,648</h3>
                    <p>Employees</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="" class="small-box-footer">
                    "More Info"
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div> 
        </div>
    </div>      
</section>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable(); // Initialize DataTable
        });
    </script>
@stop   