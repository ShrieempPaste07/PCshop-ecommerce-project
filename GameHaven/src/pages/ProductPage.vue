<template>
  <div>
    <Header />
    <div id="container" class="min-h-screen w-full bg-[#ECE7FA]">
      <div class="grid lg:grid-cols-4">
        <!-- Sidebar -->
        <div class="hidden lg:block bg-[#ECE7FA] p-6">
          <h2 class="font-bold text-xl mb-4 text-center text-[#1A1A1A] Header">
            Pick by Categories
          </h2>
          <div class="flex flex-col gap-2">
            <button
              @click="selectedCategory = 'All'"
              class="group relative px-2 py-1 text-2xl text-[#1A1A1A] font-bold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF] Accent"
            >
              <span
                class="relative z-10"
                :class="
                  selectedCategory === 'All'
                    ? 'text-[#8A2BE2]'
                    : 'group-hover:text-[#B266FF]'
                "
              >
                All
              </span>
              <span
                class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
                :class="selectedCategory === 'All' ? 'scale-x-100' : ''"
              ></span>
            </button>

            <button
              v-for="cat in allCategories"
              :key="cat"
              @click="selectedCategory = cat"
              class="group relative px-2 py-1 text-2xl text-[#1A1A1A] font-bold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF] Accent"
            >
              <span
                class="relative z-10"
                :class="
                  selectedCategory === cat
                    ? 'text-[#8A2BE2]'
                    : 'group-hover:text-[#B266FF]'
                "
              >
                {{ cat }}
              </span>
              <span
                class="absolute bottom-0 left-0 w-full h-[2px] bg-[#B266FF] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left z-0"
                :class="selectedCategory === cat ? 'scale-x-100' : ''"
              ></span>
            </button>
          </div>
        </div>

        <!-- Main Content -->
        <div class="bg-[#F8F7FC] p-6 col-span-3 min-h-screen">
          <h3 class="font-semibold text-sm text-[#555555] Description">
            Search by
          </h3>
          <h2 class="text-2xl font-bold mb-2 Header text-[#1a1a1a]">
            {{ selectedCategory }}
          </h2>
          <p class="mb-4 Description text-[#1a1a1a]">
            Explore our exclusive products!
          </p>

          <div class="hidden lg:hidden md:flex flex-wrap gap-2 mb-6">
            <button
              @click="selectedCategory = 'All'"
              :class="[
                'py-2 px-4 rounded hover:bg-[#D6C4FF]',
                selectedCategory === 'All'
                  ? 'bg-[bg-[#D6C4FF]] text-white'
                  : 'bg-[#F8F7FC] text-white Header',
              ]"
            >
              All
            </button>
            <button
              v-for="cat in allCategories"
              :key="cat"
              @click="selectedCategory = cat"
              :class="[
                'py-2 px-4 rounded hover:bg-[#B266FF]',
                selectedCategory === cat
                  ? 'bg-[#8A2BE2] text-white'
                  : 'bg-[#8A2BE2] text-white Header',
              ]"
            >
              {{ cat }}
            </button>
          </div>

          <!-- Dropdown -->
          <div class="lg:hidden md:hidden mb-6">
            <select
              v-model="selectedCategory"
              class="w-full p-2 rounded border border-[#E3E3E3] Accent"
            >
              <option class="Accent">All</option>
              <option v-for="cat in allCategories" :key="cat" class="Accent">
                {{ cat }}
              </option>
            </select>
          </div>

          <!-- Product Cards -->
          <div id="product_cards" class="space-y-6">
            <div v-for="category in filteredCategories" :key="category">
              <h3 class="text-lg font-bold mb-2 Header">{{ category }}</h3>
              <transition-group
                name="fade-slide"
                tag="div"
                class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"
              >
                <div
                  v-for="item in filteredItemsByCategory(category)"
                  :key="item.id"
                  class="group bg-white rounded-lg shadow p-3 flex flex-col h-[320px] cursor-pointer hover:shadow-lg transition"
                  @click="openModal(item)"
                >
                  <div
                    class="w-full h-[55%] rounded mb-2 bg-[#D6C4FF] flex items-center justify-center overflow-hidden transition-colors duration-500 group-hover:bg-gradient-to-br group-hover:from-[#B39DDB] group-hover:to-[#6A4C93]"
                  >
                    <img
                      :src="item.image"
                      :alt="item.name"
                      class="w-full h-full object-cover rounded transition-transform duration-300 group-hover:scale-105"
                    />
                  </div>

                  <h1 class="font-semibold text-base mb-1 Header">
                    {{ item.name }}
                  </h1>
                  <p
                    class="text-sm text-[#555555] mb-2 line-clamp-2 Description"
                  >
                    {{ item.subDesc }}
                  </p>
                  <div class="flex items-center justify-between mt-auto">
                    <div class="text-base font-semibold text-[#1a1a1a] Header">
                      ${{ item.price }}
                    </div>
                    <button
                      class="text-lg px-2 py-1 bg-[#8A2BE2] text-white rounded hover:bg-[#B266FF] Accent"
                      @click.stop="addProductToCard(item)"
                    >
                      <CgShoppingCart />
                    </button>
                  </div>
                </div>
              </transition-group>
            </div>
          </div>
        </div>

        <!-- Product Modal -->
        <transition name="modal-fade">
          <div
            v-if="showModal"
            class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm bg-black/10"
            @click.self="closeModal"
          >
            <div
              class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative"
            >
              <button
                class="absolute top-2 right-2 text-gray-600 hover:text-black"
                @click="closeModal"
              >
                ×
              </button>
              <img
                :src="selectedProduct.image"
                :alt="selectedProduct.name"
                class="w-full h-72 object-cover rounded mb-4 bg-[#D6C4FF]"
              />
              <h2 class="text-xl font-bold mb-2 Header">
                {{ selectedProduct.name }}
              </h2>
              <p class="text-sm text-gray-600 mb-2 Header">
                Category: {{ selectedProduct.category }}
              </p>
              <p class="mb-4 text-[#555555] Description">
                {{ selectedProduct.fulldesc }}
              </p>

              <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-800 Header"
                  >${{ selectedProduct.price }}</span
                >
                <div class="flex gap-2">
                  <button
                    @click="addProductToCard(selectedProduct)"
                    class="px-4 py-2 bg-[#8A2BE2] text-white rounded hover:bg-[#B266FF] Accent font-semibold"
                  >
                    Add to Cart
                  </button>
                  <router-link
                    to="/checkout"
                    @click="addProductToCard(selectedProduct)"
                    class="px-4 py-2 bg-[#FF4C4C] text-white rounded hover:bg-[#FF6666] Accent font-semibold"
                  >
                    Buy Now
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";

