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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              </svg>
            </div>
            <span class="text-green-200 font-medium text-sm lg:text-base">Admin Panel</span>
          </div>
          <h1 class="text-2xl lg:text-4xl md:text-5xl font-black text-white mb-2 lg:mb-3 tracking-tight">Manajemen Akun</h1>
          <p class="text-green-100 text-sm lg:text-lg">Kelola akun User & Admin dengan mudah</p>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-4 lg:px-6 -mt-6 lg:-mt-8">
        <div class="bg-white rounded-xl lg:rounded-2xl shadow-xl p-2 flex gap-2 backdrop-blur-sm border border-gray-100">
          <button @click="activeTab = 'users'"
            class="flex-1 px-4 lg:px-8 py-3 lg:py-4 rounded-lg lg:rounded-xl font-semibold transition-all duration-300 flex items-center justify-center gap-2 text-sm lg:text-base"
            :class="activeTab === 'users' ? 'bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg shadow-green-500/30' : 'text-gray-600 hover:bg-gray-50'">
            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            User
          </button>
          <button @click="activeTab = 'admins'"
            class="flex-1 px-4 lg:px-8 py-3 lg:py-4 rounded-lg lg:rounded-xl font-semibold transition-all duration-300 flex items-center justify-center gap-2 text-sm lg:text-base"
            :class="activeTab === 'admins' ? 'bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg shadow-green-500/30' : 'text-gray-600 hover:bg-gray-50'">
            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            Admin
          </button>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-4 lg:px-6 py-4 lg:py-8">
        <div class="bg-white rounded-xl lg:rounded-2xl shadow-xl p-5 lg:p-8 border border-gray-100">
        
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6 lg:mb-8">
          <div>
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">
              {{ activeTab === 'users' ? 'Daftar User' : 'Daftar Admin' }}
            </h2>
            <p class="text-gray-500 text-sm lg:text-base">
              Kelola akun {{ activeTab === 'users' ? 'user' : 'admin' }} sistem
            </p>
          </div>
          <button @click="openCreateModal" 
            class="w-full lg:w-auto px-5 lg:px-6 py-2.5 lg:py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg lg:rounded-xl font-semibold hover:shadow-lg hover:shadow-green-500/30 transition-all duration-300 flex items-center justify-center gap-2 text-sm lg:text-base hover:scale-105">
            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>Tambah Akun
          </button>
        </div>

        <div v-if="isLoading" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
          <div v-for="n in 6" :key="n" class="border-2 border-gray-100 rounded-xl lg:rounded-2xl overflow-hidden">
            <div class="bg-gradient-to-br from-gray-100 to-gray-200 h-32 lg:h-48 animate-pulse"></div>
            <div class="p-4 lg:p-6 space-y-3">
              <div class="h-5 lg:h-6 bg-gray-200 rounded-lg animate-pulse"></div>
              <div class="h-3 lg:h-4 bg-gray-200 rounded-lg animate-pulse w-3/4"></div>
              <div class="h-3 lg:h-4 bg-gray-200 rounded-lg animate-pulse w-1/2"></div>
            </div>
          </div>
        </div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
          <div v-for="(account, index) in currentAccounts" :key="account.id" 
              class="group border-2 border-gray-100 rounded-xl lg:rounded-2xl overflow-hidden hover:shadow-xl hover:border-green-200 transition-all duration-300 hover:-translate-y-1 bg-white flex flex-col">
            
            <div class="bg-gradient-to-br from-green-100 to-blue-100 p-4 lg:p-6 flex justify-center">
              <div class="w-16 h-16 lg:w-20 lg:h-20 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl lg:rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                <span class="text-white text-xl lg:text-2xl font-black">
                  {{ account.name.charAt(0).toUpperCase() }}
                </span>
              </div>
            </div>

            <div class="p-4 lg:p-5 flex-1 flex flex-col">
              <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-2 lg:mb-3">{{ account.name }}</h3>
              
              <div class="space-y-2 text-sm mb-3 lg:mb-4">
                <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg">
                  <div class="w-6 h-6 lg:w-7 lg:h-7 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                  </div>
                  <span class="text-gray-700 font-medium truncate text-xs lg:text-sm">{{ account.username }}</span>
                </div>
                
                <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg">
                  <div class="w-6 h-6 lg:w-7 lg:h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                      :class="activeTab === 'admins' ? 'bg-purple-100' : 'bg-green-100'">
                    <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4"
                        :class="activeTab === 'admins' ? 'text-purple-600' : 'text-green-600'"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                  </div>
                  <span class="px-2 lg:px-3 py-0.5 lg:py-1 rounded-lg text-xs font-bold"
                        :class="activeTab === 'admins' ? 'bg-purple-100 text-purple-700' : 'bg-green-100 text-green-700'">
                    {{ activeTab === 'admins' ? 'Administrator' : 'User' }}
                  </span>
                </div>
              </div>

              <div class="flex gap-2 mt-auto">
                <button @click="openEditModal(account, index)" 
                        class="flex-1 px-3 lg:px-4 py-2 bg-blue-50 text-blue-600 rounded-lg lg:rounded-xl hover:bg-blue-100 transition-all duration-300 font-semibold text-xs lg:text-sm">
                  Edit
                </button>
                <button @click="openDeleteModal(account, index)"
                        class="flex-1 px-3 lg:px-4 py-2 bg-red-50 text-red-600 rounded-lg lg:rounded-xl hover:bg-red-100 transition-all duration-300 font-semibold text-xs lg:text-sm">
                  Hapus
                </button>
              </div>
            </div>
          </div>
        </div>

        <div v-if="!isLoading && currentAccounts.length === 0" class="text-center py-12 lg:py-20">
          <div class="w-16 h-16 lg:w-24 lg:h-24 bg-gray-100 rounded-2xl lg:rounded-3xl flex items-center justify-center mx-auto mb-4 lg:mb-6">
            <svg class="w-8 h-8 lg:w-12 lg:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
          </div>
          <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-2">Belum ada akun</h3>
          <p class="text-gray-500 text-sm lg:text-base">Klik tombol "Tambah Akun" untuk membuat {{ activeTab === 'users' ? 'user' : 'admin' }} baru</p>
        </div>
      </div>
      </div>
    </div>

    <div v-if="showFormModal" @click="closeFormModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl lg:rounded-3xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 lg:px-8 py-4 lg:py-6 rounded-t-2xl lg:rounded-t-3xl">
          <h2 class="text-xl lg:text-2xl font-black text-white">
            {{ formMode === 'create' ? 'Tambah' : 'Edit' }} Akun
          </h2>
          <p class="text-green-100 text-xs lg:text-sm mt-1">
            {{ formMode === 'create' ? 'Buat akun baru' : 'Perbarui informasi akun' }}
          </p>
        </div>

        <div class="p-6 lg:p-8 space-y-4 lg:space-y-5">
          <div>
            <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">
              Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input v-model="form.name" type="text" 
              class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
              placeholder="Masukkan nama lengkap">
          </div>
          <div>
            <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">
              Username <span class="text-red-500">*</span>
            </label>
            <input v-model="form.username" type="text" 
              class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
              placeholder="Masukkan username">
          </div>
          <div>
            <label class="block text-xs lg:text-sm font-bold text-gray-700 mb-2">
              Password 
              <span v-if="formMode === 'create'" class="text-red-500">*</span>
              <span v-else class="text-gray-400 text-xs font-normal">(Kosongkan jika tidak diubah)</span>
            </label>
            <input v-model="form.password" type="password" 
              class="w-full px-3 lg:px-4 py-2 lg:py-3 text-sm lg:text-base border-2 border-gray-200 rounded-lg lg:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
              :placeholder="formMode === 'create' ? 'Masukkan password' : 'Masukkan password baru'">
          </div>
        </div>

        <div class="px-6 lg:px-8 py-4 lg:py-6 bg-gray-50 rounded-b-2xl lg:rounded-b-3xl flex gap-3">
          <button @click="closeFormModal"
            class="flex-1 px-4 lg:px-6 py-2 lg:py-3 text-sm lg:text-base bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 rounded-lg lg:rounded-xl font-semibold transition-all duration-300">
            Batal
          </button>
          <button @click="saveData" :disabled="isSaving"
            class="flex-1 px-4 lg:px-6 py-2 lg:py-3 text-sm lg:text-base bg-gradient-to-r from-green-500 to-green-600 hover:shadow-lg hover:shadow-green-500/30 text-white rounded-lg lg:rounded-xl font-semibold transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
            <svg v-if="isSaving" class="animate-spin h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isSaving ? 'Menyimpan...' : 'Simpan' }}
          </button>
        </div>
      </div>
    </div>

    <div v-if="showDeleteModal" @click="showDeleteModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl lg:rounded-3xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 lg:px-8 py-4 lg:py-6 rounded-t-2xl lg:rounded-t-3xl">
          <h2 class="text-xl lg:text-2xl font-black text-white">Konfirmasi Hapus</h2>
          <p class="text-red-100 text-xs lg:text-sm mt-1">Data yang dihapus tidak dapat dikembalikan</p>
        </div>

        <div class="p-6 lg:p-8">
          <div class="flex items-center gap-4 lg:gap-5 mb-4 lg:mb-6">
            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-red-100 rounded-xl lg:rounded-2xl flex items-center justify-center flex-shrink-0">
              <svg class="w-6 h-6 lg:w-8 lg:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-900 font-bold text-base lg:text-lg mb-1">Hapus akun ini?</p>
              <p class="text-gray-600 font-medium text-sm lg:text-base">{{ form.name }}</p>
            </div>
          </div>
        </div>

        <div class="px-6 lg:px-8 py-4 lg:py-6 bg-gray-50 rounded-b-2xl lg:rounded-b-3xl flex gap-3">
          <button @click="showDeleteModal = false"
            class="flex-1 px-4 lg:px-6 py-2 lg:py-3 text-sm lg:text-base bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 rounded-lg lg:rounded-xl font-semibold transition-all duration-300">
            Batal
          </button>
          <button @click="confirmDelete" :disabled="isDeleting"
            class="flex-1 px-4 lg:px-6 py-2 lg:py-3 text-sm lg:text-base bg-gradient-to-r from-red-500 to-red-600 hover:shadow-lg hover:shadow-red-500/30 text-white rounded-lg lg:rounded-xl font-semibold transition-all duration-300 disabled:opacity-50 flex items-center justify-center gap-2">
            <svg v-if="isDeleting" class="animate-spin h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isDeleting ? 'Menghapus...' : 'Hapus' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'
