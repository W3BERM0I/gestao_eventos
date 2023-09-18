<template>
  <!-- eslint-disable-next-line vue/html-quotes -->
  <v-container
    fluid="true"
    style="background-color: black;"
  >
    <v-row no-gutters>
      <v-col
        cols="12"
        sm="3"
        class="d-flex align-center justify-left"
      >
        <h1 class="logo__footer">
          MeuIngresso
        </h1>
      </v-col>
      <v-col
        cols="12"
        sm="3"
      >
        <h2 class="title__footer">
          O QUE FAZEMOS?
        </h2>
        <p class="description__footer">
          Quem Somos
        </p>
        <p class="description__footer">
          Seja um parceiro
        </p>
      </v-col>
      <v-col
        cols="12"
        sm="3"
      >
        <h2 class="title__footer">
          DÚVIDAS
        </h2>
        <p class="description__footer">
          Termos de Uso
        </p>
      </v-col>
      <v-col
        cols="12"
        sm="3"
      >
        <h2 class="title__footer">
          FALE CONOSCO
        </h2>
        <p class="description__footer">
          <v-icon
            icon="fa-solid fa-envelope"
            size="small"
            class="icon__footer"
          />
          moisesweber01@gmail.com
        </p>
        <p
          class="
            description__footer"
        >
          <v-icon
            icon="fa-brands fa-whatsapp"
            class="icon__footer"
          />
          (51) 99504-7834
        </p>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup lang="ts">

</script>

<style  scoped>

.logo__footer {
    color: var(--cor-primaria);
    font-weight: 400;
    font-size: 2rem;
}
.title__footer {
    color: var(--cor-primaria);
    font-weight: 400;
    font-size: 1.4rem;
    margin-bottom: .5rem;
}

.description__footer {
    color: white;
    font-size: 1.3rem;
    margin-bottom: .5rem;

}


@media screen and (min-width: 1370px) {
}

@media screen and (max-width: 600) {
.logo__footer {
    font-size: 1.5rem;
}
.title__footer {
    font-size: 1rem;
    margin-bottom: .3rem;
}

.description__footer {
    font-size: .7rem;
    margin-bottom: .3rem;
    display: flex;
}

p>.icon__footer {
  display: none !important;
}
}
</style>