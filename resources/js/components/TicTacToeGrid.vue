<template>
  <div class="container">
    <div class="row text-center" id="title">
      <h1>Tic Tac Toe</h1>
    </div>
    <div class="container pt-5 center-align">
    <div class="row" v-for="i in arr" :key="i">
      <div class="card-group" v-for="j in arr"  :key="j">
        <tictactoetile :tileId="3 * i + j" v-on:whoclick="whoclick"></tictactoetile>
      </div>
    </div>
    <a href="" class="btn btn-primary" role="button">Reset</a>
    </div>
  </div>
</template>

<script>
import tictactoetile from "./TicTacToeTile.vue";

export default {
  name: "tictactoegrid",
  data: function() {
    return {
      arr: [0, 1, 2],
    };
  },
  components: {
    tictactoetile
  },
  methods: {

      whoclick (){
          
      }
  },

  beforeDestroy() {},
  created() {},
  computed: {}
};
</script>

<style scoped>
#title {
  background-color: aliceblue;
}
</style>