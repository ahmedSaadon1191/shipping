<body>
    <header id="site-header" class="fixed-top">
        <section class="w3l-header-4">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h1><a class="navbar-brand" href="index.html">
                            <span>Food</span>yuppie
                        </a></h1>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="fa icon-expand fa-bars"></span>
                        <span class="fa icon-close fa-times"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-lg-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services.html">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav search-right mt-lg-0 mt-2">
                            <li class="nav-item mr-3" title="Search">
                                <a href="#search" class="btn search-search">
                                    <span class="fa fa-search" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="nav-item"><a href="tel:+(12)234-11-24"
                                    class="btn btn-primary btn-style d-none d-lg-block btn-style mr-2"><span
                                        class="fa fa-phone mr-3" aria-hidden="true"></span> (32)234-14-94</a>
                            </li>
                        </ul>

                        <!-- //toggle switch for light and dark theme -->
                        <!-- search popup -->
                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <form action="{{ route('user.search') }}" method="post" class="d-sm-flex">
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
                        <!-- /search popup -->
                    </div>
                    <!-- toggle switch for light and dark theme -->
                    <div class="mobile-position">
                        <nav class="navigation">
                            <div class="theme-switch-wrapper">
                                <label class="theme-switch" for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    <div class="mode-container">
                                        <i class="gg-sun"></i>
                                        <i class="gg-moon"></i>
                                    </div>
                                </label>
                            </div>
                        </nav>
                    </div>
                </nav>
            </div>
        </section>
    </header>