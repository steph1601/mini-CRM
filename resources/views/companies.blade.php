@extends('adminlte::page')

@section('title', 'Mini CRM | Companies')

@section('content_header')
    <h1>COMPANIES</h1>
@stop

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <!-- Add Company Modal Button -->
        <button type="button" class="btn btn-lg btn-flat bg-gradient-primary" data-toggle="modal" data-target="#addCompanyModal">ADD A COMPANY</button>

        <!-- Add Company Modal -->
        <div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addCompanyModalLabel">Add Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" novalidate>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" placeholder="company name" name="company_name" data-validate="company_name">
                            <div class="valid-feedback" data-valid="company_name">
                                Name is valid!
                            </div>
                            <div class="invalid-feedback" data-invalid="company_name"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">Company Email</label>
                            <input type="email" class="form-control" id="email" placeholder="email" name="email" data-validate="email">
                            <div class="valid-feedback" data-valid="email">
                                Email is valid!
                            </div>
                            <div class="invalid-feedback" data-invalid="email">Invalid Email Format</div>
                        </div>

                        <div class="form-group">
                            <label for="name">Company Website</label>
                            <input type="text" class="form-control" id="website" placeholder="name@domain.com" name="website" data-validate="link">
                            <div class="valid-feedback" data-valid="link">URL is valid!</div>
                            <div class="invalid-feedback" data-invalid="link">URL is invalid! Ex. <i class="text-info">https://github.com/</i></div>
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control-file" id="logo" accept=".jpg,.jpeg,.png,.gif,.bmp,.svg" name="logo">
                          </div>
                          <img id="logo-preview" src="" class="rounded-circle border border-dark" alt="Logo Preview" style="display: none; height: 200px; width:200px; margin-top: 10px;">
                          <p id="image-size-error" class="text-danger" style="display:none">Image must be at least 100x100 pixels.</p>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" data-submit="addCompany" disabled>Submit</button>
            </form>
                </div>
            </div>
            </div>
        </div>
    </div>

     <!-- Edit Company Modal -->
     <div class="modal fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editCompanyModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" id="company_logo" accept=".jpg,.jpeg,.png,.gif,.bmp,.svg" name="company_logo">
                  </div>
                  <img id="logo-preview-edit" src="" class="rounded-circle border border-dark" alt="Logo Preview" style="display: none; height: 200px; width:200px; margin-top: 10px;">
                  <p id="image-size-error-edit" class="text-danger" style="display:none">Image must be at least 100x100 pixels.</p>
                <form class="edit" enctype="multipart/form-data">
                    <div class="mb-3"hidden>
                        <label for="" class="form-label fw-bolder">ID</label>
                        <input type="number" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder=""/>
                        <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" id="edit_name" placeholder="company name" name="edit_name" data-validate="edit_name">
                        <div class="valid-feedback" data-valid="edit_name">
                            Name is valid!
                        </div>
                        <div class="invalid-feedback" data-invalid="edit_name"></div>
                    </div>

                    <div class="form-group">
                        <label for="company_email">Company Email</label>
                        <input type="email" class="form-control" id="company_email" placeholder="email" name="company_email" data-validate="company_email">
                        <div class="valid-feedback" data-valid="company_email">
                            Email is valid!
                        </div>
                        <div class="invalid-feedback" data-invalid="company_email">Invalid Email Format</div>
                    </div>

                    <div class="form-group">
                        <label for="company_website">Company Website</label>
                        <input type="text" class="form-control" id="company_website" placeholder="name@domain.com" name="company_website" data-validate="company_link">
                        <div class="valid-feedback" data-valid="company_link">URL is valid!</div>
                        <div class="invalid-feedback" data-invalid="company_link">URL is invalid! Ex. <i class="text-info">https://github.com/</i></div>
                    </div>

                   
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-submitEdit="editCompany">Submit</button>
        </form>
            </div>
        </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Website</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Data goes here -->
            </tbody>
        </table>
    </div>
@stop


