<template>
    <div class="carlist">
      <!--  BEGIN NAVBAR  -->
      <Header></Header>
      <!--  END NAVBAR  -->

      <div class="container" style="margin-top:100px;">
        <div class="d-flex flex-column align-content-start">
          <div class="d-flex flex-row justify-content-between">
            <div class="">
              <h3> Car List </h3>
            </div>
            <div class="">
              <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createCarModal">Create Car <b-icon icon="pencil-square"></b-icon></button>
            </div>
          </div>

          <div class="flex-fill mt-3">
            <table class="table table-bordered table-hover" v-if="myCarsObj != null || myCarsObj.length > 0">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Manufacturer</th>
                  <th scope="col">Type</th>
                  <th scope="col">Color</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(data, id) in myCarsObj" :key="id">
                  <th scope="row">{{ data.id }}</th>
                  <td>{{ data.name }}</td>
                  <td>{{ data.manufacturer.name }}</td>
                  <td>{{ data.car_type.name }}</td>
                  <td>{{ data.color.name }}</td>
                  <td> 
                    <button class="btn btn-outline-danger btn-sm" @click="deleteCarDetails(data.id)"> Delete <b-icon icon="trash"></b-icon> </button>
                  </td>
                </tr>
                
              </tbody>
            </table>

            <h4 class="text-danger" v-else> No Car Data </h4>
          </div>
        </div>
      </div>

      <!-- Modal Component -->
      <div class="modal fade" id="createCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Create Car</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row text-start">
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Manufacturer</label>
                  <Manufacturer @selectedCarManufacturer="selectedCarManufacturerCallBack"></Manufacturer>
                </div>
                <div class="mb-3" v-if="hasManufacturer == true">
                  <label for="exampleFormControlInput1" class="form-label">Car Type</label>
                  <Type :Manufacturer="hasManufacturerData" @selectedCarType="selectedCarTypeCallBack"></Type>
                </div>
                <div class="mb-3" v-if="hasType == true">
                  <label for="exampleFormControlInput1" class="form-label">Color</label>
                  <Color :Type="hasTypeData" @selectedCarColor="selectedCarColorCallBack"></Color>
                </div>

                <div class="mb-3" v-if="hasColor == true">
                  <label for="exampleFormControlInput1" class="form-label">Name</label>
                  <Name :Color="hasColorData" ></Name>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-primary" @click="saveCarDetails()">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import store from '@/store';
  import Header from '@/layout/HeaderLayout.vue';
  import Manufacturer from '@/components/Car/Manufacturer.vue';
  import Type from '@/components/Car/Type.vue';
  import Color from '@/components/Car/Color.vue';
  import Name from '@/components/Car/Name.vue';
  import Swal from 'sweetalert2'

  export default {
    components: {
      Header,
      Manufacturer,
      Type,
      Color,
      Name,
    },
    data() {
      return {
        hasManufacturer: false,
        hasManufacturerData: '',
        hasType: false,
        hasTypeData: '',
        hasColor: false,
        hasColorData: '',
        myCarsObj: [],
      }
    },
    methods: {
      getManufacturer() {
        store
            .dispatch("getCars", this.form)
            .then((res) => {
                console.log(res);
            })
            .catch((err) => {
                console.log(err.response.data.message);
            });
      },
      selectedCarManufacturerCallBack($event){
        console.log("selectedCarManufacturerCallBack", $event);
        this.hasManufacturer = true;
        this.hasManufacturerData = $event;
        return $event;
      },
      selectedCarTypeCallBack($event){
        console.log("selectedCarTypeCallBack", $event);
        console.log($event);
        this.hasType = true;
        this.hasTypeData = $event;
        return $event;
      },
      selectedCarColorCallBack($event){
        console.log("selectedCarColorCallBack", $event);
        console.log($event);
        this.hasColor = true;
        this.hasColorData = $event;
        return $event;
      },
      saveCarDetails(){
        console.log(this.$store.state.carData);
        store
            .dispatch("saveCarDetails", this.$store.state.carData)
            .then((data) => {
              console.log(data);

              if(data == 1){
                Swal.fire({
                  title: 'Success',
                  text: 'Car created successfully',
                  icon: 'success',
                  confirmButtonText: 'Proceed'
                });

                window.location.reload();
              }

            })
            .catch((err) => {
                console.log(err);
            });
      },
      getMyCars(){
        store
            .dispatch("getMyCars", this.$store.state.carData)
            .then((data) => {
              console.log(data);
              this.myCarsObj = data;
            })
            .catch((err) => {
                console.log(err);
            });
      },

      deleteCarDetails(id){

        Swal.fire({
          title: 'Do you want to delete this car?',
          icon: 'warning',
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: 'Yes, Delete it',
          denyButtonText: `No, Cancel`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            store
            .dispatch("deleteCarDetails", id)
            .then((data) => {
              console.log(data);

              if(data == 1){
                Swal.fire({
                  title: 'Success',
                  text: 'Car deleted successfully',
                  icon: 'success',
                  confirmButtonText: 'Proceed'
                });
              }
              this.getMyCars();
            })
            .catch((err) => {
                console.log(err);
            });

          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
        })

      },
    },
    created: function(){
      this.getMyCars();
    }
  }
</script>