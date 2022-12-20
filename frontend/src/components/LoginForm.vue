    <template>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 d-none d-sm-block vh-100" id="login-bg-1">
                </div>
                <div class="col-md-5 align-self-center px-lg-5">
                    <form class="p-5">
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
                    
                        <button class="w-100 fs-6 mt-3 btn btn-lg btn-outline-primary" @click="onSubmit()" type="submit">Sign in </button>
                    </form>
                </div>
            </div>
            
        </div>

    </template>
    
  <script>
    export default {
        name: 'HelloWorld',
        props: {
        msg: String
        },
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                show: true
            }
        },
        methods: {
            login(ev) {
                ev.preventDefault();
                
                alert(JSON.stringify(this.form));
            },
        }
    }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
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

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
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
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

    </style>
  