import cart from "../store.js";
import { CgShoppingCart } from "vue-icons-plus/cg";

import mouse1 from "../assets/mouse1.png";
import mouse2 from "../assets/mouse2.png";
import mouse3 from "../assets/mouse3.png";
import mouse4 from "../assets/mouse4.png";
import mouse5 from "../assets/mouse5.png";

import keyboard1 from "../assets/keyb1.png";
import keyboard2 from "../assets/keyb2.png";
import keyboard3 from "../assets/keyb3.png";
import keyboard4 from "../assets/keyb4.png";
import keyboard5 from "../assets/keyb5.png";

import headset1 from "../assets/head1.png";
import headset2 from "../assets/head2.png";
import headset3 from "../assets/head3.png";
import headset4 from "../assets/head4.png";
import headset5 from "../assets/head5.png";

import speaker1 from "../assets/speak1.png";
import speaker2 from "../assets/speak2.png";
import speaker3 from "../assets/speak3.png";
import speaker4 from "../assets/speak4.png";
import speaker5 from "../assets/speak5.png";

import chair1 from "../assets/chair1.png";
import chair2 from "../assets/chair3.png";
import chair3 from "../assets/chair2.png";
import chair4 from "../assets/chair4.png";
import chair5 from "../assets/chair5.png";

const allCategories = ["Mouse", "Keyboard", "Headset", "Speaker", "Chair"];
const selectedCategory = ref("All");
const showModal = ref(false);
const selectedProduct = ref(null);

