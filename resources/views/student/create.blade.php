@extends('layouts.app')
@section('main')
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Student Form</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Student Form</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Create Student</h4>
                                    
                                       @if (session('success'))
                                         <div class="alert alert-success">
                                           {{ session('success') }}
                                          </div>
                                            @endif
								</div>
								<div class="card-body">
									<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> Name</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                   <p class="text-danger">{{ $message }}</p> 
                                                @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Email</label>
											<div class="col-lg-9">
												<input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                @error('email')
                                                   <p class="text-danger">{{ $message }}</p> 
                                                @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Phone</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                   <p class="text-danger">{{ $message }}</p> 
                                                @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">StudentID</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}">
                                                @error('student_id')
                                                   <p class="text-danger">{{ $message }}</p> 
                                                @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Addrress</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                                @error('address')
                                                   <p class="text-danger">{{ $message }}</p> 
                                                @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Photo</label>
											<div class="col-lg-9">
												<input type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                                                @error('photo')
                                                   <p class="text-danger">{{ $message }}</p> 
                                                @enderror
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