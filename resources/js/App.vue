<template>
  <div>
    <navbar></navbar>
    <br/>
    <b-container fluid>
      <router-view />
    </b-container>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";

export default {
  name: "App",
  components: {
    Navbar,
  },
};
</script>
