<template>
    <div class="flex justify-center align-middle">
        <input type="text" v-model="item.name" class="border-none outline-none p-1 ml-2 w-1/2" />
        <svg @click="addItem()" :class="[item.name ? 'text-green-500' : 'text-gray-700', 'w-8']"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
        </svg>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if (this.item.name == '') {
                return;
            }
            axios.post('api/item/store', {
                item: this.item
            })
                .then(response => {
                    if (response.status == 201) {
                        this.item.name = "";
                        this.$emit('reloadlist');
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>
