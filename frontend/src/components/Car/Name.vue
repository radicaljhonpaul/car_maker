<template>
    <select :Color="Color" class="form-control" name="" v-model="value" @change="selectCar(value)">
        <option :value="item.name" v-for="(item, optData) in options" :key="optData">
            {{ item.name }}
        </option>
    </select>
</template>

<script>
import store from '@/store';

export default {
    name: 'TypeComponent',
    components: {
    },
    props: ['Color'],
    data() {
        return {
            value: null,
            options: [],
        }
    },
    watch: { 
        Color: {
            immediate: true,
                handler (newVal) {
                console.log('Color changed: ', newVal);
                this.getCar(newVal);
            },
        }
    },
    methods: {
        getCar(car_id) {
            store
            .dispatch("getCar", car_id)
            .then((res) => {
                console.log("getCar");
                console.log(res.data);
                this.options = [];
                this.options.push({'value': res.data.id, 'name': res.data.name });
            })
            .catch((err) => {
                console.log(err);
            });
      },
      selectCar(name) {
            store
            .dispatch("selectCar", name)
            .then((res) => {
                console.log("selectCar");
                console.log(res);
                this.$emit( 'selectedCar', res );
            })
            .catch((err) => {
                console.log(err);
            });
      },
    },
    mounted: function(){
        console.log('CREATED COLOR');
        this.getCar(this.Color);
    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

