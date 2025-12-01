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

    <div class="flex-1 lg:ml-20 pb-16 lg:pb-0 overflow-x-hidden">
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
              </svg>
            </div>
            <span class="text-green-200 font-medium text-sm lg:text-base">Admin Panel</span>
          </div>
          <h1 class="text-2xl lg:text-4xl md:text-5xl font-black text-white mb-2 lg:mb-3 tracking-tight">Kelola Program RW</h1>
          <p class="text-green-100 text-sm lg:text-lg">Manajemen program Dana Sosial, Bank Sampah, Jadwal Ronda & Kebersihan</p>
          
          <button 
            @click="handleExport" 
            :disabled="isExporting"
            class="mt-4 lg:mt-6 px-4 lg:px-6 py-2 lg:py-3 text-sm lg:text-base bg-white/20 backdrop-blur-sm text-white rounded-lg lg:rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 flex items-center gap-2 border border-white/30">
            <svg v-if="isExporting" class="animate-spin h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ isExporting ? 'Mengexport...' : 'Export PDF' }}</span>
          </button>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-4 lg:px-6 -mt-6 lg:-mt-8 relative z-10">
        <div class="bg-white rounded-xl lg:rounded-2xl shadow-xl p-2 flex gap-2 backdrop-blur-sm border border-gray-100">
          <button 
            v-for="tab in tabs" 
            :key="tab.id"
            @click="activeTab = tab.id"
            class="flex-1 px-3 lg:px-6 py-2.5 lg:py-3 rounded-lg lg:rounded-xl font-semibold transition-all duration-300 text-xs lg:text-base"
            :class="activeTab === tab.id 
              ? 'bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg shadow-green-500/30' 
              : 'text-gray-600 hover:bg-gray-50'">
            {{ tab.label }}
          </button>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-4 lg:px-6 py-4 lg:py-8">
        <div v-if="activeTab === 'danasosial'" class="bg-white rounded-xl lg:rounded-2xl shadow-xl overflow-hidden">
          <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 lg:px-6 py-4 lg:py-5 flex justify-between items-center">
            <div>
              <h2 class="text-xl lg:text-2xl font-bold text-white">Dana Sosial</h2>
              <p class="text-green-100 text-xs lg:text-sm">Data penerima bantuan</p>
            </div>
            <button @click="openCreateModal('danasosial', 'Tambah Data Dana Sosial')" class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </button>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="bg-gray-50 border-b-2 border-green-200">
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">No</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Nama Penerima</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Tanggal</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Kategori</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Nominal</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Foto</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Action</th>
                </tr>
              </thead>
              <tbody v-if="isLoading">
                <tr v-for="n in 5" :key="n" class="border-b border-gray-100">
                  <td v-for="col in 7" :key="col" class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="h-3 lg:h-4 bg-gray-200 rounded animate-pulse"></div>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr v-for="(item, index) in danaSosialData" :key="index" class="border-b border-gray-100 hover:bg-green-50 transition-colors">
                  <td class="px-4 lg:px-6 py-4 lg:py-5 text-gray-700 font-medium text-sm lg:text-base">{{ item.no }}</td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="flex items-center space-x-2 lg:space-x-3">
                      <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-green-700 font-semibold text-xs lg:text-base">{{ item.nama_penerima.charAt(0) }}</span>
                      </div>
                      <span class="text-gray-800 font-medium text-sm lg:text-base">{{ item.nama_penerima }}</span>
                    </div>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm bg-blue-100 text-blue-700">
                      {{ item.tanggal_penyerahan }}
                    </span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span 
                      class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm font-medium"
                      :class="{
                        'bg-red-100 text-red-700': item.kategori_bantuan === 'korban_meninggal',
                        'bg-yellow-100 text-yellow-700': item.kategori_bantuan === 'penderita_sakit',
                        'bg-orange-100 text-orange-700': item.kategori_bantuan === 'korban_bencana'
                      }">
                      {{ getKategoriLabel(item.kategori_bantuan) }}
                    </span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="text-gray-800 font-bold text-sm lg:text-base">{{ item.nominal_bantuan }}</span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <img v-if="item.foto_penyerahan" :src="item.foto_penyerahan" class="w-12 h-12 lg:w-16 lg:h-16 rounded-lg object-cover cursor-pointer hover:scale-110 transition-transform" @click="viewImage(item.foto_penyerahan)">
                    <span v-else class="text-gray-400 text-xs lg:text-sm">Tidak ada foto</span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="flex items-center gap-1 lg:gap-2">
                      <button @click="openEditModal(item, index, 'danasosial', 'Edit Data Dana Sosial')" class="p-1.5 lg:p-2 hover:bg-green-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                      </button>
                      <button @click="openDeleteModal(index, 'danasosial', item)" class="p-1.5 lg:p-2 hover:bg-red-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="bg-gray-50 px-4 lg:px-6 py-3 lg:py-4 border-t">
            <p class="text-xs lg:text-sm text-gray-600">Menampilkan {{ danaSosialData.length }} data</p>
          </div>
        </div>

        <div v-if="activeTab === 'banksampah'" class="bg-white rounded-xl lg:rounded-2xl shadow-xl overflow-hidden">
          <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 lg:px-6 py-4 lg:py-5 flex justify-between items-center">
            <div>
              <h2 class="text-xl lg:text-2xl font-bold text-white">Rekening Bank Sampah</h2>
              <p class="text-green-100 text-xs lg:text-sm">Data rekening warga</p>
            </div>
            <button @click="openCreateModal('banksampah', 'Tambah Rekening')" class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </button>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="bg-gray-50 border-b-2 border-green-200">
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">No</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Nama</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Total Sampah</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Total Konversi</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Saldo Cair</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Saldo Tersisa</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Action</th>
                </tr>
              </thead>
              <tbody v-if="isLoading">
                <tr v-for="n in 5" :key="n" class="border-b border-gray-100">
                  <td v-for="col in 7" :key="col" class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="h-3 lg:h-4 bg-gray-200 rounded animate-pulse"></div>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr v-for="(item, index) in bankSampahData" :key="index" class="border-b border-gray-100 hover:bg-green-50 transition-colors">
                  <td class="px-4 lg:px-6 py-4 lg:py-5 text-gray-700 font-medium text-sm lg:text-base">{{ item.no }}</td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="flex items-center space-x-2 lg:space-x-3">
                      <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-green-700 font-semibold text-xs lg:text-base">{{ item.nama.charAt(0) }}</span>
                      </div>
                      <span class="text-gray-800 font-medium text-sm lg:text-base">{{ item.nama }}</span>
                    </div>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm bg-emerald-100 text-emerald-700 font-semibold">
                      {{ item.totalSampah }}
                    </span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm bg-blue-100 text-blue-700 font-bold">
                      {{ item.totalKonversi }}
                    </span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm bg-green-100 text-green-700 font-bold">
                      {{ item.saldoCair }}
                    </span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm bg-yellow-100 text-yellow-700 font-bold">
                      {{ item.saldoTersisa }}
                    </span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="flex items-center gap-1 lg:gap-2">
                      <button @click="openEditModal(item, index, 'banksampah', 'Edit Rekening')" class="p-1.5 lg:p-2 hover:bg-green-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                      </button>
                      <button @click="openDeleteModal(index, 'banksampah', item)" class="p-1.5 lg:p-2 hover:bg-red-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="bg-gray-50 px-4 lg:px-6 py-3 lg:py-4 border-t">
            <p class="text-xs lg:text-sm text-gray-600">Menampilkan {{ bankSampahData.length }} rekening</p>
          </div>
        </div>

        <div v-if="activeTab === 'ronda'" class="bg-white rounded-xl lg:rounded-2xl shadow-xl overflow-hidden">
          <div class="bg-gradient-to-r from-green-600 to-green-700 px-4 lg:px-6 py-4 lg:py-5 flex justify-between items-center">
            <div>
              <h2 class="text-xl lg:text-2xl font-bold text-white">Jadwal Ronda</h2>
              <p class="text-green-100 text-xs lg:text-sm">Data jadwal ronda warga</p>
            </div>
            <button @click="openCreateModal('ronda', 'Tambah Jadwal Ronda')" class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </button>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="bg-gray-50 border-b-2 border-green-200">
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">No</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Tanggal</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Peserta Ronda</th>
                  <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Action</th>
                </tr>
              </thead>
              <tbody v-if="isLoading">
                <tr v-for="n in 5" :key="n" class="border-b border-gray-100">
                  <td v-for="col in 4" :key="col" class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="h-3 lg:h-4 bg-gray-200 rounded animate-pulse"></div>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr v-for="(item, index) in jadwalRondaData" :key="index" class="border-b border-gray-100 hover:bg-green-50 transition-colors">
                  <td class="px-4 lg:px-6 py-4 lg:py-5 text-gray-700 font-medium text-sm lg:text-base">{{ item.no }}</td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="flex items-center space-x-2 lg:space-x-3">
                      <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                      </div>
                      <span class="text-gray-800 font-medium text-sm lg:text-base">{{ item.tanggal }}</span>
                    </div>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <span class="text-gray-600 text-sm lg:text-base">{{ item.peserta_ronda }}</span>
                  </td>
                  <td class="px-4 lg:px-6 py-4 lg:py-5">
                    <div class="flex items-center gap-1 lg:gap-2">
                      <button @click="openEditModal(item, index, 'ronda', 'Edit Jadwal')" class="p-1.5 lg:p-2 hover:bg-green-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                      </button>
                      <button @click="openDeleteModal(index, 'ronda', item)" class="p-1.5 lg:p-2 hover:bg-red-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="bg-gray-50 px-4 lg:px-6 py-3 lg:py-4 border-t">
            <p class="text-xs lg:text-sm text-gray-600">Menampilkan {{ jadwalRondaData.length }} jadwal</p>
          </div>
        </div>

        <div v-if="activeTab === 'cleaning'" class="space-y-4 lg:space-y-6">
          <div class="bg-white rounded-xl lg:rounded-2xl shadow-xl p-4 lg:p-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-3 lg:gap-0 mb-4 lg:mb-6">
              <div>
                <h2 class="text-xl lg:text-2xl font-bold text-gray-800">Program Kebersihan</h2>
                <p class="text-gray-600 text-xs lg:text-sm">Kelola jadwal gotong royong</p>
              </div>
              <button @click="openCreateModal('cleaning', 'Tambah Program Kebersihan')" class="w-full lg:w-auto px-4 lg:px-6 py-2 lg:py-3 text-sm lg:text-base bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Program
              </button>
            </div>

            <div v-if="isLoading" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
              <div v-for="n in 3" :key="n" class="border border-gray-200 rounded-xl overflow-hidden">
                <div class="h-40 lg:h-48 bg-gray-200 animate-pulse"></div>
                <div class="p-4 lg:p-5 space-y-3">
                  <div class="h-5 lg:h-6 bg-gray-200 rounded animate-pulse"></div>
                  <div class="h-3 lg:h-4 bg-gray-200 rounded animate-pulse w-3/4"></div>
                  <div class="h-3 lg:h-4 bg-gray-200 rounded animate-pulse w-1/2"></div>
                </div>
              </div>
            </div>

            <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
              <div v-for="(event, index) in cleaningEvents" :key="index" class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                <div class="relative h-40 lg:h-48">
                  <img :src="event.image" :alt="event.title" class="w-full h-full object-cover">
                  <div class="absolute top-2 lg:top-3 right-2 lg:right-3">
                    <span 
                      class="px-2 lg:px-3 py-1 rounded-full text-xs font-bold text-white"
                      :class="{
                        'bg-green-500': event.status === 'completed',
                        'bg-red-500 animate-pulse': event.status === 'thisweek',
                        'bg-blue-500': event.status === 'upcoming'
                      }">
                      {{ event.status === 'completed' ? 'Selesai' : event.status === 'thisweek' ? 'Minggu Ini' : 'Akan Datang' }}
                    </span>
                  </div>
                </div>
                
                <div class="p-4 lg:p-5">
                  <h3 class="text-lg lg:text-xl font-bold text-gray-800 mb-2">{{ event.title }}</h3>
                  <div class="space-y-1.5 lg:space-y-2 text-xs lg:text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                      <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                      </svg>
                      <span>{{ event.date }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                      </svg>
                      <span>{{ event.time }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      </svg>
                      <span>{{ event.location }}</span>
                    </div>
                  </div>

                  <div class="flex gap-2 mt-3 lg:mt-4 pt-3 lg:pt-4 border-t">
                    <button @click="openEditModal(event, index, 'cleaning', 'Edit Program')" class="flex-1 px-3 lg:px-4 py-1.5 lg:py-2 text-xs lg:text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors font-medium">
                      Edit
                    </button>
                    <button @click="openDeleteModal(index, 'cleaning', event)" class="flex-1 px-3 lg:px-4 py-1.5 lg:py-2 text-xs lg:text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors font-medium">
                      Hapus
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="showFormModal" @click="closeFormModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4 overflow-y-auto">
      <div @click.stop class="bg-white rounded-2xl lg:rounded-3xl shadow-2xl max-w-md w-full my-8"><div class="bg-gradient-to-r from-green-600 to-green-700 px-5 lg:px-6 py-4 lg:py-5 rounded-t-2xl lg:rounded-t-3xl">
          <h2 class="text-lg lg:text-xl font-bold text-white">
            {{ formMode === 'create' ? 'Tambah Data' : 'Edit Data' }}
          </h2>
          <p class="text-green-100 text-xs lg:text-sm mt-1">{{ formTitle }}</p>
        </div>

        <div class="p-5 lg:p-6 space-y-3 lg:space-y-4">
          <template v-if="currentTable === 'danasosial'">
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Nama Penerima <span class="text-red-500">*</span></label>
              <input v-model="danaSosialForm.nama_penerima" type="text" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama penerima">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Tanggal Penyerahan <span class="text-red-500">*</span></label>
              <input v-model="danaSosialForm.tanggal_penyerahan" type="date" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Kategori Bantuan <span class="text-red-500">*</span></label>
              <select v-model="danaSosialForm.kategori_bantuan" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="">Pilih Kategori</option>
                <option value="korban_meninggal">Korban Meninggal</option>
                <option value="penderita_sakit">Penderita Sakit</option>
                <option value="korban_bencana">Korban Bencana</option>
              </select>
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Nominal Bantuan (Rp) <span class="text-red-500">*</span></label>
              <input v-model.number="danaSosialForm.nominal_bantuan" type="number" step="0.01" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Upload Foto Penyerahan <span class="text-red-500">*</span></label>
              
              <div v-if="!danaSosialForm.imagePreview" @click="$refs.fileInputDanaSosial.click()" class="border-2 border-dashed border-gray-300 rounded-lg p-4 lg:p-6 text-center hover:border-green-500 hover:bg-green-50/50 transition-all cursor-pointer">
                <input type="file" accept="image/*" @change="handleDanaSosialImageChange" class="hidden" ref="fileInputDanaSosial" />
                <svg class="w-10 h-10 lg:w-12 lg:h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-600 font-medium text-sm lg:text-base">Klik untuk upload foto</p>
                <p class="text-xs text-gray-500 mt-1">PNG, JPG (Max 5MB)</p>
              </div>
              
              <div v-else class="relative rounded-lg overflow-hidden">
                <img :src="danaSosialForm.imagePreview" class="w-full h-40 lg:h-48 object-cover" />
                <button @click="removeDanaSosialImage" type="button" class="absolute top-2 right-2 bg-red-500 text-white p-1.5 lg:p-2 rounded-full hover:bg-red-600">
                  <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>
            </div>
          </template>

          <template v-if="currentTable === 'banksampah'">
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Nama</label>
              <input v-model="bankSampahForm.nama" type="text" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Total Sampah (kg)</label>
              <input v-model.number="bankSampahForm.total_sampah" type="number" step="0.01" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0.00">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Total Konversi (Rp)</label>
              <input v-model.number="bankSampahForm.total_konversi" type="number" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Saldo Cair (Rp)</label>
              <input v-model.number="bankSampahForm.saldo_cair" type="number" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Saldo Tersisa (Rp)</label>
              <input v-model.number="bankSampahForm.saldo_tersisa" type="number" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0">
            </div>
          </template>

          <template v-if="currentTable === 'ronda'">
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Tanggal</label>
              <input v-model="jadwalRondaForm.tanggal" type="date" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Peserta Ronda</label>
              <textarea v-model="jadwalRondaForm.peserta_ronda" rows="3" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Nama peserta ronda"></textarea>
            </div>
          </template>

          <template v-if="currentTable === 'cleaning'">
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Judul Program</label>
              <input v-model="cleaningForm.title" type="text" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Contoh: Gotong Royong">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Tanggal</label>
              <input v-model="cleaningForm.date" type="text" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Minggu, 10 November 2025">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Waktu</label>
              <input v-model="cleaningForm.time" type="text" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="jam 9 - selesai">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Lokasi</label>
              <input v-model="cleaningForm.location" type="text" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Jalan Utama">
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Upload Foto <span class="text-red-500">*</span></label>
              
              <div v-if="!cleaningForm.imagePreview" @click="$refs.fileInputCleaning.click()" class="border-2 border-dashed border-gray-300 rounded-lg p-4 lg:p-6 text-center hover:border-green-500 hover:bg-green-50/50 transition-all cursor-pointer">
                <input type="file" accept="image/*" @change="handleCleaningImageChange" class="hidden" ref="fileInputCleaning" />
                <svg class="w-10 h-10 lg:w-12 lg:h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-600 font-medium text-sm lg:text-base">Klik untuk upload foto</p>
                <p class="text-xs text-gray-500 mt-1">PNG, JPG (Max 5MB)</p>
              </div>
              
              <div v-else class="relative rounded-lg overflow-hidden">
                <img :src="cleaningForm.imagePreview" class="w-full h-40 lg:h-48 object-cover" />
                <button @click="removeCleaningImage" type="button" class="absolute top-2 right-2 bg-red-500 text-white p-1.5 lg:p-2 rounded-full hover:bg-red-600">
                  <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>
            </div>
            <div>
              <label class="block text-xs lg:text-sm font-medium text-gray-700 mb-2">Status</label>
              <select v-model="cleaningForm.status" class="w-full px-3 lg:px-4 py-2 text-sm lg:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="upcoming">Akan Datang</option>
                <option value="thisweek">Minggu Ini</option>
                <option value="completed">Selesai</option>
              </select>
            </div>
          </template>
        </div>

        <div class="px-5 lg:px-6 py-3 lg:py-4 bg-gray-50 rounded-b-2xl lg:rounded-b-3xl flex gap-2 lg:gap-3 justify-end">
          <button @click="closeFormModal" class="px-3 lg:px-4 py-1.5 lg:py-2 text-sm lg:text-base bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button 
            @click="saveData"
            :disabled="isSaving"
            class="px-3 lg:px-4 py-1.5 lg:py-2 text-sm lg:text-base bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
            <svg v-if="isSaving" class="animate-spin h-4 w-4 lg:h-5 lg:w-5 text-white" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isSaving ? 'Menyimpan...' : (formMode === 'create' ? 'Tambah' : 'Simpan') }}
          </button>
        </div>
      </div>
    </div>

    <div v-if="showDeleteModal" @click="showDeleteModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl lg:rounded-3xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-5 lg:px-6 py-4 lg:py-5 rounded-t-2xl lg:rounded-t-3xl">
          <h2 class="text-lg lg:text-xl font-bold text-white">Konfirmasi Hapus</h2>
          <p class="text-red-100 text-xs lg:text-sm mt-1">Data yang dihapus tidak dapat dikembalikan</p>
        </div>

        <div class="p-5 lg:p-6">
          <div class="flex items-center gap-3 lg:gap-4 mb-3 lg:mb-4">
            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-800 font-medium text-sm lg:text-base">Apakah Anda yakin ingin menghapus data ini?</p>
              <p class="text-gray-600 text-xs lg:text-sm mt-1">
                <span v-if="currentTable === 'danasosial'">{{ danaSosialForm.nama_penerima }}</span>
                <span v-else-if="currentTable === 'banksampah'">{{ bankSampahForm.nama }}</span>
                <span v-else-if="currentTable === 'ronda'">{{ jadwalRondaForm.tanggal }}</span>
                <span v-else-if="currentTable === 'cleaning'">{{ cleaningForm.title }}</span>
              </p>
            </div>
          </div>
        </div>

        <div class="px-5 lg:px-6 py-3 lg:py-4 bg-gray-50 rounded-b-2xl lg:rounded-b-3xl flex gap-2 lg:gap-3 justify-end">
          <button @click="showDeleteModal = false" class="px-3 lg:px-4 py-1.5 lg:py-2 text-sm lg:text-base bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button 
            @click="confirmDelete"
            :disabled="isDeleting"
            class="px-3 lg:px-4 py-1.5 lg:py-2 text-sm lg:text-base bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 flex items-center gap-2">
            <svg v-if="isDeleting" class="animate-spin h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isDeleting ? 'Menghapus...' : 'Hapus' }}
          </button>
        </div>
      </div>
    </div>

    <div v-if="showImageModal" @click="showImageModal = false" class="fixed inset-0 bg-black/80 z-[120] flex items-center justify-center p-4">
      <div @click.stop class="relative max-w-4xl w-full">
        <button @click="showImageModal = false" class="absolute -top-10 lg:-top-12 right-0 text-white hover:text-gray-300">
          <svg class="w-7 h-7 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
        <img :src="currentImage" class="w-full h-auto rounded-lg" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue'
