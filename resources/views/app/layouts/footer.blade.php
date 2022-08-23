<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>اخبار پربازدید</h4>
                <ul>
                    @foreach ($topSelectedPosts as $topSelectedPost )
                    <li><a href="#">{{ $topSelectedPost->title  }} </a></li>
                    @endforeach


                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>لینک سریع</h4>
                <ul>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">سوالات متداول</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>ایسنتاگرام</h4>
                <ul class="instafeed d-flex flex-wrap">
                    <li><img src="img/i1.jpg" alt=""></li>
                    <li><img src="img/i2.jpg" alt=""></li>
                    <li><img src="img/i3.jpg" alt=""></li>
                    <li><img src="img/i4.jpg" alt=""></li>
                    <li><img src="img/i5.jpg" alt=""></li>
                    <li><img src="img/i6.jpg" alt=""></li>
                    <li><img src="img/i7.jpg" alt=""></li>
                    <li><img src="img/i8.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-instgram"></i></a>
            </div>
        </div>
    </div>
</footer>
