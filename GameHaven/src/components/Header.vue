<template>
  <div>
    <nav class="bg-[#ECE7FA] w-full h-[52px] relative z-50">
      <div
        class="flex items-center justify-between h-full max-w-7xl mx-auto px-6 w-full"
      >
        <!-- Logo Section -->
        <div class="flex items-center space-x-3 flex-[1] min-w-0">
          <router-link to="/" class="flex items-center overflow-hidden">
            <img :src="logo" class="h-[32px] w-[32px] shrink-0" />
            <h3
              class="ml-2 text-xl lg:text-2xl font-semibold text-[#6A0DAD] hover:text-[#843ED2] truncate Title"
            >
              GameHaven
            </h3>
          </router-link>
        </div>

        <!-- Center Navigation -->
        <div
          class="flex justify-center items-center gap-4 flex-[1] max-md:hidden"
        >
          <router-link
            to="/"
            class="group relative px-2 py-1 text-sm md:text-base text-[#1A1A1A] font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          >
            <span
              class="relative z-10 group-hover:text-[#8A2BE2] Accent text-xl"
              >HOME</span
            >
            <span
              class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
            ></span>
          </router-link>

          <router-link
            to="/products"
            class="group relative px-2 py-1 text-sm md:text-base text-[#1A1A1A] font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          >
            <span
              class="relative z-10 group-hover:text-[#8A2BE2] Accent text-xl"
              >Products</span
            >
            <span
              class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
            ></span>
          </router-link>

          <router-link
            to="/about"
            class="group relative px-2 py-1 text-sm md:text-base text-[#1A1A1A] font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          >
            <span
              class="relative z-10 group-hover:text-[#8A2BE2] Accent text-xl"
              >About</span
            >
            <span
              class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
            ></span>
          </router-link>

          <router-link
            to="/contact"
            class="group relative px-2 py-1 text-sm md:text-base text-[#1A1A1A] font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          >
            <span
              class="relative z-10 group-hover:text-[#8A2BE2] Accent text-xl"
              >Contact</span
            >
            <span
              class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
            ></span>
          </router-link>
        </div>

        <!-- Right Section -->
        <div class="flex justify-end items-center gap-4 flex-[1] min-w-0">
          <!-- Hamburger Menu -->
          <button class="md:hidden text-[#6A0DAD]" @click="menuOpen = true">
            <CgMenu class="w-8 h-8" />
          </button>

          <!-- Icons -->
          <router-link to="/cart" class="text-[#8A2BE2] hover:text-[#B266FF]"
            ><CgShoppingCart class="w-8 h-8"
          /></router-link>
          <router-link to="/profile" class="text-[#8A2BE2] hover:text-[#B266FF]"
            ><CgProfile class="w-8 h-8"
          /></router-link>

          <template v-if="isLoggedIn">
            <button
              @click="logout"
              class="text-xl text-[#8A2BE2] hover:text-[#B266FF] transition font-bold Accent"
              type="button"
            >
              Logout
            </button>
          </template>
          <template v-else>
            <router-link
              to="/login"
              class="text-xl font-bold text-[#1A1A1A] hover:text-[#8A2BE2] transition Accent"
              >Login</router-link
            >
          </template>
        </div>
      </div>
    </nav>

    <div
      v-if="menuOpen"
      class="fixed inset-0 z-100 bg-white/30 backdrop-blur-md md:hidden"
      @click="menuOpen = false"
    ></div>

    <!-- Mobile Sidebar -->
    <transition name="slide">
      <div
        v-if="menuOpen"
        class="fixed top-0 left-0 w-64 h-full bg-[#ECE7FA] z-120 shadow-md p-6 space-y-6 md:hidden"
      >
        <router-link
          to="/"
          class="group relative block px-2 py-1 text-[#1A1A1A] text-lg font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          @click="menuOpen = false"
        >
          <span class="relative z-10 group-hover:text-[#8A2BE2] Accent"
            >Home</span
          >
          <span
            class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
          ></span>
        </router-link>

        <router-link
          to="/products"
          class="group relative block px-2 py-1 text-[#1A1A1A] text-lg font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          @click="menuOpen = false"
        >
          <span class="relative z-10 group-hover:text-[#8A2BE2] Accent"
            >Products</span
          >
          <span
            class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
          ></span>
        </router-link>

        <router-link
          to="/about"
          class="group relative block px-2 py-1 text-[#1A1A1A] text-lg font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          @click="menuOpen = false"
        >
          <span class="relative z-10 group-hover:text-[#8A2BE2] Accent"
            >About</span
          >
          <span
            class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
          ></span>
        </router-link>

        <router-link
          to="/contact"
          class="group relative block px-2 py-1 text-[#1A1A1A] text-lg font-semibold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF]"
          @click="menuOpen = false"
        >
          <span class="relative z-10 group-hover:text-[#8A2BE2] Accent"
            >Contact</span
          >
          <span
            class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
          ></span>
        </router-link>
      </div>
    </transition>
  </div>
</template>

<script setup>
import logo from "../assets/GameHaven.png";
import { CgProfile, CgShoppingCart, CgMenu } from "vue-icons-plus/cg";
import { computed, ref } from "vue";
import { useRouter } from "vue-router";
import { currentUser, logoutUser } from "../auth";

const router = useRouter();
const isLoggedIn = computed(() => currentUser.value !== null);
const menuOpen = ref(false);

function logout() {
  logoutUser();
  router.push("/login");
}
</script>

<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}
.slide-enter-from {
  transform: translateX(-100%);
}
.slide-enter-to {
  transform: translateX(0);
}
.slide-leave-from {
  transform: translateX(0);
}
.slide-leave-to {
  transform: translateX(-100%);
}
</style>
