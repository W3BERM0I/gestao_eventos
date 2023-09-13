<template>
  <div
    class="fill-height container"
  >
    <v-sheet
      elevation="12"
      rounded="xl"
      class="pa-4 text-center sheet__login"
    >
      <v-icon
        v-if="level !== 0 ? true : false"
        icon="fa-solid fa-arrow-left"
        class="arrow__icon"
      />
      <v-container class="container__menu__login">
        <h1 class="titulo__login">
          Entre no MeuIngresso
        </h1>
        <div class="container__botoes">
          <v-btn
            class="botoes__login"
            elevation="3"
          >
            Receber código por e-mail
          </v-btn>
          <v-btn
            prepend-icon="fa-brands fa-google"
            class="botoes__login"
            elevation="3"
          >
            Entrar com o Google
          </v-btn>
        </div>
        <p class="descricao__login">
          Para utilizar o nosso sistema, <strong>Você não precisa criar um cadastro</strong>
        </p>
      </v-container>
    </v-sheet>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";

const level = ref(2);



</script>

<style scoped>
.container {
  /* width: 100vw;
  height: 100vh; */
  background-color: var(--cor-primaria);
  display: flex;
  align-items: center;
  justify-content: center;
}


.sheet__login {
  display: flex;
  flex-direction: column;
  max-width: 800px;
  width: 100%;
  height: 55%;
}

.arrow__icon {
  aspect-ratio: 1/1;
  font-size: 2rem;
}


.container__menu__login {
  max-height: 100%;
  max-width: 80%;
}

.titulo__login {
  font-size: 2.8rem;
}

.container__botoes {
  display: flex;
  flex-direction: column;
  margin-top: 3rem;
}

.botoes__login {
  border: 1.5px solid var(--cor-primaria);
  padding: 10px 5px;
  margin-bottom: 1rem;
  border-radius: 15px;
  height: 45px !important;
}

.descricao__login {
  

}

@media screen and (min-width: 1370px) {
.sheet__login {
  max-width: 800px;
  width: 100%;
  height: 40%;
}
  
  .descricao__login {
  

}
}

@media screen and (max-width: 600) {
  
}
</style>