import { userManagementAPI, authService } from '../services/api.js'
import api from '../services/api.js'

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const activeTab = ref('users')
const isLoading = ref(false)
const isSaving = ref(false)
const isDeleting = ref(false)
const showFormModal = ref(false)
const showDeleteModal = ref(false)
const showMobileMenu = ref(false)
const formMode = ref('create')
const users = ref([])
const admins = ref([])
const form = ref({
  id: null,
  name: '',
  username: '',
  password: ''
})
const editingIndex = ref(null)
const toast = ref({ show: false, message: '', type: '' })

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value
}

const currentAccounts = computed(() => {
  return activeTab.value === 'users' ? users.value : admins.value
})

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
    isLoggedIn.value = false
    currentUser.value = null
    router.push('/login')
  }
}

const fetchUsers = async () => {
  isLoading.value = true
  try {
    const response = await userManagementAPI.getAllUsers()
    users.value = response.data
  } catch (error) {
    showToast('Gagal memuat data user', 'error')
  } finally {
    isLoading.value = false
  }
}

const fetchAdmins = async () => {
  isLoading.value = true
  try {
    const response = await userManagementAPI.getAllAdmins()
    admins.value = response.data
  } catch (error) {
    showToast('Gagal memuat data admin', 'error')
  } finally {
    isLoading.value = false
  }
}

