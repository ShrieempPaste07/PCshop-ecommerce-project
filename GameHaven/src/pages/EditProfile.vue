<template>
  <div class="bg-[#F8F7FC]">
    <Header />

    <div class="max-w-4xl mx-auto p-6 mt-8 bg-[#FFFFFF] rounded-lg shadow">
      <h2 class="text-2xl font-bold mb-4 text-[#1A1A1A] Header">
        Edit Profile
      </h2>
      <form
        @submit.prevent="updateProfile"
        class="grid grid-cols-1 gap-4 md:grid-cols-2"
      >
        <div>
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >First Name</label
          >
          <input v-model="form.firstName" class="input Description" />
        </div>
        <div>
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >Last Name</label
          >
          <input v-model="form.lastName" class="input Description" />
        </div>
        <div>
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >Date of Birth</label
          >
          <input v-model="form.dob" type="date" class="input Description" />
        </div>
        <div>
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >Gender</label
          >
          <select v-model="form.gender" class="input">
            <option class="Description">Male</option>
            <option class="Description">Female</option>
            <option class="Description">Other</option>
          </select>
        </div>
        <div>
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >Phone</label
          >
          <input v-model="form.phone" class="input Description" />
        </div>
        <div>
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >Email</label
          >
          <input v-model="form.email" type="email" class="input Description" />
        </div>
        <div class="md:col-span-2">
          <label class="block mb-1 text-sm font-medium text-[#555555] Header"
            >Bio</label
          >
          <textarea v-model="form.bio" class="input Description"></textarea>
        </div>

        <div class="md:col-span-2 flex justify-end">
          <button
            type="submit"
            class="px-6 py-2 bg-[#8A2BE2] text-white rounded hover:bg-[#B266FF] Accent"
          >
            Save
          </button>
        </div>
      </form>
    </div>

    <Footer />
  </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import { currentUser, authState } from "../auth";
import { reactive } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const form = reactive({ ...currentUser.value });

function updateProfile() {
  const index = authState.users.findIndex(
    (user) => user.username === currentUser.value.username
  );
  if (index !== -1) {
    authState.users[index] = { ...authState.users[index], ...form };
    currentUser.value = authState.users[index];
    localStorage.setItem("users", JSON.stringify(authState.users));
    alert("Profile updated!");
    router.push("/profile");
  }
}
</script>

<style scoped>
.input {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  background-color: #f9fafb;
}
.dark .input {
  background-color: #1f2937;
  color: white;
  border-color: #374151;
}
</style>
