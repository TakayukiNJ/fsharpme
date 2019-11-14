@section('script')

    <!-- Core JS Files -->
    <script src="{{ url('/') }}/../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/../js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/../js/popper.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/../js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Switches -->
    <script src="{{ url('/') }}/../js/bootstrap-switch.min.js"></script>

    <!--  Plugins for Slider -->
    <script src="{{ url('/') }}/../js/nouislider.js"></script>

    <!--  Photoswipe files -->
    <script src="{{ url('/') }}/../js/photo_swipe/photoswipe.min.js"></script>
    <script src="{{ url('/') }}/../js/photo_swipe/photoswipe-ui-default.min.js"></script>
    <script src="{{ url('/') }}/../js/photo_swipe/init-gallery.js"></script>

    <!--  Plugins for Select -->
    <script src="{{ url('/') }}/../js/bootstrap-select.js"></script>

    <!--  for fileupload -->
    <script src="{{ url('/') }}/../js/jasny-bootstrap.min.js"></script>

    <!--  Plugins for Map -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> -->

    <!--  Plugins for Tags -->
    <script src="{{ url('/') }}/../js/bootstrap-tagsinput.js"></script>

    <!--  Plugins for DateTimePicker -->
    <script src="{{ url('/') }}/../js/moment.min.js"></script>
    <script src="{{ url('/') }}/../js/bootstrap-datetimepicker.min.js"></script>

    <script src="{{ url('/') }}/../js/paper-kit.js?v=2.1.0"></script>
    <!-- <script src="{{ url('/') }}/../js/demo.js"></script> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119878421-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-119878421-1');
    </script>


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

@endsection
