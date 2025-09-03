<script setup>
import { ref } from 'vue'

const props = defineProps({
    images: Array,
});

const currentIndex = ref(0)

function prevSlide() {
  currentIndex.value =  (currentIndex.value === 0) ? props.images.length - 1 : currentIndex.value - 1
}

function nextSlide() {
  currentIndex.value = (currentIndex.value === props.images.length - 1) ? 0 : currentIndex.value + 1
}

const imagePath = (image) =>{
        let imageTitle = image.image_title

        return "/storage/image/" + imageTitle;
}
</script>
<template>
  <div class="relative w-[500px]">
    <div id="main" class="flex justify-center">
        <a :href = "route('image.show', props.images[currentIndex].id)">
            <img :src=imagePath(images[currentIndex]) />
        </a>
    </div>
    <button
      @click="prevSlide"
      class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 cursor-pointer"
    >
      ‹
    </button>
    <button
      @click="nextSlide"
      class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 cursor-pointer"
    >
      ›
    </button>
  </div>
</template>

