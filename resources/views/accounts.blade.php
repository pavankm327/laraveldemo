{{-- 
   @File Name   	: resources/views/accounts.blade.php
   @Created date	: 17/12/2021
   @Created By		: Pavan Kumar M
--}}

@extends('layouts.user')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">@include('alerts.flash-message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account Listing </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('userDashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Branch Name</th>
                    <th>Branch Code</th>
                    <th>Account Type</th>
                    <th>Balance</th>
                    <th>Address</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  @foreach ($accounts as $key=>$value)
						<tr>
                          <td>{{ $key+1+$i }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email  }}</td>
                          <td>{{ $value->phone_no }}</td>
                          <td>{{ $value->branch_name }}</td>
                          <td>{{ $value->branch_code }}</td>
                          <td>{!! $value->account_type !!}</td>
                          <td>{{ $value->balance }}</td>
                          <td>{{ $value->address }}</td>
                          <td> 
                              <form style="display:inline-block" action="{{route('user.destroy', $value->id) }}" method="POST" onClick = 'return confirm("Are are sure..?")'>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger"> Delete</button>
                              </form>
                          </td>
                        </tr>
				  @endforeach    
                  </tbody>
                </table>
				{{ $accounts->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  
<!-- Page specific script -->
@push('pagespecificscripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": false,
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": [
		 // "copy", 
		 // "csv", 
		  "excel", 
		 // "pdf", 
		 // "print", 
		 // "colvis"
		]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush