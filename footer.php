
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="copy-right-text">
                        <p>Copyright © 2018 Chai Shai Restuarant System. All rights reserved.</p>
                  </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/main.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function () {

            var owl = $('#hero-slider');
            owl.owlCarousel({
                loop: true,
                nav: false,
                margin: 0,
                autoplay:true,
                autoplayTimeout:2000,
                items: 1,
                animateOut: 'fadeOut',
                animateIn: 'fadeInUp',
                smartSpeed: 450,
                mouseDrag: false,
                touchDrag: false,
                pullDrag: false,
                freeDrag: false,

            });
            // owl.on('mousewheel', '.owl-stage', function (e) {
            //     if (e.deltaY > 0) {
            //         owl.trigger('prev.owl');
            //     } else {
            //         owl.trigger('next.owl');
            //     }
            //     e.preventDefault();
            // });

        });
    </script>
</body>

</html>