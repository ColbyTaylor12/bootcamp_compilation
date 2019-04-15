<template>
  <div class="container pt-5">
    <button
      @click="onButtonClick"
      type="button"
      class="btn btn-lg"
      style="background-color: red; color: white; font-weight: 900; width: 100px; height: 100px "
    >{{buttonValue}}</button>
  </div>
</template>

<script>
export default {
  name: "calcbutton",
  props: {
    buttonValue: { required: true, type: String },
    buttonType: { required: true, type: String }
  },
  data: function() {
    return {
    //   displayStr: "",
    //   displayArr: [],
    };
  },
  methods: {
    // setDisplayString: function() {
    //   this.displayStr = this.getDisplay;
    // },
    setBtnType: function(){
        this.buttonType = this.getBtnType;
    },
    onButtonClick: function() {
    //   this.$emit("onDisplayHeader", { displayStr: this.displayStr });
      this.$emit("onPassButton", { buttonValue: this.buttonValue, buttonType: this.buttonType });
    //   this.$emit("onPassButton", { buttonTypr: this.buttonType });
    },
    setBtnVal: function() {
        this.buttonValue = this.getBtnVal;
    },
    // addVal: function(){
    //     if(this.buttonType == "Number"){
    //         displayArr.push(this.buttonValue)
    //     }else if(this.buttonType == "Operator" && this.buttonValue != "=" || "C"){
    //     displayArr.push(this.buttonValue);
    //     } else if(this.buttonType == "Operator" && this.buttonValue == "C") {
    //        this.clear;
    //     } else {
    //         this.equals;
    //     }
    // },
    // equals: function(){
    //     this.getfinal;
    //     eval(this.displayStr);
    // },
    // clear: function(){
    //     this.displayStr = "";
    //     this.displayArr = [];
    // }
  },
  beforeDestroy() {},
  created() {
    // this.setDisplayString();
    this.setBtnVal;
    this.setBtnType
  },
  computed: {
    // getDisplay: function() {
    //   return this.displayStr;
    // },
    getBtnVal: function() {
      return this.buttonValue;  
    },
    getBtnType: function(){
        return this.buttonType;
    },
    // getfinal: function(){
    //     return this.displayStr = this.displayArr.join();
    // }
  }
};
</script>

<style scoped>
</style>