<template>
  <div>
    <Header />
    <section class="w-full overflow-hidden bg-[#F8F7FC]">
      <div class="flex flex-col">
        <!-- Cover Image -->
        <div
          class="w-full xl:h-[20rem] lg:h-[18rem] md:h-[16rem] sm:h-[14rem] h-[11rem] bg-gradient-to-b from-[#B266FF] to-[#D6C4FF] flex items-center justify-center"
        >
          <h1
            class="text-center lg:text-5xl sm:text-2xl font-bold text-[#1a1a1a] Description"
          >
            <span class="text-[#4B0082] Title">GameHaven</span> : Precision Gear
            For Serious Play
          </h1>
        </div>

        <!-- Profile Image -->
        <div class="sm:w-[80%] w-[90%] mx-auto flex">
          <div
            class="relative lg:bottom-[5rem] sm:bottom-[4rem] bottom-[3rem] outline outline-2 outline-offset-2 outline-[#E3E3E3] w-[12rem] h-[12rem] sm:w-[8rem] sm:h-[8rem] md:w-[10rem] md:h-[10rem] w-[7rem] h-[7rem] bg-[#D6C4FF] flex items-center justify-center aspect-square rounded-md"
          >
            <img
              src="https://www.svgrepo.com/show/293136/customer-service-headphones.svg"
              class="h-[60%] w-[60%]"
            />
          </div>

          <!-- FullName -->
          <h1
            class="w-full text-left my-4 sm:mx-4 pl-4 text-gray-800 dark:text-white lg:text-4xl md:text-3xl sm:text-3xl text-xl Header font-semibold"
          >
            {{ currentUser?.username || "Guest" }}
          </h1>
        </div>

        <div
          class="xl:w-[80%] lg:w-[90%] md:w-[90%] sm:w-[92%] w-[90%] mx-auto flex flex-col gap-4 items-center relative lg:-top-8 md:-top-6 -top-4"
        >
          <!-- Description -->
          <p class="w-fit text-[#1A1A1A] text-md Description">
            {{
              currentUser?.bio ||
              "Welcome to your profile page. Update your bio!"
            }}
          </p>
          <!-- Edit Profile Button -->
          <div class="fixed right-4 bottom-24">
            <router-link
              to="/edit-profile"
              class="bg-[#8A2BE2] text-white px-4 py-2 rounded-md shadow hover:bg-[#B266FF] transition Accent"
            >
              Edit Profile
            </router-link>
          </div>

          <!-- Detail -->
          <div class="w-full my-auto py-6 flex flex-col justify-center gap-2">
            <div class="w-full flex sm:flex-row flex-col gap-2 justify-center">
              <!-- Left Column -->
              <div class="w-full">
                <dl class="text-[#1A1A1A] divide-y divide-gray-200 d">
                  <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-[#555555] md:text-lg Header">
                      First Name
                    </dt>
                    <dd class="text-lg font-semibold Description">
                      {{ currentUser?.firstName || "-" }}
                    </dd>
                  </div>
                  <div class="flex flex-col py-3">
                    <dt class="mb-1 text-[#555555] md:text-lg Header">
                      Last Name
                    </dt>
                    <dd class="text-lg font-semibold Description">
                      {{ currentUser?.lastName || "-" }}
                    </dd>
                  </div>
                  <div class="flex flex-col py-3">
                    <dt class="mb-1 text-[#555555] md:text-lg Header">
                      Date Of Birth
                    </dt>
                    <dd class="text-lg font-semibold Description">
                      {{ currentUser?.dob || "-" }}
                    </dd>
                  </div>
                </dl>
              </div>

              <!-- Right Column -->
              <div class="w-full">
                <dl class="text-[#1A1A1A] divide-y divide-[#E3E3E3]">
                  <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-[#555555] md:text-lg Header">
                      Gender
                    </dt>
                    <dd class="text-lg font-semibold Description">
                      {{ currentUser?.gender || "-" }}
                    </dd>
                  </div>
                  <div class="flex flex-col py-3">
                    <dt class="mb-1 text-[#555555] md:text-lg Header">
                      Phone Number
                    </dt>
                    <dd class="text-lg font-semibold Description">
                      {{ currentUser?.phone || "-" }}
                    </dd>
                  </div>
                  <div class="flex flex-col py-3">
                    <dt class="mb-1 text-[$555555] md:text-lg Header">Email</dt>
                    <dd class="text-lg font-semibold Description">
                      {{ currentUser?.email || "-" }}
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import { currentUser } from "../auth";
</script>
