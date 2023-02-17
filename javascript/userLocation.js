// Retrieve the user's location
navigator.geolocation.getCurrentPosition(function(position) {
    // Gather Things for the API Request
    var apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Send a request to the OpenWeatherMap API
    var url = 'http://api.openweathermap.org/data/2.5/weather?lat=' + latitude + '&lon=' + longitude + '&appid=' + apiKey;
   
    // Make an AJAX request to get the weather data
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (this.status == 200) {
            // Handle the response
            var data = JSON.parse(this.responseText);
            console.log(data);
            alert(data.name);
        }
    };
    xhr.send();
});