import { useRouter } from 'vue-router'
import { danaSosialAPI, bankSampahAPI, jadwalRondaAPI, kebersihanAPI, authService } from '../services/api.js'
import api from '../services/api.js'

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const isLoading = ref(false)
const isSaving = ref(false)
const isDeleting = ref(false)
const toast = ref({ show: false, message: '', type: '' })
const showImageModal = ref(false)
const currentImage = ref('')
const showMobileMenu = ref(false)
const isExporting = ref(false)

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value
}

const handleExport = async () => {
  isExporting.value = true
  try {
    let response;
    let filename;
    
    switch(activeTab.value) {
      case 'danasosial':
        response = await danaSosialAPI.export()
        filename = `dana-sosial-${new Date().toISOString().split('T')[0]}.pdf`
        break
      case 'banksampah':
        response = await bankSampahAPI.exportPdf()
        filename = `bank-sampah-${new Date().toISOString().split('T')[0]}.pdf`
        break
      case 'ronda':
        response = await jadwalRondaAPI.exportPdf()
        filename = `jadwal-ronda-${new Date().toISOString().split('T')[0]}.pdf`
        break
      case 'cleaning':
        response = await kebersihanAPI.exportPdf()
        filename = `kebersihan-${new Date().toISOString().split('T')[0]}.pdf`
        break
      default:
        showToast('Tidak ada data untuk diexport', 'error')
        return
    }
    
    const url = window.URL.createObjectURL(new Blob([response.data]))
    const link = document.createElement('a')
    link.href = url
    link.setAttribute('download', filename)
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

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

const activeTab = ref('danasosial')
const tabs = [
  { id: 'danasosial', label: 'Dana Sosial' },
  { id: 'banksampah', label: 'Bank Sampah' },
  { id: 'ronda', label: 'Jadwal Ronda' },
  { id: 'cleaning', label: 'Program Kebersihan' }
]

const danaSosialData = ref([])
const bankSampahData = ref([])
const jadwalRondaData = ref([])
const cleaningEvents = ref([])

const showFormModal = ref(false)
const showDeleteModal = ref(false)
const formMode = ref('create')
const formTitle = ref('')
const editingIndex = ref(null)
const currentTable = ref('')

const danaSosialForm = ref({
  nama_penerima: '',
  tanggal_penyerahan: '',
  kategori_bantuan: '',
  nominal_bantuan: 0,
  foto_penyerahan: null,
  imagePreview: null
})

const bankSampahForm = ref({
  nama: '',
  total_sampah: 0,
  total_konversi: 0,
  saldo_cair: 0,
  saldo_tersisa: 0
})

const jadwalRondaForm = ref({
  tanggal: '',
  peserta_ronda: ''
})

const cleaningForm = ref({
  title: '',
  date: '',
  time: '',
  location: '',
  image: null,
  imagePreview: null,
  status: 'upcoming'
})

const fileInputDanaSosial = ref(null)
const fileInputCleaning = ref(null)

const getKategoriLabel = (kategori) => {
  const labels = {
    'korban_meninggal': 'Korban Meninggal',
    'penderita_sakit': 'Penderita Sakit',
    'korban_bencana': 'Korban Bencana'
  }
  return labels[kategori] || kategori
}

const viewImage = (imageUrl) => {
  currentImage.value = imageUrl
  showImageModal.value = true
}

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
      router.push('/login')
    }
  } else {
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

const fetchDanaSosial = async () => {
  isLoading.value = true
  try {
    const response = await danaSosialAPI.getAll()
    danaSosialData.value = response.data
      .sort((a, b) => a.id - b.id)
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
    showToast('Gagal memuat data Dana Sosial', 'error')
  } finally {
    isLoading.value = false
  }
}

const fetchBankSampah = async () => {
  isLoading.value = true
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
    showToast('Gagal memuat data Bank Sampah', 'error')
  } finally {
    isLoading.value = false
  }
}

