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
          <div class="flex items-center space-x-4">
            <div class="h-10 w-10 md:h-12 md:w-12 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold">
              RW
            </div>
            <div>
              <h1 class="text-lg md:text-xl font-bold text-green-700">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>
          
          <div class="hidden md:flex items-center space-x-6">
            <router-link to="/" class="text-gray-700 hover:text-green-600 font-medium">Beranda</router-link>
            <router-link to="/program" class="text-green-600 font-medium">Program</router-link>
            <router-link to="/keuangan" class="text-gray-700 hover:text-green-600 font-medium">Keuangan</router-link>
            <router-link to="/pengaduan" class="text-gray-700 hover:text-green-600 font-medium">Pengaduan</router-link>
            <div v-if="isLoggedIn" class="flex items-center gap-4">
              <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-purple-50 to-blue-50 rounded-full border border-purple-200/50">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                  {{ currentUser?.name?.charAt(0).toUpperCase() }}
                </div>
                <span class="text-gray-800 font-semibold">{{ currentUser?.name }}</span>
              </div>
              <button @click="handleLogout" class="px-5 py-2.5 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors">
                Logout
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
            <router-link @click="mobileMenuOpen = false" to="/" class="text-gray-700 font-medium py-2">Beranda</router-link>
            <router-link @click="mobileMenuOpen = false" to="/program" class="text-green-600 font-medium py-2">Program</router-link>
            <router-link @click="mobileMenuOpen = false" to="/keuangan" class="text-gray-700 font-medium py-2">Keuangan</router-link>
            <button v-if="isLoggedIn" @click="() => { handleLogout(); mobileMenuOpen = false; }" class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium text-center">
              Logout
            </button>
          </div>
        </div>
      </div>
    </nav>

    <section class="bg-gradient-to-br from-green-600 to-green-800 py-12 md:py-16">
      <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Kelola Program RW</h1>
        <p class="text-green-100">Manajemen program Bakti Sosial, Bank Sampah, Jadwal Ronda & Kebersihan</p>
      </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 -mt-8">
      <div class="bg-white rounded-xl shadow-lg p-2 flex flex-wrap gap-2">
        <button 
          v-for="tab in tabs" 
          :key="tab.id"
          @click="activeTab = tab.id"
          class="flex-1 min-w-[150px] px-4 py-3 rounded-lg font-medium transition-all"
          :class="activeTab === tab.id 
            ? 'bg-green-600 text-white shadow-md' 
            : 'text-gray-600 hover:bg-gray-100'">
          {{ tab.label }}
        </button>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
      <div v-if="activeTab === 'baksos'" class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 flex justify-between items-center">
          <div>
            <h2 class="text-2xl font-bold text-white">Riwayat Bantuan</h2>
            <p class="text-green-100 text-sm">Data penerima bantuan</p>
          </div>
          <button @click="openCreateModal('baksos', 'Tambah Data Bantuan')" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
          </button>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50 border-b-2 border-green-200">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Keterangan</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
              </tr>
            </thead>
            <tbody v-if="isLoading">
                <tr v-for="n in 5" :key="n" class="border-b border-gray-100">
                    <td v-for="col in 5" :key="col" class="px-6 py-5">
                        <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                    </td>
                </tr>
            </tbody>
            <tbody>
              <tr v-for="(item, index) in tableData" :key="index" class="border-b border-gray-100 hover:bg-green-50 transition-colors">
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
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">
                    {{ item.tanggal }}
                  </span>
                </td>
                <td class="px-6 py-5 text-gray-600">{{ item.keterangan }}</td>
                <td class="px-6 py-5">
                  <div class="flex items-center gap-2">
                    <button @click="openEditModal(item, index, 'baksos', 'Edit Data Bantuan')" class="p-2 hover:bg-green-100 rounded-lg transition-colors">
                      <svg class="w-5 h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                      </svg>
                    </button>
                    <button @click="openDeleteModal(index, 'baksos', item)" class="p-2 hover:bg-red-100 rounded-lg transition-colors">
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

        <div class="bg-gray-50 px-6 py-4 border-t">
          <p class="text-sm text-gray-600">Menampilkan {{ tableData.length }} data</p>
        </div>
      </div>

      <div v-if="activeTab === 'banksampah'" class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 flex justify-between items-center">
          <div>
            <h2 class="text-2xl font-bold text-white">Rekening Bank Sampah</h2>
            <p class="text-green-100 text-sm">Data rekening warga</p>
          </div>
          <button @click="openCreateModal('banksampah', 'Tambah Rekening')" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
          </button>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50 border-b-2 border-green-200">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Total Sampah</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Total Uang</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
              </tr>
            </thead>
            <tbody v-if="isLoading">
            <tr v-for="n in 5" :key="n" class="border-b border-gray-100">
                <td v-for="col in 5" :key="col" class="px-6 py-5">
                <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                </td>
            </tr>
            </tbody>
            <tbody>
              <tr v-for="(item, index) in bankSampahData" :key="index" class="border-b border-gray-100 hover:bg-green-50 transition-colors">
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
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-700 font-bold">
                    {{ item.totalUang }}
                  </span>
                </td>
                <td class="px-6 py-5">
                  <div class="flex items-center gap-2">
                    <button @click="openEditModal(item, index, 'banksampah', 'Edit Rekening')" class="p-2 hover:bg-green-100 rounded-lg transition-colors">
                      <svg class="w-5 h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                      </svg>
                    </button>
                    <button @click="openDeleteModal(index, 'banksampah', item)" class="p-2 hover:bg-red-100 rounded-lg transition-colors">
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

        <div class="bg-gray-50 px-6 py-4 border-t">
          <p class="text-sm text-gray-600">Menampilkan {{ bankSampahData.length }} rekening</p>
        </div>
      </div>

      <div v-if="activeTab === 'ronda'" class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 flex justify-between items-center">
          <div>
            <h2 class="text-2xl font-bold text-white">Jadwal Ronda</h2>
            <p class="text-green-100 text-sm">Data jadwal ronda warga</p>
          </div>
          <button @click="openCreateModal('ronda', 'Tambah Jadwal Ronda')" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
          </button>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50 border-b-2 border-green-200">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Peserta Ronda</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
              </tr>
            </thead>
            <tbody v-if="isLoading">
            <tr v-for="n in 5" :key="n" class="border-b border-gray-100">
                <td v-for="col in 5" :key="col" class="px-6 py-5">
                <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                </td>
            </tr>
            </tbody>
            <tbody>
              <tr v-for="(item, index) in jadwalRondaData" :key="index" class="border-b border-gray-100 hover:bg-green-50 transition-colors">
                <td class="px-6 py-5 text-gray-700 font-medium">{{ item.no }}</td>
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                      <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <span class="text-gray-800 font-medium">{{ item.tanggal }}</span>
                  </div>
                </td>
                <td class="px-6 py-5">
                  <span class="text-gray-600">{{ item.peserta_ronda }}</span>
                </td>
                <td class="px-6 py-5">
                  <div class="flex items-center gap-2">
                    <button @click="openEditModal(item, index, 'ronda', 'Edit Jadwal')" class="p-2 hover:bg-green-100 rounded-lg transition-colors">
                      <svg class="w-5 h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                      </svg>
                    </button>
                    <button @click="openDeleteModal(index, 'ronda', item)" class="p-2 hover:bg-red-100 rounded-lg transition-colors">
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

        <div class="bg-gray-50 px-6 py-4 border-t">
          <p class="text-sm text-gray-600">Menampilkan {{ jadwalRondaData.length }} jadwal</p>
        </div>
      </div>

      <div v-if="activeTab === 'cleaning'" class="space-y-6">
        <div class="bg-white rounded-2xl shadow-xl p-6">
          <div class="flex justify-between items-center mb-6">
            <div>
              <h2 class="text-2xl font-bold text-gray-800">Program Kebersihan</h2>
              <p class="text-gray-600 text-sm">Kelola jadwal gotong royong</p>
            </div>
            <button @click="openCreateModal('cleaning', 'Tambah Program Kebersihan')" class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors flex items-center gap-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
              Tambah Program
            </button>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="(event, index) in cleaningEvents" :key="index" class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
              <div class="relative h-48">
                <img :src="event.image" :alt="event.title" class="w-full h-full object-cover">
                <div class="absolute top-3 right-3">
                  <span 
                    class="px-3 py-1 rounded-full text-xs font-bold text-white"
                    :class="{
                      'bg-green-500': event.status === 'completed',
                      'bg-red-500 animate-pulse': event.status === 'thisweek',
                      'bg-blue-500': event.status === 'upcoming'
                    }">
                    {{ event.status === 'completed' ? 'Selesai' : event.status === 'thisweek' ? 'Minggu Ini' : 'Akan Datang' }}
                  </span>
                </div>
              </div>
              
              <div class="p-5">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ event.title }}</h3>
                <div class="space-y-2 text-sm text-gray-600">
                  <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ event.date }}</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ event.time }}</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <span>{{ event.location }}</span>
                  </div>
                </div>

                <div class="flex gap-2 mt-4 pt-4 border-t">
                  <button @click="openEditModal(event, index, 'cleaning', 'Edit Program')" class="flex-1 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors font-medium">
                    Edit
                  </button>
                  <button @click="openDeleteModal(index, 'cleaning', event)" class="flex-1 px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors font-medium">
                    Hapus
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showFormModal" @click="closeFormModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 rounded-t-2xl">
          <h2 class="text-xl font-bold text-white">
            {{ formMode === 'create' ? 'Tambah Data' : 'Edit Data' }}
          </h2>
          <p class="text-green-100 text-sm mt-1">{{ formTitle }}</p>
        </div>

        <div class="p-6 space-y-4">
          <template v-if="currentTable === 'baksos'">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
              <input v-model="formData.nama" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
              <input v-model="formData.tanggal" type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
              <textarea v-model="formData.keterangan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan keterangan"></textarea>
            </div>
          </template>

          <template v-if="currentTable === 'banksampah'">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
              <input v-model="bankSampahForm.nama" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Total Sampah (kg)</label>
              <input v-model.number="bankSampahForm.total_sampah" type="number" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0.00">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Total Uang (Rp)</label>
              <input v-model.number="bankSampahForm.total_uang" type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0">
            </div>
          </template>

          <template v-if="currentTable === 'ronda'">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
              <input v-model="jadwalRondaForm.tanggal" type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Peserta Ronda</label>
              <textarea v-model="jadwalRondaForm.peserta_ronda" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Nama peserta ronda"></textarea>
            </div>
          </template>

          <template v-if="currentTable === 'cleaning'">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Judul Program</label>
              <input v-model="cleaningForm.title" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Contoh: Gotong Royong">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
              <input v-model="cleaningForm.date" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Minggu, 10 November 2025">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Waktu</label>
              <input v-model="cleaningForm.time" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="jam 9 - selesai">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
              <input v-model="cleaningForm.location" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Jalan Utama">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">URL Gambar</label>
              <input v-model="cleaningForm.image" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="https://...">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
              <select v-model="cleaningForm.status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="upcoming">Akan Datang</option>
                <option value="thisweek">Minggu Ini</option>
                <option value="completed">Selesai</option>
              </select>
            </div>
          </template>
        </div>

        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex gap-3 justify-end">
          <button @click="closeFormModal" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button 
            @click="saveData"
            :disabled="isSaving"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
            <svg v-if="isSaving" class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isSaving ? 'Menyimpan...' : (formMode === 'create' ? 'Tambah' : 'Simpan') }}
          </button>
        </div>
      </div>
    </div>

    <div v-if="showDeleteModal" @click="showDeleteModal = false" class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-5 rounded-t-2xl">
          <h2 class="text-xl font-bold text-white">Konfirmasi Hapus</h2>
          <p class="text-red-100 text-sm mt-1">Data yang dihapus tidak dapat dikembalikan</p>
        </div>

        <div class="p-6">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-800 font-medium">Apakah Anda yakin ingin menghapus data ini?</p>
              <p class="text-gray-600 text-sm mt-1">
                <span v-if="currentTable === 'baksos'">{{ formData.nama }}</span>
                <span v-else-if="currentTable === 'banksampah'">{{ bankSampahForm.nama }}</span>
                <span v-else-if="currentTable === 'ronda'">{{ jadwalRondaForm.tanggal }}</span>
                <span v-else-if="currentTable === 'cleaning'">{{ cleaningForm.title }}</span>
              </p>
            </div>
          </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex gap-3 justify-end">
          <button @click="showDeleteModal = false" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button 
            @click="confirmDelete"
            :disabled="isDeleting"
            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 flex items-center gap-2">
            <svg v-if="isDeleting" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
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
import { ref, onMounted, nextTick } from 'vue'
import { useRouter } from 'vue-router'
import { baksosAPI, bankSampahAPI, jadwalRondaAPI, authService } from '../services/api.js'
import api from '../services/api.js'

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const mobileMenuOpen = ref(false)
const isLoading = ref(false)
const isSaving = ref(false)
const isDeleting = ref(false)
const toast = ref({ show: false, message: '', type: '' })

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

