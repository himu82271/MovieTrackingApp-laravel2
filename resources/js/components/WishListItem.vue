<template>
    <v-list-item>
        {{ item.text }} 
        <div class="item-actions">
            <a target="_blank" v-bind:href="item.link">
                <v-btn>
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </v-btn>
            </a> 
            <v-btn class="bought" @click="$emit('check')"> </v-btn> 
            <v-btn @click="$emit('remove')">
                <i class="fa fa-times" aria-hidden="true"></i>
            </v-btn>
        </div>
    </v-list-item>
</template>
<script>
    export default {
        props: {
            item: Object
        }
    }
</script>
<style scoped>

</style>