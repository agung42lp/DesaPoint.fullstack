<template>
  <div class="min-h-screen bg-gray-50">
    <nav class="bg-white shadow-lg sticky top-0 z-50 animate-slideDown">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 md:h-20">
          <div class="flex items-center space-x-4">
            <div class="h-10 w-10 md:h-12 md:w-12 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold transform hover:rotate-12 hover:scale-110 transition-all duration-300">
              RW
            </div>
            <div>
              <h1 class="text-lg md:text-xl font-bold text-green-700">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>
          
          <div class="hidden md:flex items-center space-x-6">
            <router-link to="/homeadmin" class="text-gray-700 hover:text-green-600 font-medium">Beranda</router-link>
            <router-link to="/program" class="text-gray-700 hover:text-green-600 font-medium">Program</router-link>
            <router-link to="/keuangan" class="text-green-600 font-medium">Keuangan</router-link>
            <router-link to="/pengaduan" class="text-gray-700 hover:text-green-600 font-medium">Pengaduan</router-link>
            <div v-if="isLoggedIn" class="flex items-center gap-4">
              <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-purple-50 to-blue-50 rounded-full border border-purple-200/50 shadow-sm">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                  {{ currentUser?.name?.charAt(0).toUpperCase() }}
                </div>
                <span class="text-gray-800 font-semibold">{{ currentUser?.name }}</span>
              </div>
              <button
                @click="handleLogout"
                class="group relative px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                <span class="relative z-10 flex items-center gap-2">
                  <svg class="w-5 h-5 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                  </svg>
                  Logout
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <section class="max-w-7xl mx-auto px-4 mt-8 mb-4">
      <h2 class="text-2xl font-bold text-gray-900 mb-4">Pemasukan</h2>
      <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div 
          v-for="(stat, index) in statsPemasukan" 
          :key="index"
          class="bg-white rounded-xl shadow-xl p-6 hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500"
          @mouseenter="stat.hover = true"
          @mouseleave="stat.hover = false">
          <p class="text-sm text-gray-600 font-medium mb-2">{{ stat.label }}</p>
          <p class="text-2xl font-bold text-green-700 transition-all duration-300" :class="{ 'scale-110': stat.hover }">
            Rp {{ formatNumber(stat.value) }}
          </p>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-4">Pengeluaran</h2>
      <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div 
          v-for="(stat, index) in statsPengeluaran" 
          :key="index"
          class="bg-white rounded-xl shadow-xl p-6 hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500"
          @mouseenter="stat.hover = true"
          @mouseleave="stat.hover = false">
          <p class="text-sm text-gray-600 font-medium mb-2">{{ stat.label }}</p>
          <p class="text-2xl font-bold text-red-700 transition-all duration-300" :class="{ 'scale-110': stat.hover }">
            Rp {{ formatNumber(stat.value) }}
          </p>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 mb-16">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6 flex justify-between items-center">
          <div>
            <h2 class="text-2xl font-bold text-white">Laporan Keuangan</h2>
            <p class="text-green-100 mt-1 text-sm">Data transaksi keuangan RW</p>
          </div>
          <button @click="openCreateModal" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
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
              <tr 
                v-for="(item, index) in laporanKeuangan" 
                :key="index"
                class="border-b border-gray-100 hover:bg-green-50 transition-all duration-300">
                <td class="px-6 py-5 text-gray-700 font-medium">{{ index + 1 }}</td>
                <td class="px-6 py-5 text-gray-800">{{ item.tanggal }}</td>
                <td class="px-6 py-5 text-gray-800">{{ item.keterangan }}</td>
                <td class="px-6 py-5">
                  <span v-if="item.debit > 0" class="text-red-700 font-semibold">
                    Rp {{ formatNumber(item.debit) }}
                  </span>
                  <span v-else class="text-gray-400">-</span>
                </td>
                <td class="px-6 py-5">
                  <span v-if="item.kredit > 0" class="text-green-700 font-semibold">
                    Rp {{ formatNumber(item.kredit) }}
                  </span>
                  <span v-else class="text-gray-400">-</span>
                </td>
                <td class="px-6 py-5">
                  <span class="font-bold" :class="item.saldo >= 0 ? 'text-green-700' : 'text-red-700'">
                    Rp {{ formatNumber(item.saldo) }}
                  </span>
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
          <div 
            v-for="(item, index) in laporanKeuangan" 
            :key="index"
            class="p-4 hover:bg-green-50 transition-all duration-300">
            <div class="mb-3">
              <div class="text-xs text-gray-500">{{ item.tanggal }}</div>
              <div class="font-semibold text-gray-900">{{ item.keterangan }}</div>
            </div>
            <div class="grid grid-cols-2 gap-2 text-sm mb-3">
              <div>
                <span class="text-gray-600">Debit:</span>
                <span v-if="item.debit > 0" class="text-red-700 font-semibold ml-2">
                  Rp {{ formatNumber(item.debit) }}
                </span>
                <span v-else class="text-gray-400 ml-2">-</span>
              </div>
              <div>
                <span class="text-gray-600">Kredit:</span>
                <span v-if="item.kredit > 0" class="text-green-700 font-semibold ml-2">
                  Rp {{ formatNumber(item.kredit) }}
                </span>
                <span v-else class="text-gray-400 ml-2">-</span>
              </div>
            </div>
            <div class="text-sm mb-3">
              <span class="text-gray-600">Saldo:</span>
              <span class="font-bold ml-2" :class="item.saldo >= 0 ? 'text-green-700' : 'text-red-700'">
                Rp {{ formatNumber(item.saldo) }}
              </span>
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

    <div 
      v-if="showFormModal" 
      @click="closeFormModal"
      class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 animate-fadeIn">
      <div 
        @click.stop
        class="bg-white rounded-2xl shadow-2xl max-w-md w-full animate-slideUp">
        
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 rounded-t-2xl">
          <h2 class="text-xl font-bold text-white">
            {{ formMode === 'create' ? 'Tambah Transaksi' : 'Edit Transaksi' }}
          </h2>
          <p class="text-green-100 text-sm mt-1">Laporan Keuangan</p>
        </div>

        <div class="p-6 space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
            <input 
              v-model="formData.tanggal"
              type="date" 
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
          </div>
          
        <div v-if="isFirstTransaction && formMode === 'create'">
            <label class="block text-sm font-medium text-gray-700 mb-2">Saldo Awal</label>
            <input 
                v-model.number="formData.saldo_awal"
                type="number"
                min="0"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                placeholder="0">
            <p class="text-xs text-gray-500 mt-1">Masukkan saldo awal untuk transaksi pertama</p>
        </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
            <textarea 
              v-model="formData.keterangan"
              rows="3"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
              placeholder="Masukkan keterangan"></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
            <div class="flex gap-4">
              <label class="flex items-center cursor-pointer">
                <input 
                    v-model="formData.kategori"
                    type="radio" 
                    value="debit"
                    class="w-4 h-4 text-green-600 focus:ring-green-500">
                <span class="ml-2 text-gray-700">Debit (Masuk)</span> 
                </label>
                <label class="flex items-center cursor-pointer">
                <input 
                    v-model="formData.kategori"
                    type="radio" 
                    value="kredit"
                    class="w-4 h-4 text-green-600 focus:ring-green-500">
                <span class="ml-2 text-gray-700">Kredit (Keluar)</span> 
              </label>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah (Rp)</label>
            <input 
              v-model.number="formData.jumlah"
              type="number"
              min="0"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
              placeholder="0">
          </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex gap-3 justify-end">
          <button 
            @click="closeFormModal"
            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button 
            @click="saveData"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
            {{ formMode === 'create' ? 'Tambah' : 'Simpan' }}
          </button>
        </div>
      </div>
    </div>

    <div 
      v-if="showDeleteModal" 
      @click="showDeleteModal = false"
      class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4 animate-fadeIn">
      <div 
        @click.stop
        class="bg-white rounded-2xl shadow-2xl max-w-md w-full animate-slideUp">
        
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
              <p class="text-gray-800 font-medium">Apakah Anda yakin ingin menghapus transaksi ini?</p>
              <p class="text-gray-600 text-sm mt-1">{{ formData.keterangan }}</p>
            </div>
          </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex gap-3 justify-end">
          <button 
            @click="showDeleteModal = false"
            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
            Batal
          </button>
          <button 
            @click="confirmDelete"
            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
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
  
  const iuran = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('iuran'))
    .reduce((sum, item) => sum + parseFloat(item.debit), 0) 
  
  const perumahan = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('perumahan'))
    .reduce((sum, item) => sum + parseFloat(item.debit), 0) 
  
  const donasi = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('donasi'))
    .reduce((sum, item) => sum + parseFloat(item.debit), 0) 
  
  const bankSampah = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('bank sampah') && parseFloat(item.debit) > 0) 
    .reduce((sum, item) => sum + parseFloat(item.debit), 0) 

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
  
  const baksos = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('bakti sosial') || item.keterangan.toLowerCase().includes('baksos'))
    .reduce((sum, item) => sum + parseFloat(item.kredit), 0) 
  
  const kerjaBakti = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('kerja bakti') || item.keterangan.toLowerCase().includes('gotong royong'))
    .reduce((sum, item) => sum + parseFloat(item.kredit), 0) 
  
  const bankSampah = laporanKeuangan.value
    .filter(item => item.keterangan.toLowerCase().includes('bank sampah') && parseFloat(item.kredit) > 0) 
    .reduce((sum, item) => sum + parseFloat(item.kredit), 0) 
  
  const lainLain = laporanKeuangan.value
    .filter(item => {
      const ket = item.keterangan.toLowerCase()
      return parseFloat(item.kredit) > 0 && 
        !ket.includes('bakti sosial') && 
        !ket.includes('baksos') &&
        !ket.includes('kerja bakti') && 
        !ket.includes('gotong royong') &&
        !ket.includes('bank sampah')
    })
    .reduce((sum, item) => sum + parseFloat(item.kredit), 0) 

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

