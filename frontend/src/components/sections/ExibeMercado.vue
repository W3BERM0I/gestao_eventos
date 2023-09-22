<template>
  <h1>Mercado</h1>
  <v-slide-group
    selected-class="bg-success"
    show-arrows
  >
    <v-slide-group-item
      v-for="(evento, index) in MercadoriaPorEvento"
      :key="index"
      v-slot="{ selectedClass }"
      class="list__group__container"
    >
      <div
        :class="['ma-4', selectedClass]"
        class="container__cards"
      >
        <!-- <v-card
          color="var(--cinza-escuro)"
          height="300"
          width="200"
          class="mb-4 rounded-lg elevation-4"
        /> -->


        <v-card
          color="var(--cinza-escuro)"
          height="97%"
          width="50vw"
          class="mb-4 rounded-lg elevation-4 card__loja"
        >
          <v-img
            src="../../assets/img/Amstad.jpg"
            fill
          >
            <p class="titulo__card">
              {{ evento.nome }}
            </p>
          </v-img>
        </v-card>
      </div>
    </v-slide-group-item>
  </v-slide-group>
</template>

<script lang="ts" setup>
import { reactive } from "vue";

const MercadoriaPorEvento = reactive([{nome: "Memorial Amstad"}, {nome: "Alinhamento Estrategico"}, {nome: "Memorial Amstad"}]);
</script>

<style scoped>

.list__group__container {
  display: flex !important;
  flex-direction: row !important;
}

.container__cards {
  min-height: 20rem;
  width: 100%;
}

.container__cards:first-child {
  margin-left: 0 !important;
}

.card__loja {
    display: flex;
    justify-content: left;
    align-items: end;
    margin: 16px;
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