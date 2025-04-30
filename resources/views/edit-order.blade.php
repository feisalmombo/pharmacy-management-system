@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Edit Order</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Edit Order</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">


			<!-- Edit Medicine -->
				<form method="post" enctype="multipart/form-data" id="" action="{{route('edit-order',$order)}}">
					@csrf

					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Name<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="name" value="{{$order->name}}">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
                                    <label>Quantity<span class="text-danger">*</span></label>
									<input class="form-control" value="{{$order->quantity}}" type="text" name="quantity" value="{{old('quantity')}}">
								</div>
							</div>

						</div>
					</div>

					<div class="submit-section">
						<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
					</div>
				</form>
			<!-- /Edit Medicine -->


			</div>
		</div>
	</div>
</div>
@endsection


@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush




