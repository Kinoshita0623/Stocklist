<template>
    <div>

        <v-card-title class="mt-5">
            <h1 class="mx-auto">制作中</h1>
        </v-card-title>
        
        <div class="d-flex justify-center pa-2 mt-10">
            <ProgressCircle />
        </div>
        <p style="text-align:center;">Now Loading...</p>
        
    </div>
</template>

<script>
import ProgressCircle from '@/components/ProgressCircle.vue'

export default {
    name: 'Home',
    components: {
        ProgressCircle
    },
}
</script>