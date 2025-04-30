@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">All Orders</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">All Orders</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">

		<!-- All Orders -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
                    <table id="order-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Name</th>
								<th>Quantity</th>
								{{-- <th>Status</th> --}}
								<th>Date</th>
								<th class="action-btn">Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($orders as $order)
								@if($order->exists())
								<tr>
									<td>{{$order->name}}</td>
									<td>{{$order->quantity}}</td>
									{{-- <td>{{$order->status}}</td> --}}
									<td>{{date_format(date_create($order->created_at),"d M,Y")}}</td>

									<td class="text-center">
                                        <div class="actions">

                                            <a class="btn btn-sm bg-success-light" href="{{route('edit-order',$order)}}">
												<i class="fe fe-pencil"></i> Edit
											</a>

                                            <a data-id="{{$order->id}}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm bg-danger-light deletebtn">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
								</tr>
								@endif
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Orders -->

	</div>
</div>

<!-- Delete Modal -->
<x-modals.delete :route="'orders'" :title="'Order'" />
<!-- /Delete Modal -->
@endsection


@push('page-js')
<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

@endpush
