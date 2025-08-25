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
<a href="{{ route('borrow.search') }}"><button  class="btn btn-dark">Search Student</button></a>
@include('layouts.components.alert')
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

	<th>Student Name</th>
	<th>Student Id</th>
	<th>Book Name</th>
	<th>Book Id</th>
	<th>Return Date</th>
	<th>Status</th>
	<th>Created_At</th>
	<th>Action</th>


</tr>
</thead>
<tbody>
	@foreach ($data as $item )
	<tr>
	<td>{{$loop->iteration}}</td>
	<td><img src="{{ URL::to('studentPhoto/'.$item->photo) }}" alt="" width="40px" height="auto" > {{$item->name}}</td>
	<td>{{$item->student_id}}</td>
	<td><img src="{{ URL::to('bookPhoto/'.$item->cover) }}" alt="" width="40px" height="auto" > {{$item->title}}</td>
	<td>{{$item->book_id}}</td>
	<td>
		@if (ceil(\carbon\carbon::now()->diffInDays(\carbon\carbon::parse($item->return_date),false)) <=0)
			<span class = "text-danger">{{abs(ceil(\carbon\carbon::now()->diffInDays(\carbon\carbon::parse($item->return_date),false)))}} day delayes
				</span>
			@else
			{{ceil(\carbon\carbon::now()->diffInDays(\carbon\carbon::parse($item->return_date),false))}} Days Remaining
		@endif

	</td>
	<td>
		@if ($item->status == "returned")
		<span class="btn btn-success btn-rounded">{{$item->status}}</span>

		@elseif ($item->status == "pending")
		<span class="btn btn-warning btn-rounded">{{$item->status}}</span>
		@elseif ($item->status == "overdue")
		<span class="btn btn-danger btn-rounded">{{$item->status}}</span>
		@endif

	</td>
	<td>{{\carbon\carbon::parse($item->created_at)->diffForHumans()}}</td>

	<td>

		@if ($item->status != "overdue" && ceil(\carbon\carbon::now()->diffInDays(\carbon\carbon::parse($item->return_date))) <= 0)

		<a href="{{ route('borrow.overdue',$item->id) }}" class="btn btn-danger ">Make OverDue</a>

		@endif

		@if ($item->status != "returned")

		<a href="{{route('borrow.return',[$item->id , $item->book_id]) }}" class="btn btn-success ">Make Return</a>
		@endif
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