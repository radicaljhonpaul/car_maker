import axios from "axios";
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
baseURL: `http://127.0.0.1:8000/api/`
})

axiosClient.interceptors.request.use(config => {
config.headers.Authorization = `Bearer ${store.state.user.token}`
return config;
})

axiosClient.interceptors.response.use(response => {
  console.log("Axios.js ---- Response");
  console.log(response);
  return response;
}, error => {
  console.log(error.response.status);
  if (error.response.status === 401) {
    sessionStorage.removeItem('TOKEN');

  // If unauthenticated request is fired push to 403 - forbidden
  // router.push({name: 'error403'});
    router.push({name: 'Login'});
  } else if (error.response.status === 404) {
    router.push({name: 'Login'})

  } else if (error.response.status === 403) {

    var route_path = router.currentRoute.value.fullPath;
    router.push({name: 'error403', params: {route_path: route_path }});
  }

  throw error;
})

export default axiosClient;
