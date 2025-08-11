@extends('layouts.app')
@section('main')
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Book Form</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('book.index') }}">Dashboard</a></li>
									<li class="breadcrumb-item active">Book Form</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-xl-8">
							@include('layouts.components.alert')

						</div>
					</div>

					<div class="row">
						<div class="col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Create Book</h4>


								</div>
								<div class="card-body">
									<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> Title</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="title" value="{{ old('title') }}">


											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Author</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="author" value="{{ old('author') }}">

											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">ISBN</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="isbn" value="{{ old('isbn') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Copies</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="copies" value="{{ old('copies') }}">

											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Availabel_copy</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="available_copy" value="{{ old('available_copy') }}">

											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Cover</label>
											<div class="col-lg-9">
												<input type="file" class="form-control" name="cover" value="{{ old('cover') }}">

											</div>
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>


				</div>
			</div>
			<!-- /Main Wrapper -->
@endsection