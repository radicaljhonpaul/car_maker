<template>
    <select class="form-control" name="" v-model="value" @change="selectManufacturer(value)">
        <option :value="item.obj" v-for="(item, optData) in options" :key="optData">
            {{ item.name }}
        </option>
    </select>
</template>

<script>
import store from '@/store';

export default {
    name: 'ManufacturerComponent',
    components: {
    },
    props: {
    },
    data() {
        return {
            value: null,
            options: [],
        }
    },
    methods: {
        getCarManufacturers() {
            store
            .dispatch("getCarManufacturers")
            .then((res) => {
                res.data.data.forEach(element => {
                    this.options.push({'value': element.id, 'name': element.name, 'obj': element });
                });
            })
            .catch((err) => {
                console.log(err.response.data.message);
            });
        },
        selectManufacturer(obj){
            store
            .dispatch("selectCarManufacturer", obj)
            .then((res) => {
                console.log("selectCarManufacturer");
                this.$emit( 'selectedCarManufacturer', res );
            })
            .catch((err) => {
                console.log(err);
            });
        }
    },
    created: function(){
        this.getCarManufacturers();
    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

