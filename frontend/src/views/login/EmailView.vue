<template>
  <v-sheet
    width="90%"
    class="mx-auto mt-4"
  >
    <v-form
      class="form__email"
      @submit.prevent="gerarToken"
    >
      <v-text-field
        v-model="email"
        label="Digite seu e-mail aqui"
        variant="outlined"
        type="email"
        color="var(--cor-primaria)"
        class="emailTextField rounded-xl"
      />
      <v-btn
        type="submit"
        block
        class="button__submit"
        color="var(--cor-primaria)"
      >
        Enviar
      </v-btn>
    </v-form>
  </v-sheet>
</template>

<script lang="ts" setup>
import { ref } from "vue";

const emits = defineEmits(["nextLevel"]);
const email = ref("");


const  gerarToken = async () => {
    emits("nextLevel");
    // await loginApi.sendToken(email.value);
};
</script>

<style scoped>


.emailTextField {
  margin: .3rem 0;
}

.emailTextField>input .v-text-field input.v-field__input input{
  border-color: var(--cor-primaria) !important;
}

.emailTextField::placeholder>input{
  border-color: var(--cor-primaria) !important;
  color: var(--cor-primaria) !important;
}

.form__email {
  width: 100%;
}

.button__submit {
  width: 100%;
  color: white !important;
  padding: 1.3rem;
  border-radius: .7rem;
  font-size: 1.3rem;
}

</style>