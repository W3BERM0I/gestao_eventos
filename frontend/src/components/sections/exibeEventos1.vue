<template>
  <div>
    <h2 class="titulo__section">
      {{ titulo }}
    </h2>

    <Carousel
      :items-to-show="3.95"
      :wrap-around="true"
      :transition="500"
    >
      <Slide
        v-for="(evento, index) in eventos"
        :key="index"
      >
        <div
          :class="['ma-4']"
          class="container__cards carousel__item"
        >
          <v-card
            color="var(--cinza-escuro)"
            height="300"
            width="200"
            class="mb-4 rounded-lg elevation-4"
          >
            <div class="d-flex fill-height align-center justify-center">
              <v-scale-transition>
                <v-icon
                  color="white"
                  size="48"
                  icon="mdi-close-circle-outline"
                />
              </v-scale-transition>
            </div>
          </v-card>
          <p class="titulo__card">
            {{ evento.nome }}
          </p>
        </div>
      </Slide>
    </Carousel>

    <!-- <v-slide-group
      selected-class="bg-success"
      show-arrows
    >
      <v-slide-group-item
        v-for="(evento, index) in eventos"
        :key="index"
        v-slot="{ selectedClass }"
        class="list__group__container"
      >
        <div
          :class="['ma-4', selectedClass]"
          class="container__cards"
        >
          <v-card
            color="var(--cinza-escuro)"
            height="300"
            width="200"
            class="mb-4 rounded-lg elevation-4"
          >
            <div class="d-flex fill-height align-center justify-center">
              <v-scale-transition>
                <v-icon
                  color="white"
                  size="48"
                  icon="mdi-close-circle-outline"
                />
              </v-scale-transition>
            </div>
          </v-card>
          <p class="titulo__card">
            {{ evento.nome }}
          </p>
        </div>
      </v-slide-group-item>
    </v-slide-group> -->
  </div>
</template>

<script setup lang="ts">
import type { Evento } from "@/types/Evento";

import { defineComponent } from "vue";
import { Carousel, Pagination, Slide } from "vue3-carousel";

import "vue3-carousel/dist/carousel.css";

defineProps<{
    titulo: string;
    eventos: Evento[];
}>();
</script>

<style scoped>
.list__group__container {
  display: flex !important;
  flex-direction: row !important;
}

.container__cards:first-child {
  margin-left: 0 !important;
}

.titulo__section {
  font-size: 2rem;
}

.titulo__card {
  font-size: 1rem;
  overflow-wrap: break-word;
  max-width: 200px;
}

.carousel__slide {
  padding: 5px;
}

.carousel__viewport {
  perspective: 2000px;
}

.carousel__track {
  transform-style: preserve-3d;
}

.carousel__slide--sliding {
  transition: 0.5s;
}

.carousel__slide {
  opacity: 0.9;
  transform: rotateY(-20deg) scale(0.9);
}

.carousel__slide--active ~ .carousel__slide {
  transform: rotateY(20deg) scale(0.9);
}

.carousel__slide--prev {
  opacity: 1;
  transform: rotateY(-10deg) scale(0.95);
}

.carousel__slide--next {
  opacity: 1;
  transform: rotateY(10deg) scale(0.95);
}

.carousel__slide--active {
  opacity: 1;
  transform: rotateY(0) scale(1.1);
}
</style>