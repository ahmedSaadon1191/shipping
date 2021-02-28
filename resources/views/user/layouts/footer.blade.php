<section class="w3l-footer">
    <footer class="footer-28 py-5">
        <div class="container py-md-5">
            <div class="footer-top-28 text-center">
                <div class="row foothny-grids mb-lg-5 mb-4">
                    <div class="col-lg-6 fotter-gd-left px-0">
                        <a href="#"><img src="assets/images/footer.jpg" class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-lg-6 fotter-gd-right">
                        <div class="ft-grid">
                            <h5><span class="text-content"> Call us to make order now </span>

                                <span class="fa fa-phone mr-3" aria-hidden="true"></span>21-600-28-499</span>
                            </h5>

                        </div>
                    </div>
                </div>

                <h2><a class="navbar-brand" href="index.html">
                        On<span>Fast</span>
                    </a></h2>
                <p class="f-para mt-3">توفر توصيلًا سريعًا وموثوقًا ومحدّد الوقت لأكثر من 27 محافظة و منطقة</p>
            </div>
            <div class="footer-social-accounts text-center mt-lg-5 mt-4">

                <ul class="social-icons mt-4">
                    <li class="facebook">
                        <a href="#link" title="Facebook">
                            <span class="fa fa-facebook" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="twitter">
                        <a href="#link" title="Twitter">
                            <span class="fa fa-twitter" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="dribbble">
                        <a href="#link" title="Dribbble">
                            <span class="fa fa-dribbble" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="google mr-0">
                        <a href="#link" title="Google">
                            <span class="fa fa-google" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="midd-footer-28 align-center mt-lg-0 mt-4">
            <p class="copy-footer-28 text-center"> &copy; 2020 Foodyuppie. All Rights Reserved. Design by <a
                    href="https://w3layouts.com/">W3Layouts</a></p>

        </div>
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-angle-up"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
    </footer>

    <script src="{{ asset('assets/user/assets/js/jquery-3.3.1.min.js') }}"></script> <!-- Common jquery plugin -->

    <script src="{{ asset('assets/user/assets/js/theme-change.js') }}"></script><!-- theme switch js (light and dark)-->
    <!-- responsive tabs -->
    <script src="{{ asset('assets/user/assets/js/jquery-1.9.1.min.js') }}"></script>

    <script src="{{ asset('assets/user/assets/js/easyResponsiveTabs.js') }}"></script>

    <!--Plug-in Initialisation-->
    <script type="text/javascript">
        $(document).ready(function () {
            //Horizontal Tab
            $('#parentHorizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
   <!-- //counter-->
<script src="{{ asset('assets/user/assets/js/owl.carousel.js') }}"></script><!-- owl carousel -->
<!-- script for tesimonials carousel slider -->
<script>
    $(document).ready(function () {
        $("#owl-demo1").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: false,
                    loop: false
                }
            }
        })
    })
</script>
<!-- //script for tesimonials carousel slider -->
    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="{{ asset('assets/user/assets/js/bootstrap.min.js') }}"></script>
    <!-- //bootstrap-->

</body>

</html>
