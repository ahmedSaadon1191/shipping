@extends(' user.layouts.app')

@section('content')


        <!-- banner section SECTION 1 -->
    <section id="home" class="w3l-banner py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12 mt-lg-0 mt-4">
                    {{-- <span class="subhny-title mb-2">بسرعة و سهولة</span> --}}
                    <h3 class="mb-4">المتابعــــــة<br>
                        برقم الشحنة</h3>
                    <form action="{{ route('user.search') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input type="number" name="search" class="form-control">
                            @error("search")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-sm-5 mt-4">

                            <button class="btn btn-primary btn-style" type="submit"> بحث <span
                                    class="fa fa-chevron-right"></span></button>
                        </div>
                    </form>

                </div>
                <div class="col-lg-6 col-md-8 col-sm-10 mt-lg-0 mt-5">
                    <div class="img-effect text-lg-center">
                        <img src="{{ asset('assets/user/assets/images/pic1.png') }}" alt="banner" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->
@endsection
