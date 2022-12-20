<template>
    <select :Type="Type" class="form-control" name="" v-model="value" @change="selectCarColor(value)">
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
    props: ['Type'],
    data() {
        return {
            value: null,
            options: [],
        }
    },
    watch: { 
        Type: {
            immediate: true,
                handler (newVal) {
                console.log('Type changed: ', newVal);
                this.getCarColors(newVal);
            },
        }
    },
    methods: {
        getCarColors(type_id) {
            store
            .dispatch("getCarColors", type_id)
            .then((res) => {
                console.log("getCarColors");
                console.log(res);
                this.options = [];
                res.data.data.forEach(element => {
                    this.options.push({'value': element.id, 'name': element.name, 'obj' : element});
                });
            })
            .catch((err) => {
                console.log(err);
            });
      },
      selectCarColor(obj) {
            console.log(obj);
            store
            .dispatch("selectCarColor", obj)
            .then((res) => {
                console.log("selectCarColor");
                console.log(res);
                this.$emit( 'selectedCarColor', res );
            })
            .catch((err) => {
                console.log(err);
            });
      },
    },
    mounted: function(){
        console.log('CREATED COLOR');
        this.getCarColors(this.Type);

    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

