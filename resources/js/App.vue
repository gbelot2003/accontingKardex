<template>
  <div>
    <navbar></navbar>
    <br />
    <b-overlay :show="show" rounded="sm">
      <b-container fluid>
        <router-view />
      </b-container>
    </b-overlay>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";

export default {
  name: "App",
  components: {
    Navbar,
  },
  data() {
    return {
      show: false,
    };
  },
};
</script>
