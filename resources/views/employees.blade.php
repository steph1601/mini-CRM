@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EMPLOYEES</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <!-- Add Employee Modal Button -->
        <button type="button" class="btn btn-lg btn-flat bg-gradient-primary" data-toggle="modal" data-target="#addEmployeeModal">ADD AN EMPLOYEE</button>

        <!-- Add Employee Modal -->
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel"><i class="far fa-user-circle mr-2"></i>Add Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="add-employee" method="POST" novalidate>
                        <p class="text-danger" style="display: none;"></p>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="first name" name="first_name" data-validate="first_name">
                            </div>
                            <div class="col">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="last name" name="last_name" data-validate="last_name">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" placeholder="09xxxxxxxxx" name="phone" data-validate="phone">
                            </div>
                            <div class="col">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="name@domain.com" name="email" data-validate="email">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_id">Company</label>
                            <select class="form-control" id="company_id" name="company_id" data-validate="company_id">
                              <option value="" selected disabled>Choose a company</option>
                              @forelse($companies as $company)
                              <option value="{{$company->id}}">{{$company->company_name}}</option>
                              @empty

                              @endforelse
                            </select>
                          </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" data-submit="add_employee" disabled>Submit</button>
            </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                        <tr>

                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->company ? $employee->company->company_name : 'N/A' }}</td>
                            <td>
                                <div class="text-center">
                                <a onclick="showEmployeeInfoModal('{{ $employee->id }}')" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-info btn-sm"  onclick="showEditEmployeeModal('{{ $employee->id }}')"><i class="far fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $employee->id }}')"><i class="far fa-trash-alt"></i></button>                   
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No employees found.</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="employeeInfoModal" tabindex="-1" role="dialog" aria-labelledby="employeeInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="employeeInfoModalLabel">Employee Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="media">
                    <div class="">
                        <h1><i class="far fa-user-circle align-items-center m-2"></i></h1>
                    </div>         
                    <div class="media-body m-2" id="employeeContent">
                    
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    </div>
 <!-- Pagination links -->
 <div class="pagination-container float-right mb-5">
    {{ $employees->links('pagination::bootstrap-4') }}
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        //SHOW EMPLOYEE INFO
        let container = document.getElementById('employeeContent')
        function showEmployeeInfoModal(employeeId) {
            fetch(`employees/${employeeId}`)
            .then(response => response.json())
            .then(data => {
                container.innerHTML = `
                <h5 class="mt-0 font-weight-bold">${data.first_name} ${data.last_name}</h5>
                <i class="fas fa-at text-primary"></i>: ${data.email}
                <div class="row">
                    <div class="col">
                        <i class="fas fa-mobile-alt text-primary"></i>: ${data.phone}
                    </div>
                    <div class="col">
                        <i class="far fa-building text-primary"></i>: ${data.company}
                    </div>
                </div>
                    `;
            });
            $('#employeeInfoModal').modal('show');
        }

        //EMPLOYEE DATA CREATION
        const form = document.querySelector('.add-employee');

        const inputFirstName = document.querySelector('[data-validate="first_name"]');
        const inputLastName = document.querySelector('[data-validate="last_name"]');
        const inputEmail = document.querySelector('[data-validate="email"]');
        const inputPhone = document.querySelector('[data-validate="phone"]');
        const selectCompanyId = document.querySelector('[data-validate="company_id"]');

        const submit = document.querySelector('[data-submit="add_employee"]');

        let isFirstNameReady = false;
        let isLastNameReady = false;
        let isEmailReady = false;
        let isPhoneReady = false;
        let isCompanyIdReady = false;

        form.addEventListener("keyup", function(e) {         
             checkAddForm();
        });

        form.addEventListener("change", function(e) {
            checkAddForm();
        });

        function checkAddForm(){
             //region # Validate first name
             if(inputFirstName.value === "") {
                isNameReady = false;
                ShowValidation(inputName, "is-invalid");
                invalidName.innerHTML = "Company Name field cannot be empty!";
            } else {
                isNameReady = true;
                ShowValidation(inputName, "is-valid");
            }
            //endregion
        }
    </script>
@stop   