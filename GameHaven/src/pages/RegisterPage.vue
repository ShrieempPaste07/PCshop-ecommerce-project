<template>
  <div class="relative min-h-screen w-full overflow-hidden">
    <!-- Background -->
    <video
      autoplay
      muted
      loop
      playsinline
      class="absolute top-0 left-0 w-full h-full object-cover z-0"
    >
      <source src="../assets/videoLogin.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>

    <!-- Form Container -->
    <div
      class="relative z-10 flex items-center justify-center min-h-screen px-4 py-8 sm:px-6 md:px-8"
    >
      <div
        class="bg-white rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-sm sm:max-w-md"
      >
        <h2 class="text-2xl font-bold text-center text-[#1a1a1a] Header mb-6">
          Create an Account
        </h2>

        <form @submit.prevent="handleRegister" novalidate>
          <div class="mb-4">
            <label
              for="username"
              class="block font-semibold mb-2 Header text-[#1a1a1a]"
              >Username</label
            >
            <input
              v-model="username"
              type="text"
              id="username"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B266FF] text-[#555555] Description"
              placeholder="Enter your username"
              required
            />
          </div>

          <div class="mb-4">
            <label
              for="email"
              class="block text-[#1a1a1a] Header font-semibold mb-2"
              >Email</label
            >
            <input
              v-model="email"
              type="email"
              id="email"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B266FF] Description text-[#555555]"
              placeholder="Enter your email"
              required
            />
          </div>

          <div class="mb-4">
            <label
              for="password"
              class="block text-[#1a1a1a] Header font-semibold mb-2"
              >Password</label
            >
            <input
              v-model="password"
              type="password"
              id="password"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B266FF] Description text-[#555555]"
              placeholder="Enter your password"
              required
            />
          </div>

          <div class="mb-4">
            <label
              for="confirm-password"
              class="block text-[#1a1a1a] font-semibold mb-2 Header"
              >Confirm Password</label
            >
            <input
              v-model="confirmPassword"
              type="password"
              id="confirm-password"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B266FF] Description text-[#555555]"
              placeholder="Confirm your password"
              required
            />
          </div>

          <p v-if="errorMsg" class="text-red-500 text-sm mb-4 text-center">
            {{ errorMsg }}
          </p>

          <button
            type="submit"
            class="w-full bg-[#8A2BE2] text-white py-2 rounded-lg font-semibold hover:bg-[#B266FF] focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 Accent text-xl"
          >
            Register
          </button>
        </form>

        <p class="text-center text-[#555555] mt-4 Description">
          Already have an account?
          <router-link
            to="/login"
            class="text-[#8a2be2] font-semibold Accent text-lg"
            >Sign In</router-link
          >
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { registerUser } from "../auth";
import { useRouter } from "vue-router";

const username = ref("");
const email = ref("");
const password = ref("");
const confirmPassword = ref("");
const errorMsg = ref("");
const router = useRouter();

const handleRegister = () => {
  if (password.value !== confirmPassword.value) {
    errorMsg.value = "Passwords do not match";
    return;
  }

  const result = registerUser(username.value, password.value);
  if (result.success) {
    router.push("/");
  } else {
    errorMsg.value = result.message;
  }
};
</script>
