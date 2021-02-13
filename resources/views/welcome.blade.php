@extends('user.layouts.app')
@section('content')


    <!-- banner section SECTION 1 -->
    <section id="home" class="w3l-banner py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12 mt-lg-0 mt-4">
                    <span class="subhny-title mb-2">بسرعة و سهولة</span>
                    <h3 class="mb-4">السريع<br>
                        التوصيل للمنزل</h3>
                    <p>
                        feedyExpress التوزيع السريع وهي الشركة الرائدة علي مستوي الجمهورية في هذا المجال ، حيث توفر توصيلًا سريعًا وموثوقًا ومحدّد الوقت لأكثر من 27 محافظة و منطقة، وتربط الأسواق التي تشكل أكثر من 90٪ من الناتج المحلي الإجمالي في غضون يوم إلى ثلاثة أيام عمل.  لذالك فهي تجعل البنية التحتية للنقل التي لا مثيل لها ، جنبًا إلى جنب مع تقنيات المعلومات الرائدة ، شركة Feedy Express أكبر شركة نقل سريع علي مستوي جمهورية مصر العربية، حيث تقدم خدمات سريعة وموثوقة لأكثر من 1000  الفشحنة كل يوم عمل
                    </p>
                    <div class="mt-sm-5 mt-4">
                        <a class="btn btn-outline-primary btn-style mr-2" href="{{ route('login') }}"> تسجيل الدخول <span
                                class="fa fa-chevron-right"></span></a>
                        <a class="btn btn-primary btn-style" href="{{ route('register') }}"> انشاء حساب جديد <span
                                class="fa fa-chevron-right"></span></a>
                    </div>
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


    
    <section class="w3l-products py-5" id="projects">
        <div class="container py-lg-3">
            <div class="header-section text-center mx-auto">
                <span class="subhny-title text-center mb-2">خدمات الشركة</span>
                <h3 class="hny-title text-center mb-5">الي تتمناه حيوصلك</h3>
            </div>

            <div class="mt-5">
                <div class="mx-auto">
                    <!--Horizontal Tab-->
                    <div id="parentHorizontalTab">
                        <ul class="resp-tabs-list hor_1">
                            <li>شحنات خفيفة</li>
                            <li>شحنات متوسطة</li>
                            <li>شحنات كيبرة</li>
                            <div class="clear"></div>
                        </ul>
                        
                        <div class="resp-tabs-container hor_1">

                            <div class="products-content">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/naranj-restaurant-1307021219.jpg.jpg') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> مطاعم</h4>

                                                    <p class="mb-4">
                                                        مطاعمنا جاهزة لتقدم لك كل ما تحتاجه، متى ما تحتاجه. اكتشف مطاعم توفر اروض وخصومات وتوصيل مجاني والمزيد.
                                                    </p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/2020-02-16.jpg') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> صيدليات</h4>

                                                    <p class="mb-4">
                                                        حاس بزكام؟ لا تقلق، نحن هنا لمساعدتك. احصل على أدويتك بسرعة وسهولة. 
                                                    </p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/oudeh-supermarket-amman-2251826411.JPG.jpg') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> سوبر ماركت</h4>

                                                    <p class="mb-4">
                                                        اختر من أحسن السوبرماركت والبقالات التي توصل إليك حاجاتك اليومية. لا داعي لترك البيت - اطلب أونلاين بسهولة!
                                                    </p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/[SJ933728-GOLD] Aqua Set.jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title">  اكسسوارات</h4>

                                                    <p class="mb-4">
                                                        تسوق اونلاين بأفضل سعر وتقييم في مصر و اقوى عروض على اكثر من 45 اكسسوارات ، احدث الموديلات من 4 ماركة مثل ازاليا, اي لايف, براير بيد | شحن مجاني | الدفع عند
                                                    </p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>

                            <div class="products-content">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/unnamed.jpg') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> الكترونيات</h4>

                                                    <p class="mb-4">
                                                        اشتري الكترونيات، كاميرات ، تليفزيونات ، تسوق افضل المنتجات والعروض من اقوى الماركات العالمية ، اشتري عبر الانترنت بافضل سعر لابتوب وكمبيوتر                                                    </p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/download.jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> قطع غيار سيارات</h4>

                                                    <p class="mb-4">
                                                        استكشف الان اسعار قطع غيار سيارتك اون لاين و اشتريها بأفضل الاسعار, قطع غيار هيونداي , كيا , نيسان, تويوتا , اوبل , سكودا , ميتسوبيشي , رينو , شيفروليه , دايو ...
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/download (1).jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> ادوات منزلية</h4>

                                                    <p class="mb-4">
                                                        إكتشف أجهزة منزلية للمطبخ و أدوات المطبخ الصغيرة بأحسن أسعار.✓ إشتري أون لاين أجهزة كهربائية من ماركه توشيبا، تورنيدو، فيليبس والكثير من العربى جروب مصر                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/images.jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title">ملابس</h4>

                                                    <p class="mb-4">
                                                        الملابس من أهم متطلبات البشر يرتدي معظم الناس نوعاً أو آخر من الثياب ومشتقاتها، إضافة إلى ملابس الزينة. فالناس في شتى أنحاء العالم يرتدون الكثير من أنواع الملابس                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                   

                                </div>
                            </div>

                            <div class="products-content">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/unnamed.jpg') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> الكترونيات</h4>

                                                    <p class="mb-4">
                                                        اشتري الكترونيات، كاميرات ، تليفزيونات ، تسوق افضل المنتجات والعروض من اقوى الماركات العالمية ، اشتري عبر الانترنت بافضل سعر لابتوب وكمبيوتر                                                    </p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/download.jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> قطع غيار سيارات</h4>

                                                    <p class="mb-4">
                                                        استكشف الان اسعار قطع غيار سيارتك اون لاين و اشتريها بأفضل الاسعار, قطع غيار هيونداي , كيا , نيسان, تويوتا , اوبل , سكودا , ميتسوبيشي , رينو , شيفروليه , دايو ...
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/download (1).jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title"> ادوات منزلية</h4>

                                                    <p class="mb-4">
                                                        إكتشف أجهزة منزلية للمطبخ و أدوات المطبخ الصغيرة بأحسن أسعار.✓ إشتري أون لاين أجهزة كهربائية من ماركه توشيبا، تورنيدو، فيليبس والكثير من العربى جروب مصر                                                    
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mt-4">
                                        <div class="content">
                                            <a href="#url">
                                                <img src="{{ asset('assets/user/assets/images/images.jfif') }}" class="img-fluid" alt="">
                                                <div class="lte-item-descr text-center">
                                                    <h4 class="product-title">ملابس</h4>

                                                    <p class="mb-4">
                                                        الملابس من أهم متطلبات البشر يرتدي معظم الناس نوعاً أو آخر من الثياب ومشتقاتها، إضافة إلى ملابس الزينة. فالناس في شتى أنحاء العالم يرتدون الكثير من أنواع الملابس                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                   

                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //our products -->
    <!-- /bottom-grids-->

    
    <section class="w3l-bottom-grids-6 py-5">
        <div class="container py-lg-5 py-md-4">
           
            <div class="grids-area-hny main-cont-wthree-fea row">
                <div class="container">
                    <span class="subhny-title text-center mb-2">Contact Us</span>
                    <h3 class="hny-title text-center mb-md-5 mb-4">تواصل معنا</h3>
                    <div class="d-grid contact section-gap">
                        <div class="contact-info-left d-grid text-center">
                            <div class="contact-info">
                                <span class="fa fa-map-marker" aria-hidden="true"></span>
                                <h4>Location</h4>
                                <p>Dolor sit, #PTH,8800 Honey Street UK.</p>
                            </div>
                            <div class="contact-info">
                                <span class="fa fa-phone" aria-hidden="true"></span>
                                <h4>Phone</h4>
                                <p><a href="tel:+44 7834 857829">+22 123 984 434</a></p>
                                <p><a href="tel:+44 987 654 321">+44 123 984 439</a></p>
                            </div>
                            <div class="contact-info">
                                <span class="fa fa-envelope" aria-hidden="true"></span>
                                <h4>Email</h4>
                                <p><a href="mailto:mail@example.com" class="email">mail@example.com</a></p>
                                <p><a href="mailto:mail@example1.com" class="email">mail@example1.com</a></p>
                            </div>
                            <div class="contact-info">
                                <span class="fa fa-clock-o" aria-hidden="true"></span>
                                <h4>Working Hours</h4>
                                <p>Wednesday - Sunday</p>
                                <p>7:00 AM - 9:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //bottom-grids-->
    <!-- contact us-->


    <section class="w3l-grids-3 py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="row bottom-ab-grids">
                <div class="col-lg-6 bottom-ab-left pr-lg-5">
                    <span class="subhny-title mb-2">Faster than light</span>
                    <h3 class="hny-title mb-4">عن الشركة</h3>
                   
                    <ul class="cont-4 mt-4">
                        <li><span class="fa fa-check"></span>استلام الشحنات من العميل في اي مكان </li>
                        <li><span class="fa fa-check"></span>توصيل المنتجات للعملاء في اسرع وقت و بجودة عالية</li>
                        <li><span class="fa fa-check"></span>Incididunt ut labore et, pharetra massa</li>
                    </ul>
                    <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4">Read More <span
                            class="fa fa-chevron-right"></span></a>
                </div>
                <div class="col-lg-6 bottom-right-grids mt-lg-0 mt-5">
                    <img src="assets/images/pic3.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- contact us -->
    <!-- stats -->
 
  
@endsection