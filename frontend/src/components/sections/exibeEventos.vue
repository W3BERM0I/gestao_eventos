<template>
  <div>
    <h2 class="titulo__section">
      {{ titulo }}
    </h2>

    <v-slide-group
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
    </v-slide-group>
  </div>
</template>

<script setup lang="ts">
import type { Evento } from "@/types/Evento";

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
</style>