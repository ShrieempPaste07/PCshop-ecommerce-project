<template>
  <div class="min-h-screen overflow-hidden relative">
    <Header />

    <section
      class="bg-[#F8F7FC] py-12 lg:min-h-screen lg:flex lg:items-center relative"
    >
      <div
        :class="[
          'absolute inset-0 z-10 transition-all duration-300',
          showModal ? 'backdrop-blur-sm' : '',
        ]"
      ></div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-20">
        <div class="lg:text-center mb-12">
          <h2
            class="font-heading mb-4 bg-[#D6C4FF] px-4 py-2 rounded-lg md:w-64 md:mx-auto text-xs font-semibold tracking-widest text-[#1A1A1A] uppercase Description"
          >
            Why choose us?
          </h2>
          <p
            class="font-heading mt-2 text-3xl leading-8 font-semibold tracking-tight text-[#1A1A1A] sm:text-4xl Header"
          >
            We Know Tech, We Know Gaming. We are
            <span class="Title text-[#6A0DAD]">GameHaven</span>.
          </p>
          <p
            class="mt-4 max-w-2xl text-lg text-[#555555] lg:mx-auto Description"
          >
            Our store ensures that your PC will be upgraded for every purchase
            of Computer Accessories. Your PC's best Companion.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-14">
          <TransitionGroup name="feature" tag="dl" class="contents">
            <div
              v-for="(feature, index) in features"
              :key="feature.title"
              @click="openModal(index)"
              class="relative group transition-all duration-500 cursor-pointer"
            >
              <div
                :class="[
                  'bg-white p-6 rounded-xl border border-[#E3E3E3] shadow transition-all duration-500',
                  showModal && activeIndex === index
                    ? 'scale-[1.05] shadow-2xl z-30 relative'
                    : '',
                ]"
              >
                <dt class="flex items-start">
                  <div class="flex-shrink-0">
                    <div
                      class="flex items-center justify-center h-14 w-14 rounded-md bg-[#B266FF] text-white"
                    >
                      <img :src="feature.icon" class="h-7 w-7" />
                    </div>
                  </div>
                  <p
                    class="ml-4 text-xl font-bold text-[#1A1A1A] font-heading Header"
                  >
                    {{ feature.title }}
                  </p>
                </dt>

                <dd
                  v-if="showModal && activeIndex === index"
                  class="mt-4 ml-0 text-base text-[#555555] transition-all duration-500 Description"
                >
                  {{ feature.description }}
                  <button
                    class="mt-4 text-[#B266FF] hover:underline font-semibold text-sm Header"
                    @click.stop="closeModal"
                  >
                    Close
                  </button>
                </dd>

                <dd
                  v-else
                  class="mt-2 ml-16 text-base text-gray-500 transition-all duration-300 Description"
                >
                  {{ feature.short }}
                </dd>
              </div>
            </div>
          </TransitionGroup>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script setup>
import { ref } from "vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";

const showModal = ref(false);
const activeIndex = ref(null);

const openModal = (index) => {
  if (showModal.value && activeIndex.value === index) {
    closeModal();
  } else {
    activeIndex.value = index;
    showModal.value = true;
  }
};

const closeModal = () => {
  showModal.value = false;
  activeIndex.value = null;
};

const features = [
  {
    title: "Expert Support & Advice",
    icon: "https://www.svgrepo.com/show/293136/customer-service-headphones.svg",
    short: "Helping you choose the perfect gear.",
    description:
      "Our knowledgeable team is ready to assist you with personalized recommendations, ensuring you get the accessories that fit your needs.",
  },
  {
    title: "Premium Quality Accessories",
    icon: "https://www.svgrepo.com/show/504045/technology-pc-computer-microchip-processor-chipset.svg",
    short: "Top-tier gear built to last and perform.",
    description:
      "Discover high-quality PC accessories designed for durability and peak gaming performance. Upgrade your setup with trusted, reliable products.",
  },
  {
    title: "Save More, Game Better",
    icon: "https://www.svgrepo.com/show/447771/savings-dollar.svg",
    short: "Affordable prices without compromising quality.",
    description:
      "Get the best value with our competitively priced accessories. Smart savings that help you invest in your gaming experience without breaking the bank.",
  },
  {
    title: "Easy Shopping Experience",
    icon: "https://www.svgrepo.com/show/521847/shopping-cart.svg",
    short: "Simple, fast, and secure checkout.",
    description:
      "Enjoy a hassle-free shopping experience with easy navigation, secure payment options, and fast delivery right to your door.",
  },
];
</script>

<style scoped>
.feature-enter-active,
.feature-leave-active {
  transition: all 0.3s ease;
}
.feature-enter-from {
  opacity: 0;
  transform: scale(0.95);
}
.feature-leave-to {
  opacity: 0;
  transform: scale(0.95);
}
</style>
