<template>
  <v-app>
    <nav-bar />
    <default-view />
    <footer-default />
  </v-app>
</template>

<script lang="ts" setup>
import DefaultView from "./View.vue";
import navBar from "@/components/navBar/navBar.vue";
import footerDefault from "@/components/navBar/footer.vue";
</script>
