<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex">

    <aside class="fixed left-0 top-0 h-screen w-20 bg-white shadow-xl z-50 flex flex-col items-center py-6 border-r border-gray-100">
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
        <router-link to="/profile" class="group relative w-14 h-14 flex items-center justify-center">
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

      <section class="relative bg-gradient-to-br from-green-600 via-green-700 to-green-800 py-16 md:py-24 overflow-hidden">
        <div class="absolute inset-0 bg-grid-white/10"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-2xl backdrop-blur-sm flex items-center justify-center">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <span class="text-green-200 font-medium">Admin Panel</span>
          </div>
          <h1 class="text-4xl md:text-5xl font-black text-white mb-3 tracking-tight">Kelola Keuangan RW</h1>
          <p class="text-green-100 text-lg">Manajemen pemasukan dan pengeluaran kas RW</p>
          
          <button @click="exportKeuangan" :disabled="isExporting"
                  class="mt-6 px-6 py-3 bg-white/20 backdrop-blur-sm text-white rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 flex items-center gap-2 border border-white/30">
            <svg v-if="isExporting" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ isExporting ? 'Mengexport...' : 'Export PDF' }}</span>
          </button>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-6 -mt-16 relative z-10">
        <div class="space-y-4">
          <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
            <h3 class="text-sm font-bold text-gray-700 mb-4">Pemasukan</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
              <div v-for="(stat, index) in statsPemasukan" :key="index"
                   class="p-4 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <p class="text-xs text-gray-600 font-semibold mb-2">{{ stat.label }}</p>
                <p class="text-lg font-black text-green-700">Rp {{ formatNumber(stat.value) }}</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
            <h3 class="text-sm font-bold text-gray-700 mb-4">Pengeluaran</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
              <div v-for="(stat, index) in statsPengeluaran" :key="index"
                   class="p-4 rounded-xl bg-gradient-to-br from-red-50 to-pink-50 border-2 border-red-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <p class="text-xs text-gray-600 font-semibold mb-2">{{ stat.label }}</p>
                <p class="text-lg font-black text-red-700">Rp {{ formatNumber(stat.value) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="max-w-7xl mx-auto px-6 py-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
          <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-6 flex justify-between items-center">
            <div>
              <h2 class="text-2xl font-black text-white">Laporan Keuangan</h2>
              <p class="text-green-100 mt-1 text-sm">Data transaksi keuangan RW</p>
            </div>
            <button @click="openCreateModal" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-2xl flex items-center justify-center transition-all">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </button>
          </div>

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
                  <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in laporanKeuangan" :key="index"
                    class="border-b border-gray-100 hover:bg-green-50 transition-all duration-300">
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
                  <td class="px-6 py-5">
                    <div class="flex items-center gap-2">
                      <button @click="openEditModal(item, index)" class="p-2 hover:bg-green-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                      </button>
                      <button @click="openDeleteModal(index, item)" class="p-2 hover:bg-red-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="md:hidden divide-y divide-gray-100">
            <div v-for="(item, index) in laporanKeuangan" :key="index" class="p-4 hover:bg-green-50 transition-all duration-300">
              <div class="mb-3">
                <div class="text-xs text-gray-500">{{ item.tanggal }}</div>
                <div class="font-semibold text-gray-900">{{ item.keterangan }}</div>
              </div>
              <div class="grid grid-cols-2 gap-2 text-sm mb-3">
                <div>
                  <span class="text-gray-600">Debit:</span>
                  <span v-if="item.debit > 0" class="text-red-700 font-semibold ml-2">Rp {{ formatNumber(item.debit) }}</span>
                  <span v-else class="text-gray-400 ml-2">-</span>
                </div>
                <div>
                  <span class="text-gray-600">Kredit:</span>
                  <span v-if="item.kredit > 0" class="text-green-700 font-semibold ml-2">Rp {{ formatNumber(item.kredit) }}</span>
                  <span v-else class="text-gray-400 ml-2">-</span>
                </div>
              </div>
              <div class="text-sm mb-3">
                <span class="text-gray-600">Saldo:</span>
                <span class="font-bold ml-2" :class="item.saldo >= 0 ? 'text-green-700' : 'text-red-700'">Rp {{ formatNumber(item.saldo) }}</span>
              </div>
              <div class="flex gap-2 pt-3 border-t border-gray-100">
                <button @click="openEditModal(item, index)" class="p-2 hover:bg-green-100 rounded-lg transition-colors">
                  <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button @click="openDeleteModal(index, item)" class="p-2 hover:bg-red-100 rounded-lg transition-colors">
                  <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-600">Menampilkan {{ laporanKeuangan.length }} transaksi</p>
          </div>
        </div>
      </section>
    </div>

    <div v-if="showFormModal" @click="closeFormModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-3xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-6 rounded-t-3xl">
          <h2 class="text-2xl font-black text-white">{{ formMode === 'create' ? 'Tambah Transaksi' : 'Edit Transaksi' }}</h2>
          <p class="text-green-100 text-sm mt-1">Laporan Keuangan</p>
        </div>

        <div class="p-8 space-y-5">
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal</label>
            <input v-model="formData.tanggal" type="date" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
          </div>
          
          <div v-if="isFirstTransaction && formMode === 'create'"><label class="block text-sm font-bold text-gray-700 mb-2">Saldo Awal</label>
            <input v-model.number="formData.saldo_awal" type="number" min="0"
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   placeholder="0">
            <p class="text-xs text-gray-500 mt-1">Masukkan saldo awal untuk transaksi pertama</p>
          </div>
          
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Keterangan</label>
            <textarea v-model="formData.keterangan" rows="3"
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all resize-none"
                      placeholder="Masukkan keterangan"></textarea>
          </div>

          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
            <div class="flex gap-4">
              <label class="flex items-center cursor-pointer">
                <input v-model="formData.kategori" type="radio" value="debit" class="w-4 h-4 text-green-600 focus:ring-green-500">
                <span class="ml-2 text-gray-700 font-medium">Debit (Masuk)</span>
              </label>
              <label class="flex items-center cursor-pointer">
                <input v-model="formData.kategori" type="radio" value="kredit" class="w-4 h-4 text-green-600 focus:ring-green-500">
                <span class="ml-2 text-gray-700 font-medium">Kredit (Keluar)</span>
              </label>
            </div>
          </div>

          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Jumlah (Rp)</label>
            <input v-model.number="formData.jumlah" type="number" min="0"
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   placeholder="0">
          </div>
        </div>

        <div class="px-8 py-6 bg-gray-50 rounded-b-3xl flex gap-3">
          <button @click="closeFormModal"
                  class="flex-1 px-6 py-3 bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 rounded-xl font-semibold transition-all duration-300">
            Batal
          </button>
          <button @click="saveData"
                  class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:shadow-lg hover:shadow-green-500/30 text-white rounded-xl font-semibold transition-all duration-300">
            {{ formMode === 'create' ? 'Tambah' : 'Simpan' }}
          </button>
        </div>
      </div>
    </div>

    <div v-if="showDeleteModal" @click="showDeleteModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-3xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-red-500 to-red-600 px-8 py-6 rounded-t-3xl">
          <h2 class="text-2xl font-black text-white">Konfirmasi Hapus</h2>
          <p class="text-red-100 text-sm mt-1">Data yang dihapus tidak dapat dikembalikan</p>
        </div>

        <div class="p-8">
          <div class="flex items-center gap-5 mb-6">
            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center flex-shrink-0">
              <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-900 font-bold text-lg mb-1">Hapus transaksi ini?</p>
              <p class="text-gray-600 font-medium">{{ formData.keterangan }}</p>
            </div>
          </div>
        </div>

        <div class="px-8 py-6 bg-gray-50 rounded-b-3xl flex gap-3">
          <button @click="showDeleteModal = false"
                  class="flex-1 px-6 py-3 bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 rounded-xl font-semibold transition-all duration-300">
            Batal
          </button>
          <button @click="confirmDelete"
                  class="flex-1 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:shadow-lg hover:shadow-red-500/30 text-white rounded-xl font-semibold transition-all duration-300">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { laporanKeuanganAPI, authService } from '../services/api.js'
import { useRouter } from 'vue-router'
import api from '../services/api.js'

const toast = ref({ show: false, message: '', type: '' })

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

const isExporting = ref(false)

const exportKeuangan = async () => {
  isExporting.value = true
  try {
    const response = await laporanKeuanganAPI.exportPdf()
    const url = window.URL.createObjectURL(new Blob([response.data]))
    const link = document.createElement('a')
    link.href = url
    link.setAttribute('download', `laporan-keuangan-${new Date().toISOString().split('T')[0]}.pdf`)
    document.body.appendChild(link)
    link.click()
    link.remove()
    showToast('Export berhasil!')
  } catch (error) {
    console.error('Export error:', error)
    showToast('Gagal export data', 'error')
  } finally {
    isExporting.value = false
  }
}

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const laporanKeuangan = ref([])
const showFormModal = ref(false)
const showDeleteModal = ref(false)
const formMode = ref('create')
const editingIndex = ref(null)

const formData = ref({
  tanggal: '',
  keterangan: '',
  kategori: '',
  jumlah: 0,
  saldo_awal: 0
})

const isFirstTransaction = computed(() => laporanKeuangan.value.length === 0)

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

const formatNumber = (num) => {
  return new Intl.NumberFormat('id-ID').format(num)
}

const statsPemasukan = computed(() => {
  const total = laporanKeuangan.value.reduce((sum, item) => sum + parseFloat(item.debit), 0)
  const iuran = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('iuran')).reduce((sum, item) => sum + parseFloat(item.debit), 0)
  const perumahan = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('perumahan')).reduce((sum, item) => sum + parseFloat(item.debit), 0)
  const donasi = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('donasi')).reduce((sum, item) => sum + parseFloat(item.debit), 0)
  const bankSampah = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bank sampah') && parseFloat(item.debit) > 0).reduce((sum, item) => sum + parseFloat(item.debit), 0)

  return [
    { label: 'Total Pemasukan', value: total, hover: false },
    { label: 'Iuran', value: iuran, hover: false },
    { label: 'Perumahan', value: perumahan, hover: false },
    { label: 'Donasi', value: donasi, hover: false },
    { label: 'Bank Sampah', value: bankSampah, hover: false }
  ]
})

