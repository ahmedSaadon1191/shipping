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
            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">كل الشحنات</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <div class="card-body">

                        {{--  START GET FLASH MESSAGES   --}}
                            @include('admin.alerts.success')
                            @include('admin.alerts.errors')

                            <div class="row mr-2 ml-2" id="successMsg" style="display: none">
                                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2">
                                        تم الحزف بنجاح
                                </button>
                            </div>
                        {{--  END GET FLASH MESSAGES   --}}

                            @include('admin.products.create')

                            <div class="table-responsive">
                                @if ($products && $products->count() > 0)
                                    <table class="table text-md-nowrap" id="example1" rowID="{{ $products->count()+1 }}">
                                        <thead>
                                            <tr>
												<th class="wd-15p border-bottom-0"> رقم</th>
												<th class="wd-15p border-bottom-0"> رقم الشحنة</th>
												<th class="wd-15p border-bottom-0">اسم المورد</th>
                                                <th class="wd-15p border-bottom-0">اسم المستلم</th>
												<th class="wd-15p border-bottom-0">تليفون المستلم</th>
												<th class="wd-15p border-bottom-0">اسم المحافظة</th>
                                                <th class="wd-15p border-bottom-0">اسم المدينة التابعة لها</th>
                                                <th class="wd-15p border-bottom-0">عنوان المستلم</th>
                                                <th class="wd-15p border-bottom-0"> سعر الشحنة</th>
                                                <th class="wd-15p border-bottom-0"> حالة الشحنة</th>
                                                <th class="wd-15p border-bottom-0">  الملاحظات</th>
                                                <th class="wd-10p border-bottom-0">الاجرائات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @php
                                                $x = 1;
                                            @endphp
                                            @foreach ($products as $product)
                                                <tr class="productRow{{ $product->id }}">
                                                    <td>{{ $x++ }}</td>
                                                    <td>{{ $product->package_number }}</td>
                                                    <td>{{ $product->supplier->name }}</td> 
                                                    <td>{{ $product->resever_name }}</td> 
                                                    <td>{{ $product->resver_phone }}</td>  
                                                    <td>{{ $product->cities->governorate->name }}</td> 
                                                    <td>{{ $product->cities->name }}</td> 
                                                    <td>{{ $product->adress }}</td> 
                                                    <td>{{ $product->product_price }}</td> 
                                                    <td>{{ $product->status->name }}</td> 
                                                    <td>{{ $product->notes }}</td> 
                
                                                    <td>
                                                        <div class="btn-icon-list">
                                                            <a href="{{ route('products.edit',$product->id) }}">
																<button class="btn btn-indigo btn-icon"><i class="fa fa-edit"></i></button>
                                                            </a>&nbsp;
                                                            <a href="" class="makeDeleteProduct" product_id="{{ $product->id }}">
																<button class="btn btn-primary btn-icon"><i class="fa fa-trash"></i></button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <h1 class="text-center">لا توجد شحنات</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->
            </div>
            <!-- /row -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
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



	{{--  CREATE NEW Product   --}}

	<script>
		$(document).on('click','#makeCreateProduct',function(e)
		{
			e.preventDefault();

			// DELETE ERROR MESSAGE IF INPUT HAVE VALUE WITHOUT REFRESH PAGE
			$('#resever_name_error').text('');
			$('#resver_phone_error').text('');
			$('#product_id_error').text('');
			$('#city_id_error').text('');
			$('#adress_error').text('');
			$('#product_price_error').text('');
			$('#status_id_error').text('');
			$('#notes_error').text('');
			

			//Get Form Data
			var formData = new FormData($('#createٍProduct')[0]);            

			$.ajax(
			{
				type: 'post',
				url: "{{route('products.store')}}",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				success: function(data)
				{
                    console.log(data);
                    
                    if(data)
					{
						var x =   '{{ url("admin/products/edit/") }}/'+data.dataa.id;
						var product_id = $(this).attr('product_id');
						var rowD = $("table").attr('rowID');

						$("#example1 tbody").append('<tr class="productRow'+data.dataa.id+'"><td>'+rowD+'</td>'+
							'<td>'+data.dataa.package_number+'</td>'+
							'<td>'+data.sup[0].name+'</td>'+
							'<td>'+data.dataa.resever_name+'</td>'+
							'<td>'+data.dataa.resver_phone+'</td>'+
							'<td>'+data.cit[0].governorate.name+'</td>'+
							'<td>'+data.cit[0].name+'</td>'+
							'<td>'+data.dataa.adress+'</td>'+
							'<td>'+data.dataa.product_price+'</td>'+
							'<td>'+data.stat.name+'</td>'+	
							'<td>'+data.dataa.notes+'</td>'+
							
							'<td>'+
								'<div class="btn-icon-list">'+
									'<a href="'+x+'">'+
										'<button class="btn btn-indigo btn-icon">'+
											'<i class="fa fa-edit"></i>'+
										'</button>'+
									'</a>'+
									'<a product_id="'+data.dataa.id+'" class="makeDeleteProduct" style="margin-right:5px">'+
										'<button class="btn btn-primary btn-icon">'+
											'<i class="fa fa-trash"></i>'+
										'</button>'+
									'</a>'+
								'</div>'+
							'</td>'+
						'</tr>');
					}			


					if(data.status == true)
					{
						
						if(data.status == true)
						{
                            $('#success').html(data.msg);
							$('#succes_msg').show().fadeOut(500);
							setTimeout(function(){
								$('#modaldemo8').modal('hide')
                            }, 1000);
                            callback();
						}
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

	{{--  DELETE CITY   --}}
	<script>
		$(document).on('click','.makeDeleteProduct',function(e)
		{
			e.preventDefault();

			

			//Get Form Data           
            var product_id = $(this).attr('product_id');
            
			$.ajax(
			{
				type: 'post',
				url: "{{route('products.destroy')}}",
				data: 
				{
					'_token' : "{{ csrf_token() }}",
             		'id'     : product_id
				},
				
				success: function(data)
				{
					if(data.status == true)
					{
						
						if(data.status == true)
						{
							$('#successMsg').show().fadeOut(500);
                        }
                        
                        // DELETE ROW FROM TABLE
                        $('.productRow'+data.id).remove();
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

     {{--  GET CITIES  --}}
    <script>
        
         $(document).ready(function()
         {
             $('#gov').on('change',function()
             {
                 var gov = $(this).val();
 
                 if(gov)
                 {
                     $.ajax(
                         {
                             url:"{{ url('/admin/products/cities/') }}/" + gov,
                             type:"GET",
                             dataType:"json",
                             success:function(data)
                             {
                                 $("#city").empty();
                                 $.each(data,function(key,value)
                                 {
                                     $("#city").append('<option value="'+value.id+'">'+value.name+'</option>')
                                 });
                             }
                         });
                 }else
                 {
                     alert('Error');
                 }
             });
         });
    </script>
@endsection