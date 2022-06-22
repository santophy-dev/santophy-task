@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="page-content">
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Employees</h4>
                  <div class="page-title-right">
                    <a href="{{url('add')}}" class="btn btn-primary"> Add </a>
                  </div>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
          <div class="col-12">
              <div class="card">
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
             url : "{{ url('employees') }}",
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
            {data: 'address', name: 'address', title:'Address'},
            {data: 'phone', name: 'phone', title:'Phone'},
            {data: 'image', name: 'image', title:'Image'},            
            {data: 'action', name: 'action', title:'ACTION',
           orderable: false, searchable: false},
          ],
      error: function (xhr, error, code)
      {
        // window.location.href = url('login');
      },
    });
  }

  function search(){
      table.ajax.reload();
  }

    function deleteEmp(id){
        console.log(id);
        $.ajax({
            type: "get",
            url: "{{ url('delete') }}/"+id,
            dataType: "json",
            success: function (response) {
                if(response.success){
                    toastr.options.timeOut = 3000;
                    toastr.success(response.message);
                    table.ajax.reload();
                }
            }
        });
    }

</script>
@endsection