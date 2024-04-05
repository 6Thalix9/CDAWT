<template>
  <PageComponent title="Dashboard">
    <div class="px-28">
      <div class="text-black mt-48 pr-0">
        <h1 class="text-6xl font-semibold leading-normal">
          Bienvenue sur Celesterra
        </h1>
        <p>
          Découvrez des villes mystiques et des aventures inoubliables dans le
          ciel de Celesterra.

        </p>
        <div class="mt-10">
          <a href="#" class=" bg-white rounded-3xl py-3 px-8 font-medium inline-block mr-4 hover:bg-transparent
           hover:border-white hover:text-white duration-300 hover:border border border-transparent">L'aventure commence
            maintenant.</a>

        </div>
      </div>
      <img src="../assets/Treasure.svg" class="w-full xl:w-1/3 xl:absolute top-[130px] right-[100px]">

      <div class="h-40"></div>
      <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 flex items-start">

        <div class="flex-1 -mt-20">

          <h2 class="text-lg font-bold p-4 text-center">La carte du jeu</h2>
          <img src="../assets/Map.svg" alt="A propos du jeu" class="rounded-lg shadow-md w-full" />

        </div>


        <div class="w-10"></div>


        <div class="flex-1 p-4 border-2 border-gray-200 rounded-lg shadow-lg">
          <p class="text-center">
            Ticket to Fly vous promet une expérience pleine de stratégie,
            d'imaginaire, et de découvertes inattendues. Préparez-vous à
            prendre votre envol et à écrire votre propre légende dans le ciel
            de Celesterra. Le voyage de votre vie commence maintenant.
          </p>
        </div>
      </div>
    </div>
  </PageComponent>
</template>

<script setup>
import PageComponent from "../components/PageComponent.vue";
</script>

<style scoped></style>