const fetchJadwalRonda = async () => {
  isLoading.value = true
  try {
    const response = await jadwalRondaAPI.getAll()
    jadwalRondaData.value = response.data
      .sort((a, b) => new Date(b.tanggal) - new Date(a.tanggal))
      .map((item, index) => ({
        id: item.id,
        no: index + 1,
        tanggal: new Date(item.tanggal).toLocaleDateString('id-ID'),
        peserta_ronda: item.peserta_ronda
      }))
  } catch (error) {
    showToast('Gagal memuat data Jadwal Ronda', 'error')
  } finally {
    isLoading.value = false
  }
}

const fetchKebersihan = async () => {
  isLoading.value = true
  try {
    const response = await kebersihanAPI.getAll()
    
    const parseIndonesianDate = (dateString) => {
      const months = {
        'Januari': '01', 'Februari': '02', 'Maret': '03',
        'April': '04', 'Mei': '05', 'Juni': '06',
        'Juli': '07', 'Agustus': '08', 'September': '09',
        'Oktober': '10', 'November': '11', 'Desember': '12'
      }
      
      const parts = dateString.split(',')
      if (parts.length < 2) return new Date()
      
      const datePart = parts[1].trim()
      const dateArray = datePart.split(' ')
      
      if (dateArray.length < 3) return new Date()
      
      const day = dateArray[0].padStart(2, '0')
      const month = months[dateArray[1]] || '01'
      const year = dateArray[2]
      
      return new Date(`${year}-${month}-${day}`)
    }
    
    cleaningEvents.value = response.data
      .sort((a, b) => parseIndonesianDate(a.date) - parseIndonesianDate(b.date))
      .map((item, index) => ({
        ...item,
        no: index + 1,
        image: item.image ? `/storage/${item.image}` : null
      }))
  } catch (error) {
    showToast('Gagal memuat data Program Kebersihan', 'error')
  } finally {
    isLoading.value = false
  }
}