const items = ref([
  {
    id: 1,
    name: "GameHaven Gigabot Fiery 9 Tri-Mode",
    subDesc: "Tri-Mode mouse for conveniency, good for gaming and work.",
    fulldesc:
      "This mouse offers 3 types of connection - Wired, 2.5Hz, or Bluetooth that is good for both gaming and work and very convenient to bring.",
    category: "Mouse",
    image: mouse1,
    price: 799,
  },
  {
    id: 2,
    name: "GameHaven WiredFire GlareX Gaming Mouse",
    subDesc: "Gaming mouse that can statisfy your aesthetic.",
    fulldesc:
      "WiredFire GlareX Gaming Mouse is perfectly fit to any type of computers and laptop with its user-defineable RGB Lighting and performance.",
    category: "Mouse",
    image: mouse2,
    price: 1299,
  },
  {
    id: 3,
    name: "GameHaven WiredFire Glare Wired",
    subDesc: "Gaming Mouse with high refresh rate.",
    fulldesc:
      "A lightweight and compact mouse ideal for gaming FPS, MOBA and other genre. It features wired connectivity and precise tracking.",
    category: "Mouse",
    image: mouse3,
    price: 699,
  },
  {
    id: 4,
    name: "GameHaven GigaHaven 4",
    subDesc: "Lightweight gaming mouse with accurate precision tracking.",
    fulldesc:
      "Lightiest mouse ever designed to fullfile accurate precision good for FPS games.",
    category: "Mouse",
    image: mouse4,
    price: 999,
  },
  {
    id: 5,
    name: "GameHaven Heaven",
    subDesc: "Wireless Mouse that is good for work.",
    fulldesc:
      "Designed for comfort, this mouse reduces wrist strain that is good for being productive in work.",
    category: "Mouse",
    image: mouse5,
    price: 1099,
  },

  {
    id: 6,
    name: "GameHavenGameKeys ClickX Linear",
    subDesc: "Mechanical Keyboard with Brown Linear Switches",
    fulldesc:
      "A mechanical keyboard with linear switches to maximize return rate for gaming.",
    category: "Keyboard",
    image: keyboard1,
    price: 2599,
  },
  {
    id: 7,
    name: "GameHaven GameKeys TypeX",
    subDesc: "Mechanical Keyboard with Blue Tactile Switches",
    fulldesc:
      "Minimalist wireless keyboard with blue tactile switches for typing enthusiasts. Ideal for modern workspaces.",
    category: "Keyboard",
    image: keyboard2,
    price: 1399,
  },
  {
    id: 8,
    name: "GameHaven GameKeys Triad",
    subDesc: "Gaming Keybaord with Tri-Mode Connection",
    fulldesc:
      "Gaming keyboard equipped with macro keys, RGB backlighting, t  ri-mode connection, anti-ghosting technology.",
    category: "Keyboard",
    image: keyboard3,
    price: 2999,
  },
  {
    id: 9,
    name: "GameHaven GameKeys ClickT 60%",
    subDesc: "GameKeys family with tactile switches for typing enthusiasts",
    fulldesc:
      "A compact 60% mechanical keyboard ideal for minimal setups and portability without sacrificing performance.",
    category: "Keyboard",
    image: keyboard4,
    price: 1999,
  },
  {
    id: 10,
    name: "GameHaven GameKeys Click+ Pro",
    subDesc: "100% Keyboard with Tri-Mode Connection and Linear Switches",
    fulldesc:
      "Ergonomically designed keyboard that enhances quality, endurance, and aesthetic with its Yellow Tactile Switch.",
    category: "Keyboard",
    image: keyboard5,
    price: 2799,
  },

  {
    id: 11,
    name: "GameHaven Cypher V3",
    subDesc: "Wireless gaming headset",
    fulldesc:
      "Immersive wireless headset with surround sound, noise-canceling mic, and RGB lighting.",
    category: "Headset",
    image: headset1,
    price: 3199,
  },
  {
    id: 12,
    name: "GameHaven Cypher v4 Plus",
    subDesc: "Noise-cancelling headset",
    fulldesc:
      "Over-ear headset with active noise cancellation, deep bass, and crystal-clear audio quality.",
    category: "Headset",
    image: headset2,
    price: 3499,
  },
  {
    id: 13,
    name: "GameHaven CypherX Pro",
    subDesc: "Bluetooth office headset",
    fulldesc:
      "Professional Bluetooth headset designed for calls, featuring a boom mic and long battery life.",
    category: "Headset",
    image: headset3,
    price: 2799,
  },
  {
    id: 14,
    name: "GameHaven CypherX",
    subDesc: "Wired stereo headset",
    fulldesc:
      "Comfortable wired headset with stereo sound, adjustable headband, and inline volume control.",
    category: "Headset",
    image: headset4,
    price: 1099,
  },
  {
    id: 15,
    name: "GameHaven Cypher Alpha",
    subDesc: "Lightweight travel headset",
    fulldesc:
      "Compact and foldable headset ideal for travel, with soft ear cushions and balanced sound.",
    category: "Headset",
    image: headset5,
    price: 1299,
  },

  {
    id: 16,
    name: "GameHaven LoudWave Plus",
    subDesc: "Bluetooth speaker",
    fulldesc:
      "Portable Bluetooth speaker with deep bass, long battery life, and water-resistant design.",
    category: "Speaker",
    image: speaker1,
    price: 1999,
  },
  {
    id: 17,
    name: "GameHaven Thunder Mini",
    subDesc: "Gaming soundbar",
    fulldesc:
      "Immersive gaming soundbar with surround sound simulation, RGB lights, and compact design.",
    category: "Speaker",
    image: speaker2,
    price: 2499,
  },
  {
    id: 18,
    name: "GameHaven Thunder",
    subDesc: "Smart home speaker",
    fulldesc:
      "Voice assistant-enabled smart speaker with premium sound and smart home integration.",
    category: "Speaker",
    image: speaker3,
    price: 3999,
  },
  {
    id: 19,
    name: "GameHaven LoudWave",
    subDesc: "USB desktop speaker",
    fulldesc:
      "Plug-and-play USB speaker for desktops with clear sound and volume control knob.",
    category: "Speaker",
    image: speaker4,
    price: 999,
  },
  {
    id: 20,
    name: "GameHaven LoudSnore",
    subDesc: "Dual bass speaker",
    fulldesc:
      "Compact speaker with dual passive radiators for enhanced bass and vibrant audio.",
    category: "Speaker",
    image: speaker5,
    price: 1599,
  },

  {
    id: 21,
    name: "GameHaven Bison V3 Pro",
    subDesc: "Ergonomic office chair",
    fulldesc:
      "Adjustable ergonomic chair with lumbar support, breathable mesh back, and smooth-rolling wheels.",
    category: "Chair",
    image: chair1,
    price: 5999,
  },
  {
    id: 22,
    name: "GameHaven Black Bull ",
    subDesc: "Gaming chair with recline",
    fulldesc:
      "Stylish gaming chair with adjustable armrests, headrest, and full reclining capability.",
    category: "Chair",
    image: chair2,
    price: 7499,
  },
  {
    id: 23,
    name: "GameHaven Bison V4",
    subDesc: "Mesh task chair",
    fulldesc:
      "Comfortable mesh chair ideal for long working hours with tilt and height adjustment.",
    category: "Chair",
    image: chair3,
    price: 4499,
  },
  {
    id: 24,
    name: "GameHaven Black Bull Enhanced",
    subDesc: "Executive leather chair",
    fulldesc:
      "Premium leather executive chair with padded seating, adjustable features, and classic design.",
    category: "Chair",
    image: chair4,
    price: 8999,
  },
  {
    id: 25,
    name: "GameHaven Bison V3",
    subDesc: "Budget swivel chair",
    fulldesc:
      "Affordable swivel chair with adjustable height and cushioned seat for everyday use.",
    category: "Chair",
    image: chair5,
    price: 2999,
  },
]);

