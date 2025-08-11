@extends('layouts.app')

@section('main')
        <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">BooK</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Book</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row justify-content-center">
						<div class="col-xl-6 d-flex justify-center" >
							<div class="card flex-fill">
								<div class="card-header">
									<img src="{{ asset('bookPhoto/'.$data->cover) }}" alt="" width="100%">
								</div>
								<div class="card-body">
								<h3>Title :{{$data->title}}</h3>
								<h3>Author :{{$data->author}}</h3>
								<h3>ISBN :{{$data->isbn}}</h3>
								<h3>Copies :{{$data->copies}}</h3>
								<h3>Available_copy :{{$data->available_copy}}</h3>

								</div>
							</div>
						</div>

					</div>


				</div>
			</div>
@endsection