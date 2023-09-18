<template>
  <v-app-bar
    color="#42A5F5"
    density="default"
    scroll-behavior="elevate"
    style="position: fixed;"
  >
    <v-app-bar-title class="title__bavbar">
      MeuIngresso
    </v-app-bar-title>

    <template #append>
      <v-icon
        icon="fa-regular fa-circle-user"
        class="icon__navbar"
      />
      <v-btn class="btn__navbar">
        Entrar
      </v-btn>
    </template>
  </v-app-bar>
</template>

<script setup>

</script>

<style scoped>
.title__bavbar {
  color: white;
}

.icon__navbar {
  color: white;

}

.btn__navbar {
  color: white;

}
</style>