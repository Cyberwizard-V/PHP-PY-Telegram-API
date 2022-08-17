# Package we need for this to work
import requests,json
import telegram_send

# Variables we need to use to get the data from the API
BASE_URL = "http://api.openweathermap.org/data/2.5/weather?"
CITY_NAME = "Amsterdam"
API_KEY = "92687ae9926daa5409c21e4c9fb65f52"

# Create full URL to get data 
URL = BASE_URL + "q=" + CITY_NAME + "&APPID=" + API_KEY

# HTTP request
response = requests.get(URL)

#Check status code of request
if response.status_code == 200:
    # We want the data to be json so we convert it
    data = response.json()
    # Getting main data from json
    main = data["main"]
    # Getting weather data from json
    temperature = main["temp"] - 273.15; # Kelvin to Celsius
    # getting the humidity
    humidity = main['humidity']
    # getting the pressure
    pressure = main['pressure']
    # weather report
    report = data['weather']
    print(f"{CITY:-^30}")
    print(f"Temperature: {temperature}")
    print(f"Humidity: {humidity}")
    print(f"Pressure: {pressure}")
    print(f"Weather Report: {report[0]['description']}")

else:
   # showing the error message
   print("Error in the HTTP request")



#telegram_send.send(messages=[""])