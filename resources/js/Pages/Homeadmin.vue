<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex">
    <aside class="fixed left-0 top-0 h-screen w-20 bg-white shadow-xl z-50 flex flex-col items-center py-6 border-r border-gray-100">
      <div class="mb-10">
        <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center shadow-lg hover:shadow-xl transition-all hover:scale-105">
          <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover rounded-2xl" />
        </div>
      </div>

      <nav class="flex-1 w-full flex flex-col items-center space-y-2 px-2">
        <router-link 
          to="/homeadmin"
          class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-500/30">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Beranda
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link 
          to="/program"
          class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 hover:bg-gray-100">
          <svg class="w-6 h-6 text-gray-600 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Program
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link 
          to="/keuangan"
          class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 hover:bg-gray-100">
          <svg class="w-6 h-6 text-gray-600 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Keuangan
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link 
          to="/pengaduan"
          class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 hover:bg-gray-100">
          <svg class="w-6 h-6 text-gray-600 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Pengaduan
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <router-link 
          to="/manajemen-akun"
          class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 hover:bg-gray-100">
          <svg class="w-6 h-6 text-gray-600 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Manajemen Akun
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>
      </nav>

      <div class="w-full flex flex-col items-center space-y-2 pt-4 border-t border-gray-100 px-2">
        <router-link 
          to="/profileadmin"
          class="group relative w-14 h-14 flex items-center justify-center">
          <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold cursor-pointer hover:scale-110 transition-all duration-300 shadow-lg">
            {{ currentUser?.name?.charAt(0).toUpperCase() }}
          </div>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            {{ currentUser?.name }}
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </router-link>

        <button 
          @click="handleLogout"
          class="group relative w-14 h-14 flex items-center justify-center rounded-2xl transition-all duration-300 hover:bg-red-50">
          <svg class="w-6 h-6 text-red-500 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
          </svg>
          <div class="absolute left-full ml-6 px-4 py-2 bg-gray-900 text-white text-sm rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap shadow-2xl">
            Logout
            <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-r-8 border-r-gray-900"></div>
          </div>
        </button>
      </div>
    </aside>

    <div class="flex-1 ml-20">
      <transition name="slide-fade">
        <div v-if="toast.show" class="fixed top-6 right-6 z-[100] max-w-md animate-slideIn">
          <div class="rounded-2xl shadow-2xl p-4 flex items-center gap-3 backdrop-blur-sm"
               :class="toast.type === 'success' ? 'bg-green-500' : 'bg-red-500'">
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
              <svg v-if="toast.type === 'success'" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <svg v-else class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <p class="text-white font-semibold">{{ toast.message }}</p>
          </div>
        </div>
      </transition>

      <section class="relative bg-gradient-to-br from-green-600 via-green-700 to-green-800 py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0 bg-grid-white/10"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-2xl backdrop-blur-sm flex items-center justify-center">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
            </div>
            <span class="text-green-200 font-medium">Dashboard Admin</span>
          </div>
          <h1 class="text-4xl md:text-5xl font-black text-white mb-3 tracking-tight">
            Selamat Datang, {{ currentUser?.name }}
          </h1>
          <p class="text-green-100 text-lg">Kelola semua program dan aktivitas RW dengan mudah</p>
          
          <div class="mt-6 flex items-center gap-4">
            <div class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
              <p class="text-white/80 text-sm">Hari ini</p>
              <p class="text-white font-bold">{{ currentDate }}</p>
            </div>
            <div class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
              <p class="text-white/80 text-sm">Waktu</p>
              <p class="text-white font-bold">{{ currentTime }}</p>
            </div>
          </div>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-6 -mt-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all">
            <div class="flex items-center justify-between mb-4">
              <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                {{ stats.danaSosial.change }}
              </span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Total Dana Sosial</h3>
            <p class="text-2xl font-bold text-gray-900">{{ stats.danaSosial.total }}</p>
            <p class="text-xs text-gray-500 mt-2">{{ stats.danaSosial.count }} penerima bulan ini</p>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all">
            <div class="flex items-center justify-between mb-4">
              <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
              </div>
              <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">
                {{ stats.bankSampah.change }}
              </span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Bank Sampah</h3>
            <p class="text-2xl font-bold text-gray-900">{{ stats.bankSampah.total }}</p>
            <p class="text-xs text-gray-500 mt-2">{{ stats.bankSampah.count }} rekening aktif</p>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all">
            <div class="flex items-center justify-between mb-4">
              <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
              </div>
              <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">
                Minggu Ini
              </span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Jadwal Ronda</h3>
            <p class="text-2xl font-bold text-gray-900">{{ stats.ronda.thisWeek }}</p>
            <p class="text-xs text-gray-500 mt-2">{{ stats.ronda.total }} jadwal total</p>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all">
            <div class="flex items-center justify-between mb-4">
              <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
              </div>
              <span class="text-xs font-semibold text-orange-600 bg-orange-100 px-3 py-1 rounded-full">
                {{ stats.kebersihan.upcoming }} Upcoming
              </span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Program Kebersihan</h3>
            <p class="text-2xl font-bold text-gray-900">{{ stats.kebersihan.total }}</p>
            <p class="text-xs text-gray-500 mt-2">{{ stats.kebersihan.completed }} program selesai</p>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
          <router-link to="/program" class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all group">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Kelola Program</h3>
            <p class="text-sm text-gray-600">Dana Sosial, Bank Sampah & Ronda</p>
          </router-link>

          <router-link to="/keuangan" class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all group">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Keuangan</h3>
            <p class="text-sm text-gray-600">Kelola kas & transaksi RW</p>
          </router-link>

          <router-link to="/pengaduan" class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all group">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
              </svg>
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Pengaduan</h3>
            <p class="text-sm text-gray-600">Tangani laporan warga</p>
          </router-link>

          <router-link to="/manajemen-akun" class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all group">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              </svg>
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Manajemen Akun</h3>
            <p class="text-sm text-gray-600">Kelola user & permissions</p>
          </router-link>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-6 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-2xl font-bold text-gray-900">Aktivitas Terbaru</h2>
              <span class="text-sm text-gray-500">{{ recentActivities.length }} aktivitas</span>
            </div>
            
            <div v-if="isLoading" class="space-y-4">
              <div v-for="n in 5" :key="n" class="flex items-center gap-4 p-4 border border-gray-100 rounded-xl animate-pulse">
                <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                <div class="flex-1">
                  <div class="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
                  <div class="h-3 bg-gray-200 rounded w-1/2"></div>
                </div>
              </div>
            </div>

            <div v-else class="space-y-3">
              <div v-for="activity in recentActivities" :key="activity.id" class="flex items-center gap-4 p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 rounded-full flex items-center justify-center"
                     :class="{
                       'bg-red-100': activity.type === 'danasosial',
                       'bg-emerald-100': activity.type === 'banksampah',
                       'bg-blue-100': activity.type === 'ronda',
                       'bg-yellow-100': activity.type === 'kebersihan'
                     }">
                  <svg class="w-5 h-5" :class="{
                         'text-red-600': activity.type === 'danasosial',
                         'text-emerald-600': activity.type === 'banksampah',
                         'text-blue-600': activity.type === 'ronda',
                         'text-yellow-600': activity.type === 'kebersihan'
                       }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="flex-1">
                  <p class="font-semibold text-gray-900 text-sm">{{ activity.title }}</p>
                  <p class="text-xs text-gray-500">{{ activity.time }}</p>
                </div>
                <span class="text-xs font-medium px-3 py-1 rounded-full"
                      :class="{
                        'bg-red-100 text-red-700': activity.type === 'danasosial',
                        'bg-emerald-100 text-emerald-700': activity.type === 'banksampah',
                        'bg-blue-100 text-blue-700': activity.type === 'ronda',
                        'bg-yellow-100 text-yellow-700': activity.type === 'kebersihan'
                      }">
                  {{ activity.label }}
                </span>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-xl font-bold text-gray-900">Jadwal Mendatang</h2>
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>

            <div v-if="isLoading" class="space-y-4">
              <div v-for="n in 4" :key="n" class="p-4 border border-gray-100 rounded-xl animate-pulse">
                <div class="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
                <div class="h-3 bg-gray-200 rounded w-1/2"></div>
              </div>
            </div>

            <div v-else class="space-y-3">
              <div v-for="schedule in upcomingSchedules" :key="schedule.id" class="p-4 border-l-4 rounded-lg hover:bg-gray-50 transition-colors"
                   :class="{
                     'border-blue-500 bg-blue-50/50': schedule.type === 'ronda',
                     'border-yellow-500 bg-yellow-50/50': schedule.type === 'kebersihan'
                   }">
                <div class="flex items-start justify-between mb-2">
                  <h3 class="font-bold text-gray-900 text-sm">{{ schedule.title }}</h3>
                  <span class="text-xs font-semibold px-2 py-1 rounded-full"
                        :class="{
                          'bg-blue-100 text-blue-700': schedule.type === 'ronda',
                          'bg-yellow-100 text-yellow-700': schedule.type === 'kebersihan'
                        }">
                    {{ schedule.type === 'ronda' ? 'Ronda' : 'Kebersihan' }}
                  </span>
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-600">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                  <span>{{ schedule.date }}</span>
                </div>
                <p v-if="schedule.participants" class="text-xs text-gray-500 mt-2">{{ schedule.participants }}</p>
              </div>

              <div v-if="upcomingSchedules.length === 0" class="text-center py-8">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">Tidak ada jadwal mendatang</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-6 pb-12">
        <div class="bg-white rounded-2xl shadow-xl p-6">
          <h2 class="text-2xl font-bold text-gray-900 mb-6">Statistik Dana Sosial per Kategori</h2>
          
          <div v-if="isLoading" class="h-64 flex items-center justify-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-green-500"></div>
          </div>

          <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-red-50 to-red-100 rounded-xl">
              <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <h3 class="font-bold text-gray-900 mb-2">Korban Meninggal</h3>
              <p class="text-3xl font-black text-red-600">{{ chartData.korbanMeninggal }}</p>
              <p class="text-sm text-gray-600 mt-2">{{ chartData.korbanMeninggalNominal }}</p>
            </div>

            <div class="text-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl">
              <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
              </div>
              <h3 class="font-bold text-gray-900 mb-2">Penderita Sakit</h3>
              <p class="text-3xl font-black text-yellow-600">{{ chartData.penderitaSakit }}</p>
              <p class="text-sm text-gray-600 mt-2">{{ chartData.penderitaSakitNominal }}</p>
            </div>

            <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl">
              <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
              <h3 class="font-bold text-gray-900 mb-2">Korban Bencana</h3>
              <p class="text-3xl font-black text-orange-600">{{ chartData.korbanBencana }}</p>
              <p class="text-sm text-gray-600 mt-2">{{ chartData.korbanBencanaNominal }}</p>
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
import { danaSosialAPI, bankSampahAPI, jadwalRondaAPI, kebersihanAPI, authService } from '../services/api.js'
import api from '../services/api.js'

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const isLoading = ref(false)
const toast = ref({ show: false, message: '', type: '' })
const currentDate = ref('')
const currentTime = ref('')