const handleDanaSosialImageChange = (event) => {
  const file = event.target.files[0]
  if (!file) return
  
  if (file.size > 5 * 1024 * 1024) {
    showToast('File terlalu besar! Max 5MB', 'error')
    return
  }
  
  danaSosialForm.value.foto_penyerahan = file
  const reader = new FileReader()
  reader.onload = (e) => {
    danaSosialForm.value.imagePreview = e.target.result
  }
  reader.readAsDataURL(file)
}

const removeDanaSosialImage = () => {
  danaSosialForm.value.foto_penyerahan = null
  danaSosialForm.value.imagePreview = null
  if (fileInputDanaSosial.value) {
    fileInputDanaSosial.value.value = ''
  }
}

const handleCleaningImageChange = (event) => {
  const file = event.target.files[0]
  if (!file) return
  
  if (file.size > 5 * 1024 * 1024) {
    showToast('File terlalu besar! Max 5MB', 'error')
    return
  }
  
  cleaningForm.value.image = file
  const reader = new FileReader()
  reader.onload = (e) => {
    cleaningForm.value.imagePreview = e.target.result
  }
  reader.readAsDataURL(file)
}

const removeCleaningImage = () => {
  cleaningForm.value.image = null
  cleaningForm.value.imagePreview = null
  if (fileInputCleaning.value) {
    fileInputCleaning.value.value = ''
  }
}

