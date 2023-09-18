<template>
  <v-app>
    <nav-bar />
    <default-view />
    <footer-default />
  </v-app>
</template>

<script lang="ts" setup>
import DefaultView from "./View.vue";
import navBar from "@/components/cabecalho-footer/navBar.vue";
import footerDefault from "@/components/cabecalho-footer/footer.vue";
</script>