@section('css')
   
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>

        //DATATABLE 

        $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        var table =   $('#myTable').DataTable({
                paging: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('companies.getData') }}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    dataSrc: function(json) {
                        // Use the 'data' property from your resource response
                        return json.data;
                    },
                },
                columns: [
                    {
                        data: 'logo',
                        name: 'logo',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<img src="{{ asset('storage/logo_img') }}/' + data + '" alt="Logo" style="width:50px; height:50px;" class="rounded-circle border border-dark mr-2"> ' + row.company_name;
                        }
                    },
                    {
                        data: 'website',
                        name: 'website',
                        render: function(data, type, row) {
                            return '<a href="' + data + '" target="_blank" rel="noopener noreferrer">' +
                                '<i class="fas fa-globe" aria-hidden="true"></i> ' + data +
                                '</a>';
                        }
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="text-center">
                                <a href="{{ route('companies.show', '') }}/${row.id}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-info btn-sm"  onclick="showEditCompanyModal('${row.id}')"><i class="far fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('${row.id}')"><i class="far fa-trash-alt"></i></button>                   
                                </div>
                            `;
                        }
                    }
                ],
            });

            setInterval(function() {
        table.ajax.reload(null, false); // The second parameter 'false' prevents resetting the paging
    }, 10000);
        });

        //DATA CREATION
        const form = document.querySelector('.needs-validation');

        const inputName = document.querySelector('[data-validate="company_name"]');
        const validName = document.querySelector('[data-valid="company_name"]');
        const invalidName = document.querySelector('[data-invalid="company_name"]');

        const inputEmail = document.querySelector('[data-validate="email"]');
        const validEmail = document.querySelector('[data-valid="email"]');
        const invalidEmail = document.querySelector('[data-invalid="email"]');

        const inputLink = document.querySelector('[data-validate="link"]');
        const validLink = document.querySelector('[data-valid="link"]');
        const invalidLink = document.querySelector('[data-invalid="link"]');

        const inputImage = document.getElementById('logo');

        const submit = document.querySelector('[data-submit="addCompany"]');

        let isNameReady = false;
        let isEmailReady = false;
        let isLinkReady = false;
        let isFileTypeReady = false;


        //EDIT FORM
        const editForm = document.querySelector('.edit');

        const inputIdEdit = document.getElementById('id');

        const inputNameEdit = document.querySelector('[data-validate="edit_name"]');
        const validNameEdit = document.querySelector('[data-valid="edit_name"]');
        const invalidNameEdit = document.querySelector('[data-invalid="edit_name"]');

        const inputEmailEdit = document.querySelector('[data-validate="company_email"]');
        const validEmailEdit = document.querySelector('[data-valid="company_email"]');
        const invalidEmailEdit = document.querySelector('[data-invalid="company_email"]');

        const inputLinkEdit = document.querySelector('[data-validate="company_link"]');
        const validLinkEdit = document.querySelector('[data-valid="company_link"]');
        const invalidLinkEdit = document.querySelector('[data-invalid="company_link"]');

        const inputImageEdit = document.getElementById('company_logo');

        const submitEdit = document.querySelector('[data-submitEdit="editCompany"]');

        let isNameEditReady = false;
        let isEmailEditReady = false;
        let isLinkEditReady = false;
        //let isFileTypeEditReady = false;

        //Logo Preview
        document.getElementById('logo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('logo-preview');
            const error = document.getElementById('image-size-error');

            if(file){
                isFileTypeReady = true;
                if (file && file.type.startsWith('image/')) {
                    
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = new Image();

                        img.onload = function() {
                            const width = img.width;
                            const height = img.height;

                            if (width >= 100 && height >= 100) {
                                
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                                error.style.display = 'none';
                            } else {
                                preview.src = '';
                                preview.style.display = 'none';
                                error.style.display = 'block';
                                alert('Image must be at least 100x100 pixels.');
                            }
                        };

                        img.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                } else {
                    isFileTypeReady = false;
                    preview.src = '';
                    preview.style.display = 'none';
                    alert('Please select a valid image file.');
                }
            } 
            else {
                isFileTypeReady = false; 
                preview.src = '';
                preview.style.display = 'none';
                error.style.display = 'none';
            }
                
        });

    
        //Timer for Link Validation
        let typingTimer;
        const typingInterval = 2000;

        form.addEventListener("keyup", function(e) {
            clearTimeout(typingTimer);

            typingTimer = setTimeout(function() {
             checkForm();
            }, typingInterval);
        });

        form.addEventListener("change", function(e) {
            checkForm();
        });

        

        editForm.addEventListener("keyup", function(e) {
            clearTimeout(typingTimer);

            typingTimer = setTimeout(function() {
             checkEditForm();
            }, typingInterval);
        });

        editForm.addEventListener("change", function(e) {
            checkEditForm();
        });

        function debounce(callback, delay) {
            return function() {
                clearTimeout(typingTimer); // Clear the timer
                typingTimer = setTimeout(callback, delay); // Set the new timer
            };
        }

        function checkForm() {
            //region # Validate name
            if(inputName.value === "") {
                isNameReady = false;
                ShowValidation(inputName, "is-invalid");
                invalidName.innerHTML = "Company Name field cannot be empty!";
            } else {
                isNameReady = true;
                ShowValidation(inputName, "is-valid");
            }
            //endregion

            //region Validate email
        
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            
            if(inputEmail.value === "") {
                isEmailReady = false;
                ShowValidation(inputEmail, "is-invalid");
                invalidEmail.innerHTML = "Email field cannot be empty!";
            } else {
                if(emailPattern.test(inputEmail.value)) {
                    isEmailReady = true;
                    ShowValidation(inputEmail, "is-valid");
                    invalidEmail.innerHTML = ""; // Clear error if valid
                } else {
                    isEmailReady = false;
                    ShowValidation(inputEmail, "is-invalid");
                    invalidEmail.innerHTML = "Invalid email format!";
                }
            }
            //endregion

            //region Validate link
            if(inputLink.value === "") {
                isLinkReady = false;
                ShowValidation(inputLink, "is-invalid");
                invalidLink.innerHTML = "Link field cannot be empty!";
            } else {
                if(inputLink === document.activeElement) {
                    isLinkReady = true;
                    ShowValidation(inputLink, "is-valid");
                    validLink.innerHTML = 'Validating URL <i class="fas fa-spinner fa-pulse"></i>';
                    
                    // AJAX call to check link validity
                    $.ajax({
                        type: "POST",
                        url: "{{ route('companies.linkChecker') }}",
                        data: {url: inputLink.value},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.status === "success") {
                                validLink.innerHTML = "URL is valid!";
                                ShowValidation(inputLink, "is-valid");
                            } else if(response.status === "failed") {
                                isLinkReady = false;
                                validLink.innerHTML = "";
                                ShowValidation(inputLink, "is-invalid");
                                invalidLink.innerHTML = "Invalid URL!";
                            }
                        }
                    });
                }
            }  
            //endregion 

            CheckSubmitBtn();
        }

        function checkEditForm(){
            //region # Validate name
            if(inputNameEdit.value === "") {
                isNameEditReady = false;
                ShowValidation(inputNameEdit, "is-invalid");
                invalidNameEdit.innerHTML = "Company Name field cannot be empty!";
            } else {
                isNameEditReady = true;
                ShowValidation(inputNameEdit, "is-valid");
            }
            //endregion

            //region Validate email
        
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            
            if(inputEmailEdit.value === "") {
                isEmailEditReady = false;
                ShowValidation(inputEmailEdit, "is-invalid");
                invalidEmailEdit.innerHTML = "Email field cannot be empty!";
            } else {
                if(emailPattern.test(inputEmailEdit.value)) {
                    isEmailEditReady = true;
                    ShowValidation(inputEmailEdit, "is-valid");
                    invalidEmailEdit.innerHTML = "";
                } else {
                    isEmailEditReady = false;
                    ShowValidation(inputEmailEdit, "is-invalid");
                    invalidEmailEdit.innerHTML = "Invalid email format!";
                }
            }
            //endregion

             //region Validate link
             if(inputLinkEdit.value === "") {
                isLinkEditReady = false;
                ShowValidation(inputLinkEdit, "is-invalid");
                invalidLinkEdit.innerHTML = "Link field cannot be empty!";
            } else {
                if(inputLinkEdit === document.activeElement) {
                    isLinkEditReady = true;
                    ShowValidation(inputLinkEdit, "is-valid");
                    validLinkEdit.innerHTML = 'Validating URL <i class="fas fa-spinner fa-pulse"></i>';
                    
                    // AJAX call to check link validity
                    $.ajax({
                        type: "POST",
                        url: "{{ route('companies.linkChecker') }}",
                        data: {url: inputLinkEdit.value},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.status === "success") {
                                validLinkEdit.innerHTML = "URL is valid!";
                                ShowValidation(inputLinkEdit, "is-valid");
                            } else if(response.status === "failed") {
                                isLinkEditReady = false;
                                validLinkEdit.innerHTML = "";
                                ShowValidation(inputLinkEdit, "is-invalid");
                                invalidLinkEdit.innerHTML = "Invalid URL!";
                            }
                        }
                    });
                }
                else{
                    isLinkEditReady = true;
                    ShowValidation(inputLinkEdit, "is-valid");
                    validLinkEdit.innerHTML = 'Validating URL <i class="fas fa-spinner fa-pulse"></i>';
                    
                    // AJAX call to check link validity
                    $.ajax({
                        type: "POST",
                        url: "{{ route('companies.linkChecker') }}",
                        data: {url: inputLinkEdit.value},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.status === "success") {
                                validLinkEdit.innerHTML = "URL is valid!";
                                ShowValidation(inputLinkEdit, "is-valid");
                            } else if(response.status === "failed") {
                                isLinkEditReady = false;
                                validLinkEdit.innerHTML = "";
                                ShowValidation(inputLinkEdit, "is-invalid");
                                invalidLinkEdit.innerHTML = "Invalid URL!";
                            }
                        }
                    });
                }
                
            }  
            //endregion 

            CheckSubmitEditBtn();
        }

        function CheckSubmitBtn() {
            console.log("isNameReady: " + isNameReady + "; isEmailReady: " + isEmailReady + "; isFileTypeReady: " + isFileTypeReady + "; isLinkReady: " + isLinkReady);
            if(isNameReady && isEmailReady && isFileTypeReady && isLinkReady) {
                submit.removeAttribute("disabled");
            } else {
                if(!submit.hasAttribute("disabled")) {
                    submit.setAttribute("disabled", "");
                }
            }
        }

        function CheckSubmitEditBtn() {
            if(isNameEditReady && isEmailEditReady &&  isLinkEditReady) {
                submitEdit.removeAttribute("disabled");
            } else {
                if(!submitEdit.hasAttribute("disabled")) {
                    submitEdit.setAttribute("disabled", "");
                }
            }
        }

    form.addEventListener("submit", function(e) {
        e.preventDefault(); 
        checkForm();

        if(!isNameReady || !isEmailReady || !isFileTypeReady || !isLinkReady) {
            return false; 
        }
        
        let module = "ComapaniesCreate";
        let formData = new FormData(this);
        console.log("module=" + module + "&" + formData);

        formData.append('module', module);

        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        $.ajax({ 
            method: "POST",
            url: "{{ route('companies.store') }}",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(response) {
                console.log(response);

                if(response.status === "success") {
                        Swal.fire({
                        title: response.message,
                        icon: response.status,
                    });
                        resetForm();
                        $('#myTable').DataTable().ajax.reload(null, false);
                } else {
                    btnSubmit.removeAttribute("disabled", "");
                }
            },
            error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
        });

    });

    editForm.addEventListener("submit", function(e) {
        e.preventDefault(); 
        checkEditForm();

        if(!isNameEditReady || !isEmailEditReady || !isLinkEditReady) {
            return false; 
        }
        

        // let moduleEdit = "ComapaniesEdit";
        var formE = $(this).serialize();

        console.log(formE);

        $.ajax({ 
            method: "PUT",
            url: "{{ route('companies.update') }}",
            data: formE,
            dataType:'JSON',
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(response) {
                console.log(response);

                if(response.status === "success") {
                    Swal.fire({
                    icon: "success",
                    title: response.message,
                }).then(() =>{
                    $('#editCompanyModal').modal('hide');
                    $('#myTable').DataTable().ajax.reload(null, false);
                })
                
            } else {
                Swal.fire({
                    icon: "error",
                    title: response.message,
                });
            }
            },
            error: function(xhr, status, error) {
            console.log("ERROR" + xhr.responseText);
        }
        });

    });

    function resetForm() {
        form.reset();
        ShowValidation(inputName, "REMOVEALL");
        ShowValidation(inputNameEdit, "REMOVEALL");
        ShowValidation(inputEmail, "REMOVEALL");
        ShowValidation(inputEmailEdit, "REMOVEALL");
        ShowValidation(inputLink, "REMOVEALL");
        ShowValidation(inputLinkEdit, "REMOVEALL");
        ShowValidation(inputImage, "REMOVEALL");

        const preview = document.getElementById('logo-preview');
        preview.src = ''; 
        preview.style.display = 'none'; 

        const error = document.getElementById('image-size-error');
        error.style.display = 'none';
    }

    function ShowValidation(tag, value) {
        if(value === "REMOVEALL") {
            if(tag.classList.contains("is-invalid")) {
                tag.classList.remove("is-invalid");
            }
            if(tag.classList.contains("is-valid")) {
                tag.classList.remove("is-valid");
            }
        } else {
            if(value === "is-valid") {
                if(!tag.classList.contains(value)) {
                    tag.classList.add(value);
                }
                if(tag.classList.contains("is-invalid")) {
                    tag.classList.remove("is-invalid");
                }
            } else {
                if(!tag.classList.contains(value)) {
                    tag.classList.add(value);
                }
                if(tag.classList.contains("is-valid")) {
                    tag.classList.remove("is-valid");
                }
            }
        }
    }

    //EDIT COMPANY 
    function showEditCompanyModal(companyId) {

        fetch(`companies/${companyId}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editCompanyModalLabel').textContent = data.company_name;
                document.getElementById('id').value = data.id;
                document.getElementById('edit_name').value = data.company_name;
                document.getElementById('company_email').value = data.email;
                document.getElementById('company_website').value = data.website;


                const logoPreview = document.getElementById('logo-preview-edit');
                if (data.logo) {
                    logoPreview.src = `{{ asset('storage/logo_img') }}/${data.logo}`;
                    logoPreview.style.display = 'block';
                } else {
                    logoPreview.src = '';
                    logoPreview.style.display = 'none';
                }
            });

          $('#editCompanyModal').modal('show');

          $('#editCompanyModal').on('shown.bs.modal', function () {
            checkEditForm();
            });
    }

    //DELETE
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can choose between soft delete and permanent delete.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Archive',
                cancelButtonText: 'Permanent Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    softDelete(id);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    permanentDelete(id);
                }
            });
        }

        function softDelete(id) {
            $.ajax({
                url: `/companies/${id}/soft-delete`, // Adjust this endpoint as needed
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: response.message,
                        });
                        $('#myTable').DataTable().ajax.reload(null, false);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: response.message,
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "An error occurred",
                        text: xhr.responseText,
                    });
                }
            });
        }

        function permanentDelete(id) {
    $.ajax({
        url: `/companies/${id}/delete`, 
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: response.message,
                });
                $('#myTable').DataTable().ajax.reload(null, false);
            } else {
                Swal.fire({
                    icon: "error",
                    title: response.message,
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: "error",
                title: "An error occurred",
                text: xhr.responseText,
            });
        }
    });
}

    </script>
@stop