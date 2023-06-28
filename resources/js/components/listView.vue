<template>
    <div v-for="(item, index) in items" :key="index">
        <list-item :item="item" class="bg-gray-200 padding-4 mt-1" v-on:itemchanged="$emit('reloadlist')" />
    </div>
</template>

<script>
import listItem from "./listItem.vue"

export default {
    props: ['items'],
    components: {
        listItem
    }
}
</script>
