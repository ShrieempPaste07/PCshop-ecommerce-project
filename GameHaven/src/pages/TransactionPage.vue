<template>
  <div>
    <Header />
    <div class="min-h-screen bg-[#F8F7FC] p-6">
      <h1 class="text-3xl font-bold mb-6 text-[#1A1A1A] Header">💳 Checkout</h1>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Customer Details Form -->
        <form
          @submit.prevent="placeOrder"
          class="bg-white p-6 rounded shadow space-y-4"
        >
          <h2 class="text-2xl font-semibold text-[#1A1A1A] Header mb-2">
            Customer Information
          </h2>

          <div>
            <label class="block text-[#555] mb-1">Full Name</label>
            <input
              v-model="form.name"
              required
              type="text"
              class="w-full border border-gray-300 p-2 rounded"
            />
          </div>

          <div>
            <label class="block text-[#555] mb-1">Email</label>
            <input
              v-model="form.email"
              required
              type="email"
              class="w-full border border-gray-300 p-2 rounded"
            />
          </div>

          <div>
            <label class="block text-[#555] mb-1">Address</label>
            <textarea
              v-model="form.address"
              required
              class="w-full border border-gray-300 p-2 rounded"
            ></textarea>
          </div>

          <div>
            <label class="block text-[#555] mb-1">Payment Method</label>
            <select
              v-model="form.payment"
              required
              class="w-full border border-gray-300 p-2 rounded"
            >
              <option disabled value="">Select a payment method</option>
              <option>Credit Card</option>
              <option>GCash</option>
              <option>Cash on Delivery</option>
            </select>
          </div>

          <button
            type="submit"
            class="bg-[#8A2BE2] text-white px-4 py-2 rounded hover:bg-[#B266FF]"
          >
            Place Order
          </button>
        </form>

        <!-- Cart Summary -->
        <div class="bg-white p-6 rounded shadow">
          <h2 class="text-2xl font-semibold mb-4 text-[#1A1A1A] Header">
            🧾 Order Summary
          </h2>

          <div v-if="cartItems.length > 0" class="space-y-4">
            <div
              v-for="item in cartItems"
              :key="item.id"
              class="flex justify-between items-center border-b pb-2"
            >
              <div>
                <h3 class="font-semibold Header">{{ item.name }}</h3>
                <p class="text-sm Description">x{{ item.quantity }}</p>
              </div>
              <div class="font-semibold text-[#1a1a1a]">
                ${{ (item.price * item.quantity).toFixed(2) }}
              </div>
            </div>

            <div class="text-right text-lg font-bold text-[#1a1a1a] mt-4">
              Total: ${{ totalPrice.toFixed(2) }}
            </div>
          </div>

          <div v-else>
            <p class="text-gray-500">Your cart is empty.</p>
          </div>
        </div>
      </div>

      <!-- Confirmation Modal -->
      <transition name="fade">
        <div
          v-if="showConfirmation"
          class="fixed inset-0 z-50 bg-black bg-opacity-40 flex items-center justify-center"
        >
          <div
            class="bg-white rounded-lg shadow p-6 w-full max-w-sm text-center"
          >
            <h2 class="text-xl font-bold text-[#1A1A1A] mb-2">🎉 Thank you!</h2>
            <p class="text-[#555] mb-4">
              Your order has been placed successfully.
            </p>
            <button
              @click="showConfirmation = false"
              class="px-4 py-2 bg-[#8A2BE2] text-white rounded hover:bg-[#B266FF]"
            >
              Close
            </button>
          </div>
        </div>
      </transition>
    </div>
    <Footer />
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import cart from "../store.js";

const form = ref({
  name: "",
  email: "",
  address: "",
  payment: "",
});

const cartItems = computed(() => cart.items);
const totalPrice = computed(() =>
  cartItems.value.reduce((acc, item) => acc + item.price * item.quantity, 0)
);

const showConfirmation = ref(false);

function placeOrder() {
  if (cartItems.value.length === 0) {
    alert("Your cart is empty.");
    return;
  }

  showConfirmation.value = true;
  cart.clearCart();
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
