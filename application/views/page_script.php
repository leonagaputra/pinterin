<!-- jQuery 2.1.4 -->
    <script src="<?php echo $base_url; ?>js/jQuery/jQuery-2.1.4.min.js?v=<?php echo $version; ?>"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="<?php echo $base_url; ?>js/bootstrap/bootstrap.min.js?v=<?php echo $version; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $base_url; ?>js/app.min.js?v=<?php echo $version; ?>"></script>
    <script src="<?php echo $base_url; ?>js/main_function.js?v=<?php echo $version; ?>"></script>
    <script src="<?php echo $base_url; ?>js/chartjs/Chart.min.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByyxX18XFz-_JSIX3canlCp3oUB3EqVPg&callback=initMap"
        async defer></script>

     
    

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script>
        $(document).ready(function(){
           pieChart(); 
        });
    </script>