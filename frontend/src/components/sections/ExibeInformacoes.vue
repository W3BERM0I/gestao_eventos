<template>
  <h1>Noticias</h1>
  <div class="container__noticias">
    <div class="noticia__pequena">
      <v-card
        color="var(--cinza-escuro)"
        height="97%"
        width="97%"
        class="mb-4 rounded-lg elevation-4 card__noticia"
      >
        <p class="titulo__noticia">
          titulo noticia
        </p>
      </v-card>
    </div>
    <div class="noticias__pequenas">
      <div class="noticia__pequena">
        <v-card
          color="var(--cinza-escuro)"
          height="200"
          width="97%"
          class="mb-4 rounded-lg elevation-4 card__noticia"
        >
          <p class="titulo__noticia">
            titulo noticia
          </p>
        </v-card>
      </div>
      <div class="noticia__pequena">
        <v-card
          color="var(--cinza-escuro)"
          height="200"
          width="97%"
          class="mb-4 rounded-lg elevation-4 card__noticia"
        >
          <p class="titulo__noticia">
            titulo noticia
          </p>
        </v-card>
      </div>
      <div class="noticia__pequena">
        <v-card
          color="var(--cinza-escuro)"
          height="200"
          width="97%"
          class="rounded-lg elevation-4 card__noticia"
        >
          <p class="titulo__noticia">
            titulo noticia
          </p>
        </v-card>
      </div>
      <div class="noticia__pequena">
        <v-card
          color="var(--cinza-escuro)"
          height="200"
          width="97%"
          class=" rounded-lg elevation-4 card__noticia"
        >
          <p class="titulo__noticia">
            titulo noticia
          </p>
        </v-card>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.container__noticias {
display: grid;
grid-template-columns: 1fr 1fr;
height: 100%;
width: 100%;
}

.noticias__pequenas {
display: grid;
grid-template-columns: 1fr 1fr; 
grid-template-rows: 1fr 1fr;
}

.card__noticia {
    display: flex;
    justify-content: left;
    align-items: end;
    padding: 16px;
}

.titulo__noticia {
    font-weight: 500;
    font-size: 1.4rem;
}
</style>