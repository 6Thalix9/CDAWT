<template>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        {{ titre }}
      </h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <slot></slot>
      <!-- Your content -->
    </div>
  </main>
</template>

<script setup>
const props = defineProps({
  titre: String,
});
</script>

<style></style>