const activeTab = ref('baksos')
const tabs = [
  { id: 'baksos', label: 'Bakti Sosial' },
  { id: 'banksampah', label: 'Bank Sampah' },
  { id: 'ronda', label: 'Jadwal Ronda' },
  { id: 'cleaning', label: 'Program Kebersihan' }
]
const tableData = ref([])
const bankSampahData = ref([])
const jadwalRondaData = ref([])
const cleaningEvents = ref([
  {
    title: 'Gotong Royong',
    date: 'Minggu, 19 Oktober 2025',
    time: 'jam 9 - selesai',
    location: 'Jalan Utama',
    image: 'https://images.unsplash.com/photo-1588783948922-8caa83db48b3?w=800',
    status: 'completed'
  },
  {
    title: 'Bumi Hijau',
    date: 'Minggu, 26 Oktober 2025',
    time: 'jam 9 - selesai',
    location: 'Mushola At-Taqwa',
    image: 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=800',
    status: 'thisweek'
  },
  {
    title: 'Bersih Taman',
    date: 'Minggu, 2 November 2025',
    time: 'jam 9 - selesai',
    location: 'Taman RW 05',
    image: 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=800',
    status: 'upcoming'
  }
])

const showFormModal = ref(false)
const showDeleteModal = ref(false)
const formMode = ref('create')
const formTitle = ref('')
const editingIndex = ref(null)
const currentTable = ref('')

