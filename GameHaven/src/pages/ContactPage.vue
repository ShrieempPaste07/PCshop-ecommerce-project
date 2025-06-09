<template>
  <div>
    <Header />

    <section class="bg-[#F8F7FC]" id="contact">
      <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mb-4">
          <div
            class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12"
          >
            <p
              class="text-base font-semibold uppercase tracking-wide text-[#8A2BE2] Description"
            >
              Contact
            </p>
            <h2
              class="font-heading mb-4 font-bold tracking-tight text-[#1A1A1A] text-3xl sm:text-5xl Header"
            >
              Get in Touch
            </h2>
            <p
              class="mx-auto mt-4 max-w-3xl text-xl text-[#555555] Description"
            >
              Have a Problem? Contact us with one Click!
            </p>
          </div>
        </div>

        <div class="flex items-stretch justify-center">
          <div class="grid md:grid-cols-2">
            <!-- Contact Info -->
            <div class="h-full pr-6">
              <p class="mt-3 mb-12 text-lg text-[#555555] Description">
                <span class="text-2xl text-[#1A1A1A] font-semibold Header"
                  >Let’s connect.</span
                ><br />
                Have a question, inquiry, or feedback? We’re here during
                business hours and ready to assist you.
              </p>
              <ul class="mb-6 md:mb-0">
                <li class="flex">
                  <div
                    class="flex h-10 w-10 items-center justify-center rounded bg-[#D6C4FF]"
                  >
                    <img
                      src="https://www.svgrepo.com/show/493957/address.svg"
                      class="h-6 w-6"
                    />
                  </div>
                  <div class="ml-4 mb-4">
                    <h3
                      class="mb-2 text-lg font-medium leading-6 text-[#1A1A1A] Header"
                    >
                      Our Address
                    </h3>
                    <p class="text-[#555555] Description">Tanza, Cavite 4108</p>
                    <p class="text-[#555555] Description">
                      Cavite, Philippines
                    </p>
                  </div>
                </li>
                <li class="flex">
                  <div
                    class="flex h-10 w-10 items-center justify-center rounded bg-[#D6C4FF]"
                  >
                    <img
                      src="https://www.svgrepo.com/show/412353/contact.svg"
                      class="h-6 w-6"
                    />
                  </div>
                  <div class="ml-4 mb-4">
                    <h3
                      class="mb-2 text-lg font-medium leading-6 text-[#1A1A1A] Header"
                    >
                      Contact
                    </h3>
                    <p class="text-[#555555] Description">
                      Mobile: +63 936-626-3915
                    </p>
                    <p class="text-[#555555] Description">
                      Email: gamehaven@gmail.com
                    </p>
                  </div>
                </li>
                <li class="flex">
                  <div
                    class="flex h-10 w-10 items-center justify-center rounded bg-[#D6C4FF]"
                  >
                    <img
                      src="https://www.svgrepo.com/show/532122/clock-three.svg"
                      class="h-6 w-6"
                    />
                  </div>
                  <div class="ml-4 mb-4">
                    <h3
                      class="mb-2 text-lg font-medium leading-6 text-[#1A1A1A] Header"
                    >
                      Working hours
                    </h3>
                    <p class="text-[#555555] Description">
                      Monday - Friday: 08:00 - 17:00
                    </p>
                    <p class="text-[#555555] Description">
                      Saturday & Sunday: 08:00 - 12:00
                    </p>
                  </div>
                </li>
              </ul>
            </div>

            <!-- Contact Form -->
            <div
              class="card h-fit max-w-6xl p-5 md:p-12 bg-white border-[#E3E3E3] shadow-[0_4px_6px_rgba(0,0,0,0.05)] rounded-xl"
            >
              <h2 class="mb-4 text-2xl font-bold text-[#1A1A1A] Header">
                Ready to Get Started?
              </h2>
              <form @submit.prevent="handleSubmit">
                <div class="mb-6">
                  <div class="mb-4">
                    <input
                      v-model="name"
                      type="text"
                      placeholder="Your name"
                      required
                      class="Description mb-2 w-full rounded-md border border-[#E3E3E3] py-2 px-3 shadow-md text-[#555555] bg-[#D6C4FF]"
                    />
                  </div>
                  <div class="mb-4">
                    <input
                      v-model="email"
                      type="email"
                      placeholder="Your email address"
                      required
                      class="Description mb-2 w-full rounded-md border border-[#E3E3E3] py-2 px-3 shadow-md text-[#555555] bg-[#D6C4FF]"
                    />
                  </div>
                  <div class="mb-4">
                    <textarea
                      v-model="message"
                      placeholder="Write your message..."
                      rows="5"
                      required
                      class="Description mb-2 w-full rounded-md border border-[#E3E3E3] py-2 px-3 shadow-md text-[#555555] bg-[#D6C4FF]"
                    ></textarea>
                  </div>
                </div>
                <div class="text-center">
                  <button
                    type="submit"
                    class="Accent w-full bg-[#8A2BE2] text-white px-6 py-3 font-xl rounded-md font-bold text-lg"
                  >
                    Send Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div
      v-if="showModal"
      class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm bg-black/30 animate-fade-in"
    >
      <div
        class="bg-white p-6 rounded-lg shadow-lg w-[90%] max-w-md transform transition-all duration-300 scale-100 opacity-100"
      >
        <h2 class="text-xl font-bold mb-4 text-[#1A1A1A]">Message Sent!</h2>
        <p class="mb-2 text-[#555555]">
          Thank you, <span class="font-semibold">{{ nameBackup }}</span
          >!
        </p>
        <p class="mb-2 text-[#555555]">We’ve received your message:</p>
        <p class="italic text-[#333] mb-4 border-l-4 border-[#8A2BE2] pl-4">
          {{ messageBackup }}
        </p>
        <p class="text-[#555555]">
          We’ll get back to you at
          <span class="font-semibold">{{ emailBackup }}</span
          >.
        </p>
        <div class="text-right mt-6">
          <button
            @click="showModal = false"
            class="px-4 py-2 bg-[#8A2BE2] text-white rounded-md font-bold"
          >
            Close
          </button>
        </div>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script setup>
import { ref } from "vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";

const name = ref("");
const email = ref("");
const message = ref("");

const showModal = ref(false);
const nameBackup = ref("");
const emailBackup = ref("");
const messageBackup = ref("");

const handleSubmit = () => {
  nameBackup.value = name.value;
  emailBackup.value = email.value;
  messageBackup.value = message.value;
  showModal.value = true;

  name.value = "";
  email.value = "";
  message.value = "";
};
</script>

<style>
@layer utilities {
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: scale(0.95);
    }

    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
  }
}
</style>
