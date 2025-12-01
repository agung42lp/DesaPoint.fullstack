<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex">

    <aside class="hidden lg:flex fixed left-0 top-0 h-screen w-20 bg-white shadow-xl z-50 flex-col items-center py-6 border-r border-gray-100">
      <div class="mb-10">
        <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center shadow-lg hover:shadow-xl transition-all hover:scale-105">
          <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover rounded-2xl" />
        </div>
      </div>

      <nav class="flex-1 w-full flex flex-col items-center space-y-2 px-2">
        <router-link to="/homeadmin" class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300"
          :class="$route.path === '/homeadmin' ? 'bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-500/30' : 'hover:bg-gray-100'">
          <svg class="w-6 h-6 transition-colors" :class="$route.path === '/homeadmin' ? 'text-white' : 'text-gray-600 group-hover:text-green-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Beranda<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link to="/program" class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300"
          :class="$route.path === '/program' ? 'bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-500/30' : 'hover:bg-gray-100'">
          <svg class="w-6 h-6 transition-colors" :class="$route.path === '/program' ? 'text-white' : 'text-gray-600 group-hover:text-green-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Program<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link to="/keuangan" class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300"
          :class="$route.path === '/keuangan' ? 'bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-500/30' : 'hover:bg-gray-100'">
          <svg class="w-6 h-6 transition-colors" :class="$route.path === '/keuangan' ? 'text-white' : 'text-gray-600 group-hover:text-green-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Keuangan<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link to="/pengaduan" class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300"
          :class="$route.path === '/pengaduan' ? 'bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-500/30' : 'hover:bg-gray-100'">
          <svg class="w-6 h-6 transition-colors" :class="$route.path === '/pengaduan' ? 'text-white' : 'text-gray-600 group-hover:text-green-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Pengaduan<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link to="/manajemen-akun" class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300"
          :class="$route.path === '/manajemen-akun' ? 'bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-500/30' : 'hover:bg-gray-100'">
          <svg class="w-6 h-6 transition-colors" :class="$route.path === '/manajemen-akun' ? 'text-white' : 'text-gray-600 group-hover:text-green-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Manajemen Akun<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>
      </nav>

      <div class="w-full flex flex-col items-center space-y-2 pt-4 border-t border-gray-100 px-2">
        <router-link to="/profileadmin" class="group relative w-14 h-14 flex items-center justify-center">
          <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold cursor-pointer hover:scale-110 transition-all duration-300 shadow-lg">
            {{ currentUser?.name?.charAt(0).toUpperCase() }}
          </div>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            {{ currentUser?.name }}<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <button @click="handleLogout" class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 hover:bg-red-50">
          <svg class="w-6 h-6 text-red-500 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Logout<div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </button>
      </div>
    </aside>

    <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-2xl z-50">
      <div class="grid grid-cols-5 h-16">
        <router-link to="/homeadmin" class="flex flex-col items-center justify-center transition-colors"
          :class="$route.path === '/homeadmin' ? 'text-green-600 bg-green-50' : 'text-gray-600'">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <span class="text-xs font-medium mt-1">Home</span>
        </router-link>

        <router-link to="/program" class="flex flex-col items-center justify-center transition-colors"
          :class="$route.path === '/program' ? 'text-green-600 bg-green-50' : 'text-gray-600'">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
          <span class="text-xs font-medium mt-1">Program</span>
        </router-link>

        <router-link to="/keuangan" class="flex flex-col items-center justify-center transition-colors"
          :class="$route.path === '/keuangan' ? 'text-green-600 bg-green-50' : 'text-gray-600'">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <span class="text-xs font-medium mt-1">Keuangan</span>
        </router-link>

        <router-link to="/pengaduan" class="flex flex-col items-center justify-center transition-colors"
          :class="$route.path === '/pengaduan' ? 'text-green-600 bg-green-50' : 'text-gray-600'">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
          </svg>
          <span class="text-xs font-medium mt-1">Pengaduan</span>
        </router-link>

        <button @click="toggleMobileMenu" class="flex flex-col items-center justify-center text-gray-600 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <span class="text-xs font-medium mt-1">Menu</span>
        </button>
      </div>
    </nav>

    <div v-if="showMobileMenu" @click="toggleMobileMenu" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <div :class="['lg:hidden fixed top-0 right-0 h-full w-72 bg-white shadow-2xl z-50 transform transition-transform duration-300', showMobileMenu ? 'translate-x-0' : 'translate-x-full']">
      <div class="p-6">
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-xl font-bold text-gray-900">Menu</h2>
          <button @click="toggleMobileMenu" class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="flex items-center gap-3 mb-8 p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl">
          <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
            {{ currentUser?.name?.charAt(0).toUpperCase() }}
          </div>
          <div>
            <p class="font-bold text-gray-900">{{ currentUser?.name }}</p>
            <p class="text-xs text-gray-600">Administrator</p>
          </div>
        </div>

        <nav class="space-y-2">
          <router-link to="/profileadmin" @click="toggleMobileMenu" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span class="font-medium text-gray-900">Profil Saya</span>
          </router-link>

          <router-link to="/manajemen-akun" @click="toggleMobileMenu" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span class="font-medium text-gray-900">Manajemen Akun</span>
          </router-link>

          <div class="border-t border-gray-200 my-4"></div>

          <button @click="handleLogout" class="w-full flex items-center gap-3 p-3 rounded-xl hover:bg-red-50 transition-colors text-red-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="font-medium">Logout</span>
          </button>
        </nav>
      </div>
    </div>

    <div class="flex-1 lg:ml-20 pb-16 lg:pb-0">
      <transition name="slide-fade">
        <div v-if="toast.show" class="fixed top-4 left-4 right-4 lg:top-6 lg:left-auto lg:right-6 lg:max-w-md z-[150] animate-slideIn">
          <div class="rounded-2xl shadow-2xl p-4 flex items-center gap-3 backdrop-blur-sm"
               :class="toast.type === 'success' ? 'bg-green-500' : 'bg-red-500'">
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
              <svg v-if="toast.type === 'success'" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <svg v-else class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <p class="text-white font-semibold text-sm lg:text-base">{{ toast.message }}</p>
          </div>
        </div>
      </transition>

      <section class="relative bg-gradient-to-br from-green-600 via-green-700 to-green-800 py-8 lg:py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0 bg-grid-white/10"></div>
        <div class="max-w-7xl mx-auto px-4 lg:px-6 relative">
          <div class="flex items-center gap-2 lg:gap-3 mb-3 lg:mb-4">
            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 rounded-xl lg:rounded-2xl backdrop-blur-sm flex items-center justify-center">
              <svg class="w-5 h-5 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
              </svg>
            </div>
            <span class="text-green-200 font-medium text-sm lg:text-base">Admin Panel</span>
          </div>
          <h1 class="text-2xl lg:text-4xl md:text-5xl font-black text-white mb-2 lg:mb-3 tracking-tight">Dashboard Pengaduan</h1>
          <p class="text-green-100 text-sm lg:text-lg">Kelola dan tangani pengaduan dari warga desa</p>
          
          <button @click="exportPengaduan" :disabled="isExporting"
                  class="mt-4 lg:mt-6 px-4 lg:px-6 py-2 lg:py-3 bg-white/20 backdrop-blur-sm text-white rounded-lg lg:rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 flex items-center gap-2 border border-white/30 text-sm lg:text-base">
            <svg v-if="isExporting" class="animate-spin h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ isExporting ? 'Mengexport...' : 'Export PDF' }}</span>
          </button>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-4 lg:px-6 -mt-6 lg:-mt-12 relative z-10">
        <div class="bg-white rounded-xl lg:rounded-2xl shadow-xl p-4 lg:p-6 border border-gray-100">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-4">
            <div>
              <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">Cari Pengaduan</label>
              <input v-model="searchQuery" @input="fetchPengaduan" type="text" placeholder="Cari berdasarkan judul..."
                     class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"/>
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">Filter Kategori</label>
              <select v-model="selectedKategori" @change="fetchPengaduan"
                      class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all bg-white">
                <option value="">Semua Kategori</option>
                <option value="Infrastruktur">Infrastruktur</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Pelayanan">Pelayanan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-4 lg:px-6 py-4 lg:py-8">
        <div v-if="loading" class="text-center py-12 lg:py-20">
          <div class="inline-block animate-spin rounded-full h-12 w-12 lg:h-16 lg:w-16 border-4 border-green-200 border-t-green-600"></div>
          <p class="mt-4 lg:mt-6 text-green-700 text-base lg:text-lg font-bold">Memuat data pengaduan...</p>
        </div>

        <div v-else>
          <div v-if="pengaduanList.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
            <div v-for="pengaduan in pengaduanList" :key="pengaduan.id" @click="openDetail(pengaduan)"
              class="group bg-white rounded-xl lg:rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 cursor-pointer overflow-hidden border-2 border-gray-100 hover:border-green-200 hover:-translate-y-1 flex flex-col">
            
            <div class="p-4 lg:p-6 flex-1 flex flex-col">
              <div class="flex items-start justify-between mb-2 lg:mb-3">
                <span :class="['px-2 lg:px-3 py-1 rounded-lg text-xs font-bold', getKategoriColor(pengaduan.kategori)]">
                  {{ pengaduan.kategori }}
                </span>
                <span :class="['px-2 lg:px-3 py-1 rounded-lg text-xs font-bold', getStatusColor(pengaduan.status)]">
                  {{ pengaduan.status.toUpperCase() }}
                </span>
              </div>

              <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-2 lg:mb-3 line-clamp-2 group-hover:text-green-600 transition-colors">
                {{ pengaduan.judul_permasalahan }}
              </h3>

              <div class="space-y-1.5 lg:space-y-2 text-xs lg:text-sm text-gray-600 mb-2 lg:mb-3">
                <div class="flex items-center gap-2">
                  <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                  <span class="font-semibold truncate">{{ pengaduan.nama_pengirim }}</span>
                </div>
                <div class="flex items-center gap-2">
                  <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                  </svg>
                  <span class="font-semibold">RT {{ pengaduan.rt }} - No. {{ pengaduan.nomor_rumah }}</span>
                </div>
              </div>

              <p class="text-gray-600 text-xs lg:text-sm line-clamp-2 flex-1">{{ pengaduan.detail_permasalahan }}</p>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-green-600 px-4 lg:px-6 py-2.5 lg:py-3 flex items-center justify-center gap-2 text-white font-bold text-xs lg:text-sm group-hover:from-green-600 group-hover:to-green-700 transition-all mt-auto">
              <span>Lihat Detail & Tanggapi</span>
              <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
              </svg>
            </div>
          </div>
          </div>

          <div v-else class="text-center py-12 lg:py-20">
            <div class="w-16 h-16 lg:w-24 lg:h-24 bg-gray-100 rounded-2xl lg:rounded-3xl flex items-center justify-center mx-auto mb-4 lg:mb-6">
              <svg class="w-8 h-8 lg:w-12 lg:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
              </svg>
            </div>
            <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-2">Tidak Ada Pengaduan</h3>
            <p class="text-gray-600 text-sm lg:text-base">Belum ada pengaduan yang ditemukan dengan filter ini</p>
          </div>
        </div>
      </div>
    </div>

    <div v-if="showModal" @click="closeModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl lg:rounded-3xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 lg:px-8 py-4 lg:py-6 flex items-center justify-between rounded-t-2xl lg:rounded-t-3xl">
          <div>
            <h2 class="text-xl lg:text-2xl font-black text-white">Detail Pengaduan</h2>
            <p class="text-green-100 text-xs lg:text-sm">Informasi lengkap dan tanggapan</p>
          </div>
          <button @click="closeModal" class="text-white hover:bg-white/20 p-2 rounded-xl transition-all">
            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="p-6 lg:p-8 space-y-5 lg:space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-5">
            <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-xl lg:rounded-2xl p-4 lg:p-6 border-2 border-green-100">
              <p class="text-xs lg:text-sm text-green-600 font-bold mb-2 lg:mb-3">DATA PELAPOR</p>
              <p class="text-lg lg:text-xl font-bold text-gray-900 mb-2">{{ selectedPengaduan.nama_pengirim }}</p>
              <div class="space-y-1 text-xs lg:text-sm text-gray-600">
                <p class="font-semibold">RT {{ selectedPengaduan.rt }} - No. {{ selectedPengaduan.nomor_rumah }}</p>
                <p class="font-semibold">{{ selectedPengaduan.no_hp }}</p>
              </div>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl lg:rounded-2xl p-4 lg:p-6 border-2 border-purple-100">
              <p class="text-xs lg:text-sm text-purple-600 font-bold mb-2 lg:mb-3">KATEGORI & STATUS</p>
              <div class="flex flex-wrap gap-2 lg:gap-3 mb-2 lg:mb-3">
                <span :class="['px-3 lg:px-4 py-1.5 lg:py-2 rounded-lg lg:rounded-xl text-xs font-bold', getKategoriColor(selectedPengaduan.kategori)]">
                  {{ selectedPengaduan.kategori }}
                </span>
                <span :class="['px-3 lg:px-4 py-1.5 lg:py-2 rounded-lg lg:rounded-xl text-xs font-bold', getStatusColor(selectedPengaduan.status)]">
                  {{ selectedPengaduan.status.toUpperCase() }}
                </span>
              </div>
              <p class="text-xs lg:text-sm text-gray-600 font-semibold">{{ formatDate(selectedPengaduan.created_at) }}</p>
            </div>
          </div>

          <div>
            <label class="text-xs lg:text-sm font-bold text-gray-700 mb-2 lg:mb-3 flex items-center gap-2">Judul Permasalahan</label>
            <div class="bg-gray-50 rounded-xl lg:rounded-2xl p-4 lg:p-5 border-2 border-gray-100">
              <p class="text-gray-900 font-bold text-base lg:text-lg">{{ selectedPengaduan.judul_permasalahan }}</p>
            </div>
          </div>

          <div>
            <label class="text-xs lg:text-sm font-bold text-gray-700 mb-2 lg:mb-3 flex items-center gap-2">Detail Permasalahan</label>
            <div class="bg-gray-50 rounded-xl lg:rounded-2xl p-4 lg:p-5 border-2 border-gray-100">
              <p class="text-gray-700 whitespace-pre-wrap leading-relaxed text-sm lg:text-base">{{ selectedPengaduan.detail_permasalahan }}</p>
            </div>
          </div>

          <div v-if="selectedPengaduan.foto_1 || selectedPengaduan.foto_2">
            <label class="text-xs lg:text-sm font-bold text-gray-700 mb-3 lg:mb-4 flex items-center gap-2">Foto Bukti</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-5">
              <div v-if="selectedPengaduan.foto_1" class="rounded-xl lg:rounded-2xl overflow-hidden shadow-xl border-2 border-gray-100">
                <img :src="`/${selectedPengaduan.foto_1}`" alt="Foto 1" class="w-full h-48 lg:h-72 object-cover" />
              </div>
              <div v-if="selectedPengaduan.foto_2" class="rounded-xl lg:rounded-2xl overflow-hidden shadow-xl border-2 border-gray-100">
                <img :src="`/${selectedPengaduan.foto_2}`" alt="Foto 2" class="w-full h-48 lg:h-72 object-cover" />
              </div>
            </div>
          </div>

          <div class="border-t-2 border-gray-200 pt-6 lg:pt-8 mt-6 lg:mt-8">
            <h3 class="text-xl lg:text-2xl font-black text-gray-900 mb-4 lg:mb-6">Update Status & Tanggapan</h3>
            
            <div class="space-y-4 lg:space-y-5">
              <div>
                <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">
                  Status Pengaduan <span class="text-red-500">*</span>
                </label>
                <select v-model="updateForm.status"
                        class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                  <option value="diterima">Diterima</option>
                  <option value="diproses">Diproses</option>
                  <option value="selesai">Selesai</option>
                  <option value="ditolak">Ditolak</option>
                </select>
              </div>

              <div>
                <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">
                  Tanggapan <span class="text-red-500">*</span>
                </label>
                <textarea v-model="updateForm.tanggapan" rows="5"
                          class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all resize-none"
                          placeholder="Berikan tanggapan untuk pengaduan ini..."></textarea>
              </div>

              <button @click="updatePengaduan" :disabled="updating"
                      class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 lg:py-4 rounded-lg lg:rounded-xl font-bold text-base lg:text-lg hover:shadow-lg hover:shadow-green-500/30 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2 lg:gap-3">
                <svg v-if="updating" class="animate-spin h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{ updating ? 'Menyimpan Perubahan...' : 'Simpan Perubahan' }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'