const formData = ref({
  nama: '',
  tanggal: '',
  keterangan: ''
})

const bankSampahForm = ref({
  nama: '',
  total_sampah: 0,
  total_uang: 0
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
  image: '',
  status: 'upcoming'
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

const fetchBaksos = async () => {
  isLoading.value = true
  try {
    const response = await baksosAPI.getAll()
    tableData.value = response.data
      .sort((a, b) => a.id - b.id)
      .map((item, index) => ({
        id: item.id,
        no: index + 1,
        nama: item.nama,
        tanggal: new Date(item.tanggal).toLocaleDateString('id-ID', { 
          day: '2-digit', 
          month: 'short', 
          year: 'numeric' 
        }),
        keterangan: item.keterangan
      }))
  } catch (error) {
    showToast('Gagal memuat data Bakti Sosial', 'error')
  }finally {
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
        totalUang: 'Rp ' + new Intl.NumberFormat('id-ID').format(item.total_uang)
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

const openCreateModal = (tableType, title) => {
  currentTable.value = tableType
  formMode.value = 'create'
  formTitle.value = title
  
  if (tableType === 'banksampah') {
    bankSampahForm.value = { nama: '', total_sampah: 0, total_uang: 0 }
  } else if (tableType === 'ronda') {
    jadwalRondaForm.value = { tanggal: '', peserta_ronda: '' }
  } else if (tableType === 'cleaning') {
    cleaningForm.value = { title: '', date: '', time: '', location: '', image: '', status: 'upcoming' }
  } else {
    formData.value = { nama: '', tanggal: '', keterangan: '' }
  }
  showFormModal.value = true
}

const openEditModal = (item, index, tableType, title) => {
  currentTable.value = tableType
  formMode.value = 'edit'
  formTitle.value = title
  editingIndex.value = index
  
  if (tableType === 'banksampah') {
    bankSampahForm.value = {
      id: item.id,
      nama: item.nama,
      total_sampah: parseFloat(item.totalSampah),
      total_uang: parseInt(item.totalUang.replace(/\D/g, ''))
    }
  } else if (tableType === 'ronda') {
    jadwalRondaForm.value = {
      id: item.id,
      tanggal: item.tanggal,
      peserta_ronda: item.peserta_ronda
    }
  } else if (tableType === 'cleaning') {
    cleaningForm.value = { ...item }
  } else {
    formData.value = { ...item }
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
    
    if (tableType === 'banksampah') {
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
    } else {
      formData.value = { ...item }
    }
    
    showDeleteModal.value = true
  })
}

const closeFormModal = () => {
  showFormModal.value = false
  formData.value = { nama: '', tanggal: '', keterangan: '' }
  bankSampahForm.value = { nama: '', total_sampah: 0, total_uang: 0 }
  jadwalRondaForm.value = { tanggal: '', peserta_ronda: '' }
  cleaningForm.value = { title: '', date: '', time: '', location: '', image: '', status: 'upcoming' }
}

const saveData = async () => {
  isSaving.value = true
  try {
    if (currentTable.value === 'banksampah') {
      const payload = {
        nama: bankSampahForm.value.nama,
        total_sampah: bankSampahForm.value.total_sampah,
        total_uang: bankSampahForm.value.total_uang
      }
      if (formMode.value === 'create') {
        await bankSampahAPI.create(payload)
      } else {
        await bankSampahAPI.update(bankSampahForm.value.id, payload)
      }
      await fetchBankSampah()
      showToast('Data Bank Sampah berhasil disimpan', 'success')
    } else if (currentTable.value === 'ronda') {
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
    } else if (currentTable.value === 'cleaning') {
      if (formMode.value === 'create') {
        cleaningEvents.value.push({ ...cleaningForm.value })
      } else {
        cleaningEvents.value[editingIndex.value] = { ...cleaningForm.value }
      }
      showToast('Data Program Kebersihan berhasil disimpan', 'success')
    } else {
      const payload = {
        nama: formData.value.nama,
        tanggal: formData.value.tanggal,
        keterangan: formData.value.keterangan
      }
      if (formMode.value === 'create') {
        await baksosAPI.create(payload)
      } else {
        await baksosAPI.update(formData.value.id, payload)
      }
      await fetchBaksos()
      showToast('Data Bakti Sosial berhasil disimpan', 'success')
    }
    closeFormModal()
  } catch (error) {
    console.error('Error saving:', error.response?.data)
  } finally {
    isSaving.value = false
  }
}

const confirmDelete = async () => {
  isDeleting.value = true
  try {
    if (currentTable.value === 'banksampah') {
      await bankSampahAPI.delete(bankSampahForm.value.id)
      await fetchBankSampah()
      showToast('Data berhasil dihapus')
    } else if (currentTable.value === 'ronda') {
      await jadwalRondaAPI.delete(jadwalRondaForm.value.id)
      await fetchJadwalRonda()
      showToast('Jadwal berhasil dihapus')
    } else if (currentTable.value === 'cleaning') {
      cleaningEvents.value.splice(editingIndex.value, 1)
      showToast('Program berhasil dihapus')
    } else {
      await baksosAPI.delete(formData.value.id)
      await fetchBaksos()
      showToast('Data berhasil dihapus')
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
  fetchBaksos()
  fetchBankSampah()
  fetchJadwalRonda()
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

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
</style>