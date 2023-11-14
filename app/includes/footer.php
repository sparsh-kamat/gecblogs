<!DOCTYPE html>
<html>
<head>
    <title>GIS Example</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>

</body>
</html>
 <!-- footer -->
 <div class="footer">
    <div class="footer-content">

      <div class="footer-section about">
        <h1 class="logo-text"><span>GEC</span>Blogs</h1>
        <p>
         This is a blog website meant for a Webtech professional elective project made my Sparsh kamat and shravan adarkar
        </p>
        <div class="contact">
          <span><i class="fas fa-phone"></i> &nbsp; 1234567890</span>
          <span><i class="fas fa-envelope"></i> &nbsp; gecblogs@gmail.com</span>
        </div>
        <div class="socials">
          <!-- <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a> -->
        </div>
      </div>

      <div class="footer-section links">
            <!-- Create a map container -->
    <div id="map" style="height: 310px; border: 2px solid #303036; border-radius:5px; box-shadow: 0 0 10px black"></div>

<!-- Include Leaflet JavaScript library -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    // Initialize a map
    var map = L.map('map').setView([15.422045, 73.980625], 13);

    // Add a tile layer (e.g., OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Add a marker to the map
    L.marker([15.422045, 73.980625]).addTo(map)
        .bindPopup("Find us at GEC,Farmagudi");
</script>
      </div>

      <div class="footer-section contact-form">
        <h2>Sign Up for Notifications!</h2>
        <br>
        <form action="index.html" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
          <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
          <button type="submit" class="btn btn-big contact-btn">
            <i class="fas fa-envelope"></i>
            Send
          </button>
        </form>
      </div>

    </div>

    <div class="footer-bottom">
       Designed by Sparsh Kamat & Shravan Adarkar
    </div>
  </div>
  <!-- // footer -->