const openCreateModal = (tableType, title) => {
  currentTable.value = tableType
  formMode.value = 'create'
  formTitle.value = title
  
  if (tableType === 'danasosial') {
    danaSosialForm.value = { 
      nama_penerima: '', 
      tanggal_penyerahan: '', 
      kategori_bantuan: '', 
      nominal_bantuan: 0, 
      foto_penyerahan: null, 
      imagePreview: null 
    }
  } else if (tableType === 'banksampah') {
    bankSampahForm.value = { nama: '', total_sampah: 0, total_konversi: 0, saldo_cair: 0, saldo_tersisa: 0 }
  } else if (tableType === 'ronda') {
    jadwalRondaForm.value = { tanggal: '', peserta_ronda: '' }
  } else if (tableType === 'cleaning') {
    cleaningForm.value = { 
      title: '', 
      date: '', 
      time: '', 
      location: '', 
      image: null, 
      imagePreview: null, 
      status: 'upcoming' 
    }
  }
  showFormModal.value = true
}

const openEditModal = (item, index, tableType, title) => {
  currentTable.value = tableType
  formMode.value = 'edit'
  formTitle.value = title
  editingIndex.value = index
  
  if (tableType === 'danasosial') {
    danaSosialForm.value = {
      id: item.id,
      nama_penerima: item.nama_penerima,
      tanggal_penyerahan: item.tanggal_penyerahan,
      kategori_bantuan: item.kategori_bantuan,
      nominal_bantuan: parseFloat(item.nominal_bantuan.replace(/\D/g, '')),
      foto_penyerahan: null,
      imagePreview: item.foto_penyerahan
    }
  } else if (tableType === 'banksampah') {
    bankSampahForm.value = {
      id: item.id,
      nama: item.nama,
      total_sampah: parseFloat(item.totalSampah),
      total_konversi: parseInt(item.totalKonversi.replace(/\D/g, '')),
      saldo_cair: parseInt(item.saldoCair.replace(/\D/g, '')),
      saldo_tersisa: parseInt(item.saldoTersisa.replace(/\D/g, ''))
    }
  } else if (tableType === 'ronda') {
    jadwalRondaForm.value = {
      id: item.id,
      tanggal: item.tanggal,
      peserta_ronda: item.peserta_ronda
    }
  } else if (tableType === 'cleaning') {
    cleaningForm.value = { 
      ...item,
      image: null,
      imagePreview: item.image
    }
  }
  showFormModal.value = true
}

