<script setup>
    import { ref } from 'vue';

    

    const props = defineProps({
        images: Array,
    });
    
    const imagePath = (image) =>{
        return "/storage/image/" + image;
    }
    
</script>

<template>
    <div class="flex justify-center position:relative">
        <div v-for="image in images">
        <div id="main" class="flex justify-center">
            <a :href = "route('image.show', image.id)">
                <img :src=imagePath(image.image_title) width="40%" height="40%">
            </a>
        </div>
        </div>
    </div>
</template>