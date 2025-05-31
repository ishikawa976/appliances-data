<script setup>
    import { ref } from 'vue';

    let currentIndex = 0;

    const props = defineProps({
        images: Array,
    });
    const image = (num) => {
        return props.images[num];
    }
    const imagePath = (image) =>{
        return "/storage/image/" + image;
    }

    const prevSlide = () => {
        console.log(currentIndex)
      return currentIndex = ((currentIndex == 0) ? props.images.length - 1 : currentIndex - 1);
      
    }

    const nextSlide = () => {
        console.log(currentIndex)
      return currentIndex = (currentIndex == props.images.length - 1) ? 0 : currentIndex + 1;
    }
</script>
<style>
    .nav-button {
        border: none;
        background-color: #6699cc;
        color: #fff;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        padding: 10px;
        cursor: pointer;
    }

    .prev-button {
        left: 0;
    }

    .next-button {
        right: 0;
    }
</style>
<template>
    <div class="flex justify-center position:relative">
        <div id="main" class="flex justify-center">
            <a :href = "route('image.show', image(currentIndex).id)">
                <img :src=imagePath(image(currentIndex).image_title) width="40%" height="40%">
            </a>
        </div>
        <div>
            <button v-on:click="prevSlide()" class="nav-button prev-button">‹</button>
            <button v-on:click="nextSlide()" class="nav-button next-button">›</button>
        </div>
    </div>
</template>