const openCreateModal = () => {
  formMode.value = 'create'
  form.value = { id: null, name: '', username: '', password: '' }
  showFormModal.value = true
}

const openEditModal = (account, index) => {
  formMode.value = 'edit'
  editingIndex.value = index
  form.value = {
    id: account.id,
    name: account.name,
    username: account.username,
    password: ''
  }
  showFormModal.value = true
}

const openDeleteModal = (account, index) => {
  editingIndex.value = index
  form.value = { id: account.id, name: account.name }
  showDeleteModal.value = true
}

const closeFormModal = () => {
  showFormModal.value = false
  form.value = { id: null, name: '', username: '', password: '' }
}

const saveData = async () => {
  if (!form.value.name || !form.value.username) {
    showToast('Nama dan username wajib diisi', 'error')
    return
  }
  
  if (formMode.value === 'create' && !form.value.password) {
    showToast('Password wajib diisi', 'error')
    return
  }

  isSaving.value = true
  try {
    const payload = {
      name: form.value.name,
      username: form.value.username,
      ...(form.value.password && { password: form.value.password })
    }

    if (activeTab.value === 'users') {
      if (formMode.value === 'create') {
        await userManagementAPI.createUser(payload)
      } else {
        await userManagementAPI.updateUser(form.value.id, payload)
      }
      await fetchUsers()
    } else {
      if (formMode.value === 'create') {
        await userManagementAPI.createAdmin(payload)
      } else {
        await userManagementAPI.updateAdmin(form.value.id, payload)
      }
      await fetchAdmins()
    }

    showToast('Akun berhasil disimpan')
    closeFormModal()
  } catch (error) {
    showToast(error.response?.data?.message || 'Gagal menyimpan akun', 'error')
  } finally {
    isSaving.value = false
  }
}

const confirmDelete = async () => {
  isDeleting.value = true
  try {
    if (activeTab.value === 'users') {
      await userManagementAPI.deleteUser(form.value.id)
      await fetchUsers()
    } else {
      await userManagementAPI.deleteAdmin(form.value.id)
      await fetchAdmins()
    }
    showToast('Akun berhasil dihapus')
    showDeleteModal.value = false
  } catch (error) {
    showToast('Gagal menghapus akun', 'error')
  } finally {
    isDeleting.value = false
  }
}

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
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

onMounted(() => {
  checkAuthStatus()
  fetchUsers()
  fetchAdmins()
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

.bg-grid-white\/10 {
  background-image: 
    linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
    linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
  background-size: 40px 40px;
}
</style>