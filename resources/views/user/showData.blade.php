@extends(' user.layouts.app')




@section('content')



<style>
    body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #2ecc71;
    background-repeat: no-repeat
}

.card {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    margin-top: 90px;
    margin-bottom: 90px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 20%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after,
#progressbar li:nth-child(4):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #651FFF
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
</style>


<div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">#6152</span></h5>
                <h3 data="{{ $product[0]->status_id }}" class="status">

                </h3>

            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Expected Arrival <span>01/06/20</span></p>
                <p>Grasshoppers <span class="font-weight-bold"><a href="https://www.grasshoppers.lk/customers/action/track/V534HB">V534HB</a></span></p>
            </div>
        </div> <!-- Add class 'active' to progress -->


        @if ($returns && $returns->count() > 0)
        <input type="text" value="{{ $returns[0]->status_id }}" class="returns">
            {{-- *********************************************************** TYPE == CASTOMER *************************************************************** --}}
            @if ($type== 'castomer')
                <input type="text" value="{{ $type }}" class="type">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <li class="active step0 delever1"></li>
                            <li class=" step0 delever2"></li>
                            <li class=" step0 delever7"></li>
                            {{-- <li class="step0 delever7"></li> --}}
                            {{-- <li class="step0 delever5"></li> --}}
                        </ul>
                    </div>
                </div>


                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br> داخل الشركة</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br>في الطريق للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم توصيل<br>الشحنة للعميل</p>
                        </div>
                    </div>
                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>En Route</p>
                        </div>
                    </div> --}}
                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div> --}}
                </div>
            @endif

            {{-- *********************************************************** TYPE == SUPPLIER *************************************************************** --}}
            @if ($type== 'supplier')
                <input type="text" value="{{ $type }}" class="type">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <li class="active step0 delever1"></li>
                            <li class=" step0 delever2"></li>
                            @if ( $product[0]->status_id == 3)
                                <li class=" step0 delever3"></li>
                            @endif
                            <li class="step0 delever4 "></li>
                            {{-- <li class="step0 delever5"></li> --}}
                        </ul>
                    </div>
                </div>


                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br> داخل الشركة</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br>في الطريق للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم توصيل<br>الشحنة للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم تسليم التحصيل<br> للمورد</p>
                        </div>
                    </div>

                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div> --}}
                </div>
            @endif
            @if ($type== 'castomer')
                <input type="text" value="{{ $type }}" class="type">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <li class="active step0 delever1"></li>
                            <li class=" step0 delever2"></li>
                            <li class=" step0 delever7"></li>
                            {{-- <li class="step0 delever7"></li> --}}
                            {{-- <li class="step0 delever5"></li> --}}
                        </ul>
                    </div>
                </div>


                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br> داخل الشركة</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br>في الطريق للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم توصيل<br>الشحنة للعميل</p>
                        </div>
                    </div>
                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>En Route</p>
                        </div>
                    </div> --}}
                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div> --}}
                </div>
            @endif

            {{-- *********************************************************** TYPE == SUPPLIER WITH RETURNS *************************************************************** --}}
           {{-- @if () --}}
           @if ($type== 'supplier')
            <input type="text" value="{{ $type }}" class="type">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0 delever1"></li>
                        <li class=" step0 delever6"></li>
                        {{-- <li class=" step0 delever5"></li> --}}
                        {{-- <li class="step0 delever7"></li> --}}
                        {{-- <li class="step0 delever5"></li> --}}
                    </ul>
                </div>
            </div>


                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br> داخل الشركة</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br>في الطريق للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم توصيل<br>الشحنة للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم تسليم التحصيل<br> للمورد</p>
                        </div>
                    </div>

                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div> --}}
                </div>
            @endif
           {{-- @endif --}}
        @else
                  {{-- *********************************************************** TYPE == CASTOMER *************************************************************** --}}
            @if ($type== 'castomer')
                <input type="text" value="{{ $type }}" class="type">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <li class="active step0 delever1"></li>
                            <li class=" step0 delever2"></li>
                            <li class=" step0 delever7"></li>
                            {{-- <li class="step0 delever7"></li> --}}
                            {{-- <li class="step0 delever5"></li> --}}
                        </ul>
                    </div>
                </div>


                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br> داخل الشركة</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br>في الطريق للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم توصيل<br>الشحنة للعميل</p>
                        </div>
                    </div>
                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>En Route</p>
                        </div>
                    </div> --}}
                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div> --}}
                </div>
            @endif

            {{-- *********************************************************** TYPE == SUPPLIER *************************************************************** --}}
            @if ($type== 'supplier')
                <input type="text" value="{{ $type }}" class="type">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <li class="active step0 delever1"></li>
                            <li class=" step0 delever2"></li>
                            <li class=" step0 delever5"></li>
                            <li class="step0 delever7"></li>
                            {{-- <li class="step0 delever5"></li> --}}
                        </ul>
                    </div>
                </div>


                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br> داخل الشركة</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">الشحنة<br>في الطريق للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم توصيل<br>الشحنة للعميل</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">تم تسليم التحصيل<br> للمورد</p>
                        </div>
                    </div>

                    {{-- <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div> --}}
                </div>
            @endif
        @endif
    </div>


