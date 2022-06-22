@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Employee</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                              <a href="{{url('/')}}">Employees</a></li>
                            <li class="breadcrumb-item active">Add Employee</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                      <form method="post" id="form" action="javascript:void(0)" enctype="multipart/form-data">
                          @csrf
                          @if(!empty($user))
                          <input type="hidden" name="id" class="form-control" value="{{$user->id}}"/>
                          @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{@$user->name}}" id="name" placeholder="Enter Name">
                                        <span id="name-error" class="error text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Email</label>
                                        <input class="form-control" name="email" type="email" value="{{@$user->email}}" id="email" placeholder="Enter Email">
                                        <span id="email-error" class="error text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input class="form-control" name="address" type="text" value="{{@$user->address}}" id="address">
                                        <span id="address-error" class="error text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Date of birth</label>
                                        <input class="form-control datepicker" name="date_of_birth" value="{{@$user->date_of_birth}}" id="date-of-birth">
                                        <span id="date-of-birth-error" class="error text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-month-input" class="form-label">Phone</label>
                                        <input class="form-control" name="phone" type="text" value="{{@$user->phone}}" id="phone" placeholder="Enter Phone">
                                        <span id="phone-error" class="error text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-url-input" class="form-label">Image</label>
                                        <input onchange="previewFile(event)" class="form-control" name="image" type="file" id="image">
                                        <span id="image-error" class="error text-danger"></span>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-sm-2">
                                <div>
                                    <a href="{{url('/')}}" class="btn btn-primary w-md">Cancel</a>
                                </div>
                            </div>                                          
                            <div class="col-sm-2">
                                <div>
                                    <button type="submit" id="btnSubmit" class="btn btn-success w-md">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>                                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

<script>
  $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        endDate: new Date(),
  });

  function previewFile(event, id) {
        let allowedExtension = ['image/jpg', 'image/png'];
        let fileType = event.target.files[0].type;

        if(allowedExtension.indexOf(fileType) == -1){
            $(`#image`).val('');
            let msg = 'Only jpg or png file types are allowed.';
            toastr.options.timeOut = 3000;
            toastr.error(msg);
        }
    };

    $('#form').on('submit', function(e) {
        $('.error').text('');
        e.preventDefault()
        showButtonLoader('btnSubmit', 'Submit','disable');
        let formValue = new FormData(this);        
        $.ajax({
            type: "post",
            url: "{{ url('save') }}",
            data: formValue,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('response',response);
                if (response.success) {
                    toastr.options.timeOut = 3000;
                    toastr.success(response.message);
                    window.location.href = "{{ url('/') }}";
                } else {
                    toastr.options.timeOut = 3000;
                    toastr.error(response.message);
                }
                showButtonLoader('btnSubmit', 'Submit','enable');                
            },
            error: function(response) {
                let error = response.responseJSON;
                if(!error){
                    error = JSON.parse(response.responseText);
                }                
                if (error.errors.name) {
                    $('#name-error').text(error.errors.name[0])
                }
                if (error.errors.image) {
                    $('#image-error').text(error.errors.image[0])
                }
                if (error.errors.phone) {
                    $('#phone-error').text(error.errors.phone[0])
                }
                if (error.errors.date_of_birth) {
                    $('#date_of_birth-error').text(error.errors.date_of_birth[0])
                }
                if (error.errors.email) {
                    $('#email-error').text(error.errors.email[0])
                }
                if (error.errors.address) {
                    $('#address-error').text(error.errors.address[0])
                }
                if (error.errors.image) {
                    $('#image-error').text(error.errors.image[0])
                }

                showButtonLoader('btnSubmit', 'Submit','enable');                
            },
        });
    })  
</script>
@endsection