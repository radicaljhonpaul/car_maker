<template>
    <select :Manufacturer="Manufacturer" class="form-control" name="" v-model="value" @change="selectCarType(value)">
        <option :value="item.obj" v-for="(item, optData) in options" :key="optData">
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
    props: ['Manufacturer'],

    watch: { 
        Manufacturer: {
            immediate: true,
                handler (newVal) {
                console.log('Manufacturer changed: ', newVal);
                this.getCarTypes(newVal);
            },
        }
    },
    data() {
        return {
            value: null,
            options: [],
        }
    },
    methods: {
        getCarTypes(manufacturer_id) {
            store
            .dispatch("getCarTypes", manufacturer_id)
            .then((res) => {
                console.log("getCarTypes");
                console.log(res);
                this.options=[];
                res.data.data.forEach(element => {
                    this.options.push({'value': element.id, 'name': element.description, 'obj': element });
                });
            })
            .catch((err) => {
                console.log(err);
            });
      },
      selectCarType(obj) {
            store
            .dispatch("selectCarType", obj)
            .then((res) => {
                console.log("selectCarType");
                console.log(res);
                this.$emit( 'selectedCarType', res );
            })
            .catch((err) => {
                console.log(err);
            });
      },
    },
    mounted: function(){
        console.log('CREATED TYPE');
        this.getCarTypes(this.Manufacturer);
    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

