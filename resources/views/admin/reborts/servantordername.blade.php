@extends('admin.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


@endsection

@section('content')
<br><br>
    

    {{--  TABLE TO SHOW ALL PRODUCTS RECIVED  --}}
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						{{-- {{ $datas_Returns->pluck('returns')->pluck('returns_detailes')[0] }} --}}
						{{-- <h4 class="card-title mg-b-0">اجمالي سعر الشحن :  {{$sum + $sum2}} </h4>
                       @if ($datas_Orders && $datas_Orders->count() > 0)
						    <h3 style="color: #a7a7a7">
                           		 عرض الشحنات الخاصة  ب {{ $datas_Orders->pluck('servant')->pluck('name')->implode(',') }} 
                        	</h3>
						@else
							<h3 style="color: #a7a7a7">
								عرض الشحنات الخاصة  ب {{ $datas_Orders->pluck('servant')->pluck('name')->implode(',') }} 
							</h3>
					   @endif --}}
						<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>

				<div class="card-body">
					<div class="table-responsive">
							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>	
										<th class="wd-15p border-bottom-0"> رقم الشحنة</th>
										<th class="wd-15p border-bottom-0"> اسم المستلم</th>
										<th class="wd-15p border-bottom-0"> اسم المنطقة</th>
										<th class="wd-15p border-bottom-0">  سعر الشحنة</th>
										<th class="wd-15p border-bottom-0">  تكلفة الشحن</th>
										<th class="wd-15p border-bottom-0">  اجمالي الشحن</th>
										<th class="wd-15p border-bottom-0"> الحالة</th>
										<th class="wd-15p border-bottom-0"> التاريخ</th>
									</tr>
								</thead>
								<tbody id="productRow">

									{{ $orders2->count() }}
									{{ $orders->count() }}


									@foreach ($orders as $item)
											@foreach ($item->orders_detailes as $item1)
												
											<tr class="productRow">
												<td> 
													{{ $item1->product->package_number }}					
												</td>
												<td> 
													{{ $item1->product->resever_name }}					
												</td>
												<td> 
													{{ $item1->product->cities->name }}					
												</td>
												<td> 
													{{ $item1->product->product_price }}					
												</td>
												<td> 
													{{ $item1->shipping_price }}					
												</td>
												<td> 
													{{ $item1->total_price }}					
												</td>
												<td> 
													{{ $item1->product->status->name }}					
												</td>
												<td> 
													{{ $item1->product->created_at }}					
												</td>
												
												
												
											</tr>
											@endforeach
										@endforeach

										@foreach ($orders2 as $item)
											@foreach ($item->returns_detailes as $item1)
												
											<tr class="productRow">
												<td> 
													{{ $item1->returns->package_number }}					
												</td>
												<td> 
													{{ $item1->returns->resever_name }}					
												</td>
												<td> 
													{{ $item1->returns->cities->name }}					
												</td>
												<td> 
													{{ $item1->returns->product_price }}					
												</td>
												<td> 
													{{ $item1->shipping_price }}					
												</td>
												<td> 
													{{ $item1->total_price }}					
												</td>
												<td> 
													{{ $item1->returns->status->name }}					
												</td>
												<td> 
													{{ $item1->returns->created_at }}					
												</td>
											</tr>
											@endforeach
										@endforeach

									{{-- @if ($orders && $orders->count() > 0)
										
									@elseif($orders2 && $orders2->count() > 0)
										
									@elseif(isset($orders) && isset($orders2))
										@foreach ($orders as $item)
											@foreach ($item->orders_detailes as $item1)	
												<tr class="productRow">
													<td> 
														{{ $item1->product->package_number }}					
													</td>
													<td> 
														{{ $item1->product->resever_name }}					
													</td>
													<td> 
														{{ $item1->product->cities->name }}					
													</td>
													<td> 
														{{ $item1->product->product_price }}					
													</td>
													<td> 
														{{ $item1->shipping_price }}					
													</td>
													<td> 
														{{ $item1->total_price }}					
													</td>
													<td> 
														{{ $item1->product->status->name }}					
													</td>
													<td> 
														{{ $item1->product->created_at }}					
													</td>
												</tr>
											@endforeach
										@endforeach

										@foreach ($orders2 as $item)
											@foreach ($item->returns_detailes as $item1)
												
											<tr class="productRow">
												<td> 
													{{ $item1->returns->package_number }}					
												</td>
												<td> 
													{{ $item1->returns->resever_name }}					
												</td>
												<td> 
													{{ $item1->returns->cities->name }}					
												</td>
												<td> 
													{{ $item1->returns->product_price }}					
												</td>
												<td> 
													{{ $item1->shipping_price }}					
												</td>
												<td> 
													{{ $item1->total_price }}					
												</td>
												<td> 
													{{ $item1->returns->status->name }}					
												</td>
												<td> 
													{{ $item1->returns->created_at }}					
												</td>
											</tr>
											@endforeach
										@endforeach

									@else
											<h1>
												لا يوجد شحنات لخذا المندوب
											</h1>
									@endif --}}

									
										
																			
										
                                   

								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
		<!--/div-->
	</div>
@endsection

@section('js')
	<!-- Internal Data tables -->
	<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>

	<!--Internal  Datatable js -->
	<script src="{{URL::asset('assets/js/table-data.js')}}"></script>


	<!--Internal  Datepicker js -->
	<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
	<!-- Internal Select2 js-->
	<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
	<!-- Internal Modal js-->
	<script src="{{URL::asset('assets/js/modal.js')}}"></script>

@endsection
