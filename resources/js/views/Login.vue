<template>
  <div>
    <b-row align-h="center">
      <b-col cols="6">
        <b-card title="Login">
          <b-form @submit.prevent="onSubmit">
            <b-form-group label="Email">
              <b-form-input
                id="input-1"
                v-model="form.email"
                type="email"
                placeholder="Email"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group label="Password">
              <b-form-input
                id="input-1"
                v-model="form.password"
                type="password"
                placeholder="Password"
                required
              ></b-form-input>
              <b-form-checkbox value="me">Recordar Contraseña</b-form-checkbox>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
          </b-form>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "gbelot2003@hotmail.com",
        password: "password",
      },
    };
  },
  methods: {
    onSubmit() {
      let data = {
        email: this.email,
        password: this.password,
      };
      this.$store
        .dispatch("login/AUTH_REQUEST", data)
        .then((res) => {
          if (res.message === "invalid credentials") {
            this.password = "";
            this.snackbar = true;
            this.text = res.message;
          } else {
            this.$router.push({ path: "dashboard" });
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>