const filteredCategories = computed(() => {
  if (selectedCategory.value === "All") {
    return [...new Set(items.value.map((i) => i.category))];
  } else {
    return [selectedCategory.value];
  }
});

const filteredItemsByCategory = (category) => {
  return items.value.filter((item) => item.category === category);
};

const openModal = (product) => {
  selectedProduct.value = product;
  showModal.value = true;
};
const closeModal = () => {
  showModal.value = false;
  selectedProduct.value = null;
};

//Add To Cart Function
const addProductToCard = (product) => {
  cart.addToCart(product);
};
</script>
<style scoped>
.fade-slide-enter-active,
.fade-slide-leave-active {
  transition: all 0.4s ease;
}
.fade-slide-enter-from {
  opacity: 0;
  transform: translateY(20px);
}
.fade-slide-enter-to {
  opacity: 1;
  transform: translateY(0);
}
.fade-slide-leave-from {
  opacity: 1;
  transform: translateY(0);
}
.fade-slide-leave-to {
  opacity: 0;
  transform: translateY(20px);
}

/* Optional modal fade (if you want smooth modal fade) */
.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.3s ease;
}
.modal-fade-enter-from,
.modal-fade-leave-to {
  opacity: 0;
}
.modal-fade-enter-to,
.modal-fade-leave-from {
  opacity: 1;
}
</style>
