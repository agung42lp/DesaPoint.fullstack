<template>
  <div class="min-h-screen bg-gray-50">

    <transition name="slide-fade">
      <div v-if="toast.show" class="fixed top-4 right-4 z-[100] max-w-md animate-slideIn">
        <div 
          class="rounded-lg shadow-2xl p-4 flex items-center gap-3"
          :class="toast.type === 'success' ? 'bg-green-500' : 'bg-red-500'">
          <svg v-if="toast.type === 'success'" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <svg v-else class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <p class="text-white font-medium">{{ toast.message }}</p>
        </div>
      </div>
    </transition>

    <nav class="bg-white shadow-lg sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 md:h-20">
          <div class="flex items-center space-x-3">
            <div class="h-10 w-10 md:h-12 md:w-12 rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0">
              <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover" />
            </div>
            <div class="min-w-0">
              <h1 class="text-base md:text-xl font-bold text-green-700 truncate">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>
          
          <div class="hidden md:flex items-center space-x-6">
            <router-link to="/" class="text-green-600 font-medium">Beranda</router-link>
            <a href="#baksos" @click.prevent="scrollToSection('baksos')" class="text-gray-700 hover:text-green-600 font-medium">Program</a>
            <a href="#keuangan" @click.prevent="scrollToSection('keuangan')" class="text-gray-700 hover:text-green-600 font-medium">Keuangan</a>
            <a 
              href="#" 
              @click.prevent="handlePengaduanClick"
              class="text-gray-700 hover:text-green-600 font-medium"
            >
              Pengaduan
            </a>
            <router-link v-if="!isLoggedIn" to="/login" class="px-4 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 shadow-md">Login</router-link>

            <div v-else class="flex items-center gap-4">
              <router-link to="/profile" class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-purple-50 to-blue-50 rounded-full border border-purple-200/50 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                  {{ currentUser?.name?.charAt(0).toUpperCase() }}
                </div>
                <span class="text-gray-800 font-semibold">{{ currentUser?.name }}</span>
              </router-link>
              <button @click="handleLogout" class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold shadow-lg">
                <span class="flex items-center gap-2">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                  </svg>
                  Logout
                </span>
              </button>
            </div>
          </div>

          <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 flex-shrink-0">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div v-if="mobileMenuOpen" class="md:hidden pb-4 border-t border-gray-100 mt-2">
          <div class="flex flex-col space-y-3 pt-4">
            <router-link @click="mobileMenuOpen = false" to="/" class="text-green-600 font-medium py-2">Beranda</router-link>
            <a @click.prevent="() => { mobileMenuOpen = false; scrollToSection('baksos'); }" href="#baksos" class="text-gray-700 hover:text-green-600 font-medium py-2">Program</a>
            <a @click.prevent="() => { mobileMenuOpen = false; scrollToSection('keuangan'); }" href="#keuangan" class="text-gray-700 hover:text-green-600 font-medium py-2">Keuangan</a>
            <a @click.prevent="() => { handlePengaduanClick(); mobileMenuOpen = false; }" href="#" class="text-gray-700 hover:text-green-600 font-medium py-2">Pengaduan</a>
            <a 
              v-if="isLoggedIn" 
              @click.prevent="handleProfileClick" 
              href="#"
              class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg border border-purple-200/50 shadow-sm"
            >
              <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                {{ currentUser?.name?.charAt(0).toUpperCase() }}
              </div>
              <div class="flex-1 min-w-0">
                <span class="text-gray-800 font-semibold text-sm block truncate">{{ currentUser?.name }}</span>
                <span class="text-gray-500 text-xs">Lihat Profile</span>
              </div>
              <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </a>
            <div class="pt-2 border-t border-gray-200">
              <router-link 
                v-if="!isLoggedIn" 
                @click="mobileMenuOpen = false" 
                to="/login" 
                class="flex items-center justify-center gap-2 px-4 py-3 bg-green-600 text-white rounded-lg font-medium shadow-md"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Login
              </router-link>
              
              <button 
                v-else 
                @click="() => { handleLogout(); mobileMenuOpen = false; }" 
                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold shadow-lg"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <section class="relative h-[400px] md:h-[500px] bg-gradient-to-br from-green-600 to-green-800 overflow-hidden">
      <div class="absolute inset-0">
        <div 
          class="banner-container flex h-full"
          :style="{ transform: `translateX(-${currentBannerSlide * 100}%)` }"
        >
          <div 
            v-for="(image, index) in bannerImages" 
            :key="index"
            class="min-w-full h-full bg-cover bg-center flex-shrink-0"
            :style="{ backgroundImage: `url(${image})` }"
          ></div>
        </div>
      </div>
      
      <div class="absolute inset-0 bg-black/40"></div>
      
      <button
        @click="callEmergency"
        class="absolute top-4 right-4 md:top-6 md:right-6 z-20 flex items-center gap-2 px-4 py-2 md:px-5 md:py-3 bg-red-600 hover:bg-red-700 text-white rounded-full font-bold shadow-lg transition-all hover:scale-105 animate-pulse"
      >
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 20 20">
          <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
        </svg>
        <span class="text-sm md:text-base">112</span>
      </button>
      
      <div 
        class="relative max-w-7xl mx-auto px-4 sm:px-6 h-full flex items-center z-10"
        v-motion
        :initial="{ opacity: 0, x: -100 }"
        :enter="{ opacity: 1, x: 0, transition: { duration: 800, delay: 200 } }"
      >
        <div class="text-white w-full">
          <h1 
            v-motion
            :initial="{ opacity: 0, y: 30 }"
            :enter="{ opacity: 1, y: 0, transition: { duration: 600, delay: 400 } }"
            class="text-2xl sm:text-3xl md:text-5xl font-extrabold mb-3 md:mb-4"
          >Selamat Datang di RW 12</h1>
          <p 
            v-motion
            :initial="{ opacity: 0, y: 20 }"
            :enter="{ opacity: 1, y: 0, transition: { duration: 600, delay: 500 } }"
            class="text-sm sm:text-base md:text-xl mb-6 md:mb-8 text-green-100"
          >Bersama Membangun Lingkungan yang Harmonis dan Sejahtera</p>
          <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
            <button 
              v-motion
              :initial="{ opacity: 0, scale: 0.8 }"
              :enter="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 600 } }"
              :hovered="{ scale: 1.05 }"
              :tapped="{ scale: 0.95 }"
              @click="handlePengaduanClick"
              class="px-5 sm:px-6 py-2.5 sm:py-3 bg-white text-green-700 rounded-lg font-bold hover:bg-green-50 shadow-lg text-center text-sm sm:text-base"
            >
              Ajukan Pengaduan
            </button>
            <a 
              v-motion
              :initial="{ opacity: 0, scale: 0.8 }"
              :enter="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 700 } }"
              :hovered="{ scale: 1.05 }"
              :tapped="{ scale: 0.95 }"
              href="#tentang" 
              @click.prevent="scrollToSection('tentang')" 
              class="px-5 sm:px-6 py-2.5 sm:py-3 bg-green-700 text-white rounded-lg font-bold hover:bg-green-800 border-2 border-white/50 hover:border-white text-center text-sm sm:text-base"
            >Tentang Kami</a>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 -mt-12 md:-mt-16 mb-8 relative z-10">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
        <div 
          v-motion
          :initial="{ opacity: 0, y: 50 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 0 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-4 md:p-6 hover:shadow-2xl cursor-pointer"
        >
          <div>
            <p class="text-gray-600 text-xs md:text-sm font-medium mb-3 md:mb-4">{{ stats[0].label }}</p>
            
            <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-4">
              <div class="relative w-20 h-20 md:w-24 md:h-24 flex-shrink-0">
                <svg class="w-20 h-20 md:w-24 md:h-24 transform -rotate-90" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#f3f4f6" stroke-width="12"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#86efac" stroke-width="12" :stroke-dasharray="`${femalePercentage * 2.51} 251`" stroke-dashoffset="0" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#16a34a" stroke-width="12" :stroke-dasharray="`${malePercentage * 2.51} 251`" :stroke-dashoffset="`-${femalePercentage * 2.51}`" stroke-linecap="round"/>
                </svg>
                
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-xl md:text-2xl font-bold text-green-700">{{ stats[0].value }}</span>
                </div>
              </div>
              
              <div class="space-y-1.5 md:space-y-2 w-full md:flex-1">
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-600 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Laki-laki</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ genderData.male }}</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-300 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Perempuan</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ genderData.female }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div 
          v-motion
          :initial="{ opacity: 0, y: 50 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 100 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-4 md:p-6 hover:shadow-2xl cursor-pointer"
        >
          <div>
            <p class="text-gray-600 text-xs md:text-sm font-medium mb-3 md:mb-4">Status Kependudukan</p>
            
            <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-4">
              <div class="relative w-20 h-20 md:w-24 md:h-24 flex-shrink-0">
                <svg class="w-20 h-20 md:w-24 md:h-24 transform -rotate-90" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#f3f4f6" stroke-width="12"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#86efac" stroke-width="12" :stroke-dasharray="`${asliPercentage * 2.51} 251`" stroke-dashoffset="0" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#16a34a" stroke-width="12" :stroke-dasharray="`${domisiliPercentage * 2.51} 251`" :stroke-dashoffset="`-${asliPercentage * 2.51}`" stroke-linecap="round"/>
                </svg>
                
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-xl md:text-2xl font-bold text-green-700">{{ stats[1].value }}</span>
                </div>
              </div>
              
              <div class="space-y-1.5 md:space-y-2 w-full md:flex-1">
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-600 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Domisili</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ statusKependudukanData.domisili }}</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-300 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Asli</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ statusKependudukanData.asli }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div 
          v-motion
          :initial="{ opacity: 0, y: 50 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 200 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-4 md:p-6 hover:shadow-2xl cursor-pointer"
        >
          <div>
            <p class="text-gray-600 text-xs md:text-sm font-medium mb-3 md:mb-4">Distribusi Keuangan</p>
            
            <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-4">
              <div class="relative w-20 h-20 md:w-24 md:h-24 flex-shrink-0">
                <svg class="w-20 h-20 md:w-24 md:h-24 transform -rotate-90" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#f3f4f6" stroke-width="12"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#ef4444" stroke-width="12" 
                    :stroke-dasharray="`${danaSosialPercentage * 2.51} 251`" 
                    stroke-dashoffset="0" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#eab308" stroke-width="12" 
                    :stroke-dasharray="`${bankSampahPercentage * 2.51} 251`" 
                    :stroke-dashoffset="`-${danaSosialPercentage * 2.51}`" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#16a34a" stroke-width="12" 
                    :stroke-dasharray="`${kebersihanPercentage * 2.51} 251`" 
                    :stroke-dashoffset="`-${(danaSosialPercentage + bankSampahPercentage) * 2.51}`" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#3b82f6" stroke-width="12" 
                    :stroke-dasharray="`${keamananPercentage * 2.51} 251`" 
                    :stroke-dashoffset="`-${(danaSosialPercentage + bankSampahPercentage + kebersihanPercentage) * 2.51}`" stroke-linecap="round"/>
                </svg>
                
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-xl md:text-2xl font-bold text-green-700">{{ stats[2].value }}</span>
                </div>
              </div>
              
              <div class="space-y-1 md:space-y-1.5 w-full md:flex-1">
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-red-500 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">D. Sosial</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ programData.danaSosial }}%</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-yellow-500 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">B. Sampah</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ programData.bankSampah }}%</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-600 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Kebersihan</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ programData.kebersihan }}%</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-blue-500 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Keamanan</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ programData.keamanan }}%</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div 
          v-motion
          :initial="{ opacity: 0, y: 50 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 300 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-4 md:p-6 hover:shadow-2xl cursor-pointer"
        >
          <div>
            <p class="text-gray-600 text-xs md:text-sm font-medium mb-3 md:mb-4">Status Pengaduan</p>
            
            <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-4">
              <div class="relative w-20 h-20 md:w-24 md:h-24 flex-shrink-0">
                <svg class="w-20 h-20 md:w-24 md:h-24 transform -rotate-90" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#f3f4f6" stroke-width="12"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#3b82f6" stroke-width="12" 
                    :stroke-dasharray="`${diterimaPercentage * 2.51} 251`" 
                    stroke-dashoffset="0" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#eab308" stroke-width="12" 
                    :stroke-dasharray="`${diprosesPercentage * 2.51} 251`" 
                    :stroke-dashoffset="`-${diterimaPercentage * 2.51}`" stroke-linecap="round"/>
                  <circle cx="50" cy="50" r="40" fill="none" stroke="#16a34a" stroke-width="12" 
                    :stroke-dasharray="`${selesaiPercentage * 2.51} 251`" 
                    :stroke-dashoffset="`-${(diterimaPercentage + diprosesPercentage) * 2.51}`" stroke-linecap="round"/>
                </svg>
                
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-xl md:text-2xl font-bold text-green-700">{{ stats[3].value }}</span>
                </div>
              </div>
              
              <div class="space-y-1.5 md:space-y-2 w-full md:flex-1">
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-blue-500 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Terkirim</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ pengaduanData.diterima }}</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-yellow-500 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Diproses</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ pengaduanData.diproses }}</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-600 flex-shrink-0"></div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[10px] md:text-xs text-gray-600 truncate">Selesai</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ pengaduanData.selesai }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-8 md:py-16 mt-4 md:mt-8">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-8 text-center"
      >Layanan Cepat</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <div
          v-for="(service, index) in quickServices" 
          :key="index"
          v-motion
          :initial="{ opacity: 0, x: -30 }"
          :visible="{ opacity: 1, x: 0, transition: { duration: 400, delay: index * 150 } }"
          :hovered="{ scale: 1.02, transition: { duration: 200 } }"
          @click="handleServiceClick(service)"
          class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl cursor-pointer transition-shadow"
        >
          <div class="flex items-start space-x-3 md:space-x-4">
            <div :class='`p-2 md:p-3 rounded-lg ${service.color} flex-shrink-0`'>
              <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                <path v-if="index === 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-base md:text-lg font-bold text-gray-900 mb-1 md:mb-2">{{ service.title }}</h3>
              <p class="text-gray-600 text-xs md:text-sm leading-relaxed">{{ service.desc }}</p>
            </div>
            <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </div></div>
      </div>
    </section>

    <section id="tentang" class="max-w-7xl mx-auto px-4 py-8 md:py-16 mt-4 md:mt-8">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-12 text-center"
      >Visi & Misi</h2>
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
        <div
          v-motion
          :initial="{ opacity: 0, scale: 0.95 }"
          :visible="{ opacity: 1, scale: 1, transition: { duration: 600 } }"
        >
          <div class="relative overflow-hidden rounded-2xl shadow-2xl mb-4 h-64 md:h-80 bg-gray-200">
            <img :src="currentMainImage" alt="Pengurus RW" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 text-white">
              <p class="text-xs md:text-sm font-medium mb-1">Pengurus RW 12</p>
              <h4 class="text-lg md:text-xl font-bold">{{ currentImageTitle }}</h4>
            </div>
          </div>
          
          <div class="relative">
            <div class="overflow-hidden">
              <div class="flex gap-2 md:gap-3 transition-transform duration-500" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                <div class="flex gap-2 md:gap-3 min-w-full">
                  <div v-for="(img, idx) in galleryImages.slice(0, 4)" :key="`slide1-${idx}`" 
                      @click="selectImage(idx)" 
                      class="flex-1 h-20 md:h-24 rounded-lg overflow-hidden cursor-pointer shadow-lg" 
                      :class="{ 'ring-2 md:ring-4 ring-green-600': selectedImageIndex === idx }">
                    <img :src="img.src" :alt="img.title" class="w-full h-full object-cover">
                  </div>
                </div>
                
                <div class="flex gap-2 md:gap-3 min-w-full">
                  <div v-for="(img, idx) in galleryImages.slice(4, 8)" :key="`slide2-${idx}`" 
                      @click="selectImage(idx + 4)" 
                      class="flex-1 h-20 md:h-24 rounded-lg overflow-hidden cursor-pointer shadow-lg" 
                      :class="{ 'ring-2 md:ring-4 ring-green-600': selectedImageIndex === idx + 4 }">
                    <img :src="img.src" :alt="img.title" class="w-full h-full object-cover">
                  </div>
                </div>
              </div>
            </div>

            <button @click="prevSlide" :disabled="currentSlide === 0" class="absolute -left-3 md:-left-4 top-1/2 -translate-y-1/2 w-8 h-8 md:w-10 md:h-10 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed z-10">
              <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
              </svg>
            </button>
            <button @click="nextSlide" :disabled="currentSlide === 1" class="absolute -right-3 md:-right-4 top-1/2 -translate-y-1/2 w-8 h-8 md:w-10 md:h-10 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed z-10">
              <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>

            <div class="flex justify-center gap-2 mt-4">
              <button v-for="n in 2" :key="n" @click="currentSlide = n - 1" class="w-2 h-2 rounded-full transition-all" :class="currentSlide === n - 1 ? 'bg-green-600 w-8' : 'bg-gray-300'"></button>
            </div>
          </div>
        </div>

        <div class="space-y-6">
          <div
            v-motion
            :initial="{ opacity: 0, x: 50 }"
            :visible="{ opacity: 1, x: 0, transition: { duration: 500, delay: 200 } }"
          >
            <h3 class="text-xl md:text-2xl font-bold text-green-700 mb-3 md:mb-4 flex items-center">
              <span class="w-1.5 md:w-2 h-6 md:h-8 bg-green-600 mr-2 md:mr-3 rounded"></span>
              Visi
            </h3>
            <p class="text-gray-700 leading-relaxed text-sm md:text-lg">
              Mewujudkan RW 12 sebagai lingkungan yang harmonis, sejahtera, dan berdaya saing dengan mengedepankan gotong royong dan transparansi dalam setiap aspek kehidupan bermasyarakat.
            </p>
          </div>
          
          <div
            v-motion
            :initial="{ opacity: 0, x: 50 }"
            :visible="{ opacity: 1, x: 0, transition: { duration: 500, delay: 400 } }"
          >
            <h3 class="text-xl md:text-2xl font-bold text-green-700 mb-3 md:mb-4 flex items-center">
              <span class="w-1.5 md:w-2 h-6 md:h-8 bg-green-600 mr-2 md:mr-3 rounded"></span>
              Misi
            </h3>
            <ul class="space-y-2 md:space-y-3 text-gray-700">
              <li 
                v-for="(misi, idx) in misiList" 
                :key="idx"
                v-motion
                :initial="{ opacity: 0, x: 30 }"
                :visible="{ opacity: 1, x: 0, transition: { duration: 400, delay: 500 + (idx * 100) } }"
                class="flex items-start"
              >
                <svg class="w-5 h-5 md:w-6 md:h-6 text-green-600 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-sm md:text-base">{{ misi }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-8 md:py-16">
      <div class="max-w-7xl mx-auto px-4">
        <h2 
          v-motion
          :initial="{ opacity: 0, y: -20 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
          class="text-xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-8 text-center"
        >Dokumentasi Kegiatan</h2>

        <div class="relative overflow-hidden">
          <div class="flex transition-transform duration-700 ease-in-out" 
              :style="{ transform: `translateX(-${currentNewsSlide * 100}%)` }">
            <div class="min-w-full grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
              <div 
                v-for="i in 4" 
                :key="`news1-${i}`" 
                v-motion
                :initial="{ opacity: 0, scale: 0.9 }"
                :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: (i-1) * 100 } }"
                class="group cursor-pointer"
              >
                <div class="relative overflow-hidden rounded-lg md:rounded-xl h-40 md:h-64 bg-gray-200 shadow-lg">
                  <img :src="allNewsImages[i-1].image" :alt="allNewsImages[i-1].title" 
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                  <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 right-2 md:right-4 text-white font-bold text-xs md:text-base leading-tight">
                    {{ allNewsImages[i-1].title }}
                  </h3>
                </div>
              </div>
            </div>
            
            <div class="min-w-full grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
              <div 
                v-for="i in 4" 
                :key="`news2-${i}`" 
                v-motion
                :initial="{ opacity: 0, scale: 0.9 }"
                :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: (i-1) * 100 } }"
                class="group cursor-pointer"
              >
                <div class="relative overflow-hidden rounded-lg md:rounded-xl h-40 md:h-64 bg-gray-200 shadow-lg">
                  <img :src="allNewsImages[i+3].image" :alt="allNewsImages[i+3].title" 
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                  <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 right-2 md:right-4 text-white font-bold text-xs md:text-base leading-tight">
                    {{ allNewsImages[i+3].title }}
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex justify-center gap-2 mt-4 md:mt-6">
          <button v-for="n in 2" :key="n" 
                  @click="currentNewsSlide = n - 1"
                  class="w-2 h-2 rounded-full transition-all" 
                  :class="currentNewsSlide === n - 1 ? 'bg-green-600 w-8' : 'bg-gray-300'">
          </button>
        </div>
      </div>
    </section>

    <section id="baksos" class="max-w-5xl mx-auto px-4 mt-8 md:mt-16">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-8 text-center"
      >Program Dana Sosial</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
        <div 
          v-for="(stat, index) in stats2" 
          :key="index" 
          v-motion
          :initial="{ opacity: 0, y: 30 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: index * 150 } }"
          :hovered="{ scale: 1.02, transition: { duration: 200 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-5 md:p-10 hover:shadow-2xl cursor-pointer"
        >
          <div class="flex items-center justify-between">
            <div class="flex-1 min-w-0">
              <p class="text-xs md:text-lg text-gray-600 font-medium truncate">{{ stat.label }}</p>
              <p class="text-2xl md:text-5xl font-bold text-green-700 mt-2 md:mt-4 break-words">
                {{ index === 0 ? stat.value : formatNumber(stat.value) }}
              </p>
            </div>
            <svg class="w-8 h-8 md:w-12 md:h-12 text-green-600 flex-shrink-0 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-6 md:mt-12 mb-8 md:mb-16">
      <div 
        v-motion
        :initial="{ opacity: 0, y: 40 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 600 } }"
        class="bg-white rounded-xl md:rounded-2xl shadow-xl overflow-hidden"
      >
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6">
          <h2 class="text-lg md:text-2xl font-bold text-white">Riwayat Bantuan Terkini</h2>
          <p class="text-green-100 mt-1 text-xs md:text-sm">Data penerima bantuan terbaru</p>
        </div>

        <div class="hidden md:block overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50 border-b-2 border-green-200">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Penerima</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kategori</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nominal</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Foto</th>
              </tr>
            </thead>
            <tbody v-if="tableData.length === 0">
              <tr>
                <td colspan="6" class="px-6 py-16">
                  <div class="flex flex-col items-center justify-center text-center">
                    <div class="w-32 h-32 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mb-6 animate-pulse">
                      <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Data Bantuan</h3>
                    <p class="text-gray-600 mb-6 max-w-md">Data penyaluran bantuan sosial akan ditampilkan di sini</p>
                  </div>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr 
                v-for="(item, index) in tableData" 
                :key="index" 
                v-motion
                :initial="{ opacity: 0, x: -20 }"
                :visible="{ opacity: 1, x: 0, transition: { duration: 300, delay: Math.min(index * 50, 400) } }"
                class="border-b border-gray-100 hover:bg-green-50 cursor-pointer"
              >
                <td class="px-6 py-5 text-gray-700 font-medium">{{ item.no }}</td>
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                      <span class="text-green-700 font-semibold">{{ item.nama_penerima.charAt(0) }}</span>
                    </div>
                    <span class="text-gray-800 font-medium">{{ item.nama_penerima }}</span>
                  </div>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">{{ item.tanggal_penyerahan }}</span>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium" :class="{ 'bg-red-100 text-red-700': item.kategori_bantuan === 'korban_meninggal', 'bg-yellow-100 text-yellow-700': item.kategori_bantuan === 'penderita_sakit', 'bg-orange-100 text-orange-700': item.kategori_bantuan === 'korban_bencana' }">
                    {{ getKategoriLabel(item.kategori_bantuan) }}
                  </span>
                </td>
                <td class="px-6 py-5">
                  <span class="text-gray-800 font-bold">{{ item.nominal_bantuan }}</span>
                </td>
                <td class="px-6 py-5">
                  <img v-if="item.foto_penyerahan" :src="item.foto_penyerahan" class="w-16 h-16 rounded-lg object-cover cursor-pointer" @click="viewImage(item.foto_penyerahan)">
                  <span v-else class="text-gray-400 text-sm">Tidak ada foto</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="md:hidden divide-y divide-gray-100">
          <div v-if="tableData.length === 0" class="p-8">
            <div class="flex flex-col items-center justify-center text-center">
              <div class="w-24 h-24 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mb-4 animate-pulse">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <h3 class="text-base font-bold text-gray-800 mb-2">Belum Ada Data Bantuan</h3>
              <p class="text-sm text-gray-600">Data penyaluran bantuan sosial akan ditampilkan di sini</p>
            </div>
          </div>
          
          <div 
            v-for="(item, index) in tableData" 
            :key="index" 
            v-motion
            :initial="{ opacity: 0, x: -20 }"
            :visible="{ opacity: 1, x: 0, transition: { duration: 300, delay: Math.min(index * 50, 400) } }"
            class="p-4 hover:bg-green-50"
          >
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <span class="text-green-700 font-semibold text-sm">{{ item.nama_penerima.charAt(0) }}</span>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-gray-900 mb-1 text-sm">{{ item.nama_penerima }}</div>
                <div class="flex items-center gap-1 text-xs text-blue-700 mb-2">
                  <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                  <span class="truncate">{{ item.tanggal_penyerahan }}</span>
                </div>
                <div class="text-xs font-semibold text-gray-800 mb-2">{{ item.nominal_bantuan }}</div>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium" :class="{ 'bg-red-100 text-red-700': item.kategori_bantuan === 'korban_meninggal', 'bg-yellow-100 text-yellow-700': item.kategori_bantuan === 'penderita_sakit', 'bg-orange-100 text-orange-700': item.kategori_bantuan === 'korban_bencana' }">
                  {{ getKategoriLabel(item.kategori_bantuan) }}
                </span>
              </div>
              <img v-if="item.foto_penyerahan" :src="item.foto_penyerahan" class="w-16 h-16 rounded-lg object-cover cursor-pointer flex-shrink-0" @click="viewImage(item.foto_penyerahan)">
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 md:px-8 py-3 md:py-4 border-t border-gray-200">
          <p class="text-xs md:text-sm text-gray-600">Menampilkan {{ tableData.length }} data terbaru</p>
        </div>
      </div>
    </section>

    <section class="max-w-4xl mx-auto px-4 py-8 md:py-16 mt-4 md:mt-8">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-8 text-center"
      >Program Kebersihan</h2>
      
      <div 
        v-motion
        :initial="{ opacity: 0, scale: 0.95 }"
        :visible="{ opacity: 1, scale: 1, transition: { duration: 500 } }"
        class="relative px-8 md:px-12"
      >
        <button 
          @click="prevCleaningSlide" 
          :disabled="currentCleaningSlide === 0" 
          class="absolute -left-2 md:-left-6 top-1/2 -translate-y-1/2 w-12 h-12 md:w-14 md:h-14 bg-white rounded-full shadow-xl flex items-center justify-center hover:bg-gray-50 disabled:opacity-30 disabled:cursor-not-allowed z-10 no-active-transform"
        >
          <svg class="w-6 h-6 md:w-7 md:h-7 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden rounded-xl md:rounded-2xl shadow-xl">
          <div class="flex" :style="{ transform: `translateX(-${currentCleaningSlide * 100}%)`, transition: 'transform 0.5s ease-out' }">
            <div v-for="(event, index) in sortedEvents" :key="index" class="min-w-full">
              <div class="relative h-40 md:h-64 overflow-hidden">
                <img :src="event.image" :alt="event.title" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
                <div class="absolute top-3 md:top-4 left-3 md:left-4">
                  <span class="text-white/90 text-xs md:text-sm font-medium">{{ event.label }}</span>
                </div>
              </div>

              <div class="bg-white p-4 md:p-6">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-3 md:gap-4">
                  <div class="flex-1 min-w-0">
                    <h3 class="text-lg md:text-2xl font-bold text-green-700 mb-3 md:mb-4 break-words">{{ event.title }}</h3>
                    
                    <div class="space-y-2">
                      <div>
                        <p class="text-gray-600 text-xs md:text-sm mb-1">Kegiatan Dilaksanakan pada:</p>
                        <p class="text-gray-900 font-semibold text-sm md:text-base">{{ event.date }}</p>
                        <p class="text-gray-700 text-xs md:text-sm">{{ event.time }}</p>
                      </div>
                      
                      <div>
                        <p class="text-gray-600 text-xs md:text-sm mb-1">Lokasi:</p>
                        <p class="text-gray-900 font-semibold text-sm md:text-base break-words">{{ event.location }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="flex md:ml-6justify-start md:justify-start">
                    <div v-if="event.status === 'thisweek'" class="px-3 py-1.5 md:px-4 md:py-2 bg-red-500 text-white rounded-lg font-bold text-xs md:text-sm shadow-md inline-flex flex-shrink-0">
                      <div class="flex items-center gap-1.5 md:gap-2">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Minggu Ini</span>
                      </div>
                    </div>
                    <div v-else-if="event.status === 'completed'" class="px-3 py-1.5 md:px-4 md:py-2 bg-green-500 text-white rounded-lg font-bold text-xs md:text-sm shadow-md inline-flex flex-shrink-0">
                      <div class="flex items-center gap-1.5 md:gap-2">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Selesai</span>
                      </div>
                    </div>
                    <div v-else-if="event.status === 'upcoming'" class="px-3 py-1.5 md:px-4 md:py-2 bg-blue-500 text-white rounded-lg font-bold text-xs md:text-sm shadow-md inline-flex flex-shrink-0">
                      <div class="flex items-center gap-1.5 md:gap-2">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Akan Datang</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <button 
          @click="nextCleaningSlide" 
          :disabled="currentCleaningSlide === sortedEvents.length - 1" 
          class="no-active-transform absolute -right-2 md:-right-6 top-1/2 -translate-y-1/2 w-12 h-12 md:w-14 md:h-14 bg-white rounded-full shadow-xl flex items-center justify-center hover:bg-gray-50 disabled:opacity-30 disabled:cursor-not-allowed z-10 transition-colors"
        >
          <svg class="w-6 h-6 md:w-7 md:h-7 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>

        <div class="flex justify-center gap-2 mt-4 md:mt-6">
          <button v-for="(event, idx) in sortedEvents" :key="idx" @click="currentCleaningSlide = idx" class="w-2 h-2 rounded-full transition-all duration-300" :class="currentCleaningSlide === idx ? 'bg-green-600 w-8' : 'bg-gray-300'"></button>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-8 md:mt-16">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center"
      >Program Bank Sampah</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
        <div 
          v-for="(stat, index) in stats3" 
          :key="index" 
          v-motion
          :initial="{ opacity: 0, y: 30 }"
          :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: index * 150 } }"
          :hovered="{ scale: 1.02, transition: { duration: 200 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-5 md:p-10 hover:shadow-2xl cursor-pointer"
        >
          <div class="flex items-center justify-between">
            <div class="flex-1 min-w-0">
              <p class="text-xs md:text-lg text-gray-600 font-medium truncate">{{ stat.label }}</p>
              <p class="text-2xl md:text-5xl font-bold text-green-700 mt-2 md:mt-4 break-words">
                {{ index === 0 ? stat.value : formatNumber(stat.value) }}
              </p>
            </div>
            <svg class="w-8 h-8 md:w-12 md:h-12 text-green-600 flex-shrink-0 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-6 md:mt-12 mb-8 md:mb-16">
      <div 
        v-motion
        :initial="{ opacity: 0, y: 40 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 600 } }"
        class="bg-white rounded-xl md:rounded-2xl shadow-xl overflow-hidden"
      >
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6">
          <h2 class="text-lg md:text-2xl font-bold text-white">Rekening Bank Sampah</h2>
          <p class="text-green-100 text-xs md:text-sm mt-1">1 kg sampah seharga Rp 3.000 (pengantaran sampah dan penarikan uang dilakukan secara offline).</p>
        </div>

        <div class="hidden md:block overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50 border-b-2 border-green-200">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Total Sampah</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Total Konversi</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Saldo Cair</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Saldo Tersisa</th>
              </tr>
            </thead>
            <tbody v-if="bankSampahData.length === 0">
              <tr>
                <td colspan="6" class="px-6 py-16">
                  <div class="flex flex-col items-center justify-center text-center">
                    <div class="w-32 h-32 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-full flex items-center justify-center mb-6 animate-pulse">
                      <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Rekening</h3>
                    <p class="text-gray-600 max-w-md">Rekening bank sampah warga akan ditampilkan di sini</p>
                  </div>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr 
                v-for="(item, index) in bankSampahData" 
                :key="index" 
                v-motion
                :initial="{ opacity: 0, x: -20 }"
                :visible="{ opacity: 1, x: 0, transition: { duration: 300, delay: Math.min(index * 50, 400) } }"
                class="border-b border-gray-100 hover:bg-green-50 cursor-pointer"
              >
                <td class="px-6 py-5 text-gray-700 font-medium">{{ item.no }}</td>
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                      <span class="text-green-700 font-semibold">{{ item.nama.charAt(0) }}</span>
                    </div>
                    <span class="text-gray-800 font-medium">{{ item.nama }}</span>
                  </div>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-emerald-100 text-emerald-700 font-semibold">
                    {{ item.totalSampah }}
                  </span>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700 font-bold">
                    {{ item.totalKonversi }}
                  </span>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-700 font-bold">
                    {{ item.saldoCair }}
                  </span>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700 font-bold">
                    {{ item.saldoTersisa }}
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="md:hidden divide-y divide-gray-100">
          <div v-if="bankSampahData.length === 0" class="p-8">
            <div class="flex flex-col items-center justify-center text-center">
              <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-full flex items-center justify-center mb-4 animate-pulse">
                <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
              </div>
              <h3 class="text-base font-bold text-gray-800 mb-2">Belum Ada Rekening</h3>
              <p class="text-sm text-gray-600">Rekening bank sampah warga akan ditampilkan di sini</p>
            </div>
          </div>
          
          <div 
            v-for="(item, index) in bankSampahData" 
            :key="index" 
            v-motion
            :initial="{ opacity: 0, x: -20 }"
            :visible="{ opacity: 1, x: 0, transition: { duration: 300, delay: Math.min(index * 50, 400) } }"
            class="p-4 hover:bg-green-50"
          >
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <span class="text-green-700 font-semibold text-sm">{{ item.nama.charAt(0) }}</span>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-gray-900 mb-2 text-sm">{{ item.nama }}</div>
                <div class="space-y-1.5">
                  <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-600">Total Sampah:</span>
                    <span class="font-semibold text-emerald-700">{{ item.totalSampah }}</span>
                  </div>
                  <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-600">Total Konversi:</span>
                    <span class="font-semibold text-blue-700">{{ item.totalKonversi }}</span>
                  </div>
                  <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-600">Saldo Cair:</span>
                    <span class="font-semibold text-green-700">{{ item.saldoCair }}</span>
                  </div>
                  <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-600">Saldo Tersisa:</span>
                    <span class="font-semibold text-yellow-700">{{ item.saldoTersisa }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 md:px-8 py-3 md:py-4 border-t border-gray-200">
          <p class="text-xs md:text-sm text-gray-600">Menampilkan {{ bankSampahData.length }} rekening aktif</p>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-6 md:mt-12 mb-8 md:mb-16">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center"
      >Jadwal Ronda</h2>
      <div 
        v-motion
        :initial="{ opacity: 0, y: 40 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 600 } }"
        class="bg-white rounded-xl md:rounded-2xl shadow-xl overflow-hidden"
      >
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6">
          <h2 class="text-lg md:text-2xl font-bold text-white">Jadwal Ronda</h2>
          <p class="text-green-100 text-xs md:text-sm mt-1">Ronda dilakukan mulai dari jam 21.00 sampai jam 04.00</p>
        </div>

        <div class="hidden md:block overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50 border-b-2 border-green-200">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-16">No</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Peserta Ronda</th>
              </tr>
            </thead>
            <tbody v-if="jadwalRondaData.length === 0">
              <tr>
                <td colspan="3" class="px-6 py-16">
                  <div class="flex flex-col items-center justify-center text-center">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-6 animate-pulse">
                      <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                      </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Jadwal</h3>
                    <p class="text-gray-600 max-w-md">Jadwal ronda akan ditampilkan di sini</p>
                  </div>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr 
                v-for="(item, index) in jadwalRondaData" 
                :key="index"
                v-motion
                :initial="{ opacity: 0, x: -20 }"
                :visible="{ opacity: 1, x: 0, transition: { duration: 300, delay: Math.min(index * 50, 400) } }"
                class="border-b border-gray-100 hover:bg-green-50 cursor-pointer"
                :class="{ 'bg-red-50': item.isToday }"
              >
                <td class="px-6 py-5 text-gray-700 font-medium">{{ item.no }}</td>
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                        :class="item.isToday ? 'bg-red-500' : 'bg-green-100'">
                      <svg class="w-5 h-5" :class="item.isToday ? 'text-white' : 'text-green-700'" 
                          fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <div>
                      <div class="flex items-center gap-2">
                        <span class="text-gray-800 font-medium">{{ item.tanggal }}</span>
                        <span v-if="item.isToday" 
                          class="px-2 py-0.5 bg-red-600 text-white text-xs font-bold rounded-full">
                          Hari Ini
                        </span>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-5">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-emerald-100 text-emerald-700 font-semibold">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                    </svg>
                    {{ item.peserta_ronda }}
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="md:hidden divide-y divide-gray-100">
          <div v-if="jadwalRondaData.length === 0" class="p-8">
            <div class="flex flex-col items-center justify-center text-center">
              <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4 animate-pulse">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
              </div>
              <h3 class="text-base font-bold text-gray-800 mb-2">Belum Ada Jadwal</h3>
              <p class="text-sm text-gray-600">Jadwal ronda akan ditampilkan di sini</p>
            </div>
          </div>
          
          <div 
            v-for="(item, index) in jadwalRondaData" 
            :key="index" 
            v-motion
            :initial="{ opacity: 0, x: -20 }"
            :visible="{ opacity: 1, x: 0, transition: { duration: 300, delay: Math.min(index * 50, 400) } }"
            class="p-4 hover:bg-green-50"
            :class="{ 'bg-red-50': item.isToday }"
          >
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                  :class="item.isToday ? 'bg-red-500' : 'bg-green-100'">
                <svg class="w-5 h-5" :class="item.isToday ? 'text-white' : 'text-green-700'" 
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                  <span class="font-semibold text-gray-900 text-sm truncate">{{ item.tanggal }}</span>
                  <span v-if="item.isToday" class="px-2 py-0.5 bg-red-600 text-white text-xs font-bold rounded-full flex-shrink-0">
                    Hari Ini
                  </span>
                </div>
                <div class="flex items-center gap-1 text-xs text-emerald-700">
                  <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                  </svg>
                  <span class="font-semibold truncate">{{ item.peserta_ronda }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 md:px-8 py-3 md:py-4 border-t border-gray-200">
          <p class="text-xs md:text-sm text-gray-600">Menampilkan {{ jadwalRondaData.length }} jadwal ronda terkini</p>
        </div>
      </div>
    </section>

    <section id="keuangan" class="max-w-7xl mx-auto px-4 mt-8 md:mt-16 mb-8 md:mb-16">
      <h2 
        v-motion
        :initial="{ opacity: 0, y: -20 }"
        :visible="{ opacity: 1, y: 0, transition: { duration: 500 } }"
        class="text-xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-8 text-center"
      >Laporan Keuangan</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
        <div 
          v-motion
          :initial="{ opacity: 0, x: -50 }":visible="{ opacity: 1, x: 0, transition: { duration: 600, delay: 100 } }"
          :hovered="{ scale: 1.01, transition: { duration: 200 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-5 md:p-8 hover:shadow-2xl"
        >
          <div class="flex items-start justify-between mb-4 md:mb-6">
            <div class="flex-1 min-w-0">
              <p class="text-gray-600 text-xs md:text-base mb-2">Total Pemasukan</p>
              <h3 class="text-2xl md:text-4xl font-bold text-green-700 break-words">{{ formatNumber(keuanganData.pemasukan) }}</h3>
              <button @click="showBankSampahModal = true" class="inline-flex items-center text-green-600 text-xs md:text-sm font-medium mt-2 md:mt-3 hover:text-green-700">
                <span>Selengkapnya</span>
                <svg class="w-3 h-3 md:w-4 md:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
            <div class="p-3 md:p-4 bg-green-100 rounded-xl flex-shrink-0 ml-3">
              <svg class="w-6 h-6 md:w-10 md:h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
          </div>
          
          <div class="grid grid-cols-2 gap-2 md:gap-4">
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 200 } }"
              class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-green-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Iuran</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-green-700 break-words">{{ formatNumber(keuanganData.iuran) }}</p>
            </div>
            
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 300 } }"
              class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-blue-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Dana Pemerintah</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-blue-700 break-words">{{ formatNumber(keuanganData.danaPemerintah) }}</p>
            </div>
            
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 400 } }"
              class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-purple-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">CSR</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-purple-700 break-words">{{ formatNumber(keuanganData.csr) }}</p>
            </div>
            
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 500 } }"
              class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-emerald-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Bank Sampah</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-emerald-700 break-words">{{ formatNumber(keuanganData.bankSampah) }}</p>
            </div>
          </div>
        </div>

        <div 
          v-motion
          :initial="{ opacity: 0, x: 50 }"
          :visible="{ opacity: 1, x: 0, transition: { duration: 600, delay: 100 } }"
          :hovered="{ scale: 1.01, transition: { duration: 200 } }"
          class="bg-white rounded-xl md:rounded-2xl shadow-xl p-5 md:p-8 hover:shadow-2xl"
        >
          <div class="flex items-start justify-between mb-4 md:mb-6">
            <div class="flex-1 min-w-0">
              <p class="text-gray-600 text-xs md:text-base mb-2">Total Pengeluaran</p>
              <h3 class="text-2xl md:text-4xl font-bold text-red-700 break-words">{{ formatNumber(keuanganData.pengeluaran) }}</h3>
              <button @click="showBankSampahModal = true" class="inline-flex items-center text-red-600 text-xs md:text-sm font-medium mt-2 md:mt-3 hover:text-red-700">
                <span>Selengkapnya</span>
                <svg class="w-3 h-3 md:w-4 md:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
            <div class="p-3 md:p-4 bg-red-100 rounded-xl flex-shrink-0 ml-3">
              <svg class="w-6 h-6 md:w-10 md:h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
              </svg>
            </div>
          </div>
          
          <div class="grid grid-cols-2 gap-2 md:gap-4">
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 200 } }"
              class="bg-gradient-to-br from-red-50 to-red-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-red-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Dana Sosial</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-red-700 break-words">{{ formatNumber(keuanganData.dansos) }}</p>
            </div>
            
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 300 } }"
              class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-orange-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Program Kebersihan</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-orange-700 break-words">{{ formatNumber(keuanganData.programKebersihan) }}</p>
            </div>
            
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 400 } }"
              class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-yellow-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Bank Sampah</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-yellow-700 break-words">{{ formatNumber(keuanganData.bankSampahOut) }}</p>
            </div>
            
            <div 
              v-motion
              :initial="{ opacity: 0, scale: 0.9 }"
              :visible="{ opacity: 1, scale: 1, transition: { duration: 400, delay: 500 } }"
              class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-lg md:rounded-xl p-2 md:p-4"
            >
              <div class="flex items-center gap-1 md:gap-2 mb-1 md:mb-2">
                <div class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-rose-600"></div>
                <p class="text-[10px] md:text-sm text-gray-600 truncate">Lain-Lain</p>
              </div>
              <p class="text-sm md:text-xl font-bold text-rose-700 break-words">{{ formatNumber(keuanganData.lainLain) }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer 
      v-motion
      :initial="{ opacity: 0 }"
      :visible="{ opacity: 1, transition: { duration: 800 } }"
      class="bg-gray-900 text-white py-8 md:py-12 relative overflow-hidden"
    >
      <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 via-green-600 to-green-400"></div>
      
      <div class="max-w-7xl mx-auto px-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">
          <div
            v-motion
            :initial="{ opacity: 0, y: 20 }"
            :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 100 } }"
          >
            <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">DesaPoint</h3>
            <p class="text-gray-400 text-xs md:text-sm">RW Sejahtera</p>
          </div>
          <div
            v-motion
            :initial="{ opacity: 0, y: 20 }"
            :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 200 } }"
          >
            <h4 class="font-bold mb-3 md:mb-4 text-sm md:text-base">Menu</h4>
            <div class="space-y-2">
              <a href="/" class="block text-gray-400 hover:text-white text-xs md:text-sm">Beranda</a>
              <a href="#tentang" @click.prevent="scrollToSection('tentang')" class="block text-gray-400 hover:text-white text-xs md:text-sm">Tentang</a>
              <a href="#baksos" @click.prevent="scrollToSection('baksos')" class="block text-gray-400 hover:text-white text-xs md:text-sm">Program</a>
            </div>
          </div>
          
          <div
            v-motion
            :initial="{ opacity: 0, y: 20 }"
            :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 300 } }"
          >
            <h4 class="font-bold mb-3 md:mb-4 text-sm md:text-base">Ikuti Kami</h4>
            <div class="flex space-x-3 md:space-x-4">
              <a href="https://www.tiktok.com/@desa.point" target="_blank" class="w-9 h-9 md:w-10 md:h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-black transition-colors duration-300">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                </svg>
              </a>

              <a href="https://www.instagram.com/desa.point?igsh=MXMyYXdtNTFkbGszcw==" target="_blank" class="w-9 h-9 md:w-10 md:h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors duration-300">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>

              <a href="https://wa.me/6288289175113" target="_blank" class="w-9 h-9 md:w-10 md:h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-500 transition-colors duration-300">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
              </a>
            </div>
          </div>

          <div
            v-motion
            :initial="{ opacity: 0, y: 20 }"
            :visible="{ opacity: 1, y: 0, transition: { duration: 500, delay: 400 } }"
          >
            <h4 class="font-bold mb-3 md:mb-4 text-sm md:text-base">Lokasi</h4>
            <div class="rounded-lg overflow-hidden shadow-lg mb-2 md:mb-3">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9003.211634943833!2d106.6964078303096!3d-6.053499086486914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a0500e969a6f3%3A0x103088721def0ead!2sPIK%202!5e0!3m2!1sid!2sid!4v1762996513048!5m2!1sid!2sid"
                width="100%" 
                height="150" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade" class="md:h-[200px]">
              </iframe>
            </div>
            <p class="text-gray-400 text-[10px] md:text-sm leading-relaxed">📍 PIK 2 Salembaran Jati, Kec. Kosambi, Kabupaten Tangerang, Banten 15214</p>
          </div>
        </div>
        <div class="border-t border-gray-800 mt-6 md:mt-8 pt-6 md:pt-8 text-center text-gray-400 text-xs md:text-sm">
          © 2025 DesaPoint. All rights reserved.
        </div>
      </div>
    </footer>

    <Transition
      enter-active-class="transition duration-300 ease-out"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition duration-200 ease-in"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div v-if="showBankSampahModal" @click="showBankSampahModal = false" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <Transition
          enter-active-class="transition duration-300 ease-out"
          enter-from-class="opacity-0 scale-95 translate-y-4"
          enter-to-class="opacity-100 scale-100 translate-y-0"
          leave-active-class="transition duration-200 ease-in"
          leave-from-class="opacity-100 scale-100 translate-y-0"
          leave-to-class="opacity-0 scale-95 translate-y-4"
        >
          <div v-if="showBankSampahModal" @click.stop class="bg-white rounded-xl md:rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6 flex items-center justify-between">
              <div class="flex-1 min-w-0">
                <h2 class="text-lg md:text-2xl font-bold text-white">Laporan Keuangan</h2>
                <p class="text-green-100 mt-1 text-xs md:text-sm">Data transaksi keuangan RW</p>
              </div>
              <button @click="showBankSampahModal = false" class="w-8 h-8 md:w-10 md:h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors duration-200 flex-shrink-0 ml-3">
                <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </button>
            </div>

            <div class="overflow-y-auto max-h-[calc(90vh-140px)]">
              <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                  <thead>
                    <tr class="bg-gray-50 border-b-2 border-green-200">
                      <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-16">No</th>
                      <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                      <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Keterangan</th>
                      <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Debit</th>
                      <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kredit</th>
                      <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Saldo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in laporanKeuangan" :key="index" class="border-b border-gray-100 hover:bg-green-50">
                      <td class="px-6 py-5 text-gray-700 font-medium">{{ index + 1 }}</td>
                      <td class="px-6 py-5 text-gray-800">{{ item.tanggal }}</td>
                      <td class="px-6 py-5 text-gray-800">{{ item.keterangan }}</td>
                      <td class="px-6 py-5">
                        <span v-if="item.debit > 0" class="text-red-700 font-semibold">Rp {{ formatNumber(item.debit) }}</span>
                        <span v-else class="text-gray-400">-</span>
                      </td>
                      <td class="px-6 py-5">
                        <span v-if="item.kredit > 0" class="text-green-700 font-semibold">Rp {{ formatNumber(item.kredit) }}</span>
                        <span v-else class="text-gray-400">-</span>
                      </td>
                      <td class="px-6 py-5">
                        <span class="font-bold" :class="item.saldo >= 0 ? 'text-green-700' : 'text-red-700'">Rp {{ formatNumber(item.saldo) }}</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="md:hidden divide-y divide-gray-100">
                <div v-for="(item, index) in laporanKeuangan" :key="index" class="p-4 hover:bg-green-50">
                  <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                      <span class="text-green-700 font-semibold text-sm">{{ index + 1 }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="font-semibold text-gray-900 mb-1 text-sm">{{ item.tanggal }}</div>
                      <div class="text-xs text-gray-600 mb-2 break-words">{{ item.keterangan }}</div>
                      <div class="flex flex-wrap gap-2 text-xs">
                        <span v-if="item.debit > 0" class="text-red-700 font-bold">D: Rp {{ formatNumber(item.debit) }}</span>
                        <span v-if="item.kredit > 0" class="text-green-700 font-bold">K: Rp {{ formatNumber(item.kredit) }}</span>
                      </div>
                      <div class="text-xs font-bold mt-1.5" :class="item.saldo >= 0 ? 'text-green-700' : 'text-red-700'">Saldo: Rp {{ formatNumber(item.saldo) }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-gray-50 px-4 md:px-8 py-3 md:py-4 border-t border-gray-200">
              <p class="text-xs md:text-sm text-gray-600">Menampilkan {{ laporanKeuangan.length }} transaksi</p>
            </div>
          </div>
        </Transition>
      </div>
    </Transition>

    <Transition
      enter-active-class="transition duration-300 ease-out"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition duration-200 ease-in"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div v-if="showDeleteModal" @click="showDeleteModal = false" class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4">
        <Transition
          enter-active-class="transition duration-300 ease-out"
          enter-from-class="opacity-0 scale-95 translate-y-4"
          enter-to-class="opacity-100 scale-100 translate-y-0"
          leave-active-class="transition duration-200 ease-in"
          leave-from-class="opacity-100 scale-100 translate-y-0"
          leave-to-class="opacity-0 scale-95 translate-y-4"
        >
          <div v-if="showDeleteModal" @click.stop class="bg-white rounded-xl md:rounded-2xl shadow-2xl max-w-md w-full mx-4">
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-6 py-4 md:py-5 rounded-t-xl md:rounded-t-2xl">
              <h2 class="text-lg md:text-xl font-bold text-white">Anda Belum Login!</h2>
              <p class="text-green-100 text-xs md:text-sm mt-1">Untuk dapat mengirimkan pengaduan, anda harus login terlebih dahulu</p>
            </div>

            <div class="p-4 md:p-6">
              <div class="flex items-center gap-3 md:gap-4 mb-4">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 md:w-6 md:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-gray-800 font-medium text-sm md:text-base">Ingin lanjutkan ke halaman login?</p>
                </div>
              </div>
            </div>

            <div class="px-4 md:px-6 py-3 md:py-4 bg-gray-50 rounded-b-xl md:rounded-b-2xl flex gap-2 md:gap-3 justify-end">
              <button @click="showDeleteModal = false" class="px-3 md:px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors text-sm md:text-base">
                Batal
              </button>
              <button @click="() => { showDeleteModal = false; router.push('/login'); }" class="px-3 md:px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors text-sm md:text-base">
                Login
              </button>
            </div>
          </div>
        </Transition>
      </div>
    </Transition>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted, watch } from 'vue'
import { authService, danaSosialAPI, bankSampahAPI, jadwalRondaAPI, kebersihanAPI, laporanKeuanganAPI } from '../services/api.js'
import { useRouter } from 'vue-router'
import api from '../services/api.js'

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const mobileMenuOpen = ref(false)
const showBankSampahModal = ref(false)
const laporanKeuangan = ref([])
const tableData = ref([])
const bankSampahData = ref([])
const jadwalRondaData = ref([])
const cleaningEvents = ref([])
const showDeleteModal = ref(false)

const currentNewsSlide = ref(0)
let newsInterval = null

const allNewsImages = ref([
  { title: 'Program Kebersihan #1', image: 'https://www.padangsambian.denpasarkota.go.id/public/uploads/berita/Berita_231104030411_giat-gotong-royong-kerja-bakti-lingkungan-lingkungan-di-kelurahan-padangsambian.jpeg' },
  { title: 'Program Kebersihan #2', image: 'https://desatepus.gunungkidulkab.go.id/assets/files/artikel/sedang_1708775439IMG_20240224_183957.jpg' },
  { title: 'Kegiatan Ronda Malam #1', image: 'https://pojokkampung.data.blog/wp-content/uploads/2023/01/img-20230113-wa00195350446220279713694.jpg' },
  { title: 'Kegiatan Ronda Malam #2', image: 'https://tribratanews-respesawaran.lampung.polri.go.id/berkas/post-images/2025-09/ronda-malam-di-sukadadi-bukti-sinergi-polri-dan-masyarakat-wujudkan-desa-aman.jpg' },
  { title: 'Penyaluran Dana Sosial #1', image: 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/79/2025/03/19/ayobdg_pembagian-hasil-menabung-sampah_ncos-8-3698765415.jpg' },
  { title: 'Penyaluran Dana Sosial #2', image: 'https://img.antarafoto.com/cache/1200x797/2013/08/05/pembagian-zakat-uang-759i-dom.webp' },
  { title: 'Bank Sampah Warga #1', image: 'https://www.denpasarkota.go.id/public/uploads/berita/Berita_230707070753_bank-sampah-pelita-bagikan-tas-ramah-lingkungan-ajak-warga-kelola-sampah-berbasis-sumber.jpg' },
  { title: 'Bank Sampah Warga #2', image: 'https://www.tzuchi.or.id/inliners/1740623675-foto-1-edt.jpg' }
])

const scrollY = ref(0)

const misiList = ref([
  'Meningkatkan kualitas pelayanan dan transparansi administrasi warga',
  'Memberdayakan masyarakat melalui program-program sosial dan ekonomi',
  'Menciptakan lingkungan yang bersih, aman, dan nyaman untuk semua',
  'Membangun solidaritas dan kerukunan antar warga melalui kegiatan bersama'
])

const handleScroll = () => {
  scrollY.value = window.scrollY
}

const handleServiceClick = (service) => {
  if (service.action === 'scroll') {
    scrollToSection(service.target)
  } else if (service.action === 'navigate') {
    if (!isLoggedIn.value && service.requireAuth) {
      showDeleteModal.value = true
    } else {
      router.push(service.target)
    }
  }
}

const statusKependudukanData = ref({
  asli: 1580,
  domisili: 963,
  total: 2543
})

const programData = ref({
  danaSosial: 35,
  bankSampah: 28,
  kebersihan: 22,
  keamanan: 15,
  total: 100
})

const pengaduanData = ref({
  diterima: 0,
  diproses: 0,
  selesai: 0,
  total: 0
})

const domisiliPercentage = computed(() => 
  (statusKependudukanData.value.domisili / statusKependudukanData.value.total) * 100
)
const asliPercentage = computed(() => 
  (statusKependudukanData.value.asli / statusKependudukanData.value.total) * 100
)

const danaSosialPercentage = computed(() => programData.value.danaSosial)
const bankSampahPercentage = computed(() => programData.value.bankSampah)
const kebersihanPercentage = computed(() => programData.value.kebersihan)
const keamananPercentage = computed(() => programData.value.keamanan)

const diterimaPercentage = computed(() => 
  pengaduanData.value.total > 0 
    ? (pengaduanData.value.diterima / pengaduanData.value.total) * 100
    : 0
)
const diprosesPercentage = computed(() => 
  pengaduanData.value.total > 0 
    ? (pengaduanData.value.diproses / pengaduanData.value.total) * 100
    : 0
)
const selesaiPercentage = computed(() => 
  pengaduanData.value.total > 0 
    ? (pengaduanData.value.selesai / pengaduanData.value.total) * 100
    : 0
)

const fetchPengaduanStats = async () => {
  try {
    const response = await api.get('/pengaduan')
    const allPengaduan = response.data
    
    pengaduanData.value = {
      diterima: allPengaduan.filter(p => p.status === 'diterima').length,
      diproses: allPengaduan.filter(p => p.status === 'diproses').length,
      selesai: allPengaduan.filter(p => p.status === 'selesai').length,
      total: allPengaduan.length
    }
  } catch (error) {
    console.error('Error fetching pengaduan stats:', error)
  }
}

const handlePengaduanClick = () => {
  if (!isLoggedIn.value) {
    showDeleteModal.value = true
  } else {
    router.push('/form')
  }
}

const handleProfileClick = () => {
  mobileMenuOpen.value = false
  router.push('/profile')
}

const scrollToSection = (id) => {
  const el = document.getElementById(id)
  if (el) {
    mobileMenuOpen.value = false
    el.scrollIntoView({ behavior: 'smooth', block: 'start' })
  }
}

const getKategoriLabel = (kategori) => {
  const labels = {
    'korban_meninggal': 'Korban Meninggal',
    'penderita_sakit': 'Penderita Sakit',
    'korban_bencana': 'Korban Bencana'
  }
  return labels[kategori] || kategori
}

const viewImage = (url) => {
  window.open(url, '_blank')
}

const fetchDanaSosial = async () => {
  try {
    const response = await danaSosialAPI.getAll()
    tableData.value = response.data
      .sort((a, b) => new Date(b.tanggal_penyerahan) - new Date(a.tanggal_penyerahan))
      .slice(0, 10)
      .map((item, index) => ({
        id: item.id,
        no: index + 1,
        nama_penerima: item.nama_penerima,
        tanggal_penyerahan: new Date(item.tanggal_penyerahan).toLocaleDateString('id-ID', { 
          day: '2-digit', 
          month: 'short', 
          year: 'numeric' 
        }),
        kategori_bantuan: item.kategori_bantuan,
        nominal_bantuan: 'Rp ' + new Intl.NumberFormat('id-ID').format(item.nominal_bantuan),
        foto_penyerahan: item.foto_penyerahan ? `/storage/${item.foto_penyerahan}` : null
      }))
    
    const totalOrang = response.data.length
    const totalPengeluaran = response.data.reduce((sum, item) => sum + parseFloat(item.nominal_bantuan), 0)
    
    stats2.value[0].value = totalOrang
    stats2.value[1].value = totalPengeluaran
  } catch (error) {
    console.error('Gagal memuat data Dana Sosial', error)
  } 
}

const fetchBankSampah = async () => {
  try {
    const response = await bankSampahAPI.getAll()
    bankSampahData.value = response.data
      .sort((a, b) => a.id - b.id)
      .map((item, index) => ({
        id: item.id,
        no: index + 1,
        nama: item.nama,
        totalSampah: item.total_sampah + ' kg',
        totalKonversi: 'Rp ' + new Intl.NumberFormat('id-ID').format(item.total_konversi),
        saldoCair: 'Rp ' + new Intl.NumberFormat('id-ID').format(item.saldo_cair),
        saldoTersisa: 'Rp ' + new Intl.NumberFormat('id-ID').format(item.saldo_tersisa)
      }))
    
    const totalSampah = response.data.reduce((sum, item) => sum + parseFloat(item.total_sampah), 0)
    const totalSaldoCair = response.data.reduce((sum, item) => sum + parseFloat(item.saldo_cair), 0)
    
    stats3.value[0].value = totalSampah + ' kg'
    stats3.value[1].value = totalSaldoCair
  } catch (error) {
    console.error('Gagal memuat data Bank Sampah', error)
  }
}

const fetchJadwalRonda = async () => {
  try {
    const response = await jadwalRondaAPI.getAll()
    const today = new Date()
    today.setHours(0, 0, 0, 0)
    
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
    
    jadwalRondaData.value = response.data
      .sort((a, b) => new Date(a.tanggal) - new Date(b.tanggal)) 
      .slice(0, 10)
      .map((item, index) => {
        const itemDate = new Date(item.tanggal)
        itemDate.setHours(0, 0, 0, 0)
        
        const dayName = days[itemDate.getDay()]
        
        return {
          id: item.id,
          no: index + 1,
          tanggal: `${dayName}, ${itemDate.toLocaleDateString('id-ID')}`,
          peserta_ronda: item.peserta_ronda,
          isToday: itemDate.getTime() === today.getTime() 
        }
      })
  } catch (error) {
    console.error('Error fetching jadwal ronda:', error)
  }
}

const fetchKebersihan = async () => {
  try {
    const response = await kebersihanAPI.getAll()
    cleaningEvents.value = response.data.map((item, index) => ({
      ...item,
      no: index + 1,
      image: item.image ? `/storage/${item.image}` : 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=400'
    }))
    
    setTimeout(() => {
      const thisWeekIndex = sortedEvents.value.findIndex(e => e.status === 'thisweek')
      if (thisWeekIndex !== -1) {
        currentCleaningSlide.value = thisWeekIndex
      }
    }, 50)
  } catch (error) {
    console.error('Gagal memuat data Program Kebersihan', error)
  }
}

const fetchLaporanKeuangan = async () => {
  try {
    const response = await laporanKeuanganAPI.getAll()
    laporanKeuangan.value = response.data.map(item => ({
      ...item,
      tanggal: new Date(item.tanggal).toLocaleDateString('id-ID', { 
        day: '2-digit', 
        month: 'short', 
        year: 'numeric' 
      }),
      debit: parseFloat(item.debit),
      kredit: parseFloat(item.kredit),
      saldo: parseFloat(item.saldo)
    }))
  } catch (error) {
    console.error('Error fetching laporan keuangan:', error)
  }
}

const keuanganData = ref({
  pemasukan: 0,
  pengeluaran: 0,
  iuran: 0,
  danaPemerintah: 0,
  csr: 0,
  bankSampah: 0,
  dansos: 0,
  programKebersihan: 0,
  bankSampahOut: 0,
  lainLain: 0
})

const updateKeuanganData = () => { 
  keuanganData.value.pemasukan = laporanKeuangan.value.reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.pengeluaran = laporanKeuangan.value.reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.iuran = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('iuran')).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.danaPemerintah = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('dana pemerintah')).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.csr = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('csr')).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.bankSampah = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bank sampah') && item.debit > 0).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.dansos = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('dana sosial') || item.keterangan.toLowerCase().includes('dansos')).reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.programKebersihan = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('program kebersihan') || item.keterangan.toLowerCase().includes('gotong royong')).reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.bankSampahOut = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bank sampah') && item.kredit > 0).reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.lainLain = laporanKeuangan.value.filter(item => {
    const ket = item.keterangan.toLowerCase()
    return item.kredit > 0 && !ket.includes('dana sosial') && !ket.includes('dansos') && !ket.includes('program kebersihan') && !ket.includes('gotong royong') && !ket.includes('bank sampah')
  }).reduce((sum, item) => sum + item.kredit, 0)
}

