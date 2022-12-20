<style scoped>

</style>
<template>
    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="#">ManuCar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Manufacturers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Manufacturers</a>
              </li>
              <li class="nav-item dropup">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropup</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <a class="fs-6 fw-normal text-dark text-decoration-none" style="cursor:pointer;" @click="logout()">Logout <b-icon icon="box-arrow-right"></b-icon></a>
        </div>
      </nav>
</template>

<script>
    import store from '@/store';

    export default {
        components: {  },
        data () {
            return {
            }
        },
        methods: {
            logout() {
                store.dispatch("logout").then(() => {
                // Go back to homepage
                console.log("logout");
                window.location.href = '/'
                });
            },
        },
        created: function(){

        }
    }
</script>
