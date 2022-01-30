<template>
  <div>
    <navbar></navbar>
    <div class="wrapper">
      <sidebar></sidebar>

      <div id="content">
        <b-container fluid>
          <router-view />
        </b-container>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
import Sidebar from './components/Sidebar.vue';

export default {
  name: "App",
  components: {
    Navbar,
    Sidebar
  },
};
</script>

<style>
.wrapper {
  display: flex;
  align-items: stretch;
}

#content {
  width: 100%;
  margin-top: 20px;
}


</style>