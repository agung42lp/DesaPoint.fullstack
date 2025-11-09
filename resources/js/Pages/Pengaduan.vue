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
            <router-link to="/homeadmin" class="text-gray-700 hover:text-green-600 font-medium">Beranda</router-link>
            <router-link to="/program" class="text-gray-700 hover:text-green-600 font-medium">Program</router-link>
            <router-link to="/keuangan" class="text-gray-700 hover:text-green-600 font-medium">Keuangan</router-link>
            <router-link to="/admin/pengaduan" class="text-green-600 font-medium">Pengaduan</router-link>
            <div v-if="isLoggedIn" class="flex items-center gap-4">
              <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-purple-50 to-blue-50 rounded-full border border-purple-200/50">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                  {{ currentUser?.name?.charAt(0).toUpperCase() }}
                </div>
                <span class="text-gray-800 font-semibold">{{ currentUser?.name }}</span>
              </div>
              <button @click="exportPengaduan" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                Export Excel
              </button>
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
            <router-link @click="mobileMenuOpen = false" to="/program" class="text-gray-700 font-medium py-2">Program</router-link>
            <router-link @click="mobileMenuOpen = false" to="/keuangan" class="text-gray-700 font-medium py-2">Keuangan</router-link>
            <router-link @click="mobileMenuOpen = false" to="/admin/pengaduan" class="text-green-600 font-medium py-2">Pengaduan</router-link>
            <button v-if="isLoggedIn" @click="() => { handleLogout(); mobileMenuOpen = false; }" class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium text-center">
              Logout
            </button>
          </div>
        </div>
      </div>
    </nav>

    <section class="bg-gradient-to-br from-green-600 to-green-800 py-12 md:py-16">
      <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Dashboard Pengaduan Warga</h1>
        <p class="text-green-100">Kelola dan tangani pengaduan dari warga desa</p>
      </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 -mt-8">
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Pengaduan</label>
            <input
              v-model="searchQuery"
              @input="fetchPengaduan"
              type="text"
              placeholder="Cari berdasarkan judul..."
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Filter Kategori</label>
            <select
              v-model="selectedKategori"
              @change="fetchPengaduan"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
            >
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

    <div class="max-w-7xl mx-auto px-4 py-8">
      <div v-if="loading" class="text-center py-20">
        <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-green-200 border-t-green-600"></div>
        <p class="mt-6 text-green-700 text-lg font-bold">Memuat data pengaduan...</p>
      </div>

      <div v-else-if="pengaduanList.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="pengaduan in pengaduanList"
          :key="pengaduan.id"
          @click="openDetail(pengaduan)"
          class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all cursor-pointer overflow-hidden group border border-gray-100"
        >
          <div class="p-6">
            <div class="flex items-start justify-between mb-4">
              <span
                :class="[
                  'px-3 py-1 rounded-full text-xs font-bold',
                  getKategoriColor(pengaduan.kategori)
                ]"
              >
                {{ pengaduan.kategori }}
              </span>
              <span
                :class="[
                  'px-3 py-1 rounded-full text-xs font-bold',
                  getStatusColor(pengaduan.status)
                ]"
              >
                {{ pengaduan.status.toUpperCase() }}
              </span>
            </div>

            <h3 class="text-xl font-bold text-gray-800 mb-4 line-clamp-2 group-hover:text-green-600 transition-colors">
              {{ pengaduan.judul_permasalahan }}
            </h3>

            <div class="space-y-3 text-sm text-gray-600 mb-5">
              <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span class="font-semibold">{{ pengaduan.nama_pengirim }}</span>
              </div>
              <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="font-semibold">RT {{ pengaduan.rt }} - No. {{ pengaduan.nomor_rumah }}</span>
              </div>
              <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-semibold">{{ formatDate(pengaduan.created_at) }}</span>
              </div>
            </div>

            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
              {{ pengaduan.detail_permasalahan }}
            </p>
          </div>

          <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 flex items-center justify-center gap-3 text-white font-bold text-sm group-hover:from-green-700 group-hover:to-green-800 transition-all">
            <span>Lihat Detail & Tanggapi</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
          </div>
        </div>
      </div>

      <div v-else class="text-center py-20">
        <svg class="w-32 h-32 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
        </svg>
        <p class="text-gray-700 text-xl font-bold mb-2">Tidak Ada Pengaduan</p>
        <p class="text-gray-600">Belum ada pengaduan yang ditemukan dengan filter ini</p>
      </div>
    </div>

    <div
      v-if="showModal"
      @click="closeModal"
      class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
    >
      <div
        @click.stop
        class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto"
      >
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6 flex items-center justify-between">
          <div>
            <h2 class="text-2xl font-bold text-white">Detail Pengaduan</h2>
            <p class="text-green-100 text-sm">Informasi lengkap dan tanggapan</p>
          </div>
          <button
            @click="closeModal"
            class="text-white hover:bg-white/20 p-2 rounded-lg transition-all"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="p-8 space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
              <p class="text-sm text-green-600 font-bold mb-3">DATA PELAPOR</p>
              <p class="text-xl font-bold text-gray-800 mb-2">{{ selectedPengaduan.nama_pengirim }}</p>
              <div class="space-y-1 text-sm text-gray-600">
                <p class="font-semibold">RT {{ selectedPengaduan.rt }} - No. {{ selectedPengaduan.nomor_rumah }}</p>
                <p class="font-semibold">{{ selectedPengaduan.no_hp }}</p>
              </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
              <p class="text-sm text-green-600 font-bold mb-3">KATEGORI & STATUS</p>
              <div class="flex flex-wrap gap-3 mb-3">
                <span :class="['px-4 py-2 rounded-full text-xs font-bold', getKategoriColor(selectedPengaduan.kategori)]">
                  {{ selectedPengaduan.kategori }}
                </span>
                <span :class="['px-4 py-2 rounded-full text-xs font-bold', getStatusColor(selectedPengaduan.status)]">
                  {{ selectedPengaduan.status.toUpperCase() }}
                </span>
              </div>
              <p class="text-sm text-gray-600 font-semibold">{{ formatDate(selectedPengaduan.created_at) }}</p>
            </div>
          </div>

          <div>
            <label class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
              Judul Permasalahan
            </label>
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
              <p class="text-gray-800 font-bold text-lg">{{ selectedPengaduan.judul_permasalahan }}</p>
            </div>
          </div>

          <div>
            <label class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
              Detail Permasalahan
            </label>
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
              <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ selectedPengaduan.detail_permasalahan }}</p>
            </div>
          </div>

          <div v-if="selectedPengaduan.foto_1 || selectedPengaduan.foto_2">
            <label class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
              Foto Bukti
            </label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div v-if="selectedPengaduan.foto_1" class="rounded-xl overflow-hidden shadow-lg border border-gray-200">
                <img :src="`/storage/${selectedPengaduan.foto_1}`" alt="Foto 1" class="w-full h-72 object-cover" />
              </div>
              <div v-if="selectedPengaduan.foto_2" class="rounded-xl overflow-hidden shadow-lg border border-gray-200">
                <img :src="`/storage/${selectedPengaduan.foto_2}`" alt="Foto 2" class="w-full h-72 object-cover" />
              </div>
            </div>
          </div>

          <div class="border-t-2 border-gray-200 pt-8 mt-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Update Status & Tanggapan</h3>
            
            <div class="space-y-5">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  Status Pengaduan <span class="text-red-500">*</span>
                </label>
                <select
                  v-model="updateForm.status"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
                  <option value="diterima">Diterima</option>
                  <option value="diproses">Diproses</option>
                  <option value="selesai">Selesai</option>
                  <option value="ditolak">Ditolak</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  Tanggapan <span class="text-red-500">*</span>
                </label>
                <textarea
                  v-model="updateForm.tanggapan"
                  rows="5"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                  placeholder="Berikan tanggapan untuk pengaduan ini..."
                ></textarea>
              </div>

              <button
                @click="updatePengaduan"
                :disabled="updating"
                class="w-full bg-green-600 text-white py-4 rounded-lg font-bold text-lg hover:bg-green-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-3"
              >
                <svg v-if="updating" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
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
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { pengaduanAPI, authService } from '../services/api'
import api from '../services/api'
import { useExport } from '../composables/useExport'

const { downloadExcel } = useExport()

const exportPengaduan = async () => {
  try {
    const response = await pengaduanAPI.export()
    downloadExcel(response.data, 'pengaduan.xlsx')
    showToast('Data berhasil diekspor!')
  } catch (error) {
    showToast('Gagal ekspor data', 'error')
  }
}

const router = useRouter()
const isLoggedIn = ref(false)
const currentUser = ref(null)
const mobileMenuOpen = ref(false)
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
</style>