const openDeleteModal = (index, tableType, item) => {
  showFormModal.value = false
  showDeleteModal.value = false
  editingIndex.value = null
  currentTable.value = ''
  
  nextTick(() => {
    editingIndex.value = index
    currentTable.value = tableType
    
    if (tableType === 'danasosial') {
      danaSosialForm.value = { 
        id: item.id,
        nama_penerima: item.nama_penerima 
      }
    } else if (tableType === 'banksampah') {
      bankSampahForm.value = { 
        id: item.id,
        nama: item.nama 
      }
    } else if (tableType === 'ronda') {
      jadwalRondaForm.value = { 
        id: item.id,
        tanggal: item.tanggal 
      }
    } else if (tableType === 'cleaning') {
      cleaningForm.value = { ...item }
    }
    
    showDeleteModal.value = true
  })
}

const closeFormModal = () => {
  showFormModal.value = false
  danaSosialForm.value = { 
    nama_penerima: '', 
    tanggal_penyerahan: '', 
    kategori_bantuan: '', 
    nominal_bantuan: 0, 
    foto_penyerahan: null, 
    imagePreview: null 
  }
  bankSampahForm.value = { 
    nama: '', 
    total_sampah: 0, 
    total_konversi: 0,
    saldo_cair: 0,
    saldo_tersisa: 0
  }
  jadwalRondaForm.value = { tanggal: '', peserta_ronda: '' }
  cleaningForm.value = { 
    title: '', 
    date: '', 
    time: '', 
    location: '', 
    image: null, 
    imagePreview: null, 
    status: 'upcoming' 
  }
}

