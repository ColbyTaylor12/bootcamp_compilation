<template>
    <div>
        <div class="container center pt-5">
            <h1>Weather</h1>
            <br>
            <div>
                <input class="box" id="zipcode" name="zipcode" type="text" @keyup.enter="getZipCode" v-model="zipcode">
                <button class="btn btn-info" @click="getZipCode" >Check Your Weather</button>
                <br>
                <p class="weather-error">{{error}}</p>
            </div>
        </div>
        <br>

        <div id="WeatherStuff" v-show="this.weatherInfoDiv" style="display:none">
            <div class="container">
                <div class="row">
                    <div class="col">
                </div>
                <div class="col center">
                    <img class="weather-Icon" id="weatherIcon" :src="weatherIcon">
                </div>
                    <div class="col">
                </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center weather-purple">
                        <strong>City</strong>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center">
                        <label class="center">{{ city }}</label>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center weather-purple">
                        <strong>Temperature</strong>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        </div>
                    <div class="col center">
                        <label id="fTemp">{{ fahrenheit }}</label>
                    </div>
                    <div class="col center">
                        <label id="cTemp">{{ celsius }}</label>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                        </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center weather-purple">
                        <strong>Condition</strong>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center">
                        <label>{{ condition }}</label>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center">
                        <img class="weather-Img" id="weatherIcon" :src="weatherIcon">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
        <details>
            <p>Weather API: <a href="https://openweathermap.org/current#zip" target="_blank">https://openweathermap.org/current#zip</a></p>
        </details>
        </footer>
    </div>
</template>

<script>
export default {
  name: "weather-app",
  data() {
    return {
        zipcode: "",
        error: "",
        city: "",
        temp: "",
        kTemp: "",
        fTemp: "",
        cTemp: "",
        kelvin: "",
        fahrenheit: "",
        celsius: "",
        condition: "",
        weatherIcon: "",
        weatherInfoDiv: false,
        infoToWatch: ""
    }
  }, 
  methods: {
    setData() {
        console.log(this.info);
        
        this.city = this.getCity();
        this.condition = this.getCondition();
        this.kTemp = this.getK();
        this.convertTemp();
        this.weatherIcon = this.getIcon();
    },
    getZipCode: function() {
        if (this.zipcode !== '') {
            let self = this;
            axios
                .get('https://cors-anywhere.herokuapp.com/' 
                + 'http://api.openweathermap.org/data/2.5/weather?zip=' 
                + this.zipcode + ',us&APPID=90c01e21759804b616fef1fd206d287a')
                .then(response => {
                    self.info = response.data;
                    self.setData();
                });
        //show info div
        this.weatherInfoDiv = true;
        //hide error
        this.error = "";
        }  
        else {
            this.error = 'Please enter a zip code';
            this.weatherInfo = false;
        }
      },
    getIcon: function(){
        return "http://openweathermap.org/img/w/" + this.info.weather[0].icon + ".png";
    },  
    getCity: function(){
        return this.info.name;
    },
    getCondition: function(){
        return this.info.weather[0].description;
    },
    getK: function(){
        return this.info.main.temp;
    },
    convertTemp() {
        this.kelvin = Math.round(this.kTemp) + "°" + " K";
        this.fahrenheit = Math.round(9 / 5 * (parseInt(this.kTemp) - 273) + 32) + "°" + " F";
        this.celsius = Math.round(parseInt(this.kTemp) - 273.15) + "°" + " C";
    }, 
  }
}
</script>
