<template>
  <div class="container">
    <div class="jumbotron text-center" id="display">
      <h1>This is where the string displays</h1>
    </div>
    <div class="container pt-5 center-align" style="background-color:black">
      <div class="row" v-for="numArrs in numArr" :key="numArrs">
        <div class="col" v-for="str in numArrs" :key="str">
          <calcbutton :buttonValue="str" :buttonType="numBtnType"></calcbutton>
        </div>
      </div>
     <div class="row" v-for="opArrs in opArr" :key="opArrs">
        <div class="col" v-for="str in opArrs" :key="str">
          <calcbutton :buttonValue="str" :buttonType="opBtnType"></calcbutton>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import calcbutton from "./CalculatorButton.vue";

export default {
  name: "fullcalc",
  data: function() {
    return {
      numArr: [
          ["0", "1", "2", "3", "4"],
          ["5", "6", "7", "8", "9"], 
          ],
      opArr: [
          ["", ".", "-", "/"], 
          ["*", "+", "C", "="],
        ],
      displayStr: "",
      numBtnType: "Number",
      opBtnType: "Operator",
    };
  },
  components: {
    calcbutton
  },
  methods: {},

  beforeDestroy() {},
  created() {},
  computed: {}
};
</script>

<style scoped>
#display {
  background-color: aliceblue;
}
</style>