<style scoped>

  #login-bg-1{
      background-image: url("https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80"); /* The image used */
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-blend-mode: darken;
  }

  .form-signin {
      max-width: 330px;
      padding: 15px;
  }
  
  .form-signin .form-floating:focus-within {
      z-index: 2;
  }
  
  .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0 !important;
      border-bottom-left-radius: 0 !important;
  }
  
  .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0 !important;
      border-top-right-radius: 0 !important;
  }

</style>

<template>
  <div class="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-sm-block vh-100" id="login-bg-1">
            </div>
            <div class="col-md-5 align-self-center px-lg-5">
                <div class="p-5">
                    <p class="mb-0 text-start">Welcome ManuCar </p>
                    <p class="fs-2 text-start fw-bold">Login to your account</p>
                
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" v-model="form.email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" v-model="form.password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                
                    <button class="w-100 fs-6 mt-3 btn btn-lg btn-outline-primary" @click="login()" type="click">Sign in </button>
                  </div>
            </div>
        </div>
        
    </div>
  </div>
</template>

<script>
  import router from '@/router';
  import store from '@/store';

  export default {
    name: 'LoginView',
    components: {
      // LoginForm
    },
    data() {
      return {
        form: {
            email: '',
            password: '',
        },
      }
    },
    methods: {
      login() {
        store
            .dispatch("login", this.form)
            .then(() => {
              console.log(store);
              router.push({
                  name: "CarList",
              });
            })
            .catch((err) => {
                console.log(err.response.data.message);
            });
      },
    },
    created: function(){
    }
  }
</script>
