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

{{--  FORM TO SEARCH FOR PRODUCTS AND SELECT SERVANT TO CREATE ORDER   --}}



    <style>
/*body {
    font-family: "Lato", sans-serif;
}*/




.main {
  
    font-size: 18px; 

}


hr{
margin-top: 10px;
	/*    margin-bottom: 10px;
*/}

td{
text-align:center;
}
.glyphicon-tag{
font-size:50px;
}
</style>

    {{--  TABLE TO SHOW ALL PRODUCTS RECIVED  --}}
	<div class="row row-sm">

		<div class="col-xl-12">
			
			<div class="card">

				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">



						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
	
<div class="main">
  <h2><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Dashboard</h2>
   <ul class="breadcrumb">
    <li><a href="">Home</a> /</li>   
  </ul>
    <p>Welcome</p>
  <hr />
    <table class="table table-bordered">
    <tbody>
      <tr>
        <td><i class="fa fa-address-book" style="font-size:48px;color:#03a5fc"></i><br /><br />المديرين : {{$countadmin}}</td>
               <td><i class="fa fa-car" style="font-size:48px;color:#03a5fc"></i><br /><br />المناديب : {{$countservant}}</td>

               <td><i class="fa fa-indent	" style="font-size:48px;color:#03a5fc"></i><br /><br />الأوردرات المكتملة : {{$countorder}}</td>
      </tr>
	  <tr>
               <td><i class="fa fa-tags		" style="font-size:48px;color:#03a5fc"></i><br /><br />الشحنات : {{$countproduct}}</td>
               <td><i class="fa fa-thumbs-down		" style="font-size:48px;color:#03a5fc"></i><br /><br />المرتجعات : {{$countreturns}}</td>
               <td><i class="fa fa-users			" style="font-size:48px;color:#03a5fc"></i><br /><br />الموردين : {{$countsupplier}}</td>

<!--         <td><span class="glyphicon glyphicon-tag"></span><br /><br />الموردين Orders: 50</td>
 -->      </tr>
    </tbody>
  </table>
  <br><br><br>
  </div>
<!-- 					<p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
 -->				</div>
		
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



	{{--  SEARCH FOR PRODUCTS   --}}

@endsection
