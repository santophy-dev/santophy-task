@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="page-content">
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Client Admin</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{url('super-admin/dashboard')}}">Dashboard</a></li>
                          <li class="breadcrumb-item active">Client Admin</li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
          <div class="col-12">
              <div class="card">
<!--                   <div class="card-header">
                      <input type="text" class="form-control" name="search" placeholder="Search">
                  </div> -->
                  <div class="card-body">
                      <table id="table" class="table table-bordered dt-responsive  nowrap w-100">
                      </table>
                  </div>
              </div>
          </div> <!-- end col -->
      </div> <!-- end row -->

  </div> <!-- container-fluid -->
</div>

<script type="text/javascript">
  var table;
   $(function () {
      getTable();
  });

  function getTable(){
       table = $('#table').DataTable({
          searching: true,
          processing: true,
          serverSide: true,
          lengthChange:false,
          ajax: {
             url : "{{ url('super-admin/clients') }}",
             type: "GET",
              data: function (d) {
                  return $.extend({}, d, {
                      search_text : $("#searchTxt").val(),
                      approval_status : $("#selectApprovalType").val(),
                  });
              }
          },
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', title:'S.No.'},
            {data: 'name', name: 'name', title:'Name'},
            {data: 'email', name: 'email', title:'Email'},
          // {data: 'action', name: 'action', title:'ACTION',
          //  orderable: false, searchable: false},
          ],
      error: function (xhr, error, code)
      {
        // window.location.href = url('super-admin/login');
      },
    });
  }

  function search(){
      table.ajax.reload();
  }
</script>
@endsection