import { pengaduanAPI, authService } from '../services/api'
import api from '../services/api'

const isExporting = ref(false)
const showMobileMenu = ref(false)

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value
}

const exportPengaduan = async () => {
  isExporting.value = true
  try {
    const response = await pengaduanAPI.exportPdf()
    const url = window.URL.createObjectURL(new Blob([response.data]))
    const link = document.createElement('a')
    link.href = url
    link.setAttribute('download', `pengaduan-${new Date().toISOString().split('T')[0]}.pdf`)
    document.body.appendChild(link)
    link.click()
    link.remove()
    showToast('Export berhasil!')
  } catch (error) {
    showToast('Gagal export data', 'error')
  } finally {
    isExporting.value = false
  }
}

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const pengaduanList = ref([])
const loading = ref(false)
const searchQuery = ref('')
const selectedKategori = ref('')
const showModal = ref(false)
const selectedPengaduan = ref(null)
const updating = ref(false)
const toast = ref({ show: false, message: '', type: '' })

const updateForm = ref({
  status: '',
  tanggapan: ''
})

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

const checkAuthStatus = async () => {
  const token = localStorage.getItem('token')
  
  if (!token) {
    isLoggedIn.value = false
    currentUser.value = null
    router.push('/login')
    return
  }
  
  try {
    const response = await api.get('/user')
    isLoggedIn.value = true
    currentUser.value = response.data
    localStorage.setItem('user', JSON.stringify(response.data))
  } catch (error) {
    console.error('Auth check failed:', error)
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    isLoggedIn.value = false
    currentUser.value = null
    router.push('/login')
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
    showMobileMenu.value = false
    router.push('/login')
  }
}

