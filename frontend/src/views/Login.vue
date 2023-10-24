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
        icon="fa-solid fa-arrow-left"
        class="arrow__icon"
        @click="level === 0 ? null : level--"
      />
      <v-container class="container__menu__login">
        <h1 class="titulo__login">
          Entre no MeuIngresso
        </h1>
        <div
          v-if="level === 0"
          class="container__botoes"
        >
          <v-btn
            class="botoes__login"
            elevation="3"
            @click="level++"
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
        <email-view 
          v-if="level === 1"
          @next-level="level++"
        />
        <token-view
          v-if="level === 2"
        />

        <p class="descricao__login">
          Para utilizar o nosso sistema, <strong>Você não precisa criar um cadastro</strong>
        </p>
      </v-container>
    </v-sheet>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import EmailView from "./login/EmailView.vue";
import TokenView from "./login/TokenView.vue";
// import loginApi from "@/api/Login";

const level = ref(0);


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



.form-cadastro {
  display: flex;
  flex-direction: column;
  margin-bottom: 1vh;
  font-size: 1.5rem;
  justify-content: center;
}

.form-cadastro>label {
  margin-bottom: 1vh;
  height: 2rem;
  text-align: center;
  font-weight: bold;
  font-size: 2rem;
}

.form-cadastro>input {
  height: 6vh;
  width: 40vw;
  background-color: white;
  border: 2px solid  var(--cor-primaria);
  border-radius: 15px;
  padding: 25px 0;
  text-align: center;
}

.form-cadastro>input::placeholder {
  color: black;
}

.submit input {
  height: 8vh;
  width: 35vw;
  background-color: black;
  color: var(--cor-background-cinza);
  border: 1px solid black;
  border-radius: 15px;
  margin: 3vh 0 3vh;
  font-size: 1.5rem;
}

.submit input:hover {
  background-color: var(--cor-background-cinza);
  color: var(--preto);
  border: 1px solid black;
}

.descricao__login {
  
  margin-top: 1rem;
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