watch(laporanKeuangan, (newData) => {
  if (newData.length > 0) {
    updateKeuanganData()
  }
}, { deep: true })

watch(pengaduanData, (newData) => {
  stats.value[3].value = newData.total
}, { deep: true })

api.interceptors.request.use(config => {
  const token = localStorage.getItem('token')
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

const checkAuthStatus = async () => {
  const token = localStorage.getItem('token')
  
  if (token) {
    try {
     const response = await api.get('/user')
      isLoggedIn.value = true

      const existingUser = JSON.parse(localStorage.getItem('user') || '{}')
      const userData = {
        ...response.data,
        role: existingUser.role || response.data.role || 'user'
      }

      currentUser.value = userData
      localStorage.setItem('user', JSON.stringify(userData))
    } catch (error) {
      console.error('Auth check failed:', error)
      localStorage.removeItem('token')
      localStorage.removeItem('user')
    }
  }
}

const handleLogout = async () => {
  try {
    await authService.logout()
  } catch (error) {
    console.error('Logout error:', error)
  } finally {
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    isLoggedIn.value = false
    currentUser.value = null
    router.push('/login')
  }
}

const formatNumber = (num) => {
  return new Intl.NumberFormat('id-ID').format(num)
}

const stats = ref([
  { label: 'Total Penduduk', value: 2543, type: 'gender' },
  { label: 'Status Kependudukan', value: 2543, type: 'status' },
  { label: 'Distribusi Program', value: '100%', type: 'program' },
  { label: 'Status Pengaduan', value: 0, type: 'pengaduan' }, 
])

const genderData = ref({
  male: 1320,
  female: 1223,
  total: 2543
})

const malePercentage = computed(() => ((genderData.value.male / genderData.value.total) * 100).toFixed(1))
const femalePercentage = computed(() => ((genderData.value.female / genderData.value.total) * 100).toFixed(1))

const stats2 = ref([
  { label: 'Total Orang Terbantu', value: 0 },
  { label: 'Total Pengeluaran', value: 0 }
])

const stats3 = ref([
  { label: 'Total Sampah Terkumpul', value: '0 kg' },
  { label: 'Total Saldo Cair', value: 0 }
])

const quickServices = ref([
  { 
    title: 'Laporan Keuangan', 
    desc: 'Transparansi keuangan RW',
    color: 'bg-blue-500',
    action: 'scroll',
    target: 'keuangan'
  },
  { 
    title: 'Ajukan Pengaduan', 
    desc: 'Sampaikan keluhan atau aspirasi Anda',
    color: 'bg-red-500',
    action: 'navigate',
    target: '/form',
    requireAuth: true
  },
  { 
    title: 'Program RW', 
    desc: 'Jadwal Ronda, Jadwal Bersih-Bersih Bersama, Bank Sampah, Dana Sosial',
    color: 'bg-green-500',
    action: 'scroll',
    target: 'baksos'
  }
])

const currentSlide = ref(0)
const selectedImageIndex = ref(0)

const galleryImages = ref([
  { src: 'https://i.pinimg.com/1200x/f5/5a/83/f55a83bcb7381ab3ce5a5a23053a4c77.jpg', title: 'Ketua RW' },
  { src: 'https://i.pinimg.com/1200x/74/e2/79/74e279981b30745dbe00c17b1754686d.jpg', title: 'Wakil Ketua' },
  { src: 'https://i.pinimg.com/736x/f4/08/53/f40853f4e6e1c83509cd016529b527e5.jpg', title: 'Sekretaris' },
  { src: 'https://i.pinimg.com/1200x/47/af/97/47af97bb75eb12d05aec8cf080f51e9a.jpg', title: 'Bendahara' },
  { src: 'https://i.pinimg.com/1200x/ac/ec/af/acecaf94603673a6077327c3b175a41a.jpg', title: 'Seksi Keamanan' },
  { src: 'https://i.pinimg.com/1200x/5f/c5/48/5fc5485d6cfc3f4071504102ec9c69a3.jpg', title: 'Seksi Kebersihan' },
  { src: 'https://i.pinimg.com/1200x/19/56/7b/19567b9f94a57acbc1c1e47da908f818.jpg', title: 'Seksi Sosial' },
  { src: 'https://i.pinimg.com/1200x/34/41/01/344101028dbe65ba8e189ea86e0b09bd.jpg', title: 'Seksi Pembangunan' }
])

const currentMainImage = computed(() => galleryImages.value[selectedImageIndex.value].src)
const currentImageTitle = computed(() => galleryImages.value[selectedImageIndex.value].title)

const selectImage = (index) => {
  selectedImageIndex.value = index
}

const nextSlide = () => {
  if (currentSlide.value < 1) {
    currentSlide.value++
  }
}

const prevSlide = () => {
  if (currentSlide.value > 0) {
    currentSlide.value--
  }
}

const currentCleaningSlide = ref(0)

const nextCleaningSlide = () => {
  if (currentCleaningSlide.value < sortedEvents.value.length - 1) {
    currentCleaningSlide.value++
  }
}

const prevCleaningSlide = () => {
  if (currentCleaningSlide.value > 0) {
    currentCleaningSlide.value--
  }
}

const sortedEvents = computed(() => {
  const completed = cleaningEvents.value.filter(e => e.status === 'completed')
  const thisweek = cleaningEvents.value.filter(e => e.status === 'thisweek')
  const upcoming = cleaningEvents.value.filter(e => e.status === 'upcoming')
  
  return [...completed, ...thisweek, ...upcoming]
})

const currentBannerSlide = ref(0)
const bannerImages = ref([
  '/images/banner.jpg',
  '/images/banner2.jpg', 
  '/images/banner3.jpg'  
])
let bannerInterval = null

import { gsap } from 'gsap'

const nextBannerSlide = () => {
  const nextSlide = (currentBannerSlide.value + 1) % bannerImages.value.length
  gsap.to('.banner-container', {
    x: `-${nextSlide * 100}%`,
    duration: 0.8,
    ease: 'power2.inOut',
    onComplete: () => {
      currentBannerSlide.value = nextSlide
    }
  })
}

const prevBannerSlide = () => {
  const prevSlide = (currentBannerSlide.value - 1 + bannerImages.value.length) % bannerImages.value.length
  gsap.to('.banner-container', {
    x: `-${prevSlide * 100}%`,
    duration: 0.8,
    ease: 'power2.inOut',
    onComplete: () => {
      currentBannerSlide.value = prevSlide
    }
  })
}

const toast = ref({ show: false, message: '', type: '' })

const callEmergency = () => {
  const isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent)
  
  if (isMobile) {
    window.location.href = 'tel:112'
  } else {
    showToast('Nomor Darurat: 112 - Hubungi melalui telepon Anda', 'success')
  }
}

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 4000)
}

