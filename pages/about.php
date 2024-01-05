<script>
        // Initialize the map
        function initMap() {
            // Set the coordinates for the marker
            var markerPosition = { lat: 51.7110393, lng: 0.4680129 };

            // Create a new map centered at the marker position
            var map = new google.maps.Map(document.getElementById('map'), {
                center: markerPosition,
                zoom: 18
            });

            // Create a marker and set its position on the map
            var marker = new google.maps.Marker({
                position: markerPosition,
                map: map,
                title: 'Marker Title'
            });
        }
</script>
<!DOCTYPE html>  
<html lang="en">
  <head>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOmcTErjNS9cJ264VBNiHr6OBNy5p2jX4&callback=initMap"></script>
  </head>
<body>
  <div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4">About The Green Chilli</h1>
        <p class="lead">Welcome to The Green Chilli, where we bring the flavors of India to your table. Our commitment is to offer you an authentic culinary experience that tantalizes your taste buds and transports you to the vibrant streets of India.</p>
        <hr class="my-4">
        <p>At The Green Chilli, we believe in the magic of spices and the art of cooking. Our chefs, with years of experience, craft each dish with precision and passion, ensuring that every bite is a celebration of taste and tradition.</p>
        <p>Explore our menu, and you'll find a symphony of spices, from the fiery kick of masalas to the aromatic blend of herbs in our biryanis. We source the finest ingredients to create dishes that capture the essence of Indian cuisine.</p>
        <p>Join us on a culinary journey where each dish tells a story, and every meal is an occasion. Whether you're a seasoned lover of Indian cuisine or a first-time explorer, The Green Chilli has something special for you.</p>

        <!-- Image Section -->
        <div class="text-center">
            <img src="images/storepic.png" alt="The Green Chilli Interior" class="img-fluid">
            <p class="lead">Experience the inviting ambiance at The Green Chilli</p>
        </div>

        <p>Our commitment extends beyond the kitchen. We strive to create a warm and welcoming atmosphere for our guests. Whether you choose to dine in, order for takeout, or enjoy our catering services, your satisfaction is our top priority.</p>
        <p>Thank you for choosing The Green Chilli. We look forward to serving you an unforgettable dining experience filled with the richness and authenticity of Indian cuisine.</p>
        <h3>Where to find us!</h3>
        <div class="text-center w-100 h-50" id="map"></div>
    </div>
  </div>
</body>
</html>