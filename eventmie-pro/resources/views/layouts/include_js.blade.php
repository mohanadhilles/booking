
{{-- Load third party plugins in seperate file (node modules) --}}
<script type="text/javascript" src="{{eventmie_asset('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{eventmie_asset('js/vendor.js') }}"></script>

{{-- localization --}}
<script type="text/javascript" src="{{route('eventmie.eventmie_lang') }}"></script>

{{-- Common Auth instance --}}
<script type="text/javascript" src="{{eventmie_asset('js/auth_v1.5.js') }}"></script>

<script type="text/javascript">
    var my_lang = {!! json_encode(session('my_lang', 'en')) !!};
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6HX6816DQT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-6HX6816DQT');
</script>


		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="owl/js/jquery-3.4.1.min.js"></script>
    <script src="owl/js/wow.min.js"></script>
		<script src="owl/plugins/owlslider/owl.carousel.min.js"></script>
    <script src="owl/js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    	$('.team_slider').owlCarousel({
            // center: true,
            items: 3,
            loop:true,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            rtl: true,
            nav:false,
            navText: ["<i class='fas fa-arrow-right' title='السابق'></i>","<i class='fas fa-arrow-left' title='التالي'></i>"],      
            dots:false,
            navSpeed: 2000,
            autoplaySpeed: 1500,
            // animateOut: 'fadeOut',
            // animateIn: 'fadeIn',
            margin:10,
            smartSpeed:450,
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items:1.25,
                    center: true,
                },
                // breakpoint from 480 up
                480 : {
                    items:2,
                },
                // breakpoint from 768 up
                768 : {
                    items:3,
                },
                // breakpoint from 768 up
                992 : {
                    items:4,
                }
            }
        });
      });
        </script>