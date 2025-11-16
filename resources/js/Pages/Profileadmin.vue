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
            <div class="h-10 w-10 md:h-12 md:w-12 rounded-lg flex items-center justify-center overflow-hidden">
              <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover" />
            </div>
            <div>
              <h1 class="text-lg md:text-xl font-bold text-green-700">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>
          
          <div class="hidden md:flex items-center space-x-6">
            <router-link to="/homeadmin" class="text-gray-700 hover:text-green-600 font-medium">Beranda</router-link>
            
            <div class="flex items-center gap-4">
              <router-link to="/profile" class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-purple-50 to-blue-50 rounded-full border border-purple-200/50 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                  {{ currentUser?.name?.charAt(0).toUpperCase() }}
                </div>
                <span class="text-gray-800 font-semibold">{{ currentUser?.name }}</span>
              </router-link>
              <button @click="handleLogout" class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold shadow-lg hover:shadow-xl transition-shadow">
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
            <router-link @click="mobileMenuOpen = false" to="/" class="text-gray-700 hover:text-green-600 font-medium py-2">Beranda</router-link>
            <router-link @click="mobileMenuOpen = false" to="/form" class="text-gray-700 hover:text-green-600 font-medium py-2">Pengaduan</router-link>
            <button @click="() => { handleLogout(); mobileMenuOpen = false; }" class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium text-center">Logout</button>
          </div>
        </div>
      </div>
    </nav>

    <section class="max-w-5xl mx-auto px-4 py-8 md:py-12">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
        <div class="p-6 md:p-8">
          <div class="flex flex-col md:flex-row items-start md:items-center gap-6 mb-8">
            <div class="w-24 h-24 md:w-28 md:h-28 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center text-white font-bold text-4xl md:text-5xl shadow-lg">
              {{ currentUser?.name?.charAt(0).toUpperCase() }}
            </div>
            <div class="flex-1">
              <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ currentUser?.name }}</h1>
              <p class="text-gray-600 mb-3">@{{ currentUser?.username }}</p>
              <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                  Admin sejak {{ formatDate(currentUser?.created_at) }}
                </span>
              </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
              <button @click="showEditModal = true" class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold shadow-md transition-colors flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Profil
              </button>
              <button @click="showChangePasswordModal = true" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold shadow-md transition-colors flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
                Ubah Password
              </button>
            </div>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Akun</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-xs text-gray-600 mb-1">Nama Lengkap</p>
                  <p class="text-sm font-semibold text-gray-900 truncate">{{ currentUser?.name }}</p>
                </div>
              </div>

              <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-xs text-gray-600 mb-1">Username</p>
                  <p class="text-sm font-semibold text-gray-900 truncate">{{ currentUser?.username }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div v-if="showEditModal" @click="showEditModal = false" class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 rounded-t-2xl flex items-center justify-between">
          <div>
            <h2 class="text-xl font-bold text-white">Edit Profil</h2>
            <p class="text-green-100 text-sm mt-1">Perbarui informasi akun Anda</p>
          </div>
          <button @click="showEditModal = false" class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="p-6 space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
            <input v-model="editForm.name" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
            <input v-model="editForm.username" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all">
          </div>

          <div class="flex gap-3 pt-4">
            <button @click="showEditModal = false" class="flex-1 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
              Batal
            </button>
            <button @click="updateProfile" class="flex-1 px-4 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
              Simpan
            </button>
          </div>
        </div>
      </div>
    </div>

    <div v-if="showChangePasswordModal" @click="showChangePasswordModal = false" class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 rounded-t-2xl flex items-center justify-between">
          <div>
            <h2 class="text-xl font-bold text-white">Ubah Password</h2>
            <p class="text-blue-100 text-sm mt-1">Perbarui password akun Anda</p>
          </div>
          <button @click="showChangePasswordModal = false" class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="p-6 space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
            <input v-model="passwordForm.current_password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
            <input v-model="passwordForm.new_password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
            <input v-model="passwordForm.new_password_confirmation" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
          </div>

          <div class="flex gap-3 pt-4">
            <button @click="showChangePasswordModal = false" class="flex-1 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
              Batal
            </button>
            <button @click="changePassword" class="flex-1 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
              Ubah Password
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRouter } from 'vue-router'
import { authService } from '../services/api.js'
import api from '../services/api.js'

const loadingPengaduan = ref(false)

const loadMyPengaduan = async () => {
  loadingPengaduan.value = true
  try {
    const response = await api.get('/pengaduan/my')
    myPengaduan.value = response.data
  } catch (error) {
    console.error('Failed to load pengaduan:', error)
  } finally {
    loadingPengaduan.value = false
  }
}

const router = useRouter()
const currentUser = ref(null)
const mobileMenuOpen = ref(false)
const showEditModal = ref(false)
const showChangePasswordModal = ref(false)
const toast = ref({ show: false, message: '', type: '' })
const myPengaduan = ref([]) 

const showToast = (message, type = 'success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

const editForm = ref({
  name: '',
  username: ''
})

const passwordForm = ref({
  current_password: '',
  new_password: '',
  new_password_confirmation: ''
})

const userStats = computed(() => {
  const total = myPengaduan.value.length
  const pending = myPengaduan.value.filter(p => 
    ['diterima', 'diproses'].includes(p.status)
  ).length
  const completed = myPengaduan.value.filter(p => 
    p.status === 'selesai'
  ).length
  
  return { totalComplaints: total, pending, completed }
})

const formatDate = (date) => {
  if (!date) return '-'
  return new Date(date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long' })
}

const loadUserData = async () => {
  try {
    const response = await api.get('/user')
    currentUser.value = response.data
    
    editForm.value = {
      name: currentUser.value.name || '',
      username: currentUser.value.username || ''
    }
  } catch (error) {
    console.error('Failed to load user data:', error)
    router.push('/login')
  }
}

const updateProfile = async () => {
  try {
    await api.put('/user/profile', editForm.value)
    
    const updatedUser = { ...currentUser.value, ...editForm.value }
    localStorage.setItem('user', JSON.stringify(updatedUser))
    
    showEditModal.value = false
    showToast('Profil berhasil diperbarui!')
    loadUserData()
  } catch (error) {
    console.error('Failed to update profile:', error)
    showToast(error.response?.data?.message || 'Gagal memperbarui profil', 'error')
  }
}

const changePassword = async () => {
  if (passwordForm.value.new_password !== passwordForm.value.new_password_confirmation) {
    showToast('Konfirmasi password tidak sesuai!', 'error')
    return
  }

  try {
    await api.put('/user/change-password', passwordForm.value)
    showChangePasswordModal.value = false
    passwordForm.value = {
      current_password: '',
      new_password: '',
      new_password_confirmation: ''
    }
    showToast('Password berhasil diubah!')
  } catch (error) {
    console.error('Failed to change password:', error)
    showToast(error.response?.data?.message || 'Gagal mengubah password', 'error')
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
    router.push('/login')
  }
}

onMounted(() => {
  loadUserData()
  loadMyPengaduan() 
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