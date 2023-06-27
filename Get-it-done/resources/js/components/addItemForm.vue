<template>
    <div>
        <div class="addItem">
            <input type="text" v-model="item.name" name="" id="" />
            <svg @click="addItem()" :class="[item.name ? 'active' : 'inactive', 'plus']" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>
        </div>
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
                    if (response.status = 201) {
                        this.item.name = "";
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.active {
    color: #00ce25
}

.inactactive {
    color: #999999;
}



.icon {
    width: 10%;
}
</style>