const fetchPengaduan = async () => {
  loading.value = true
  try {
    const params = {}
    if (searchQuery.value) params.search = searchQuery.value
    if (selectedKategori.value) params.kategori = selectedKategori.value
    
    const response = await pengaduanAPI.getAll(params)
    pengaduanList.value = response.data
  } catch (error) {
    console.error('Error fetching pengaduan:', error)
    showToast('Gagal memuat data pengaduan', 'error')
  } finally {
    loading.value = false
  }
}

const openDetail = (pengaduan) => {
  selectedPengaduan.value = pengaduan
  updateForm.value.status = pengaduan.status
  updateForm.value.tanggapan = pengaduan.tanggapan || ''
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
  selectedPengaduan.value = null
}

const updatePengaduan = async () => {
  if (!updateForm.value.tanggapan.trim()) {
    showToast('Mohon isi tanggapan!', 'error')
    return
  }
  
  updating.value = true
  try {
    await pengaduanAPI.update(selectedPengaduan.value.id, updateForm.value)
    showToast('Pengaduan berhasil diupdate!')
    closeModal()
    fetchPengaduan()
  } catch (error) {
    console.error('Error updating pengaduan:', error)
    showToast('Gagal mengupdate pengaduan', 'error')
  } finally {
    updating.value = false
  }
}