const saveData = async () => {
  isSaving.value = true
  try {
    if (currentTable.value === 'danasosial') {
      if (!danaSosialForm.value.nama_penerima || !danaSosialForm.value.tanggal_penyerahan || 
          !danaSosialForm.value.kategori_bantuan || !danaSosialForm.value.nominal_bantuan) {
        showToast('Mohon lengkapi semua field!', 'error')
        isSaving.value = false
        return
      }
      
      if (!danaSosialForm.value.foto_penyerahan && formMode.value === 'create') {
        showToast('Mohon upload foto!', 'error')
        isSaving.value = false
        return
      }
      
      const formDataToSend = new FormData()
      formDataToSend.append('nama_penerima', danaSosialForm.value.nama_penerima)
      formDataToSend.append('tanggal_penyerahan', danaSosialForm.value.tanggal_penyerahan)
      formDataToSend.append('kategori_bantuan', danaSosialForm.value.kategori_bantuan)
      formDataToSend.append('nominal_bantuan', danaSosialForm.value.nominal_bantuan)
      
      if (danaSosialForm.value.foto_penyerahan) {
        formDataToSend.append('foto_penyerahan', danaSosialForm.value.foto_penyerahan)
      }
      
      if (formMode.value === 'create') {
        await danaSosialAPI.create(formDataToSend)
      } else {
        await danaSosialAPI.update(danaSosialForm.value.id, formDataToSend)
      }
      await fetchDanaSosial()
      showToast('Data Dana Sosial berhasil disimpan', 'success')
    } 
    else if (currentTable.value === 'banksampah') {
      const payload = {
        nama: bankSampahForm.value.nama,
        total_sampah: bankSampahForm.value.total_sampah,
        total_konversi: bankSampahForm.value.total_konversi,
        saldo_cair: bankSampahForm.value.saldo_cair,
        saldo_tersisa: bankSampahForm.value.saldo_tersisa
      }
      if (formMode.value === 'create') {
        await bankSampahAPI.create(payload)
      } else {
        await bankSampahAPI.update(bankSampahForm.value.id, payload)
      }
      await fetchBankSampah()
      showToast('Data Bank Sampah berhasil disimpan', 'success')
    }
    else if (currentTable.value === 'ronda') {
      const payload = {
        tanggal: jadwalRondaForm.value.tanggal,
        peserta_ronda: jadwalRondaForm.value.peserta_ronda
      }
      if (formMode.value === 'create') {
        await jadwalRondaAPI.create(payload)
      } else {
        await jadwalRondaAPI.update(jadwalRondaForm.value.id, payload)
      }
      await fetchJadwalRonda()
      showToast('Data Jadwal Ronda berhasil disimpan', 'success')
    } 
    else if (currentTable.value === 'cleaning') {
      if (!cleaningForm.value.title || !cleaningForm.value.date || 
          !cleaningForm.value.time || !cleaningForm.value.location) {
        showToast('Mohon lengkapi semua field!', 'error')
        isSaving.value = false
        return
      }
      
      if (!cleaningForm.value.image && formMode.value === 'create') {
        showToast('Mohon upload foto!', 'error')
        isSaving.value = false
        return
      }
      
      const formDataToSend = new FormData()
      formDataToSend.append('title', cleaningForm.value.title)
      formDataToSend.append('date', cleaningForm.value.date)
      formDataToSend.append('time', cleaningForm.value.time)
      formDataToSend.append('location', cleaningForm.value.location)
      formDataToSend.append('status', cleaningForm.value.status)
      
      if (cleaningForm.value.image) {
        formDataToSend.append('image', cleaningForm.value.image)
      }
      
      if (formMode.value === 'create') {
        await kebersihanAPI.create(formDataToSend)
      } else {
        await kebersihanAPI.update(cleaningForm.value.id, formDataToSend)
      }
      await fetchKebersihan()
      showToast('Data Program Kebersihan berhasil disimpan', 'success')
    }
    
    closeFormModal()
  } catch (error) {
    console.error('Error saving:', error.response?.data)
    showToast(error.response?.data?.message || 'Gagal menyimpan data', 'error')
  } finally {
    isSaving.value = false
  }
}

