<template>
  <div class="h-full bg-gradient-to-r from-orange-50 to-orange-300">
    <header>
      <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8 flex justify-center">
        <h1 class="text-7xl font-bold tracking-tight text-gray-900 text-center;">
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
  </div>
</template>

<script setup>
const props = defineProps({
  titre: String,
});
</script>
