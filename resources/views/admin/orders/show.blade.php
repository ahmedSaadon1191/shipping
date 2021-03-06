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
						<h4 class="card-title mg-b-0"> تفاصيل الاوردر رقم {{ $order->id }}</h4>
						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
				</div>
				<div class="card-body">

					{{--  START GET FLASH MESSAGES   --}}
						@include('admin.alerts.success')
						@include('admin.alerts.errors')

						<div class="row mr-2 ml-2" id="successMsg" style="display: none">
							<button type="text" class="btn btn-lg btn-block btn-outline-success mb-2">
								تم حزف الشحنة من المخزن بنجاح
							</button>
						</div>
						<div class="row mr-2 ml-2" id="successStatus" style="display: none">
							<button type="text" class="btn btn-lg btn-block btn-outline-success mb-2" id="SuccessMessage">
								تم تعديل حالة الشحنة بنجاح
							</button>
						</div>
						<div class="row mr-2 ml-2" id="errorStatus" style="display: none">
							<button type="text" class="btn btn-lg btn-block btn-outline-success mb-2">
								تم تعديل حالة الشحنة بنجاح
							</button>
						</div>


					{{--  END GET FLASH MESSAGES   --}}


                    <div class="row">
                        <div class="col-md-2">
                           <div class="form-group">
                               <label for="">رقم الاوردر</label>
                            <input type="text" name="" class="form-control text-center" value="{{ $order->id }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">الاجمالي</label>
                             <input type="text" id="total" class="form-control text-center" value="{{ $order->total_prices }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">المدينة</label>
                             <input type="text" value="{{ $order->orders_detailes->pluck('product')->pluck('cities')->pluck('name')->first() }}" name="" class="form-control text-center" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">اسم المندوب</label>
                             <input type="text" name="" value="{{ $order->servant->name }}" class="form-control text-center" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for=""> تاريخ التسليم</label>
                             <input type="text" name="" value="{{ $order->created_at }}" class="form-control text-center" disabled>
                            </div>
                        </div>

                        <div class="btn-icon-list col-md-2">
                            <a href="{{ route('orders.edit',$order->id) }}">
                                <button class="btn btn-indigo btn-icon"><i class="typcn typcn-folder"></i></button>
                            </a>

                        </div>
                    </div>



				</div>


					<div class="table-responsive">
						@if ($order->orders_detailes && $order->orders_detailes->count() > 0)
							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>
										<th class="wd-7p border-bottom-0"> رقم </th>
										<th class="wd-7p border-bottom-0"> رقم الشحنة</th>
										<th class="wd-15p border-bottom-0"> اسم المستلم</th>
										<th class="wd-7p border-bottom-0"> سعر الشحن</th>
										<th class="wd-7p border-bottom-0">سعر الشحنة</th>
										<th class="wd-7p border-bottom-0"> اجمالي الشحن</th>
										<th class="wd-10p border-bottom-0"> حالة الشحنة</th>
										<th class="wd-7p border-bottom-0">تاريخ التسليم</th>
										<th class="wd-20p border-bottom-0"> الملاحظات</th>
									</tr>
								</thead>
								<tbody >
									@php
										$x = 1;
									@endphp

									@foreach ($order->orders_detailes as $item)
										<tr class="productRow">
											<td>{{ $x++ }}</td>
											<td>{{ $item->product->package_number }}</td>
											<td>{{ $item->product->resever_name }}</td>
											<td>{{ $item->shipping_price}}</td>
											<td id="check{{$item->id}}">{{ $item->product->product_price}}</td>
											<td>{{  $item->shipping_price + $item->product->product_price}}</td>

											<td>
												<form action="" class="status">
													<select name="status_id{{ $item->id }}" id="package_status{{ $item->id }}" class="st_id{{ $item->id }} form-control">
														<option value="">اختار الحالة</option>
														@foreach ($allStatus as $status)
															<option value="{{ $status->id }}"@if ($status->id == $item->product_status)
																selected
															@endif>
																{{ $status->name }}
															</option>
														@endforeach
													</select>
													@if ($item->product_status == 7 || $item->product_status == 6 || $item->product_status == 3 || $item->product_status == 4)
													@else
														<button class="btn btn-primary btn-sm makeStatus" id="{{ $item->id }}" style="width:100%">تعديل</button>
													@endif
												</form>
											</td>


											<td class="text-center">{{ $item->product->rescive_date}}</td>
                                            <td>
                                                <form action="{{ route('orders.productNote',$item->id) }}" method="post">
                                                    @csrf

                                                    <input type="text" name="notes" class="form-control" value="{{ $item->notes }}">
                                                    <input type="submit" class="btn btn-success btn-sm" value="حفظ" style="width: 100%">
                                                </form>

                                            </td>



										</tr>
									@endforeach


								</tbody>
							</table>

						@elseif ($order2->returns_detailes && $order2->returns_detailes->count() > 0)

							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>
										<th class="wd-15p border-bottom-0"> رقم </th>
										<th class="wd-15p border-bottom-0"> رقم الشحنة</th>
										<th class="wd-15p border-bottom-0"> اسم المستلم</th>
										<th class="wd-15p border-bottom-0"> سعر الشحن</th>
										<th class="wd-15p border-bottom-0">سعر الشحنة</th>
										<th class="wd-15p border-bottom-0"> اجمالي الشحن</th>
										<th class="wd-15p border-bottom-0"> حالة الشحنة</th>
										<th class="wd-15p border-bottom-0">تاريخ التسليم</th>
										<th class="wd-15p border-bottom-0"> الملاحظات</th>
									</tr>
								</thead>
								<tbody >
									@php
										$x = 1;
									@endphp

									@foreach ($order2->returns_detailes as $item)
										<tr class="productRow">
											<td>{{ $x++ }}</td>
											<td>{{ $item->returns->package_number }}</td>
											<td>{{ $item->returns->resever_name }}</td>
											<td>{{ $item->shipping_price}}</td>
											<td>{{ $item->returns->product_price}}</td>

											<td>{{  $item->shipping_price + $item->returns->product_price}}</td>

											<td>
												<form action="" class="status">
													<select name="status_id{{ $item->id }}" id="packageStatusReturns{{ $item->id }}" class="st_id{{ $item->id }} form-control">
														<option value="">اختار الحالة</option>
														@foreach ($statusReturns as $status)
															<option value="{{ $status->id }}"@if ($status->id == $item->product_status)
																selected
															@endif>
																{{ $status->name }}
															</option>
														@endforeach
													</select>

													<button class="btn btn-primary makeReturnes" id="{{ $item->id }}">تعديل</button>
												</form>
											</td>


											<td>{{ $item->returns->rescive_date}}</td>
                                            <td>
                                                <form action="{{ route('returns.productNote',$item->id) }}" method="post">
                                                    @csrf
                                                    <input type="text" name="notes" class="form-control" value="{{ $item->returns->notes }}">
                                                    <input type="submit" class="btn btn-success btn-sm" value="حفظ" style="width:100%">
                                                </form>

                                            </td>


										</tr>
									@endforeach


								</tbody>
							</table>
						@else
							<h1 class="text-center">لا يوجد اوردرات</h1>
                        @endif
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


     {{--  CHANGE STATUS  ORDERS--}}
	 <script>
		$(document).on('click','.makeStatus',function(e)
		{
			e.preventDefault();

			//Get Form Data
            var itemId = $(this).attr('id');

			var sel_val = document.getElementById("package_status"+itemId).value;

			// ************************************************ UPDATE TOTAL PRICE IN ORDERS TABLE IF THIS ORDER HAVE RETURNS PRODUCTS ****************************************************



				if(sel_val == 3 || sel_val == 4)
				{
					var total_all = $('#total').val();
					var productPrice_row = $("#check"+itemId).html();

					var new_total = total_all - productPrice_row;
					$("#total").val(new_total);
					// alert(new_total);
					$(this).hide();
				}


			// ****************************************************************************************************

			$.ajax(
			{
				type: 'post',
			    url: "{{route('orders.changeStatus')}}",
				data:
				{
					'_token' 		: "{{ csrf_token() }}",
					'item_status' 	: sel_val,
					'id'     		: itemId,
					'total'  		: new_total
				},

				success: function(data)
				{

                    if(data.status == true)
                    {

                        $('#successStatus').show().fadeOut(1000);


                        // DELETE ROW FROM TABLE

                    }else
                    {
                        $('#errorStatus').show().fadeOut(1000);
                    }


				},
				error: function(reject)
				{
					var response = $.parseJSON(reject.responseText);
					$.each(response.errors,function(key,val)
					{
					    $("#" + key + "_error").text(val[0]);
					});
				}

			});
		});
	</script>




     {{--  CHANGE STATUS  RETURNS--}}
	 <script>
		$(document).on('click','.makeReturnes',function(e)
		{
			e.preventDefault();

			var itemIdReturns = $(this).attr('id');
			var sel_val_returns = document.getElementById("packageStatusReturns"+itemIdReturns).value;


			$.ajax(
			{
				type: 'post',
			    url: "{{route('returns.changeStatusItems')}}",
				data:
				{
					'_token' : "{{ csrf_token() }}",
					'item_status' : sel_val_returns,
					'id'     : itemIdReturns,
				},

				success: function(data)
				{
					if(data.status == true)
                    {
						$('#SuccessMessage').html(data.msg);
						$('#successStatus').show().fadeOut(3000);



                    }
				},
				error: function(reject)
				{
					var response = $.parseJSON(reject.responseText);
					$.each(response.errors,function(key,val)
					{
					    $("#" + key + "_error").text(val[0]);
					});
				}

			});


		});
	</script>
@endsection

