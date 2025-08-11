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
					<li class="breadcrumb-item"><a href="{{ route('student.index') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Search Form</li>
				</ul>
			</div>
		</div>
	</div>
    <button class="btn btn-lg btn-dark"><a href="{{ route('borrow.index') }}"> Back</a></button>

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
					<h4 class="card-title">Search Student</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('borrow.search') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">StudentID</label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="id">

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
<div class="row">
    @foreach ($data as $item )
<div class="col-12 col-md-3 col-lg-2 d-flex">

                                   <div class="card flex-fill">
                                       <img alt="Card Image" src="{{ URL::to('studentPhoto/'.$item->photo) }}" class="card-img-top">
                                       <div class="card-header">
                                           <h5 class="card-title mb-0">
                                               {{ $item->name }}
                                           </h5>
                                       </div>
                                       <div class="card-body">

                                         <button class="btn btn-dark"><a class="card-link" href="#">Another link</a></button>
                                       </div>
                                   </div>



                                </div>
                                @endforeach


                            </div>
	</div>


</div>
</div>
<!-- /Main Wrapper -->
@endsection