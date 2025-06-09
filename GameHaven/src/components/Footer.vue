<template>
  <footer
    class="w-full bg-[#ECE7FA] flex flex-col items-center justify-center text-center px-4 py-1 space-y-4 sm:space-y-2"
  >
    <h1 class="text-xl sm:text-2xl font-semibold text-[#1A1A1A]">
      <span class="Title text-[#6A0DAD]">GameHaven</span>:
      <span class="Header">Precision Gear For Serious Play.</span>
    </h1>

    <img
      :src="logo"
      alt="Logo"
      class="h-12 w-12 sm:h-12 sm:w-12 shrink-0"
    /><br />

    <p class="text-xl sm:text-base max-w-xl text-[#555555] Description">
      Disclaimer: Product images featured on this website are sourced from the
      official PNGClean website and <a href="www.freepik.com">Freepik</a>. They
      are used solely for educational and conceptual purposes as part of a
      school project and personal portfolio. All rights to these images belong
      to their respective owners.
    </p>

    <h1 class="text-base sm:text-lg font-medium Header">
      GCash: 0936-626-3915 | J****h Is**c B.
    </h1>
  </footer>
</template>

<script setup>
import logo from "../assets/GameHaven.png";
</script>
