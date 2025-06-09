<template>
  <div>
    <Header />
    <div class="min-h-screen bg-[#F8F7FC] p-6">
      <h1 class="text-3xl font-bold mb-4 text-[#1A1A1A] Header">
        🛒 Shopping Cart
      </h1>

      <div v-if="cartItems.length > 0" class="space-y-4">
        <div
          v-for="item in cartItems"
          :key="item.id"
          class="bg-white p-4 rounded shadow flex justify-between items-center"
        >
          <div class="flex gap-4 items-start">
            <img
              :src="item.image"
              class="w-24 h-24 object-cover rounded border border-[#E3E3E3] bg-[#D6C4FF]"
            />
            <div>
              <h2 class="text-xl font-semibold Header text-[#1A1A1A]">
                {{ item.name }}
              </h2>
              <p class="text-[#555555] Description">
                Category: {{ item.category }}
              </p>
              <div class="flex items-center gap-2 mt-1">
                <button
                  @click="decreaseQty(item.id)"
                  class="px-2 py-1 bg-[#ECE7FA] text-[#1A1A1A] rounded hover:bg-[#D6C4FF]"
                >
                  -
                </button>
                <span class="px-2">{{ item.quantity }}</span>
                <button
                  @click="increaseQty(item.id)"
                  class="px-2 py-1 bg-[#ECE7FA] text-[#1A1A1A] rounded hover:bg-[#D6C4FF]"
                >
                  +
                </button>
              </div>
            </div>
          </div>

          <div class="flex items-center gap-4">
            <span class="text-lg font-bold text-[#1a1a1a] Description">
              ${{ (item.price * item.quantity).toFixed(2) }}
            </span>
            <button
              @click="removeFromCart(item.id)"
              class="text-[#FF4C4C] hover:text-[#FF6666] Accent"
            >
              Remove
            </button>
          </div>
        </div>

        <div
          class="text-right mt-6 text-xl font-semibold Description text-[#1a1a1a]"
        >
          Total: ${{ totalPrice.toFixed(2) }}
        </div>
      </div>

      <div v-else>
        <p class="text-[#555555] text-xl Description">Your cart is empty.</p>
      </div>

      <router-link to="/checkout">
        <button
          class="mt-4 px-6 py-2 bg-[#8A2BE2] text-white rounded hover:bg-[#B266FF]"
        >
          Proceed to Checkout
        </button>
      </router-link>
    </div>
    <Footer />
  </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import { computed } from "vue";
import cart from "../store.js";

const cartItems = computed(() => cart.items);

function removeFromCart(productId) {
  cart.removeFromCart(productId);
}

function increaseQty(productId) {
  const item = cart.items.find((i) => i.id === productId);
  if (item) item.quantity++;
}

function decreaseQty(productId) {
  const item = cart.items.find((i) => i.id === productId);
  if (item && item.quantity > 1) {
    item.quantity--;
  } else {
    cart.removeFromCart(productId);
  }
}

const totalPrice = computed(() =>
  cartItems.value.reduce((acc, item) => acc + item.price * item.quantity, 0)
);
</script>
