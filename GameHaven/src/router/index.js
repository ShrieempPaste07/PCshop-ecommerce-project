import { createRouter, createWebHistory } from "vue-router";
import Home from "../pages/HeroPage.vue";
import Login from "../pages/LoginPage.vue";
import Register from "../pages/RegisterPage.vue";
import ProductPage from "../pages/ProductPage.vue";
import CartPage from "../pages/CartPage.vue";
import Contact from "../pages/ContactPage.vue";
import About from "../pages/AboutPage.vue";
import Profile from "../pages/ProfilePage.vue";
import TransactionPage from "../pages/TransactionPage.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/contact",
    name: "Contact",
    component: Contact,
  },
  {
    path: "/products",
    name: "Products",
    component: () => import("../pages/ProductPage.vue"),
  },
  {
    path: "/cart",
    name: "Cart",
    component: CartPage,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/edit-profile",
    name: "EditProfile",
    component: () => import("../pages/EditProfile.vue"),
  },
  {
    path: "/checkout",
    name: "TransactionPage",
    component: () => import("../pages/TransactionPage.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
