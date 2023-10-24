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
      <router-link
        class="btn__navbar"
        :to="{ name: 'Login' }"
      >
        Entrar
      </router-link>
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
  text-decoration: none !important;
  margin-left: .5rem;
  font-size: 1.3rem;
  font-weight: 600;

}
</style>