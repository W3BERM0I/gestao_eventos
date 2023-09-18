<template>
  <v-carousel
    cycle
    height="300"
    hide-delimiter-background
    show-arrows="hover"
    color="var(cor-primaria)"
  >
    <v-carousel-item
      src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
      cover
    />

    <v-carousel-item
      src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
      cover
    />

    <v-carousel-item
      src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
      cover
    />
  </v-carousel>
  <div class="pa-12">
    <exibe-eventos
      titulo="Destaques"
      :eventos="[{nome: 'Memorial Amdstad de nova petropolis da sera'}, {nome: 'Alinhamento Estrategico'},{nome: 'Memorial Amdstad de nova petropolis da sera'}, {nome: 'Memorial Amdstad de nova petropolis da sera'}, {nome: 'Alinhamento Estrategico'}]"
    />
    <exibe-eventos
      titulo="Em Breve"
      :eventos="[{nome: 'Memorial Amdstad'}, {nome: 'Memorial Amdstad de nova petropolis da sera'}, {nome: 'Alinhamento Estrategico'},{nome: 'Memorial Amdstad de nova petropolis da sera'}]"
    />

    <exibe-informacoes />
  </div>
</template>

<script setup lang="ts">
import exibeEventos from "@/components/sections/exibeEventos.vue";
import ExibeInformacoes from "@/components/sections/ExibeInformacoes.vue";


</script>

<style lang="scss" scoped>

</style>