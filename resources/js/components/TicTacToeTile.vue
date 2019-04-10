<template>
  <div class="card">
       <div class="thumbnail">
      <a href="#" v-on:click="whoclick">
        <img :src="img">
        </a>
    <!-- <img class="card-img-top" :src="img">
    <div class="card-body">
      <button v-on:click="chooseX" type="button" class="btn btn-primary">Pick X</button>
      <button v-on:click="chooseO" type="button" class="btn btn-primary">Pick O</button>
    </div> -->
    </div>
  </div>
</template>

<script>
export default {
  name: "tictactoetile",
  props: {
    tileId: { required: true, type: Number }
  },
  data: function() {
    return {
      tiletype: null,
      img: '/img/blank.img',
      counter: 0,
    };
  },
  methods: {
    chooseX: function() {
      this.img = '/img/x.img',
      this.tiletype = 'X'
    },
    chooseO: function() {
      this.img = '/img/o.img',
      this.tiletype = 'O'
    },
    whoclick: function (){

      this.$emit("whoclick", {id: this.tileId});
      this.counter++;
      if(this.counter%2 == 0){
        this.chooseO();
      }else{
        this.chooseX();
      }
    }
  },

  beforeDestroy() {},
  created() {},
  computed: {}
};
</script>

<style scoped>
.card {
  border-color: black;
  border-style: solid;
}
</style>