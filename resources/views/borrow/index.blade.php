@extends('layouts.app')
@section('main')
<!-- Main Wrapper -->
<div class="main-wrapper">



<!-- Page Wrapper -->
<div class="page-wrapper">
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">ALL Borrow</h3>
<a href="{{ route('borrow.search') }}"><button  class="btn btn-dark">Create Borrow</button></a>
@if (session('success'))

<div class="alert alert-success">{{session('success')}}</div>

@endif
</div>
</div>
</div>
<!-- /Page Header -->

<div class="row">
<div class="col-sm-12">
<div class="card">

<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
	<th>S/L</th>
	<th>Name</th>
	<th>Email Address</th>
	<th>Phone</th>
	<th>Student Id</th>
	<th>Address</th>
	<th>Photo</th>
	<th>Action</th>
</tr>
</thead>
<tbody>


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection