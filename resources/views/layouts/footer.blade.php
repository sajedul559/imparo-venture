<div class="container-fluid">
    <div class='row row-eq-height'>

        <div class="col-md-6 map-right">
            <img src="{{asset('assets/frontend/images/footer.jpg')}}" alt="" />

            <div class="map-right__content">
                <img class="footer-logo" src="{{asset('assets/frontend/images/logo/logo.png')}}" alt="" />

                <div class="map-right__content__inner">
                    <h3>Contact us</h3>
                    <div>
                        <p>Rangs Babylonia, Level 6-9, 246, Bir Uttam Mir Shawkat Road<br>
                            Tejgaon, Dhaka-1208</p>
                        <p><a href="tel:+88028878057">+88028878057</a> , <a href="tel:01755626969">01755626969</a>
                        </p>
                        <p><a href="mailto:infoproperties@edison-bd.com">infoproperties@edison-bd.com</a></p>
                    </div>
                    <ul>
                        <li><a target="_blank" href="">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="">
                                <i class="ri-youtube-line"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="footer-menu">
                        <li><a href="{{route('about')}}"> About us </a></li>
                        <li>
                            <a href="{{route('company')}}"> partners </a>
                        </li>
                        <li>
                            <a href="{{route('buyer')}}"> Buyers </a>
                        </li>
                        <li>
                            <a href="{{route('landowner')}}"> Landowners </a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}"> Contact </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 map-left p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1037.846887580297!2d90.40436632185852!3d23.770436903614165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77b0c49933d%3A0x523483808882ad93!2sLevel%206-9%2C%20Rangs%20Babylonia%2C%20246%20Bir%20Uttam%20Mir%20Shawkat%20Sarak%2C%20Dhaka%201208!5e0!3m2!1sen!2sbd!4v1632635101907!5m2!1sen!2sbd"
                allowFullScreen="" loading="lazy"> </iframe>
        </div>
    </div>
</div>
<div id="footer" class="footer-copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p>© 2021 Edison Properties. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>



 <!--Main Start-->
     <!-- ==== Back to Top Start ==== -->
     <a href="#" class="ic-scroll-top"><i class="ri-arrow-up-s-line"></i></a>
     <!-- ==== Back to Top End ==== -->
     <!-- ==== js Dependencies Start ==== -->
     <script src="{{asset('assets/frontend/vendors/vendor-min.js')}}"></script>
     <!-- ==== js Dependencies End ==== -->

     <!-- Main js -->
     <script src="{{asset('assets/frontend/js/main.js')}}"></script>
     <!--Custom js use development purpose-->
     <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
</body>

</html>