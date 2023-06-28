<template>
    <div class="w-2/3 mx-auto">
        <div class="bg-gray-300 p-2">
            <h2 class="text-center text-2xl">Todo List</h2>
            <add-item-form v-on:reloadlist="getList()" />
        </div>
        <list-view :items="items" v-on:reloadlist="getList()" />
    </div>
</template>

<script>
import addItemForm from './addItemForm.vue';
import listView from './listView.vue';

export default {
    components: {
        addItemForm,
        listView
    },
    data: function () {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get('api/items')
                .then(response => {
                    this.items = response.data
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    created() {
        this.getList();
    }
}
</script>