const statsPengeluaran = computed(() => {
  const total = laporanKeuangan.value.reduce((sum, item) => sum + parseFloat(item.kredit), 0)
  const baksos = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bakti sosial') || item.keterangan.toLowerCase().includes('baksos')).reduce((sum, item) => sum + parseFloat(item.kredit), 0)
  const kerjaBakti = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('kerja bakti') || item.keterangan.toLowerCase().includes('gotong royong')).reduce((sum, item) => sum + parseFloat(item.kredit), 0)
  const bankSampah = laporanKeuangan.value.filter(item => item.keterangan.toLowerCase().includes('bank sampah') && parseFloat(item.kredit) > 0).reduce((sum, item) => sum + parseFloat(item.kredit), 0)
  const lainLain = laporanKeuangan.value.filter(item => {
    const ket = item.keterangan.toLowerCase()
    return parseFloat(item.kredit) > 0 && !ket.includes('bakti sosial') && !ket.includes('baksos') && !ket.includes('kerja bakti') && !ket.includes('gotong royong') && !ket.includes('bank sampah')
  }).reduce((sum, item) => sum + parseFloat(item.kredit), 0)

  return [
    { label: 'Total Pengeluaran', value: total, hover: false },
    { label: 'Bakti Sosial', value: baksos, hover: false },
    { label: 'Kerja Bakti', value: kerjaBakti, hover: false },
    { label: 'Bank Sampah', value: bankSampah, hover: false },
    { label: 'Lain-lain', value: lainLain, hover: false }
  ]
})