onMounted(() => {
  checkAuthStatus()
  fetchLaporanKeuangan()
  fetchDanaSosial()
  fetchBankSampah()
  fetchJadwalRonda()
  fetchKebersihan()
  fetchPengaduanStats()

  window.addEventListener('storage', checkAuthStatus)
  window.addEventListener('scroll', handleScroll)
  
  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) {
      checkAuthStatus()
    }
  })

  newsInterval = setInterval(() => {
    currentNewsSlide.value = (currentNewsSlide.value + 1) % 2
  }, 5000)

  bannerInterval = setInterval(nextBannerSlide, 5000) 
})

onUnmounted(() => {
  window.removeEventListener('storage', checkAuthStatus)
  window.removeEventListener('scroll', handleScroll)
  document.removeEventListener('visibilitychange', checkAuthStatus)
  if (newsInterval) clearInterval(newsInterval)
  if (bannerInterval) clearInterval(bannerInterval)
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

* {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

html {
  scroll-behavior: smooth;
}

@keyframes slideIn {
  from {
    transform: translateX(100%);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

.animate-slideIn {
  animation: slideIn 0.3s ease-out;
}

.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.3s ease-in;
}

.slide-fade-enter-from {
  transform: translateX(100%);
  opacity: 0;
}

.slide-fade-leave-to {
  transform: translateX(100%);
  opacity: 0;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

#baksos,
#keuangan,
#tentang {
  scroll-margin-top: 5rem;
}

@media (min-width: 768px) {
  #baksos,
  #keuangan,
  #tentang {
    scroll-margin-top: 6rem;
  }
}

.min-h-screen {
  overflow-x: hidden;
  max-width: 100vw;
}

body {
  overflow-x: hidden;
}

@media (max-width: 768px) {
  * {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }
  
  html {
    scroll-padding-top: 5rem;
  }
  
  img {
    max-width: 100%;
    height: auto;
  }
  
  button, a {
    min-height: 44px;
    min-width: 44px;
  }
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@media (min-width: 768px) {
  ::-webkit-scrollbar {
    width: 8px;
  }
  
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }
  
  ::-webkit-scrollbar-thumb {
    background: #16a34a;
    border-radius: 4px;
  }
  
  ::-webkit-scrollbar-thumb:hover {
    background: #15803d;
  }
}

* {
  transition-property: background-color, border-color, color, fill, stroke;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

button:focus, a:focus, input:focus, select:focus, textarea:focus {
  outline: 2px solid #16a34a;
  outline-offset: 2px;
}

@media (hover: hover) {
  .hover\:scale-110:hover {
    transform: scale(1.1);
  }
  
  .hover\:shadow-2xl:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  }
}

p, li, span {
  line-height: 1.6;
}

@media (max-width: 640px) {
  section {
    padding-top: 2rem;
    padding-bottom: 2rem;
  }
  
  button {
    padding: 0.625rem 1rem;
  }
  
  .shadow-xl {
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
  }
}

.loading-skeleton {
  background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
  background-size: 200% 100%;
  animation: loading 1.5s ease-in-out infinite;
}

@keyframes loading {
  0% {
    background-position: 200% 0;
  }
  100% {
    background-position: -200% 0;
  }
}

.modal-backdrop {
  backdrop-filter: blur(4px);
}

@media (max-width: 768px) {
  table {
    display: block;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}

@supports (-webkit-touch-callout: none) {
  .min-h-screen {
    min-height: -webkit-fill-available;
  }
}

@media (max-width: 640px) {
  .rounded-xl {
    border-radius: 1rem;
  }
  
  .rounded-2xl {
    border-radius: 1.25rem;
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.gradient-overlay {
  background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
}

@media (hover: none) {
  button:active,
  a:active {
    opacity: 0.7;
  }
}

@media (max-width: 375px) {
  .container {
    padding-left: 1rem;
    padding-right: 1rem;
  }
}

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}

.focus-visible:focus {
  outline: 2px solid #16a34a;
  outline-offset: 2px;
  border-radius: 4px;
}

.text-gray-600 {
  color: #4b5563;
}

.text-gray-700 {
  color: #374151;
}

.text-gray-800 {
  color: #1f2937;
}

.card-hover {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
}

.modal-enter-active,
.modal-leave-active {
  transition: all 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
  transform: scale(0.95) translateY(1rem);
}

.gradient-bg {
  background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
}

button:disabled {
  cursor: not-allowed;
  opacity: 0.5;
}

button:not(:disabled):active {
  transform: scale(0.98);
}

.carousel-indicator {
  transition: all 0.3s ease;
}

.carousel-indicator.active {
  width: 2rem;
}

img {
  image-rendering: -webkit-optimize-contrast;
}

.overflow-hidden {
  overflow: hidden;
}

.overflow-x-auto {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

input,
select,
textarea {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

a {
  -webkit-tap-highlight-color: transparent;
}

ul, ol {
  padding-left: 1.5rem;
}

table {
  border-collapse: collapse;
  width: 100%;
}

hr {
  border: 0;
  height: 1px;
  background: #e5e7eb;
}

blockquote {
  border-left: 4px solid #16a34a;
  padding-left: 1rem;
  font-style: italic;
  color: #6b7280;
}

code {
  background: #f3f4f6;
  padding: 0.125rem 0.25rem;
  border-radius: 0.25rem;
  font-size: 0.875em;
}

pre {
  background: #1f2937;
  color: #f9fafb;
  padding: 1rem;
  border-radius: 0.5rem;
  overflow-x: auto;
}

::selection {
  background: #bbf7d0;
  color: #14532d;
}

::-moz-selection {
  background: #bbf7d0;
  color: #14532d;
}

::placeholder {
  color: #9ca3af;
  opacity: 1;
}

:-ms-input-placeholder {
  color: #9ca3af;
}

::-ms-input-placeholder {
  color: #9ca3af;
}

@media print {
  body {
    background: white;
    color: black;
  }
  
  nav,
  footer,
  button {
    display: none;
  }
  
  section {
    page-break-inside: avoid;
  }
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

@keyframes shimmer {
  0% {
    background-position: -468px 0;
  }
  100% {
    background-position: 468px 0;
  }
}

.skeleton {
  animation-duration: 1.2s;
  animation-fill-mode: forwards;
  animation-iteration-count: infinite;
  animation-name: shimmer;
  animation-timing-function: linear;
  background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
  background-size: 800px 104px;
  position: relative;
}

.touch-scroll {
  -webkit-overflow-scrolling: touch;
}

@supports (backdrop-filter: blur(10px)) or (-webkit-backdrop-filter: blur(10px)) {
  .backdrop-blur {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
  }
}

@media (max-width: 640px) {
  .grid {
    gap: 0.75rem;
  }
}

.transition-smooth {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.z-nav {
  z-index: 50;
}

.z-modal {
  z-index: 60;
}

.z-tooltip {
  z-index: 70;
}

.invisible {
  visibility: hidden;
}

.visible {
  visibility: visible;
}

.pointer-events-none {
  pointer-events: none;
}

.pointer-events-auto {
  pointer-events: auto;
}

.select-none {
  user-select: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}

.select-text {
  user-select: text;
  -webkit-user-select: text;
  -moz-user-select: text;
  -ms-user-select: text;
}

.no-active-transform:active {
  transform: translateY(-50%) !important;
}
</style>