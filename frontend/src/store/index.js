import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersistence from 'vuex-persist'
import axios from 'axios'
import VueAxios from 'vue-axios'
import axiosClient from "../axios"; 

Vue.use(Vuex, VueAxios, axios)

export default new Vuex.Store({
  state: {
    user: {
        data: {},
        token: sessionStorage.getItem("TOKEN"),
    },
    carData: {
      manufacturer: {},
      type: {},
      color: {},
      name: {},
    }
  },
  getters: {
  },
  mutations: {
    logout: (state) => {
      state.user.token = null;
      state.user.data = {};
      state.carData = {};
      sessionStorage.removeItem("TOKEN");
      sessionStorage.removeItem("MANUFACTURER");
      sessionStorage.removeItem("TYPE");
      sessionStorage.removeItem("COLOR");
      sessionStorage.removeItem("NAME");
    },
    setUser: (state, user) => {
        state.user.data = user;
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem('TOKEN', token);
    },
    setCarManufacturer: (state, data) => {
      state.carData.manufacturer = data;
      sessionStorage.setItem('MANUFACTURER', data);
    },
    setCarType: (state, data) => {
      state.carData.type = data;
      sessionStorage.setItem('TYPE', data);
    },
    setCarColor: (state, data) => {
      state.carData.color = data;
      sessionStorage.setItem('COLOR', data);
    },
    setCarName: (state, data) => {
      state.carData.name = data;
      sessionStorage.setItem('NAME', data);
    },
    setCar: () => {
    },
  },
  actions: {
    login({commit}, user) {
      return axiosClient.post('/login', user)
        .then(({data}) => {
          commit('setUser', data.user);
          commit('setToken', data.token);
          return data;
        })
    },
    logout({commit}) {
      return axiosClient.post('/logout')
        .then(response => {
          commit('logout');
          console.log(response);
          return response;
        })
    },
    getCarManufacturers() {
      const options = {
        method: 'GET',
        url: 'https://car-api2.p.rapidapi.com/api/makes',
        params: {year: '2020', direction: 'asc', sort: 'id'},
        headers: {
          'X-RapidAPI-Key': '7b24aff6edmsh75ed2e8e6e86be5p173b0djsn546dd52b2a7f',
          'X-RapidAPI-Host': 'car-api2.p.rapidapi.com'
        }
      };
      
      return axios.request(options)
        .then(response => {
          console.log(response);
          return response;
        })
    },
    selectCarManufacturer({commit}, data) {
      commit('setCarManufacturer', data.name);
      console.log("setCarManufacturer");
      console.log(data.id);
      return data.id;
    },
    getCarTypes({commit}, manufacturer_id) {
      console.log("getCarTypes store");
      console.log(manufacturer_id);

      const options = {
        method: 'GET',
        url: 'https://car-api2.p.rapidapi.com/api/trims',
        params: {direction: 'asc', sort: 'id', year: '2020', make_id: manufacturer_id},
        headers: {
          'X-RapidAPI-Key': '7b24aff6edmsh75ed2e8e6e86be5p173b0djsn546dd52b2a7f',
          'X-RapidAPI-Host': 'car-api2.p.rapidapi.com'
        }
      };
      
      return axios.request(options)
        .then(response => {
          commit('setCar');
          return response;
        })
    },

    selectCarType({commit}, data) {
      commit('setCarType', data.description);
      console.log("setCarType");
      console.log(data.id);
      return data.id;
    },

    getCarColors({commit}, type_id){
      console.log("getCarColor store");
      console.log(type_id);

      const options = {
        method: 'GET',
        url: 'https://car-api2.p.rapidapi.com/api/exterior-colors',
        params: { direction: 'asc', year: '2020', make_model_trim_id: type_id, sort: 'id', verbose: 'yes'},
        headers: {
          'X-RapidAPI-Key': '7b24aff6edmsh75ed2e8e6e86be5p173b0djsn546dd52b2a7f',
          'X-RapidAPI-Host': 'car-api2.p.rapidapi.com'
        }
      };
      
      return axios.request(options)
        .then(response => {
          commit('setCar');
          return response;
        })
    },

    selectCarColor({commit}, data) {
      commit('setCarColor', data.name);
      console.log("setCarColor");
      console.log(data.make_model_trim_id);
      return data.make_model_trim_id;
    },

    getCar({commit}, car_id){
      console.log("getCarColor store");
      console.log(car_id);

      const options = {
        method: 'GET',
        url: 'https://car-api2.p.rapidapi.com/api/trims/'+car_id,
        headers: {
          'X-RapidAPI-Key': '7b24aff6edmsh75ed2e8e6e86be5p173b0djsn546dd52b2a7f',
          'X-RapidAPI-Host': 'car-api2.p.rapidapi.com'
        }
      };
      
      
      return axios.request(options)
        .then(response => {
          commit('setCar');
          return response;
        })
    },

    selectCar({commit}, data) {
      commit('setCarName', data);
      console.log("setCar");
      console.log(data);
      return data;
    },

    saveCarDetails({commit}, obj){
      return axiosClient.post('/saveCarDetails', obj)
        .then(({data}) => {
          commit('setCar');
          console.log(data);
          return data;
        })
    },

    getMyCars({commit}){
      return axiosClient.get('/getMyCars')
        .then(({data}) => {
          commit('setCar');
          console.log(data);
          return data;
        })
    },

    deleteCarDetails({commit}, id){
      return axiosClient.post('/deleteCarDetails', { 'car_id': id })
        .then(({data}) => {
          commit('setCar');
          console.log(data);
          return data;
        })
    },
    
  },
  modules: {
  },
  plugins: [new VuexPersistence().plugin]
})
