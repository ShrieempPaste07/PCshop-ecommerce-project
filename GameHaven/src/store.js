import { reactive, watch } from "vue";

const cart = reactive({
  items: JSON.parse(localStorage.getItem("cartItems") || "[]"),

  addToCart(product) {
    const existing = cart.items.find((item) => item.id === product.id);
    if (existing) {
      existing.quantity += 1;
    } else {
      cart.items.push({ ...product, quantity: 1 });
    }
  },

  removeFromCart(productId) {
    const index = cart.items.findIndex((item) => item.id === productId);
    if (index !== -1) {
      cart.items.splice(index, 1);
    }
  },

  clearCart() {
    cart.items.length = 0;
  },
});

// Save to localStorage
watch(
  () => cart.items,
  (newVal) => {
    localStorage.setItem("cartItems", JSON.stringify(newVal));
  },
  { deep: true }
);

export default cart;
