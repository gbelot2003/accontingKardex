<template>
  <div>
    <b-row align-h="center">
      <b-col cols="6">
        <b-card title="Login">
          <b-form>
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
        email: "",
        password: "",
      },
    };
  },
};
</script>