const fetchLaporanKeuangan = async () => {
  try {
    const response = await laporanKeuanganAPI.getAll()
    laporanKeuangan.value = response.data.map(item => ({
      ...item,
      tanggal: new Date(item.tanggal).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }),
      debit: parseFloat(item.debit),
      kredit: parseFloat(item.kredit),
      saldo: parseFloat(item.saldo)
    }))
  } catch (error) {
    console.error('Error fetching laporan keuangan:', error)
  }
}

const openCreateModal = () => {
  formMode.value = 'create'
  formData.value = { tanggal: '', keterangan: '', kategori: '', jumlah: 0, saldo_awal: 0 }
  showFormModal.value = true
}

const openEditModal = (item, index) => {
  formMode.value = 'edit'
  editingIndex.value = index
  const kategori = item.debit > 0 ? 'debit' : 'kredit'
  const jumlah = item.debit > 0 ? item.debit : item.kredit
  formData.value = {
    id: item.id,
    tanggal: new Date(item.tanggal).toISOString().split('T')[0],
    keterangan: item.keterangan,
    kategori: kategori,
    jumlah: jumlah
  }
  showFormModal.value = true
}

const openDeleteModal = (index, item) => {
  editingIndex.value = index
  formData.value = { id: item.id, keterangan: item.keterangan }
  showDeleteModal.value = true
}

const closeFormModal = () => {
  showFormModal.value = false
  formData.value = { tanggal: '', keterangan: '', kategori: '', jumlah: 0, saldo_awal: 0 }
}

const saveData = async () => {
  try {
    const payload = {
      tanggal: formData.value.tanggal,
      keterangan: formData.value.keterangan,
      kategori: formData.value.kategori,
      jumlah: formData.value.jumlah
    }

    if (isFirstTransaction.value && formMode.value === 'create') {
      payload.saldo_awal = formData.value.saldo_awal
    }

    if (formMode.value === 'create') {
      await laporanKeuanganAPI.create(payload)
    } else {
      await laporanKeuanganAPI.update(formData.value.id, payload)
    }
    
    await fetchLaporanKeuangan()
    closeFormModal()
    showToast('Data berhasil disimpan')
  } catch (error) {
    console.error('Error saving:', error.response?.data)
    showToast('Gagal menyimpan data: ' + (error.response?.data?.message || 'Terjadi kesalahan'), 'error')
  }
}

const confirmDelete = async () => {
  try {
    await laporanKeuanganAPI.delete(formData.value.id)
    await fetchLaporanKeuangan()
    showDeleteModal.value = false
    showToast('Data berhasil dihapus')
  } catch (error) {
    console.error('Error deleting:', error)
    showToast('Gagal menghapus data', 'error')
  }
}

onMounted(() => {
  checkAuthStatus()
  fetchLaporanKeuangan()
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