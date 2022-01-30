<template>
  <nav id="sidebar1" class="bg-dark" v-if="isLoged">
    <div class="container">
      <ul class="sidebar-panel-nav">
        <li>
          <router-link to="/">
            <b-icon icon="house-fill"></b-icon>
            Dashboard
          </router-link>
        </li>
        <li>
          <router-link to="/about">About</router-link>
        </li>
        <li>
          <router-link to="/contact">Contact Us</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "sidebar",
  data() {
    return {
      visible: "",
    };
  },
  mounted() {
    if (this.isLoged === true) {
      this.visible = true;
    }
  },
  computed: {
    isLoged() {
      return this.$store.getters["login/getIsLogedIn"];
    },
  },
};
</script>

<style>
#sidebar1 {
  min-width: 250px;
  max-width: 250px;
  min-height: 100vh;
  padding-top: 2rem;
}

ul.sidebar-panel-nav {
  list-style-type: none;
  padding: 0%;
}

ul.sidebar-panel-nav > li > a {
  color: #fff;
  text-decoration: none;
  font-size: 1rem;
  display: block;
  padding-bottom: 1rem;
}
</style>