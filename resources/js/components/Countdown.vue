<template>
  <div class="container">
    <div class="row">
      <div class="col-xs-4 mx-auto">
        <h2>Countdown to 30</h2>
        <h1>{{time_str}}</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      currentTime: new Date(),
      futureTime: new Date("2021-02-18 23:59:59"),
      interval: null,
      time_str: ""
    };
  },
  methods: {
    updateCountdown: function() {
      this.interval = setInterval(() => {
        this.currentTime = new Date();
        this.time_str = this.countdown;
      }, 1000);
    }
  },

  beforeDestroy() {
    clearInterval(this.interval);
  },
  created() {
    this.updateCountdown();
  },
  computed: {
      years() {
        
        return this.futureTime.getYear() - this.currentTime.getYear();
    },
    days() {
        
        return this.futureTime.getDate() - this.currentTime.getDate();
    },
    hours() {
        return this.futureTime.getHours() - this.currentTime.getHours();
    },
    min() {
        return this.futureTime.getMinutes() - this.currentTime.getMinutes();
    },
    sec() {
        return this.futureTime.getSeconds() - this.currentTime.getSeconds();
    },
    countdown() {
      return (
        this.years + " " + "Y" + " " + this.days + " " + "D" + " " + this.hours + " " + "H" + " " + this.min + " " + "M" + " " + this.sec + " " + "S"
      );
    }
  }
};
</script>

<style scoped>
.container {
  background-color: aliceblue;
}
</style>