const getKategoriColor = (kategori) => {
  const colors = {
    'Infrastruktur': 'bg-orange-100 text-orange-700',
    'Kebersihan': 'bg-green-100 text-green-700',
    'Keamanan': 'bg-red-100 text-red-700',
    'Pelayanan': 'bg-blue-100 text-blue-700',
    'Lainnya': 'bg-gray-100 text-gray-700'
  }
  return colors[kategori] || 'bg-gray-100 text-gray-700'
}

const getStatusColor = (status) => {
  const colors = {
    'diterima': 'bg-blue-100 text-blue-700',
    'diproses': 'bg-yellow-100 text-yellow-700',
    'selesai': 'bg-green-100 text-green-700',
    'ditolak': 'bg-red-100 text-red-700'
  }
  return colors[status] || 'bg-gray-100 text-gray-700'
}

const formatDate = (dateString) => {
  const date = new Date(dateString)
  return date.toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}

onMounted(() => {
  checkAuthStatus()
  fetchPengaduan()
  window.addEventListener('storage', checkAuthStatus)
  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) checkAuthStatus()
  })
})

onUnmounted(() => {
  window.removeEventListener('storage', checkAuthStatus)
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

* {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
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

.bg-grid-white\/10 {
  background-image: 
    linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
    linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
  background-size: 40px 40px;
}
</style>