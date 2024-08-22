<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e2a3a;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .weather-card {
            background-color: #243447;
            border: none;
            border-radius: 15px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.5);
        }
        .form-control {
            background-color: #2c3e50;
            border: none;
            color: #ffffff;
        }
        .btn-search {
            background-color: #007bff;
            border: none;
            border-radius: 0 15px 15px 0;
        }
        .btn-search:hover {
            background-color: #0056b3;
        }
        .weather-icon {
            font-size: 50px;
            color: #007bff;
        }
        .temperature {
            font-size: 50px;
            font-weight: bold;
        }
        .description {
            text-transform: capitalize;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="weather-card col-md-6 col-sm-12">
        <h3 class="text-center">Previsão do tempo</h3>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="cityInput" placeholder="Coloque o nome de uma cidade">
            <button class="btn btn-search" id="searchBtn">Buscar</button>
        </div>
        <div class="text-center">
            <i id="weatherIcon" class="fas fa-cloud-sun weather-icon"></i>
            <div class="temperature" id="temperature">--°C</div>
            <div class="description" id="description">--</div>
            <div class="mt-3">
                <p id="humidity">Umidade: --%</p>
                <p id="windSpeed">Velocidade do Vento: -- km/h</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchBtn').addEventListener('click', function() {
        const city = document.getElementById('cityInput').value;

        if (!city) {
            alert('Por favor, coloque o nome de uma cidade.');
            return;
        }

        fetch(`/weather/${city}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('temperature').textContent = `${data.main.temp}°C`;
                    document.getElementById('description').textContent = data.weather[0].description;
                    document.getElementById('humidity').textContent = `Humidade: ${data.main.humidity}%`;
                    document.getElementById('windSpeed').textContent = `Velocidade do Vento: ${data.wind.speed} km/h`;

                    const iconCode = data.weather[0].icon;
                    document.getElementById('weatherIcon').className = `fas weather-icon`;
                    document.getElementById('weatherIcon').style.backgroundImage = `url(http://openweathermap.org/img/wn/${iconCode}@2x.png)`;
                }
            })
            .catch(error => alert('Cidade Não Encontrada'));
    });
</script>

</body>
</html>
