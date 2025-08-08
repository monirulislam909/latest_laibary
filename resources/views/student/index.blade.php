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
<h3 class="page-title">ALL Students</h3>
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
@foreach ($data as $student )

<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$student->name}}</td>
	<td>{{$student->email}}</td>
	<td>{{$student->phone}}</td>
	<td>{{$student->student_id}}</td>
	<td>{{$student->address}}</td>
	<td>
		<img src="{{ asset('studentPhoto/'.$student->photo) }}" alt="" width="60">
	</td>
	<td>
		<a class="btn btn-success" href="{{ route('student.show',$student->id) }}"><i class="fa fa-eye"></i></a>
		<a class="btn btn-warning" href="{{ route('student.edit',$student->id) }}"><i class="fa fa-edit"></i></a>
		<div class="d-inline-block ">
		<form action="{{route('student.destroy',$student->id) }}" method="POST">
			@csrf
			@method('DELETE')

			<button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
		</form>
		</div>
	</td>
</tr>
@endforeach

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