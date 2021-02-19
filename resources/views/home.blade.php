@extends(' user.layouts.app')

@section('content')


        <div class="container" dir="rtl">
            <div id="search" >
                
                    <form action="{{ route('user.search') }}" method="post" style="margin-top: 500px; margin-bottom:100px">
                        @csrf
            
                        <select name="castomer_type" id="castomer_type">
                            <option value="">اختار نوع المستخدم</option>
                            <option value="castomer" class="text-center">عميل</option>
                            <option value="supplier" class="text-center">مورد</option>
                            @error("castomer_type")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </select>
                        <select name="search_type" id="search_type">
                            <option value="">اختار طريقة البحث</option>
                            <option value="phone" class="text-center">رقم التليفون</option>
                            <option value="product_number" class="text-center">رقم الشحنة</option>
                            @error("search_type")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </select>
                        <input type="search" placeholder="Search.." name="search" required="required"
                            autofocus>
                            @error("search")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        <button type="submit">Search</button>
                        <a class="close" href="#url">&times;</a>
                    </form>
                
            </div>
        </div>
   
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
