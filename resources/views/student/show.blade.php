@extends('layouts.app')

@section('main')
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
					
					<div class="row justify-content-center">
						<div class="col-xl-6 d-flex justify-center" >
							<div class="card flex-fill">
								<div class="card-header">
									<img src="{{ asset('studentPhoto/'.$data->photo) }}" alt="" width="100%">
								</div>
								<div class="card-body">
								<h3>Name :{{$data->name}}</h3>
								<h3>Email :{{$data->email}}</h3>
								<h3>Phone :{{$data->phone}}</h3>
								<h3>Address :{{$data->address}}</h3>
								<h3>ID :{{$data->student_id}}</h3>
								</div>
							</div>
						</div>
						
					</div>
					
				
				</div>			
			</div>
@endsection