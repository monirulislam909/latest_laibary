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
		@include("layouts.components.alert")
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
							<th>Title</th>
							<th>Author</th>
							<th>ISBN</th>
							<th>Copies</th>
							<th>Available_Copy</th>
							<th>Cover</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data as $book )

						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$book->title}}</td>
							<td>{{$book->author}}</td>
							<td>{{$book->isbn}}</td>
							<td>{{$book->copies}}</td>
							<td>{{$book->available_copy}}</td>
							<td>
								<img src="{{ asset('bookPhoto/'.$book->cover) }}" alt="" width="60">
							</td>
							<td>{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans() }}</td>
							<td>
								<a class="btn btn-success" href="{{ route('book.show',$book->id) }}"><i class="fa fa-eye"></i></a>
								<a class="btn btn-warning" href="{{ route('book.edit',$book->id) }}"><i class="fa fa-edit"></i></a>
								<div class="d-inline-block ">
								<form action="{{route('book.destroy',$book->id) }}" method="POST">
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