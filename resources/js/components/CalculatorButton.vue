<template>
  <div class="container pt-5">
    <button type="button" class="btn btn-lg" style="background-color: red; color: white; font-weight: 900; width: 100px; height: 100px ">{{buttonValue}}</button>
  </div>
</template>

<script>
export default {
  name: "calcbutton",
  props: {
    buttonValue: { required: true, type: String },
    // buttonType: { required:true, type: String},
  },
  data: function() {
    return {
    };
  },
  methods: {},

  beforeDestroy() {},
  created() {},
  computed: {}
};
</script>

<style scoped>
    
</style>