const stats = ref({
  danaSosial: {
    total: 'Rp 0',
    count: 0,
    change: '+0%'
  },
  bankSampah: {
    total: 'Rp 0',
    count: 0,
    change: '+0%'
  },
  ronda: {
    thisWeek: 0,
    total: 0
  },
  kebersihan: {
    total: 0,
    upcoming: 0,
    completed: 0
  }
})

const recentActivities = ref([])
const upcomingSchedules = ref([])
const chartData = ref({
  korbanMeninggal: 0,
  korbanMeninggalNominal: 'Rp 0',
  penderitaSakit: 0,
  penderitaSakitNominal: 'Rp 0',
  korbanBencana: 0,
  korbanBencanaNominal: 'Rp 0'
})

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

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
    router.push('/login')
  }
}

const updateDateTime = () => {
  const now = new Date()
  
  currentDate.value = now.toLocaleDateString('id-ID', {
    weekday: 'long',
    day: 'numeric',
    month: 'long',
    year: 'numeric'
  })
  
  currentTime.value = now.toLocaleTimeString('id-ID', {
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit'
  })
}

const fetchDashboardData = async () => {
  isLoading.value = true
  try {
    const [danaSosialRes, bankSampahRes, rondaRes, kebersihanRes] = await Promise.all([
      danaSosialAPI.getAll(),
      bankSampahAPI.getAll(),
      jadwalRondaAPI.getAll(),
      kebersihanAPI.getAll()
    ])

    const danaSosialData = danaSosialRes.data
    const totalDanaSosial = danaSosialData.reduce((sum, item) => sum + parseFloat(item.nominal_bantuan), 0)
    const thisMonth = new Date().getMonth()
    const thisYear = new Date().getFullYear()
    const thisMonthCount = danaSosialData.filter(item => {
      const itemDate = new Date(item.tanggal_penyerahan)
      return itemDate.getMonth() === thisMonth && itemDate.getFullYear() === thisYear
    }).length

    stats.value.danaSosial = {
      total: 'Rp ' + new Intl.NumberFormat('id-ID').format(totalDanaSosial),
      count: thisMonthCount,
      change: thisMonthCount > 0 ? `+${thisMonthCount}` : '0'
    }

    const kategoriBantuan = {
      korban_meninggal: { count: 0, nominal: 0 },
      penderita_sakit: { count: 0, nominal: 0 },
      korban_bencana: { count: 0, nominal: 0 }
    }

    danaSosialData.forEach(item => {
      if (kategoriBantuan[item.kategori_bantuan]) {
        kategoriBantuan[item.kategori_bantuan].count++
        kategoriBantuan[item.kategori_bantuan].nominal += parseFloat(item.nominal_bantuan)
      }
    })

    chartData.value = {
      korbanMeninggal: kategoriBantuan.korban_meninggal.count,
      korbanMeninggalNominal: 'Rp ' + new Intl.NumberFormat('id-ID').format(kategoriBantuan.korban_meninggal.nominal),
      penderitaSakit: kategoriBantuan.penderita_sakit.count,
      penderitaSakitNominal: 'Rp ' + new Intl.NumberFormat('id-ID').format(kategoriBantuan.penderita_sakit.nominal),
      korbanBencana: kategoriBantuan.korban_bencana.count,
      korbanBencanaNominal: 'Rp ' + new Intl.NumberFormat('id-ID').format(kategoriBantuan.korban_bencana.nominal)
    }

    const bankSampahData = bankSampahRes.data
    const totalBankSampah = bankSampahData.reduce((sum, item) => sum + parseFloat(item.total_konversi), 0)
    
    stats.value.bankSampah = {
      total: 'Rp ' + new Intl.NumberFormat('id-ID').format(totalBankSampah),
      count: bankSampahData.length,
      change: `${bankSampahData.length} Rekening`
    }

    const rondaData = rondaRes.data
    const today = new Date()
    const weekStart = new Date(today.setDate(today.getDate() - today.getDay()))
    const weekEnd = new Date(today.setDate(today.getDate() - today.getDay() + 6))
    
    const thisWeekRonda = rondaData.filter(item => {
      const itemDate = new Date(item.tanggal)
      return itemDate >= weekStart && itemDate <= weekEnd
    }).length

    stats.value.ronda = {
      thisWeek: thisWeekRonda,
      total: rondaData.length
    }

    const kebersihanData = kebersihanRes.data
    const upcomingKebersihan = kebersihanData.filter(item => item.status === 'upcoming' || item.status === 'thisweek').length
    const completedKebersihan = kebersihanData.filter(item => item.status === 'completed').length

    stats.value.kebersihan = {
      total: kebersihanData.length,
      upcoming: upcomingKebersihan,
      completed: completedKebersihan
    }

    const activities = []
    
    danaSosialData.slice(0, 2).forEach(item => {
      activities.push({
        id: `ds-${item.id}`,
        type: 'danasosial',
        label: 'Dana Sosial',
        title: `Dana Sosial untuk ${item.nama_penerima}`,
        time: new Date(item.tanggal_penyerahan).toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })
      })
    })

    bankSampahData.slice(0, 1).forEach(item => {
      activities.push({
        id: `bs-${item.id}`,
        type: 'banksampah',
        label: 'Bank Sampah',
        title: `Update rekening ${item.nama}`,
        time: 'Hari ini'
      })
    })

    rondaData.slice(0, 1).forEach(item => {
      activities.push({
        id: `r-${item.id}`,
        type: 'ronda',
        label: 'Ronda',
        title: `Jadwal ronda ${new Date(item.tanggal).toLocaleDateString('id-ID')}`,
        time: new Date(item.tanggal).toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })
      })
    })

    kebersihanData.slice(0, 1).forEach(item => {
      activities.push({
        id: `k-${item.id}`,
        type: 'kebersihan',
        label: 'Kebersihan',
        title: item.title,
        time: item.date
      })
    })

    recentActivities.value = activities.slice(0, 5)

    const schedules = []
    today.setHours(0, 0, 0, 0)

    rondaData.forEach(item => {
      const itemDate = new Date(item.tanggal)
      itemDate.setHours(0, 0, 0, 0)
      
      if (itemDate >= today) {
        schedules.push({
          id: `r-${item.id}`,
          type: 'ronda',
          title: 'Jadwal Ronda',
          date: new Date(item.tanggal).toLocaleDateString('id-ID', { 
            weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' 
          }),
          participants: item.peserta_ronda,
          dateObj: itemDate
        })
      }
    })

    kebersihanData.forEach(item => {
      const dateParts = item.date.match(/(\d+)\s+(\w+)\s+(\d+)/)
      if (dateParts) {
        const months = {
          'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3,
          'Mei': 4, 'Juni': 5, 'Juli': 6, 'Agustus': 7,
          'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
        }
        const itemDate = new Date(dateParts[3], months[dateParts[2]], dateParts[1])
        itemDate.setHours(0, 0, 0, 0)
        
        if (itemDate >= today && (item.status === 'upcoming' || item.status === 'thisweek')) {
          schedules.push({
            id: `k-${item.id}`,
            type: 'kebersihan',
            title: item.title,
            date: item.date,
            participants: item.location,
            dateObj: itemDate
          })
        }
      }
    })

    schedules.sort((a, b) => a.dateObj - b.dateObj)
    upcomingSchedules.value = schedules.slice(0, 4)

  } catch (error) {
    console.error('Error fetching dashboard data:', error)
    showToast('Gagal memuat data dashboard', 'error')
  } finally {
    isLoading.value = false
  }
}

let timeInterval

onMounted(() => {
  checkAuthStatus()
  updateDateTime()
  timeInterval = setInterval(updateDateTime, 1000)
  fetchDashboardData()
})

onUnmounted(() => {
  if (timeInterval) {
    clearInterval(timeInterval)
  }
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