</div>




















{{-- @if ($product->pluck('status_id')->implode(',')  == 3 || $product->pluck('status_id')->implode(',')  == 4) --}}


<div class="container test">


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




                <tr>
                    @if ($product && $product->count() > 0)
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
                    @endif

               </tr>




                   @if ($returns && $returns->count() > 0)
                   <tr>
                    @foreach ($returns as $return)
                        <th>1</th>
                        <td>{{ $return->status->name }}</td>
                        <td>{{ $return->rescive_date }}</td>
                        <td>{{ $return->resever_name }}</td>
                        <td>{{ $return->adress }}</td>
                        <td>{{ $return->returnduct_price }}</td>
                        <td>{{ $return->shipping_price }}</td>
                        <td>{{ $return->total_price }}</td>
                        <td>{{ $return->updated_at }}</td>
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

@section('js')
<script>
    $(document).ready(function()
    {

        var returns = $('.returns').val();
        var number = $('.status').attr("data");
        alert(returns);

        // if (returns)
        // {
        //     // alert("yes");
        //     $($('.status').attr('data')).on('change',function()
        //     {
        //         alert(number);
        //     }
        // }



        // var number = $('.status').attr("data");
        var type = $('.type').val();
        // alert(type);

     if (condition)
     {
        if (type == 'supplier')
        {
            if ($('.status').attr('data') == 2)
            {
                $( ".delever1" ).addClass( "active" );
                $( ".delever2" ).addClass( "active" );

            }

            if($('.status').attr('data') == 5)
            {
                $( ".delever1" ).addClass( "active" );
                $( ".delever2" ).addClass( "active" );
                $( ".delever5" ).addClass( "active" );
            }

            if($('.status').attr('data') == 7)
            {
                $( ".delever1" ).addClass( "active" );
                $( ".delever2" ).addClass( "active" );
                $( ".delever5" ).addClass( "active" );
                $( ".delever7" ).addClass( "active" );
            }
        }else
        {
            if ($('.status').attr('data') == 2)
            {
                $( ".delever1" ).addClass( "active" );
                $( ".delever2" ).addClass( "active" );

            }

            if($('.status').attr('data') == 5)
            {
                $( ".delever1" ).addClass( "active" );
                $( ".delever2" ).addClass( "active" );
                $( ".delever7" ).addClass( "active" );
            }

            if($('.status').attr('data') == 7)
            {
                $( ".delever1" ).addClass( "active" );
                $( ".delever2" ).addClass( "active" );
                // $( ".delever5" ).addClass( "active" );
                $( ".delever7" ).addClass( "active" );
            }
        }
     } else
     {
        if (type == 'supplier')
      {
        if ($('.status').attr('data') == 2)
        {
            $( ".delever1" ).addClass( "active" );
            $( ".delever2" ).addClass( "active" );

        }

        if($('.status').attr('data') == 5)
        {
            $( ".delever1" ).addClass( "active" );
            $( ".delever2" ).addClass( "active" );
            $( ".delever5" ).addClass( "active" );
        }

        if($('.status').attr('data') == 7)
        {
            $( ".delever1" ).addClass( "active" );
            $( ".delever2" ).addClass( "active" );
            $( ".delever5" ).addClass( "active" );
            $( ".delever7" ).addClass( "active" );
        }
      }else
      {
        if ($('.status').attr('data') == 2)
        {
            $( ".delever1" ).addClass( "active" );
            $( ".delever2" ).addClass( "active" );

        }

        if($('.status').attr('data') == 5)
        {
            $( ".delever1" ).addClass( "active" );
            $( ".delever2" ).addClass( "active" );
            $( ".delever7" ).addClass( "active" );
        }

        if($('.status').attr('data') == 7)
        {
            $( ".delever1" ).addClass( "active" );
            $( ".delever2" ).addClass( "active" );
            // $( ".delever5" ).addClass( "active" );
            $( ".delever7" ).addClass( "active" );
        }
      }
     }

    });
</script>

@endsection



