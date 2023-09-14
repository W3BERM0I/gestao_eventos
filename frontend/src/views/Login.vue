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
        @click="level--"
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

        <div 
          v-if="level === 1"
        >
          <v-sheet
            width="300"
            class="mx-auto"
          >
            <v-form @submit.prevent="gerarToken">
              <v-text-field
                v-model="email"
                label="Digite seu e-mail aqui"
                variant="outlined"
                color="var(--cor-primaria)"
                class="emailTextField rounded-xl"
              />

              <div class="form-cadastro nome_completo">
                <label
                  for="nome"
                  class="input-label"
                >e-mail</label>
                <input
                  id="nome"
                  v-model="email"
                  type="text"
                  class="input"
                  name="Digite seu e-mail aqui"
                  placeholder="Digite seu e-mail aqui"
                  minlength="10"
                  maxlength="255"
                  required
                >
              </div>

              <v-btn
                type="submit"
                block
                class="mt-2"
                color="var(--cor-primaria)"
              >
                Enviar
              </v-btn>
            </v-form>
          </v-sheet>
        </div>
        <p class="descricao__login">
          Para utilizar o nosso sistema, <strong>Você não precisa criar um cadastro</strong>
        </p>
      </v-container>
    </v-sheet>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
// import loginApi from "@/api/Login";

const level = ref(0);
const email = ref("");


const  gerarToken = async () => {
    // await loginApi.sendToken(email.value);
};

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

.emailTextField>input .v-text-field input.v-field__input input{
  border-color: var(--cor-primaria) !important;
}

.emailTextField::placeholder>input{
  border-color: var(--cor-primaria) !important;
  color: var(--cor-primaria) !important;
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