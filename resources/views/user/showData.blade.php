@extends(' user.layouts.app')

@section('content')

<div class="greyBg">
    <div class="container">
		<div class="wrapper">
      <div class="row">
				<div class="col-sm-12">
				 <div class="breadcrumbs">
			       <ul>
			          <li><a href="{{url('/')}}">Home </a></li>
                 <li><span class="dot">/</span>
			          <a href="{{url('/myaccount')}}"> {{Auth::user()->name}}</a></li>
                <li><span class="dot">/</span>
                  <a href="">Track Order</a>
			        </ul>
                        </div>
                    </div>
	     </div>

          <div class="row top25 inboxMain" >
             <div class="row text-center alert alert-info">
             <div class="col-md-4"><h3>Order No:  {{$product[0]->id}}</h3> </div>
             <div class="col-md-4"><h3>Total: {{$product[0]->total}}</h3> </div>
             <div class="col-md-4"><h3> Status: <mark>{{$product[0]->status}}</h3></mark></div>
            </div>

               @if($product[0]->status=="pending")
               <ol class="progtrckr" data-progtrckr-steps="5">
                <li class="progtrckr-done">Pending</li>
                <li class="progtrckr-todo">Dispatched </li>
                <li class="progtrckr-todo">Processed</li>
                <li class="progtrckr-todo">Shipped</li>
                <li class="progtrckr-todo">Delivered</li>
          </ol>

               @elseif($product[0]->status=="dispatched")
                {{-- @include('myaccount.steps.dispatched') --}}


                 @elseif($product[0]->status=="processed")
                {{-- @include('myaccount.steps.processed') --}}


                 @elseif($product[0]->status=="shipped")
                @include('myaccount.steps.shipped')

                @elseif($product[0]->status=="delivered")
                @include('myaccount.steps.delivered')

                @elseif($product[0]->status=="cancelled")

              <h1 align="center">your order cancelled by admin</h1>

               @endif

              </div>



        </div>
    </div>
  </div>
</div>
<style>
    ul
    {
        position: relative;
        display: flex;
        padding: 10px,20px;
        border-radius: 50px;
        background: #2d2d2d;
        box-shadow: 0 5px 15px rgba(0, 0, 0,.2);
    }

    ul li
    {
        list-style: none;
        line-height: 50px;
        margin: 0 5px;
    }

    ul li .pageNumber
    {
        height: 50px;
        width: 50px;
        text-align: center;
        line-height: 50px;
    }

    ul li a
    {
        display: block;
        text-decoration: none;color: #fff;
        font-weight: 600;
        border-radius: 50%;
    }

    ul li .pageNumber:hover a,
    ul li .pageNumber:active a,
    {
        background: #fff;
        color: #fff;
    }
</style>
<br><br><br><br><br>


{{-- @if ($product->pluck('status_id')->implode(',')  == 3 || $product->pluck('status_id')->implode(',')  == 4) --}}


<div class="container">

    <ul>
        <li class="pageNumber active">
            <a href="#">
                1
            </a>
        </li>
        <li class="pageNumber">
            <a href="">
                2
            </a>
        </li>
        <li class="pageNumber">
            <a href="">
                3
            </a>
        </li>
        <li class="pageNumber">
            <a href="">
                4
            </a>
        </li>
        <li class="pageNumber">
            <a href="">
                5
            </a>
        </li>
        <li class="pageNumber">
            <a href="">
                6
            </a>
        </li>
        <li class="pageNumber">
            <a href="">
                7
            </a>
        </li>
    </ul>

    @if ($product && $product->count() > 0)
        <table class="table table table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">حالة الطلب</th>
                <th scope="col">تاريخ التسليم</th>
                <th scope="col">اسم المستلم</th>
                <th scope="col">عنوان المستلم</th>
                <th scope="col">سعر الشحنة</th>
                <th scope="col">سعر الشحن</th>
                <th scope="col">الاجمالي </th>
                <th scope="col"> تاريخ التحديث</th>
                <th scope="col">الاجرائات</th>
            </tr>
            </thead>
            <tbody>
                @if ($product->pluck('status_id')->implode(',')  == 1)
                    <tr>
                        @foreach ($product as $pro)
                            <th>1</th>
                            <td>{{ $pro->status->name }}</td>
                            <td>{{ $pro->rescive_date }}</td>
                            <td>{{ $pro->resever_name }}</td>
                            <td>{{ $pro->adress }}</td>
                            <td>{{ $pro->product_price }}</td>
                            <td>{{ $pro->shipping_price }}</td>
                            <td>{{ $pro->total_price }}</td>
                            <td>{{ $pro->updated_at }}</td>
                            <td>
                                <a href="">
                                    تفاصيل الشحنة
                                </a>
                            </td>
                        @endforeach
                    </tr>
                @endif


                 @if ($product->pluck('status_id')->implode(',')  == 2)
                    <tr>
                        @foreach ($product as $pro)
                            <th>1</th>
                            <td>{{ $pro->status->name }}</td>
                            <td>{{ $pro->rescive_date }}</td>
                            <td>{{ $pro->resever_name }}</td>
                            <td>{{ $pro->adress }}</td>
                            <td>{{ $pro->product_price }}</td>
                            <td>{{ $pro->shipping_price }}</td>
                            <td>{{ $pro->total_price }}</td>
                            <td>{{ $pro->updated_at }}</td>
                            <td>
                                <a href="">
                                    تفاصيل الشحنة
                                </a>
                            </td>
                        @endforeach
                    </tr>
                @endif
            </tbody>
        </table>
    @else

    <h3 class="text-center">
        لا يوجد شحنات
    </h3>
    @endif
</div>





<br><br><br>


@endsection
<script>
    $(document).ready(function()
    {
       $(document).on('click','.active',function(e)
       {
           e.preventDefault();
           alert('hello');
       });
    });
</script>




