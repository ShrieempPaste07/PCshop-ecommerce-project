<template>
  <div class="bg-[#F8F7FC]">
    <Header />
    <div id="hero-page">
      <!-- HERO SECTION -->
      <section class="relative h-[80vh] w-full overflow-hidden">
        <video
          autoplay
          muted
          loop
          playsinline
          class="absolute top-0 left-0 w-full h-full object-cover"
        >
          <source
            src="../assets/smHero.mp4"
            type="video/mp4"
            media="(max-width: 639px)"
          />
          <source
            src="../assets/mdHero.mp4"
            type="video/mp4"
            media="(max-width: 1023px)"
          />
          <source
            src="../assets/lgHero.mp4"
            type="video/mp4"
            media="(max-width: 1535px)"
          />
          <source src="../assets/xlHero.mp4" type="video/mp4" />
          Your browser does not support the video tag.
        </video>

        <div
          class="flex flex-col items-center justify-center h-full text-white text-center px-4 z-50 relative"
        >
          <h1 class="text-3xl sm:text-7xl lg:text-8xl font-bold Header">
            Welcome to
            <span
              class="Title text-[#843ED2]"
              style="-webkit-text-stroke: 3px silver"
              >GameHaven</span
            >
          </h1>
          <p class="mt-4 text-4xl font-semibold sm:text-2xl Description">
            Precision Gear For Serious play.
          </p>
          <br />

          <!-- Button -->
          <div class="relative inline-flex group">
            <div
              class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt"
            ></div>
            <a
              href="#Explore"
              title="Get quote now"
              class="relative inline-flex items-center justify-center px-8 py-4 text-xl font-bold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 Accent"
              role="button"
              >Get it now
            </a>
          </div>
        </div>
      </section>
      <br />
      <h1 class="text-2xl text-center font-semibold Header">
        Shop by Categories
      </h1>
      <br />
      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"
      >
        <!-- First 3 cards -->
        <router-link
          to="/products"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:h-44 md:h-70 lg:h-70 lg:ml-4 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10 text-[#1a1a1a] md:pt-10 sm:pt-17"
        >
          Gaming Mouse
          <div class="flex justify-center items-center">
            <img
              src="../assets/mouse1.png"
              class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
            />
          </div>
        </router-link>
        <router-link
          to="/products"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:h-44 md:h-70 lg:h-70 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10 text-[#1a1a1a] md:pt-10 sm:pt-17"
        >
          Gaming Keyboards
          <div class="flex justify-center items-center">
            <img
              src="../assets/keyb1.png"
              class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
            />
          </div>
        </router-link>

        <router-link
          to="/products"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:h-44 md:h-70 lg:h-70 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10 text-[#1a1a1a] md:pt-10 sm:pt-17"
        >
          Gaming Headset
          <div class="flex justify-center items-center">
            <img
              src="../assets/head1.png"
              class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
            />
          </div>
        </router-link>

        <!-- SM Breakpoint-->
        <router-link
          to="/products"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:h-44 md:hidden lg:hidden Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10 text-[#1a1a1a] md:pt-10 sm:pt-17"
          >Gaming Chair</router-link
        >

        <router-link
          to="/products"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:col-span-2 md:hidden lg:hidden Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10 md:pt-10 text-[#1a1a1a] sm:pt-13"
          >Gaming Speakers</router-link
        >

        <!-- MD BP -->
        <div
          class="hidden md:flex md:col-span-3 lg:hidden justify-center gap-4"
        >
          <router-link
            to="/products"
            class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-70 w-full md:w-80 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10"
            >Gaming Chair
            <div class="flex justify-center items-center">
              <img
                src="../assets/chair3.png"
                class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
              />
            </div>
          </router-link>
          <router-link
            to="/products"
            class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-70 w-full md:w-80 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10"
            >Gaming Speakers
            <div class="flex justify-center items-center">
              <img
                src="../assets/speak4.png"
                class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
              />
            </div>
          </router-link>
        </div>

        <!-- LG BP -->
        <router-link
          to="/products"
          class="hidden lg:block bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:h-44 md:h-70 lg:h-70 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10"
        >
          Gaming Chair
          <div class="flex justify-center items-center">
            <img
              src="../assets/chair3.png"
              class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
            />
          </div>
        </router-link>
        <router-link
          to="/products"
          class="hidden lg:block bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-36 sm:h-44 md:h-70 lg:h-70 lg:mr-4 Accent text-center text-4xl font-semibold hover:text-[#555555] pt-10"
        >
          Gaming Speakers
          <div class="flex justify-center items-center">
            <img
              src="../assets/speak4.png"
              class="w-[75%] h-[75%] transition-transform duration-300 hover:scale-105 hidden md:block"
            />
          </div>
        </router-link>
      </div>
    </div>
    <br />
    <div>
      <h1 class="text-2xl text-center font-semibold Header" id="Explore">
        Explore GameHaven
      </h1>
      <br />
      <div
        class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 2xl:grid-cols-3 gap-4"
      >
        <router-link
          to="/about"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-44 sm:h-56 md:h-70 lg:h-70 lg:ml-4 Accent hover:text-[#555555] pt-7 text-center font-bold text-[#1a1a1a] text-4xl"
        >
          About GameHaven!
          <div class="flex justify-center items-center">
            <img
              src="../assets/about.png"
              class="w-[45%] h-[35%] lg:w-[45%] lg:h-[35%] md:w-[25%] md:h-[20%] sm:h-[15%] sm:w-[20%] transition-transform duration-300 hover:scale-105 hidden sm:block"
            />
          </div>
        </router-link>
        <router-link
          to="/products"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-44 sm:h-56 md:h-70 lg:h-70 lg:mx-1 Accent hover:text-[#555555] pt-7 text-center font-bold text-[#1a1a1a] text-4xl"
        >
          Browse our products!
          <div class="flex justify-center items-center">
            <img
              src="../assets/product.png"
              class="w-[450%] h-[35%] lg:w-[45%] lg:h-[35%] md:w-[25%] md:h-[20%] sm:h-[15%] sm:w-[20%] transition-transform duration-300 hover:scale-105 hidden sm:block"
            />
          </div>
        </router-link>
        <router-link
          to="/contact"
          class="bg-gradient-to-br transition-colors duration-500 from-[#F8F7FC] via-[#ECE7FA] to-[#D6C4FF] hover:bg-gradient-to-br hover:from-[#D6C4FF] hover:via-[#B266FF] hover:to-[#8A2BE2] rounded-lg shadow-md h-44 sm:h-56 md:h-70 lg:h-70 lg:mr-4 Accent hover:text-[#555555] pt-7 text-center font-bold text-[#1a1a1a] text-4xl"
        >
          Contact our Team!
          <div class="flex justify-center items-center">
            <img
              src="../assets/contact.png"
              class="w-[450%] h-[35%] lg:w-[45%] lg:h-[35%] md:w-[25%] md:h-[20%] sm:h-[15%] sm:w-[20%] xs:w-[10%] xs:h-[5%] transition-transform duration-300 hover:scale-105 hidden sm:block"
            />
          </div>
        </router-link>
      </div>
    </div>
    <br />

    <Footer />
  </div>
</template>

<script>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";

export default {
  components: {
    Header,
    Footer,
  },
  data() {
    return {};
  },
};
</script>

<style>
html {
  scroll-behavior: smooth;
}
</style>