const openCreateModal = () => {
  formMode.value = 'create'
  formData.value = {
    tanggal: '',
    keterangan: '',
    kategori: '',
    jumlah: 0
  }
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
  formData.value = { 
    id: item.id,
    keterangan: item.keterangan 
  }
  showDeleteModal.value = true
}

const closeFormModal = () => {
  showFormModal.value = false
  formData.value = {
    tanggal: '',
    keterangan: '',
    kategori: '',
    jumlah: 0
  }
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
  } catch (error) {
    console.error('Error saving:', error.response?.data)
    alert('Gagal menyimpan data: ' + (error.response?.data?.message || 'Terjadi kesalahan'))
  }
}

const confirmDelete = async () => {
  try {
    await laporanKeuanganAPI.delete(formData.value.id)
    await fetchLaporanKeuangan()
    showDeleteModal.value = false
  } catch (error) {
    console.error('Error deleting:', error)
    alert('Gagal menghapus data')
  }
}

onMounted(() => {
  checkAuthStatus()
  fetchLaporanKeuangan()
  
  window.addEventListener('storage', checkAuthStatus)
  
  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) {
      checkAuthStatus()
    }
  })
})

onUnmounted(() => {
  window.removeEventListener('storage', checkAuthStatus)
})
</script>

<style scoped>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(50px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fadeIn {
  animation: fadeIn 0.3s ease-out;
}

.animate-slideUp {
  animation: slideUp 0.4s ease-out;
}

@keyframes slideDown {
  from {
    transform: translateY(-100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.animate-slideDown {
  animation: slideDown 0.8s ease-out;
}
</style>