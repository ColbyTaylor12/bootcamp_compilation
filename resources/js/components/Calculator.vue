<template>
  <div class="container">
    <div class="jumbotron text-center" id="display">
      <h1>{{display}}</h1>
    </div>
    <div class="container pt-5 center-align" style="background-color:black">
      <div class="row" v-for="numArrs in numArr" :key="numArrs">
        <div class="col" v-for="str in numArrs" :key="str">
          <calcbutton :buttonValue="str" :buttonType="numBtnType" v-on:onPassButton="catchBtn"></calcbutton>
        </div>
      </div>
      <div class="row" v-for="opArrs in opArr" :key="opArrs">
        <div class="col" v-for="str in opArrs" :key="str">
          <calcbutton :buttonValue="str" :buttonType="opBtnType" v-on:onPassButton="catchBtn"></calcbutton>
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
      numArr: [["0", "1", "2", "3", "4"], ["5", "6", "7", "8", "9"]],
      opArr: [["", ".", "-", "/"], ["*", "+", "C", "="]],
      numBtnType: "Number",
      opBtnType: "Operator",
      display: "",
      temp1: [],
      temp2: "",
      btnVal: "",
      btnType: "",
      lastBtn: "",
      lastBtnType: "",
      lastOp: ""
    };
  },
  components: {
    calcbutton
  },
  beforeDestroy() {},
  created() {},
  computed: {
    getTemp: function(obj) {
      return this.temp1.push(Number(this.temp2));
    }
  },
  methods: {
    catchBtn: function(obj) {
      this.btnVal = obj.buttonValue;
      this.btnType = obj.buttonType;
      //   this.display = this.display.concat(this.btnVal);
      this.clickedBtn(obj);
    },
    clickedBtn: function(obj) {
      if (this.btnType == "Operator" && this.btnVal == "+") {
        this.lastBtnType = this.btnType;
        this.lastBtn = "+";
        this.lastOp = "+";
        this.fill(obj);
      } else if (this.btnType == "Operator" && this.btnVal == "-") {
        this.lastBtnType = this.btnType;
        this.lastBtn = "-";
        this.lastOp = "-";
        this.fill(obj);
      } else if (this.btnType == "Operator" && this.btnVal == "/") {
        this.lastBtnType = this.btnType;
        this.lastBtn = "/";
        this.lastOp = "/";
        this.fill(obj);
      } else if (this.btnType == "Operator" && this.btnVal == "*") {
        this.lastBtnType = this.btnType;
        this.lastBtn = "*";
        this.lastOp = "*";
        this.fill(obj);
      } else if (this.btnType == "Operator" && this.btnVal == "C") {
        this.lastBtnType = this.btnType;
        this.lastBtn = "C";
        this.clear(obj);
      } else if (this.btnType == "Operator" && this.btnVal == "=") {
        this.lastBtnType = this.btnType;
        this.lastBtn = "=";
        this.equals(obj);
      } else {
        this.lastBtnType = this.btnType;
        this.lastBtn = Number(this.btnVal);
        this.display = this.display.concat(this.btnVal);
      }
    },
    fill: function(obj) {
      this.temp2 = this.temp2.concat(this.display);
      this.display = "";
      this.temp1 = this.getTemp(obj);
      return;
      //   if (this.lastBtnType == "Operator") {
      //     this.equals(obj);
      //     this.lastBtnType = "";
      //     return;
      //   } else {
      //     this.clear(obj);
      //   }
    },
    clear: function(obj) {
      this.temp1 = [];
      this.display = "";
      this.btnVal = "";
      this.btnType = "";
      this.lastBtn = "";
      this.lastBtnType = "";
      this.lastOp = "";
      this.temp2 = "";
    },
    reset: function(obj) {
      this.temp1 = [];
      this.btnVal = "";
      this.btnType = "";
      this.lastBtn = "";
      this.lastBtnType = "";
      this.lastOp = "";
      this.temp2 = "";
    },
    equals: function(obj) {
      this.temp1.push(Number(this.display));
      function addSum(total, num) {
        return total + num;
      }
      function minSum(total, num) {
        return total - num;
      }
      function divSum(total, num) {
        return total / num;
      }
      function multSum(total, num) {
        return total * num;
      }
      if (this.lastOp == "+") {
        this.display = this.temp1.reduce(addSum);
        this.reset(obj);
        return;
      } else if (this.lastOp == "-") {
        this.display = this.temp1.reduce(minSum);
        this.reset(obj);
        return;
      } else if (this.lastOp == "/") {
        this.display = this.temp1.reduce(divSum);
        this.reset(obj);
        return;
      } else if (this.lastOp == "*") {
        this.display = this.temp1.reduce(multSum);
        this.reset(obj);
        return;
      }
    }
  }
};
</script>

<style scoped>
#display {
  background-color: aliceblue;
}
</style>