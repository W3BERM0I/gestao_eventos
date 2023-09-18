<template>
  <v-app>
    <router-view />
  </v-app>
</template>

<script setup lang="ts">
</script>

<style>
*:root {
    --cor-primaria: #42A5F5;
    --cor-secundaria: #F07DEA;
    --cor-texto-destaque: #A460ED;
    --cor-background-cinza: #EEEEEE;

    --verde-sicredi: #3fa110;
    --verde-escuro: #146e37;
    --verde-mais-escuro: #323c32;

    --neutro-escuro: #5a645a;
    --neutro-claro: #d7e6c8;

    --amarelo: #ffcd00;

    --cinza: #f5f5f5;
    --cinza-claro: #fafafa;
    --cinza-escuro: #d9d9d9;

    --branco: #ffffff;

    --rosa: #ed5a6c;
    --magenta: #e60050;
    --bordo: #730028;
    --azul: #46d7ff;
    --laranja: #ff6400;
}

::-webkit-scrollbar-track {
  background-color: black;
  width: 0;
  height: 1%;
}

::-webkit-scrollbar {
  width: 7px;
  background-color: var(--brancoClaro);
}

::-webkit-scrollbar-thumb {
  background-color: var(--cinzaEscuro);
  border-radius: 0;
}

</style>
