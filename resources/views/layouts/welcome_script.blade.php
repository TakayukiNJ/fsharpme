@section('welcome_script')

    <!-- Core JS Files -->
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    
    <!-- Switches -->
    <script src="js/bootstrap-switch.min.js"></script>
    
    <!--  Plugins for Slider -->
    <script src="js/nouislider.js"></script>
    
    <!--  Photoswipe files -->
    <script src="js/photo_swipe/photoswipe.min.js"></script>
    <script src="js/photo_swipe/photoswipe-ui-default.min.js"></script>
    <script src="js/photo_swipe/init-gallery.js"></script>
    
    <!--  Plugins for Select -->
    <script src="js/bootstrap-select.js"></script>
    
    <!--  for fileupload -->
    <script src="js/jasny-bootstrap.min.js"></script>
    
    <!--  Plugins for Map -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> -->
    
    <!--  Plugins for Tags -->
    <script src="js/bootstrap-tagsinput.js"></script>
    
    <!--  Plugins for DateTimePicker -->
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    
    <script src="js/paper-kit.js?v=2.1.0"></script>
    <!-- <script src="js/demo.js"></script> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119878421-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-119878421-1');
    </script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113255449-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-113255449-1');
    </script>
    
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
@endsection