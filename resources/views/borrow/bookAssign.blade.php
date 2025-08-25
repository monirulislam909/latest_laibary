@extends('layouts.app')

@section('main')
<div class="main-wrapper">
    <div class="page-wrapper">

<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Assaign Book</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{ URL::to('studentPhoto/'.$data->photo) }}">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$data->name}}</h4>
										<h6 class="text-muted">{{$data->email}}</h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> {{$data->address}}</div>

									</div>

								</div>
							</div>


								<!-- /Personal Details Tab -->

			<div class="card">
				@include('layouts.components.alert')
				<div class="card-body">
					<h5 class="card-title">Assign Book</h5>
					<div class="row">
						<div class="col-md-10 col-lg-6">
							<form action="{{ route('borrow.store') }}" method="POST">
								@csrf
								<div class="form-group">
									<label>Book</label>
									<select name="book" id="" class="form-control">
										@foreach ( $bdata as $item )
											<option value="{{$item->id}}">{{$item->title}}</option>
										@endforeach

									</select>
								</div>
								<div class="form-group">
									<label>Return Date</label>
									<input type="date" class="form-control"  name="issue_date" id="">
								</div>
								<div class="form-group">

									<input type="hidden" value="{{$data->id}}" class="form-control" name="student_id">
								</div>
								<button class="btn btn-primary" type="submit">Assign</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Change Password Tab -->

	</div>
</div>
</div>

</div>

</div>
</div>



@endsection