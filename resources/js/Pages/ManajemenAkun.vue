<template>
  <div class="min-h-screen bg-gray-50 flex">

    <aside class="fixed left-0 top-0 h-screen w-16 bg-white border-r-2 border-gray-200 shadow-xl z-50 flex flex-col items-center py-6">
      <div class="mb-8">
        <div class="h-10 w-10 md:h-12 md:w-12 rounded-lg flex items-center justify-center overflow-hidden">
            <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover" />
        </div>
      </div>

      <nav class="flex-1 w-full flex flex-col items-center space-y-4">
        <router-link 
          to="/homeadmin"
          class="group relative w-14 h-14 flex items-center justify-center rounded-xl transition-all hover:bg-green-50"
          :class="$route.path === '/homeadmin' ? 'bg-white/20' : ''">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            Beranda
          </div>
        </router-link>

        <router-link 
          to="/program"
          class="group relative w-14 h-14 flex items-center justify-center rounded-xl transition-all hover:bg-green-50"
          :class="$route.path === '/program' ? 'bg-white/20' : ''">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
          </svg>
          <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            Program
          </div>
        </router-link>

        <router-link 
          to="/keuangan"
          class="group relative w-14 h-14 flex items-center justify-center rounded-xl transition-all hover:bg-green-50"
          :class="$route.path === '/keuangan' ? 'bg-white/20' : ''">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            Keuangan
          </div>
        </router-link>

        <router-link 
          to="/pengaduan"
          class="group relative w-14 h-14 flex items-center justify-center rounded-xl transition-all hover:bg-green-50"
          :class="$route.path === '/pengaduan' ? 'bg-white/20' : ''">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
          </svg>
          <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            Pengaduan
          </div>
        </router-link>

        <router-link 
          to="/manajemen-akun"
          class="group relative w-14 h-14 flex items-center justify-center rounded-xl transition-all hover:bg-green-50"
          :class="$route.path === '/manajemen-akun' ? 'bg-white/20' : ''">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            Manajemen Akun
          </div>
        </router-link>
      </nav>

        <div class="w-full flex flex-col items-center space-y-4">
        <router-link 
            to="/profile"
            class="group relative w-14 h-14 flex items-center justify-center">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold cursor-pointer hover:scale-110 transition-transform">
            {{ currentUser?.name?.charAt(0).toUpperCase() }}
            </div>
            <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            {{ currentUser?.name }}
            </div>
        </router-link>

        <button 
        @click="handleLogout"
        class="group relative w-14 h-14 flex items-center justify-center rounded-xl transition-all hover:bg-red-500">
        <svg class="w-6 h-6 text-gray-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
        </svg>
        <div class="absolute left-full ml-4 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
            Logout
        </div>
        </button>
        </div>
    </aside>

    <div class="flex-1 ml-16">
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

      <section class="bg-gradient-to-br from-green-600 to-green-800 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4">
          <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Manajemen Akun</h1>
          <p class="text-green-100">Kelola akun User & Admin sistem</p>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-4 -mt-8">
        <div class="bg-white rounded-xl shadow-lg p-2 flex gap-2">
          <button 
            @click="activeTab = 'users'"
            class="flex-1 px-6 py-3 rounded-lg font-medium transition-all"
            :class="activeTab === 'users' 
              ? 'bg-green-600 text-white shadow-md' 
              : 'text-gray-600 hover:bg-gray-100'">
            User
          </button>
          <button 
            @click="activeTab = 'admins'"
            class="flex-1 px-6 py-3 rounded-lg font-medium transition-all"
            :class="activeTab === 'admins' 
              ? 'bg-green-600 text-white shadow-md' 
              : 'text-gray-600 hover:bg-gray-100'">
            Admin
          </button>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-xl p-6">
        
        <div class="flex justify-between items-center mb-6">
          <div>
            <h2 class="text-2xl font-bold text-gray-800">
              {{ activeTab === 'users' ? 'Daftar User' : 'Daftar Admin' }}
            </h2>
            <p class="text-gray-600 text-sm">
              Kelola akun {{ activeTab === 'users' ? 'user' : 'admin' }}
            </p>
          </div>
          <button 
            @click="openCreateModal" 
            class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Akun
          </button>
        </div>

        <div v-if="isLoading" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="n in 6" :key="n" class="border border-gray-200 rounded-xl overflow-hidden">
            <div class="bg-gray-200 h-40 animate-pulse"></div>
            <div class="p-5 space-y-3">
              <div class="h-6 bg-gray-200 rounded animate-pulse"></div>
              <div class="h-4 bg-gray-200 rounded animate-pulse w-3/4"></div>
              <div class="h-4 bg-gray-200 rounded animate-pulse w-1/2"></div>
            </div>
          </div>
        </div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="(account, index) in currentAccounts" :key="account.id" 
               class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
            
            <div class="bg-gradient-to-br from-green-100 to-blue-100 p-8 flex justify-center">
              <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center">
                <span class="text-white text-3xl font-bold">
                  {{ account.name.charAt(0).toUpperCase() }}
                </span>
              </div>
            </div>

            <div class="p-5">
              <h3 class="text-xl font-bold text-gray-800 mb-2">{{ account.name }}</h3>
              
              <div class="space-y-2 text-sm text-gray-600 mb-4">
                <div class="flex items-center gap-2">
                  <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                  <span>{{ account.username }}</span>
                </div>
                
                <div class="flex items-center gap-2">
                  <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                  </svg>
                  <span class="px-3 py-1 rounded-full text-xs font-bold"
                        :class="activeTab === 'admins' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'">
                    {{ activeTab === 'admins' ? 'Administrator' : 'User' }}
                  </span>
                </div>
              </div>

              <div class="flex gap-2 pt-4 border-t">
                <button @click="openEditModal(account, index)" 
                        class="flex-1 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors font-medium">
                  Edit
                </button>
                <button @click="openDeleteModal(account, index)"
                        class="flex-1 px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors font-medium">
                  Hapus
                </button>
              </div>
            </div>
          </div>
        </div>

        <div v-if="!isLoading && currentAccounts.length === 0" class="text-center py-12">
          <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          <p class="text-gray-500 text-lg">Belum ada akun {{ activeTab === 'users' ? 'user' : 'admin' }}</p>
        </div>
      </div>
      </div>
    </div>

    <div v-if="showFormModal" @click="closeFormModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
      <div @click.stop class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-5 rounded-t-2xl">
          <h2 class="text-xl font-bold text-white">
            {{ formMode === 'create' ? 'Tambah' : 'Edit' }} Akun {{ activeTab === 'users' ? 'User' : 'Admin' }}
          </h2>
          <p class="text-green-100 text-sm mt-1">
            {{ formMode === 'create' ? 'Buat akun baru' : 'Perbarui informasi akun' }}
          </p>
        </div>

        <div class="p-6 space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input 
              v-model="form.name" 
              type="text" 
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
              placeholder="Masukkan nama lengkap">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Username <span class="text-red-500">*</span>
            </label>
            <input 
              v-model="form.username" 
              type="text" 
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
              placeholder="Masukkan username">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Password 
              <span v-if="formMode === 'create'" class="text-red-500">*</span>
              <span v-else class="text-gray-500 text-xs">(Kosongkan jika tidak diubah)</span>
            </label>
            <input 
              v-model="form.password" 
              type="password" 
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
              :placeholder="formMode === 'create' ? 'Masukkan password' : 'Masukkan password baru'">
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
            :disabled="isSaving"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
            <svg v-if="isSaving" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isSaving ? 'Menyimpan...' : 'Simpan' }}
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
              <p class="text-gray-800 font-medium">Apakah Anda yakin ingin menghapus akun ini?</p>
              <p class="text-gray-600 text-sm mt-1">{{ form.name }}</p>
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
import { ref, computed, onMounted } from 'vue'
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

const currentAccounts = computed(() => {
  return activeTab.value === 'users' ? users.value : admins.value
})

const checkAuthStatus = async () => {
  const token = localStorage.getItem('token')
  if (token) {
    try {
      const response = await api.get('/user')
      isLoggedIn.value = true
      currentUser.value = response.data
    } catch (error) {
      router.push('/login')
    }
  } else {
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
    router.push('/login')
  }
}

onMounted(() => {
  checkAuthStatus()
  fetchUsers()
  fetchAdmins()
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