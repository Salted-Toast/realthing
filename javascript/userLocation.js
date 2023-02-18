// Retrieve the user's geolocation coordinates and make an AJAX request to the server
navigator.geolocation.getCurrentPosition(function(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Make an AJAX request to the server so I can have em in PHP
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'scripts/userLocation.php?lat=' + latitude + '&lon=' + longitude);
    xhr.send();
});