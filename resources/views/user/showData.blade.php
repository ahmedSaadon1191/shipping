@extends(' user.layouts.app')

@section('content')

<style>

ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver;
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}


</style>
<br><br><br><br><br>
@foreach($product as $pro)
<h1>{{ $pro->Status->name }}</h1>
@endforeach

{{-- @if ($product->pluck('status_id')->implode(',')  == 3 || $product->pluck('status_id')->implode(',')  == 4) --}}
    @if ($product->pluck('status_id')->implode(',')  == 1)

    <ol class="progtrckr" style="margin-left:28%;" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-todo" value="2">خارج للشحن</li><!--
        {{-- --><li class="progtrckr-todo" value="3">تم رفضه</li><!--
        --><li class="progtrckr-todo" value="4">تم التاجيل</li><!-- --}}
        --><li class="progtrckr-todo" value="5">تم التوصيل</li><!--
            {{-- --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!-- --}}
        --><li class="progtrckr-todo" value="7"> تم التحصيل في الشركة</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 2)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        {{-- --><li class="progtrckr-todo" value="3">تم رفضه</li><!--
        --><li class="progtrckr-todo" value="4">تم التاجيل</li><!-- --}}
        --><li class="progtrckr-todo" value="5">تم التوصيل</li><!--
            {{-- --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!-- --}}
        --><li class="progtrckr-todo" value="7">تم التحصيل في الشركة</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 3)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-todo" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-todo" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-todo" value="7">تم التحصيل في الشركة</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 4)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-done" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-todo" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-todo" value="7">تم التحصيل في الشركة</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 5)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        {{-- --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-done" value="4">تم التاجيل</li><!-- --}}
        --><li class="progtrckr-done" value="5">تم التوصيل</li><!--
            {{-- --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!-- --}}
        --><li class="progtrckr-todo" value="7">تم التحصيل في الشركة</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 6)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-done" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-done" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-done" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-todo" value="7">تم التحصيل في الشركة</li>
    </ol>

    @elseif ($product->pluck('status_id')->implode(',')  == 7)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-done" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-done" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-done" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-done" value="7">تم التحصيل في الشركة</li>
    </ol>
    @endif
{{-- @else --}}
    {{-- @if ($product->pluck('status_id')->implode(',')  == 1)

    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-todo" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-todo" value="3">تم رفضه</li><!--
        --><li class="progtrckr-todo" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-todo" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-todo" value="7">تم التحصيل</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 2)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-todo" value="3">تم رفضه</li><!--
        --><li class="progtrckr-todo" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-todo" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-todo" value="7">تم التحصيل</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 5)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-done" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-done" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-todo" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-todo" value="7">تم التحصيل</li>
    </ol>
    @elseif ($product->pluck('status_id')->implode(',')  == 7)
    <ol class="progtrckr" data-progtrckr-steps="7">
        <li class="progtrckr-done" value="1"> تم التوريد</li><!--
        --><li class="progtrckr-done" value="2">خارج للشحن</li><!--
        --><li class="progtrckr-done" value="3">تم رفضه</li><!--
        --><li class="progtrckr-done" value="4">تم التاجيل</li><!--
        --><li class="progtrckr-done" value="5">تم التوصيل</li><!--
            --><li class="progtrckr-done" value="6">تم تسليم المرتجع للعميل</li><!--
        --><li class="progtrckr-done" value="7">تم التحصيل</li>
    </ol>
    @endif
@endif --}}







<br><br><br>



@endsection


