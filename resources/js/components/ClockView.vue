<template>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-4 mx-auto">
                <h2>Military Time</h2>
                <h1>{{getTime}}</h1>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function() {
return { 
        currentTime: new Date(),
        meridiem: ['AM', 'PM'],
        interval: null,
        time_str: "",
        standardTime: "",
        }
    },
    methods: {
        displayTime: function () {
            this.interval = setInterval(() => {
                this.currentTime = new Date();
                this.time_str = this.getTime;
            }, 1000)
        }
    },
     
    beforeDestroy() {
        clearInterval(this.interval);
    },
    created() {
        this.displayTime();
    },
    computed: {
        hrs() {
            if (this.currentTime.getHours() < 10) {
                return '0' + this.currentTime.getHours()
            }
            else return this.currentTime.getHours()
        },
        mins() { 
            if (this.currentTime.getMinutes() < 10) {
            return '0' + this.currentTime.getMinutes()
        }
        else return this.currentTime.getMinutes()      
        },
        sec() {
            if (this.currentTime.getSeconds() < 10) {
                return '0' + this.currentTime.getSeconds()
            }
            else return this.currentTime.getSeconds()
        },
        getTime() {
            return this.hrs + ":" + this.mins + ":" + this.sec
        },
  
      

    },
}
</script>

<style scoped>
    .container {
        background-color: aliceblue;
    }
</style>
