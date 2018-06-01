<!doctype html>
<html lang="en">
@include('layout.components.head')

<body>
<main class="wrapper home-wrap">
    @include('layout.components.header')

    @yield('content')

    @include('layout.components.footer')
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/main.js"></script>
<script>
  function initMap() {
    var uluru = {lat: 21.0109015, lng: 105.7919456}
    var map = new google.maps.Map(
      document.getElementById('google-map'), {zoom: 16, center: uluru})
    var marker = new google.maps.Marker({position: uluru, map: map})
  }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0d7pRaxZsO_cJM3rDnV-lmcQ5Zh-r6OY&callback=initMap"
>
</script>
</body>

</html>