const confirmDelete = async () => {
  isDeleting.value = true
  try {
    if (currentTable.value === 'danasosial') {
      await danaSosialAPI.delete(danaSosialForm.value.id)
      await fetchDanaSosial()
      showToast('Data berhasil dihapus')
    } else if (currentTable.value === 'banksampah') {
      await bankSampahAPI.delete(bankSampahForm.value.id)
      await fetchBankSampah()
      showToast('Data berhasil dihapus')
    } else if (currentTable.value === 'ronda') {
      await jadwalRondaAPI.delete(jadwalRondaForm.value.id)
      await fetchJadwalRonda()
      showToast('Jadwal berhasil dihapus')
    } else if (currentTable.value === 'cleaning') {
      await kebersihanAPI.delete(cleaningForm.value.id)
      await fetchKebersihan()
      showToast('Program berhasil dihapus')
    }
    showDeleteModal.value = false
  } catch (error) {
    showToast('Gagal menghapus data', 'error')
  } finally {
    isDeleting.value = false
  }
}

onMounted(() => {
  checkAuthStatus()
  fetchDanaSosial()
  fetchBankSampah()
  fetchJadwalRonda()
  fetchKebersihan()
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

.bg-grid-white\/10 {
  background-image: 
    linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
    linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
  background-size: 40px 40px;
}

.overflow-y-auto {
  scrollbar-width: none; 
  -ms-overflow-style: none;
}

.overflow-y-auto::-webkit-scrollbar {
  display: none; 
}

@media (max-width: 1023px) {
  .overflow-x-auto {
    scrollbar-width: thin;
    scrollbar-color: #10b981 #f3f4f6;
  }
  
  .overflow-x-auto::-webkit-scrollbar {
    height: 6px;
  }
  
  .overflow-x-auto::-webkit-scrollbar-track {
    background: #f3f4f6;
    border-radius: 10px;
  }
  
  .overflow-x-auto::-webkit-scrollbar-thumb {
    background: #10b981;
    border-radius: 10px;
  }
}

.fixed.inset-0 {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overscroll-behavior: contain;
}

body.modal-open {
  overflow: hidden;
  position: fixed;
  width: 100%;
}

body {
  overflow-x: hidden;
}
</style>