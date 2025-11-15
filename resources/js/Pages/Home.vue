<template>
  <div class="min-h-screen bg-gray-50">

    <nav class="bg-white shadow-lg sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 md:h-20">
          <div class="flex items-center space-x-4">
             <div class="h-10 w-10 md:h-12 md:w-12 rounded-lg flex items-center justify-center overflow-hidden">
              <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover" />
            </div>
            <div>
              <h1 class="text-lg md:text-xl font-bold text-green-700">DesaPoint</h1>
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

          <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div v-if="mobileMenuOpen" class="md:hidden pb-4 border-t border-gray-100 mt-2">
          <div class="flex flex-col space-y-3 pt-4">
            <router-link @click="mobileMenuOpen = false" to="/" class="text-green-600 font-medium py-2">Beranda</router-link>
            <a @click="mobileMenuOpen = false" href="#baksos" class="text-gray-700 hover:text-green-600 font-medium py-2">Program</a>
            <a @click="mobileMenuOpen = false" href="#keuangan" class="text-gray-700 hover:text-green-600 font-medium py-2">Keuangan</a>
            <router-link @click="mobileMenuOpen = false" to="/form" class="text-gray-700 hover:text-green-600 font-medium py-2">Pengaduan</router-link>
            <router-link v-if="!isLoggedIn" @click="mobileMenuOpen = false" to="/login" class="px-4 py-2 bg-green-600 text-white rounded-lg font-medium text-center">Login</router-link>
            <button v-else @click="() => { handleLogout(); mobileMenuOpen = false; }" class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium text-center">Logout</button>
          </div>
        </div>
      </div>
    </nav>

    <section class="relative h-[350px] md:h-[500px] bg-gradient-to-br from-green-600 to-green-800">
      <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
        <div class="text-white">
          <h1 class="text-3xl md:text-5xl font-extrabold mb-3 md:mb-4">Selamat Datang di RW 12</h1>
          <p class="text-base md:text-xl mb-6 md:mb-8 text-green-100">Bersama Membangun Lingkungan yang Harmonis dan Sejahtera</p>
          <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
            <router-link to="/form" class="px-6 py-3 bg-white text-green-700 rounded-lg font-bold hover:bg-green-50 shadow-lg text-center">Ajukan Pengaduan</router-link>
            <a href="#tentang" @click.prevent="scrollToSection('tentang')" class="px-6 py-3 bg-green-700 text-white rounded-lg font-bold hover:bg-green-800 border-2 border-white/50 hover:border-white text-center">Tentang Kami</a>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 -mt-12 md:-mt-16 mb-8 relative z-10">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
        <div class="bg-white rounded-xl md:rounded-2xl shadow-xl p-3 md:p-6 hover:shadow-2xl cursor-pointer">
          <div>
            <p class="text-gray-600 text-xs md:text-sm font-medium mb-3 md:mb-4">{{ stats[0].label }}</p>
            
            <div class="flex items-center justify-between gap-3 md:gap-4">
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
              
              <div class="space-y-1.5 md:space-y-2 flex-1">
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-600"></div>
                  <div class="flex-1">
                    <p class="text-[10px] md:text-xs text-gray-600">Laki-laki</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ genderData.male }}</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-green-300"></div>
                  <div class="flex-1">
                    <p class="text-[10px] md:text-xs text-gray-600">Perempuan</p>
                    <p class="text-xs md:text-sm font-bold text-gray-800">{{ genderData.female }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div v-for="(stat, index) in stats.slice(1)" :key="index + 1" class="bg-white rounded-xl md:rounded-2xl shadow-xl p-4 md:p-6 hover:shadow-2xl cursor-pointer">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-600 text-xs md:text-sm font-medium">{{ stat.label }}</p>
              <p class="text-2xl md:text-3xl font-bold text-green-700 mt-2">{{ stat.value }}</p>
            </div>
            <div class="p-3 md:p-4 bg-green-100 rounded-xl">
              <svg class="w-6 h-6 md:w-8 md:h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                <path v-if="index === 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-8 md:py-16 mt-4 md:mt-8">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center">Layanan Cepat</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a v-for="(service, index) in quickServices" :key="index" :href="service.href" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl cursor-pointer">
          <div class="flex items-start space-x-4">
            <div :class='`p-3 rounded-lg ${service.color}`'>
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                <path v-if="index === 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-lg font-bold text-gray-900">{{ service.title }}</h3>
              <p class="text-gray-600 text-sm mt-2">{{ service.desc }}</p>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </div>
        </a>
      </div>
    </section>

    <section id="tentang" class="max-w-7xl mx-auto px-4 py-8 md:py-16 mt-4 md:mt-8">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 md:mb-12 text-center">Visi & Misi</h2>
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
          <div>
            <h3 class="text-2xl font-bold text-green-700 mb-4 flex items-center">
              <span class="w-2 h-8 bg-green-600 mr-3 rounded"></span>
              Visi
            </h3>
            <p class="text-gray-700 leading-relaxed text-lg">
              Mewujudkan RW 05 Si Doi sebagai lingkungan yang harmonis, sejahtera, dan berdaya saing dengan mengedepankan gotong royong dan transparansi dalam setiap aspek kehidupan bermasyarakat.
            </p>
          </div>
          
          <div>
            <h3 class="text-2xl font-bold text-green-700 mb-4 flex items-center">
              <span class="w-2 h-8 bg-green-600 mr-3 rounded"></span>
              Misi
            </h3>
            <ul class="space-y-3 text-gray-700">
              <li class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Meningkatkan kualitas pelayanan dan transparansi administrasi warga</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Memberdayakan masyarakat melalui program-program sosial dan ekonomi</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Menciptakan lingkungan yang bersih, aman, dan nyaman untuk semua</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Membangun solidaritas dan kerukunan antar warga melalui kegiatan bersama</span>
              </li>
            </ul>
          </div>
        </div>

        <div>
          <div class="relative overflow-hidden rounded-2xl shadow-2xl mb-4 h-80 bg-gray-200">
            <img :src="currentMainImage" alt="Pengurus RW" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-6 left-6 text-white">
              <p class="text-sm font-medium mb-1">Pengurus RW 05</p>
              <h4 class="text-xl font-bold">{{ currentImageTitle }}</h4>
            </div>
          </div>

          <div class="relative">
            <div class="overflow-hidden">
              <div class="flex gap-3" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                <div class="flex gap-3 min-w-full">
                  <div v-for="(img, idx) in galleryImages.slice(0, 4)" :key="idx" @click="selectImage(idx)" class="flex-1 h-24 rounded-lg overflow-hidden cursor-pointer shadow-lg" :class="{ 'ring-4 ring-green-600': selectedImageIndex === idx }">
                    <img :src="img.src" :alt="img.title" class="w-full h-full object-cover">
                  </div>
                </div>
                
                <div class="flex gap-3 min-w-full">
                  <div v-for="(img, idx) in galleryImages.slice(0, 4)" :key="idx" @click="selectImage(idx)" class="flex-1 h-20 md:h-24 rounded-lg overflow-hidden cursor-pointer shadow-lg" :class="{ 'ring-2 md:ring-4 ring-green-600': selectedImageIndex === idx }">
                    <img :src="img.src" :alt="img.title" class="w-full h-full object-cover">
                  </div>
                </div>
              </div>
            </div>

            <button @click="prevSlide" :disabled="currentSlide === 0" class="absolute -left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed z-10">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
              </svg>
            </button>
            <button @click="nextSlide" :disabled="currentSlide === 1" class="absolute -right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed z-10">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>

            <div class="flex justify-center gap-2 mt-4">
              <button v-for="n in 2" :key="n" @click="currentSlide = n - 1" class="w-2 h-2 rounded-full" :class="currentSlide === n - 1 ? 'bg-green-600 w-8' : 'bg-gray-300'"></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-8 md:py-16">
      <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6 md:mb-8">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Berita & Pengumuman</h2>
          <a href="/berita" class="text-green-600 hover:text-green-700 font-medium flex items-center">
            <span>Lihat Semua</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div v-for="(news, index) in latestNews" :key="news.id" class="cursor-pointer">
            <div class="relative overflow-hidden rounded-xl mb-4 h-48 bg-gray-200 shadow-lg">
              <img :src="news.image" :alt="news.title" class="w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              <div class="absolute top-4 left-4 px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full">{{ news.category }}</div>
            </div>
            <p class="text-gray-500 text-sm mb-2">{{ news.date }}</p>
            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ news.title }}</h3>
            <p class="text-gray-600 text-sm">{{ news.excerpt }}</p>
          </div>
        </div>
      </div>
    </section>

    <section id="baksos" class="max-w-5xl mx-auto px-4 mt-8 md:mt-16">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center">Program Dana Sosial</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        <div v-for="(stat, index) in stats2" :key="index" class="bg-white rounded-xl md:rounded-2xl shadow-xl p-6 md:p-10 hover:shadow-2xl cursor-pointer">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm md:text-lg text-gray-600 font-medium">{{ stat.label }}</p>
              <p class="text-3xl md:text-5xl font-bold text-green-700 mt-3 md:mt-4">{{ stat.value }}</p>
            </div>
            <div class="p-4 md:p-6 bg-green-100 rounded-xl">
              <svg class="w-8 h-8 md:w-12 md:h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-8 md:mt-12 mb-12 md:mb-16">
      <div class="bg-white rounded-xl md:rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6">
          <h2 class="text-xl md:text-2xl font-bold text-white">Riwayat Bantuan Terkini</h2>
          <p class="text-green-100 mt-1 text-sm">Data penerima bantuan terbaru</p>
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
            <tbody>
              <tr v-for="(item, index) in tableData" :key="index" class="border-b border-gray-100 hover:bg-green-50 cursor-pointer">
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
          <div v-for="(item, index) in tableData" :key="index" class="p-4 hover:bg-green-50">
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <span class="text-green-700 font-semibold text-sm">{{ item.nama_penerima.charAt(0) }}</span>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-gray-900 mb-1">{{ item.nama_penerima }}</div>
                <div class="flex items-center gap-1 text-xs text-blue-700 mb-2">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                  {{ item.tanggal_penyerahan }}
                </div>
                <div class="text-sm text-gray-600">{{ item.nominal_bantuan }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 md:px-8 py-3 md:py-4 border-t border-gray-200">
          <p class="text-xs md:text-sm text-gray-600">Menampilkan {{ tableData.length }} data terbaru</p>
        </div>
      </div>
    </section>

    <section class="max-w-4xl mx-auto px-4 py-8 md:py-16 mt-4 md:mt-8">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center">Program Kebersihan</h2>
      
      <div class="relative">
        <button @click="prevCleaningSlide" :disabled="currentCleaningSlide === 0" class="absolute -left-16 md:-left-18 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50 disabled:opacity-30 disabled:cursor-not-allowed z-10">
          <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden rounded-2xl shadow-xl">
          <div class="flex" :style="{ transform: `translateX(-${currentCleaningSlide * 100}%)`, transition: 'transform 0.5s ease-out' }">
            <div v-for="(event, index) in sortedEvents" :key="index" class="min-w-full">
              <div class="relative h-48 md:h-64 overflow-hidden">
                <img :src="event.image" :alt="event.title" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
                <div class="absolute top-4 left-4">
                  <span class="text-white/90 text-sm font-medium">{{ event.label }}</span>
                </div>
              </div>

              <div class="bg-white p-4 md:p-6">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                  <div class="flex-1">
                    <h3 class="text-xl md:text-2xl font-bold text-green-700 mb-3 md:mb-4">{{ event.title }}</h3>
                    
                    <div class="space-y-2">
                      <div>
                        <p class="text-gray-600 text-xs md:text-sm mb-1">Kegiatan Dilaksanakan pada:</p>
                        <p class="text-gray-900 font-semibold text-sm md:text-base">{{ event.date }}</p>
                        <p class="text-gray-700 text-xs md:text-sm">{{ event.time }}</p>
                      </div>
                      
                      <div>
                        <p class="text-gray-600 text-xs md:text-sm mb-1">Lokasi:</p>
                        <p class="text-gray-900 font-semibold text-sm md:text-base">{{ event.location }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="flex md:ml-6 justify-end md:justify-start">
                    <div v-if="event.status === 'thisweek'" class="px-3 py-1.5 md:px-4 md:py-2 bg-red-500 text-white rounded-lg font-bold text-xs md:text-sm shadow-md inline-flex">
                      <div class="flex items-center gap-1.5 md:gap-2">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Minggu Ini</span>
                      </div>
                    </div>
                    <div v-else-if="event.status === 'completed'" class="px-4 py-2 bg-green-500 text-white rounded-lg font-bold text-sm shadow-md">
                      <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Selesai</span>
                      </div>
                    </div>
                    <div v-else-if="event.status === 'upcoming'" class="px-4 py-2 bg-blue-500 text-white rounded-lg font-bold text-sm shadow-md">
                      <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
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

        <button @click="nextCleaningSlide" :disabled="currentCleaningSlide === sortedEvents.length - 1" class="absolute -right-16 top-1/2 -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50 disabled:opacity-30 disabled:cursor-not-allowed z-10">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>

        <div class="flex justify-center gap-2 mt-6">
          <button v-for="(event, idx) in sortedEvents" :key="idx" @click="currentCleaningSlide = idx" class="w-2 h-2 rounded-full" :class="currentCleaningSlide === idx ? 'bg-green-600 w-8' : 'bg-gray-300'"></button>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-8 md:mt-16">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 text-center">Program Bank Sampah</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div v-for="(stat, index) in stats3" :key="index" class="bg-white rounded-xl md:rounded-2xl shadow-xl p-6 md:p-10 hover:shadow-2xl cursor-pointer">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm md:text-lg text-gray-600 font-medium">{{ stat.label }}</p>
              <p class="text-3xl md:text-5xl font-bold text-green-700 mt-3 md:mt-4">{{ stat.value }}</p>
            </div>
            <div class="p-4 md:p-6 bg-green-100 rounded-xl">
              <svg class="w-8 h-8 md:w-12 md:h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path v-if="index === 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                <path v-if="index === 1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-8 md:mt-12 mb-12 md:mb-16">
      <div class="bg-white rounded-xl md:rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6">
          <h2 class="text-2xl font-bold text-white">Rekening Bank Sampah</h2>
          <p class="text-green-100 mt-1">Data rekening bank sampah warga</p>
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
            <tbody>
              <tr v-for="(item, index) in bankSampahData" :key="index" class="border-b border-gray-100 hover:bg-green-50 cursor-pointer">
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
          <div v-for="(item, index) in bankSampahData" :key="index" class="p-4 hover:bg-green-50">
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <span class="text-green-700 font-semibold text-sm">{{ item.nama.charAt(0) }}</span>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-gray-900 mb-1">{{ item.nama }}</div>
                <div class="flex items-center gap-1 text-xs text-blue-700 mb-2">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                  {{ item.totalSampah }}
                </div>
                <div class="text-sm text-gray-600">{{ item.totalUang }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
          <p class="text-sm text-gray-600">Menampilkan {{ bankSampahData.length }} rekening aktif</p>
        </div>
      </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 mt-8 md:mt-12 mb-12 md:mb-16">
      <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Jadwal Ronda</h2>
      <div class="bg-white rounded-xl md:rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 md:px-8 py-4 md:py-6">
          <h2 class="text-2xl font-bold text-white">Jadwal Ronda</h2>
          <p class="text-green-100 mt-1">Data jadwal ronda Warga</p>
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
            <tbody>
              <tr v-for="(item, index) in jadwalRondaData" :key="index" class="border-b border-gray-100 hover:bg-green-50 cursor-pointer">
                <td class="px-6 py-5 text-gray-700 font-medium">{{ item.no }}</td>
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                      <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <span class="text-gray-800 font-medium">{{ item.tanggal }}</span>
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
          <div v-for="(item, index) in jadwalRondaData" :key="index" class="p-4 hover:bg-green-50">
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                <span class="text-green-700 font-semibold text-sm">{{ item.tanggal.charAt(0) }}</span>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-semibold text-gray-900 mb-1">{{ item.tanggal }}</div>
                <div class="flex items-center gap-1 text-xs text-blue-700 mb-2">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                  {{ item.peserta_ronda }}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
          <p class="text-sm text-gray-600">Menampilkan {{ jadwalRondaData.length }} jadwal ronda terkini</p>
        </div>
      </div>
    </section>

    <section id="keuangan" class="max-w-7xl mx-auto px-4 mt-8 md:mt-16 mb-12 md:mb-16">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center">Laporan Keuangan</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 hover:shadow-2xl">
          <div class="flex items-start justify-between mb-6">
            <div>
              <p class="text-gray-600 text-sm md:text-base mb-2">Total Pemasukan</p>
              <h3 class="text-3xl md:text-4xl font-bold text-green-700">{{ formatNumber(keuanganData.pemasukan) }}</h3>
              <button @click="showBankSampahModal = true" class="inline-flex items-center text-green-600 text-sm font-medium mt-3 hover:text-green-700">
                <span>Selengkapnya</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
            <div class="p-4 bg-green-100 rounded-xl">
              <svg class="w-8 h-8 md:w-10 md:h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
          </div>
          
          <div class="grid grid-cols-2 gap-3 md:gap-4">
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-green-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Iuran</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-green-700">{{ formatNumber(keuanganData.iuran) }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-blue-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Perumahan</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-blue-700">{{ formatNumber(keuanganData.perumahan) }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-purple-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Donasi</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-purple-700">{{ formatNumber(keuanganData.donasi) }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-emerald-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Bank Sampah</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-emerald-700">{{ formatNumber(keuanganData.bankSampah) }}</p>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 hover:shadow-2xl">
          <div class="flex items-start justify-between mb-6">
            <div>
              <p class="text-gray-600 text-sm md:text-base mb-2">Total Pengeluaran</p>
              <h3 class="text-3xl md:text-4xl font-bold text-red-700">{{ formatNumber(keuanganData.pengeluaran) }}</h3>
              <button @click="showBankSampahModal = true" class="inline-flex items-center text-red-600 text-sm font-medium mt-3 hover:text-red-700">
                <span>Selengkapnya</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
            <div class="p-4 bg-red-100 rounded-xl">
              <svg class="w-8 h-8 md:w-10 md:h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
              </svg>
            </div>
          </div>
          
          <div class="grid grid-cols-2 gap-3 md:gap-4">
            <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-red-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Dana Sosial</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-red-700">{{ formatNumber(keuanganData.baksos) }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-orange-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Kerja Bakti</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-orange-700">{{ formatNumber(keuanganData.kerjaBakti) }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-yellow-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Bank Sampah</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-yellow-700">{{ formatNumber(keuanganData.bankSampahOut) }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-xl p-3 md:p-4">
              <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-rose-600"></div>
                <p class="text-xs md:text-sm text-gray-600">Lain-Lain</p>
              </div>
              <p class="text-lg md:text-xl font-bold text-rose-700">{{ formatNumber(keuanganData.lainLain) }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-gray-900 text-white py-12 relative overflow-hidden">
      <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 via-green-600 to-green-400"></div>
      
      <div class="max-w-7xl mx-auto px-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
            <h3 class="text-xl font-bold mb-4">DesaPoint</h3>
            <p class="text-gray-400 text-sm">RW Sejahtera</p>
          </div>
          <div>
            <h4 class="font-bold mb-4">Menu</h4>
            <div class="space-y-2">
              <a href="/" class="block text-gray-400 hover:text-white text-sm">Beranda</a>
              <a href="#tentang" @click.prevent="scrollToSection('tentang')" class="block text-gray-400 hover:text-white text-sm">Tentang</a>
              <a href="#baksos" @click.prevent="scrollToSection('baksos')" class="block text-gray-400 hover:text-white text-sm">Program</a>
            </div>
          </div>
          
          <div>
            <h4 class="font-bold mb-4">Ikuti Kami</h4>
            <div class="flex space-x-4">
              <a href="https://www.tiktok.com/@desa.point" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-black">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                </svg>
              </a>

              <a href="https://www.instagram.com/desa.point?igsh=MXMyYXdtNTFkbGszcw==" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>

              <a href="https://wa.me/6288289175113" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-500">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
              </a>
            </div>
          </div>

          <div>
            <h4 class="font-bold mb-4">Lokasi</h4>
            <div class="rounded-lg overflow-hidden shadow-lg">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9003.211634943833!2d106.6964078303096!3d-6.053499086486914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a0500e969a6f3%3A0x103088721def0ead!2sPIK%202!5e0!3m2!1sid!2sid!4v1762996513048!5m2!1sid!2sid"
                width="100%" 
                height="200" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
            <p class="text-gray-400 text-sm mt-3">📍 PIK 2 Salembaran Jati, Kec. Kosambi, Kabupaten Tangerang, Banten 15214</p>
          </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
          © 2025 DesaPoint. All rights reserved.
        </div>
      </div>
    </footer>

    <div v-if="showBankSampahModal" @click="showBankSampahModal = false" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 md:px-8 py-5 md:py-6 flex items-center justify-between">
          <div>
            <h2 class="text-2xl font-bold text-white">Laporan Keuangan</h2>
            <p class="text-green-100 mt-1 text-sm">Data transaksi keuangan RW</p>
          </div>
          <button @click="showBankSampahModal = false" class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                  <div class="font-semibold text-gray-900 mb-1">{{ item.tanggal }}</div>
                  <div class="text-sm text-gray-600 mb-2">{{ item.keterangan }}</div>
                  <div class="flex gap-4 text-xs">
                    <span v-if="item.debit > 0" class="text-red-700 font-bold">D: Rp {{ formatNumber(item.debit) }}</span>
                    <span v-if="item.kredit > 0" class="text-green-700 font-bold">K: Rp {{ formatNumber(item.kredit) }}</span>
                  </div>
                  <div class="text-sm font-bold mt-1" :class="item.saldo >= 0 ? 'text-green-700' : 'text-red-700'">Saldo: Rp {{ formatNumber(item.saldo) }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-6 md:px-8 py-4 border-t border-gray-200">
          <p class="text-sm text-gray-600">Menampilkan {{ laporanKeuangan.length }} transaksi</p>
        </div>
      </div>
    </div>

    <div v-if="showDeleteModal" @click="showDeleteModal = false" class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 rounded-t-2xl">
          <h2 class="text-xl font-bold text-white">Anda Belum Login!</h2>
          <p class="text-red-100 text-sm mt-1">Untuk dapat mengirimkan pengaduan, anda harus login terlebih dahulu</p>
        </div>

        <div class="p-6">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-800 font-medium">Ingin lanjutkan ke halaman login?</p>
            </div>
          </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex gap-3 justify-end">
          <button @click="showDeleteModal = false" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button @click="() => { showDeleteModal = false; router.push('/login'); }" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
            Login
          </button>
        </div>
      </div>
    </div>
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

const handlePengaduanClick = (e) => {
  if (!isLoggedIn.value) {
    showDeleteModal.value = true;
  } else {
    router.push('/form');
  }
}

const handleMobilePengaduanClick = (e) => {
  mobileMenuOpen.value = false;
  if (!isLoggedIn.value) {
    showDeleteModal.value = true;
  } else {
    router.push('/form');
  }
}

const scrollToSection = (id) => {
  const el = document.getElementById(id)
  if (el) {
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
  } catch (error) {
    console.error('Gagal memuat data Bank Sampah', error)
  }
}

const fetchJadwalRonda = async () => {
  try {
    const response = await jadwalRondaAPI.getAll()
    jadwalRondaData.value = response.data
      .sort((a, b) => new Date(b.tanggal) - new Date(a.tanggal))
      .slice(0, 10)
      .map((item, index) => ({
        id: item.id,
        no: index + 1,
        tanggal: new Date(item.tanggal).toLocaleDateString('id-ID'),
        peserta_ronda: item.peserta_ronda
      }))
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
  perumahan: 0,
  donasi: 0,
  bankSampah: 0,
  baksos: 0,
  kerjaBakti: 0,
  bankSampahOut: 0,
  lainLain: 0
})

const updateKeuanganData = () => {
  keuanganData.value.pemasukan = laporanKeuangan.value.reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.pengeluaran = laporanKeuangan.value.reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.iuran = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('iuran')).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.perumahan = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('perumahan')).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.donasi = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('donasi')).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.bankSampah = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bank sampah') && item.debit > 0).reduce((sum, item) => sum + item.debit, 0)
  keuanganData.value.baksos = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bakti sosial') || item.keterangan.toLowerCase().includes('baksos')).reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.kerjaBakti = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('kerja bakti') || item.keterangan.toLowerCase().includes('gotong royong')).reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.bankSampahOut = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bank sampah') && item.kredit > 0).reduce((sum, item) => sum + item.kredit, 0)
  keuanganData.value.lainLain = laporanKeuangan.value.filter(item => {
    const ket = item.keterangan.toLowerCase()
    return item.kredit > 0 && !ket.includes('bakti sosial') && !ket.includes('baksos') && !ket.includes('kerja bakti') && !ket.includes('gotong royong') && !ket.includes('bank sampah')
  }).reduce((sum, item) => sum + item.kredit, 0)
}

watch(laporanKeuangan, (newData) => {
  if (newData.length > 0) {
    updateKeuanganData()
  }
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
      currentUser.value = response.data
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
  { label: 'Total Penduduk', value: 2543 },
  { label: 'Jumlah RT', value: 12 },
  { label: 'Program Aktif', value: 8 },
  { label: 'Pengaduan Selesai', value: 156 },
])

const genderData = ref({
  male: 1320,
  female: 1223,
  total: 2543
})

const malePercentage = computed(() => ((genderData.value.male / genderData.value.total) * 100).toFixed(1))
const femalePercentage = computed(() => ((genderData.value.female / genderData.value.total) * 100).toFixed(1))

const stats2 = ref([
  { label: 'Total Orang Terbantu', value: 15750000 },
  { label: 'Total Pengeluaran', value: 8420000 }
])

const stats3 = ref([
  { label: 'Total Sampah Terkumpul', value: 5000 },
  { label: 'Total Saldo Cair', value: 2750000 }
])

const quickServices = ref([
  { 
    title: 'Laporan Keuangan', 
    desc: 'Transparansi keuangan RW',
    color: 'bg-blue-500',
    href: '#keuangan'
  },
  { 
    title: 'Ajukan Pengaduan', 
    desc: 'Sampaikan keluhan atau aspirasi Anda',
    color: 'bg-red-500',
    href: '/form'
  },
  { 
    title: 'Program RW', 
    desc: 'Jadwal Ronda, Jadwal Bersih-Bersih Bersama, Bank Sampah, Dana Sosial',
    color: 'bg-green-500',
    href: '#baksos'
  }
])

const latestNews = ref([
  {
    id: 1,
    title: 'Gotong Royong Bersih Lingkungan',
    excerpt: 'Kegiatan bersih-bersih lingkungan dilaksanakan setiap Minggu pagi...',
    date: '15 Okt 2024',
    category: 'Kegiatan',
    image: 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=400'
  },
  {
    id: 2,
    title: 'Bantuan Sosial untuk 25 Keluarga',
    excerpt: 'RW 05 menyalurkan bantuan sembako kepada warga yang membutuhkan...',
    date: '12 Okt 2024',
    category: 'Sosial',
    image: 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400'
  },
  {
    id: 3,
    title: 'Jadwal Ronda Bulan November',
    excerpt: 'Pengumuman jadwal pos ronda untuk bulan November 2024...',
    date: '10 Okt 2024',
    category: 'Pengumuman',
    image: 'https://images.unsplash.com/photo-1582139329536-e7284fece509?w=400'
  }
])

const currentSlide = ref(0)
const selectedImageIndex = ref(0)

const galleryImages = ref([
  { src: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400', title: 'Ketua RW' },
  { src: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400', title: 'Wakil Ketua' },
  { src: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400', title: 'Sekretaris' },
  { src: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400', title: 'Bendahara' },
  { src: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400', title: 'Seksi Keamanan' },
  { src: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400', title: 'Seksi Kebersihan' },
  { src: 'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=400', title: 'Seksi Sosial' },
  { src: 'https://images.unsplash.com/photo-1463453091185-61582044d556?w=400', title: 'Seksi Pembangunan' }
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
  const thisweek = cleaningEvents.value.filter(e => e.status === 'thisweek')
  const upcoming = cleaningEvents.value.filter(e => e.status === 'upcoming')
  const completed = cleaningEvents.value.filter(e => e.status === 'completed')
  return [...thisweek, ...upcoming, ...completed]
})

onMounted(() => {
  checkAuthStatus()
  fetchLaporanKeuangan()
  fetchDanaSosial()
  fetchBankSampah()
  fetchJadwalRonda()
  fetchKebersihan()

  window.addEventListener('storage', checkAuthStatus)
  
  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) {
      checkAuthStatus()
    }
  })

  const thisWeekIndex = sortedEvents.value.findIndex(e => e.status === 'thisweek')
  if (thisWeekIndex !== -1) {
    currentCleaningSlide.value = thisWeekIndex
  }
})

onUnmounted(() => {
  window.removeEventListener('storage', checkAuthStatus)
  document.removeEventListener('visibilitychange', checkAuthStatus)
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

#baksos,
#keuangan {
  scroll-margin-top: 6rem;
}
</style>