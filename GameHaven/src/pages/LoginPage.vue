<template>
  <div class="relative h-screen w-screen overflow-hidden">
    <!-- Background -->
    <video
      class="absolute top-0 left-0 w-full h-full object-cover z-0"
      src="../assets/videoLogin.mp4"
      autoplay
      loop
      muted
      playsinline
    ></video>

    <div class="relative z-10 flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-lg shadow-lg p-12 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-[#1A1A1A] mb-6 Header">
          Login to your Account
        </h2>

        <form @submit.prevent="handleLogin">
          <!-- Username Field -->
          <div class="mb-4">
            <label
              for="username"
              class="block text-[#1A1A1A] font-semibold mb-2 Header"
              >Username</label
            >
            <input
              v-model="username"
              type="text"
              id="username"
              :class="[
                'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 Description text-[#555555]',
                loginAttempted && !username
                  ? 'border-red-500 focus:ring-red-400'
                  : 'focus:ring-[#B266FF]',
              ]"
              placeholder="Enter your username"
            />
            <p
              v-if="loginAttempted && !username"
              class="text-red-500 text-sm mt-2 Description"
            >
              Username is required.
            </p>
          </div>

          <!-- Password Field -->
          <div class="mb-4">
            <label
              for="password"
              class="block text-[#1A1A1A] font-semibold mb-2 Header"
              >Password</label
            >
            <input
              v-model="password"
              type="password"
              id="password"
              :class="[
                'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 Description text-[#555555]',
                loginAttempted && !password
                  ? 'border-red-500 focus:ring-red-400'
                  : 'focus:ring-[#B266FF]',
              ]"
              placeholder="Enter your password"
            />
            <p
              v-if="loginAttempted && !password"
              class="text-red-500 text-sm mt-2 Description"
            >
              Password is required.
            </p>
          </div>

          <p
            v-if="errorMsg"
            class="text-red-500 text-sm mb-4 text-center Description"
          >
            {{ errorMsg }}
          </p>

          <button
            type="submit"
            class="w-full bg-[#8A2BE2] text-white py-2 rounded-lg font-semibold hover:bg-[#B266FF] focus:outline-none focus:ring-2 focus:ring-[#8A2BE2] focus:ring-opacity-50 Accent text-xl"
          >
            Login
          </button>
        </form>

        <p class="text-center text-[#555555] mt-4 Description">
          Don't have an account?
          <router-link
            to="/register"
            class="text-[#8A2BE2] text-lg font-semibold Accent"
            >Sign up</router-link
          >
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { loginUser } from "../auth";

const router = useRouter();
const username = ref("");
const password = ref("");
const errorMsg = ref("");
const loginAttempted = ref(false);

const handleLogin = () => {
  loginAttempted.value = true;

  if (!username.value || !password.value) {
    errorMsg.value = "";
    return;
  }

  const result = loginUser(username.value, password.value);

  if (result.success) {
    errorMsg.value = "";
    router.push("/");
  } else {
    errorMsg.value = result.message || "Login failed.";
  }
};
</script>
