<template>
  <div class="min-h-screen bg-gradient-to-br from-green-400 via-green-500 to-green-600 flex items-center justify-center p-4 relative overflow-hidden">
    
    <transition name="slide-fade">
      <div v-if="toast.show" class="fixed top-6 right-6 z-[150] max-w-md animate-slideIn">
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
          <p class="text-white font-semibold">{{ toast.message }}</p>
        </div>
      </div>
    </transition>

    <div 
      class="absolute w-64 h-64 bg-white/10 rounded-full blur-3xl transition-all duration-1000 ease-out pointer-events-none"
      :style="{
        top: isRegister ? '10%' : '20%',
        left: isRegister ? '5%' : '15%',
        transform: isRegister ? 'scale(1.2) rotate(45deg)' : 'scale(1) rotate(0deg)',
        opacity: isRegister ? 0.8 : 1
      }"></div>
    <div 
      class="absolute w-80 h-80 bg-white/10 rounded-full blur-3xl transition-all duration-1000 ease-out pointer-events-none"
      :style="{
        bottom: isRegister ? '5%' : '15%',
        right: isRegister ? '10%' : '15%',
        transform: isRegister ? 'scale(0.9) rotate(-30deg)' : 'scale(1) rotate(0deg)',
        opacity: isRegister ? 1 : 0.8
      }"></div>
    <div 
      class="absolute w-72 h-72 bg-white/10 rounded-full blur-3xl transition-all duration-1000 ease-out pointer-events-none"
      :style="{
        top: isRegister ? '60%' : '50%',
        left: isRegister ? '80%' : '50%',
        transform: `translate(-50%, -50%) scale(${isRegister ? 1.3 : 1}) rotate(${isRegister ? 90 : 0}deg)`,
        opacity: isRegister ? 0.9 : 1
      }"></div>

    <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden">
      <div class="grid grid-cols-1 md:grid-cols-2 relative md:min-h-[600px]">
        
        <div 
          ref="formPanel"
          class="form-panel w-full h-full p-6 md:p-12 bg-white overflow-y-auto overflow-x-hidden z-20">
          
          <div class="flex items-center space-x-3 mb-6 md:mb-8">
            <div class="h-10 w-10 md:h-12 md:w-12 rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0">
              <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover" />
            </div>
            <div class="min-w-0">
              <h1 class="text-xl md:text-2xl font-bold text-green-700 truncate">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>

          <transition name="mobile-fade">
            <div v-show="!isRegister" :key="'login'" class="login-content">
              <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Sign In</h2>
              <p class="text-gray-600 mb-6 md:mb-8">Masuk ke dashboard RW 12</p>

              <div class="space-y-4 md:space-y-6">
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                  <div class="relative">
                    <input 
                      v-model="formData.username"
                      type="text" 
                      class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-green-200 transition-all outline-none"
                      :class="errors.username ? 'border-red-500' : 'border-gray-200 focus:border-green-500'"
                      placeholder="Username Anda"
                      @input="validateField('username')"
                      @keyup.enter="handleSubmit">
                    <svg v-if="!errors.username && formData.username" class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <p v-if="errors.username" class="text-red-500 text-xs mt-1 font-medium break-words">{{ errors.username }}</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                  <div class="relative">
                    <input 
                      v-model="formData.password"
                      :type="showPassword ? 'text' : 'password'"
                      class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-green-200 transition-all outline-none pr-10"
                      :class="errors.password ? 'border-red-500' : 'border-gray-200 focus:border-green-500'"
                      placeholder="••••••••"
                      @input="validateField('password')"
                      @keyup.enter="handleSubmit">
                    <button 
                      type="button"
                      @click="showPassword = !showPassword"
                      class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 flex-shrink-0">
                      <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                      </svg>
                      <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                      </svg>
                    </button>
                  </div>
                  <p v-if="errors.password" class="text-red-500 text-xs mt-1 font-medium break-words">{{ errors.password }}</p>
                </div>

                <button 
                  @click="handleSubmit"
                  :disabled="!isLoginFormValid || isLoading"
                  class="w-full py-3 rounded-lg font-bold transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                  :class="isLoginFormValid && !isLoading ? 'bg-green-600 text-white hover:bg-green-700 hover:scale-[1.02] hover:shadow-xl' : 'bg-gray-300 text-gray-500'">
                  <span v-if="isLoading" class="flex items-center justify-center gap-2">
                    <svg class="animate-spin h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                  </span>
                  <span v-else>LOGIN NOW</span>
                </button>

                <p class="text-center text-sm text-gray-600">
                  Don't have an account? 
                  <button @click="handleToggle" class="text-green-600 hover:text-green-700 font-semibold">Register</button>
                </p>
              </div>
            </div>
          </transition>

          <transition name="mobile-fade">
            <div v-show="isRegister" :key="'register'" class="register-content">
              <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Sign Up</h2>
              <p class="text-gray-600 mb-4 md:mb-6">Daftar sebagai warga RW 12</p>

              <div class="space-y-3 md:space-y-4">
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                  <div class="relative">
                    <input 
                      v-model="formData.name"
                      type="text" 
                      class="w-full px-4 py-2.5 border-2 rounded-lg focus:ring-2 focus:ring-green-200 transition-all outline-none"
                      :class="errors.name ? 'border-red-500' : 'border-gray-200 focus:border-green-500'"
                      placeholder="Nama Lengkap Anda"
                      @input="handleNameInput">
                    <div v-if="checkingName" class="absolute right-3 top-1/2 -translate-y-1/2">
                      <svg class="animate-spin h-5 w-5 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                    </div>
                    <svg v-else-if="!errors.name && formData.name && nameAvailable" class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <svg v-else-if="!checkingName && formData.name && !nameAvailable" class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <p v-if="errors.name" class="text-red-500 text-xs mt-1 font-medium break-words">{{ errors.name }}</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                  <div class="relative">
                    <input 
                      v-model="formData.username"
                      type="text" 
                      class="w-full px-4 py-2.5 border-2 rounded-lg focus:ring-2 focus:ring-green-200 transition-all outline-none"
                      :class="errors.username ? 'border-red-500' : 'border-gray-200 focus:border-green-500'"
                      placeholder="Username Anda"
                      @input="validateField('username')">
                    <svg v-if="!errors.username && formData.username" class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <p v-if="errors.username" class="text-red-500 text-xs mt-1 font-medium break-words">{{ errors.username }}</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                  <div class="relative">
                    <input 
                      v-model="formData.password"
                      :type="showPassword ? 'text' : 'password'"
                      class="w-full px-4 py-2.5 border-2 rounded-lg focus:ring-2 focus:ring-green-200 transition-all outline-none pr-10"
                      :class="errors.password ? 'border-red-500' : 'border-gray-200 focus:border-green-500'"
                      placeholder="••••••••"
                      @input="validateField('password')">
                    <button 
                      type="button"
                      @click="showPassword = !showPassword"
                      class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 z-10 flex-shrink-0">
                      <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                      </svg>
                      <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                      </svg>
                    </button>
                  </div>
                  <p v-if="errors.password" class="text-red-500 text-xs mt-1 font-medium break-words">{{ errors.password }}</p>
                  <p v-else class="text-gray-500 text-xs mt-1">Min. 6 karakter, kombinasi huruf & angka</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                  <div class="relative">
                    <input 
                      v-model="formData.password_confirmation"
                      :type="showPassword ? 'text' : 'password'"
                      class="w-full px-4 py-2.5 border-2 rounded-lg focus:ring-2 focus:ring-green-200 transition-all outline-none pr-10"
                      :class="errors.password_confirmation ? 'border-red-500' : 'border-gray-200 focus:border-green-500'"
                      placeholder="••••••••"
                      @input="validateField('password_confirmation')"
                      @keyup.enter="handleSubmit">
                    <svg v-if="!errors.password_confirmation && formData.password_confirmation && formData.password === formData.password_confirmation" 
                         class="absolute right-10 top-1/2 -translate-y-1/2 w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <button 
                      type="button"
                      @click="showPassword = !showPassword"
                      class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 z-10 flex-shrink-0">
                      <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                      </svg>
                      <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                      </svg>
                    </button>
                  </div>
                  <p v-if="errors.password_confirmation" class="text-red-500 text-xs mt-1 font-medium break-words">{{ errors.password_confirmation }}</p>
                </div>

                <button 
                  @click="handleSubmit"
                  :disabled="!isRegisterFormValid || isLoading"
                  class="w-full py-3 rounded-lg font-bold transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                  :class="isRegisterFormValid && !isLoading ? 'bg-green-600 text-white hover:bg-green-700 hover:scale-[1.02] hover:shadow-xl' : 'bg-gray-300 text-gray-500'">
                  <span v-if="isLoading" class="flex items-center justify-center gap-2">
                    <svg class="animate-spin h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                  </span>
                  <span v-else>REGISTER NOW</span>
                </button>

                <p class="text-center text-sm text-gray-600">
                  Already have an account? 
                  <button @click="handleToggle" class="text-green-600 hover:text-green-700 font-semibold">Login</button>
                </p>
              </div>
            </div>
          </transition>
        </div>

        <div 
          ref="infoPanel"
          class="info-panel hidden md:flex bg-gradient-to-br from-green-500 to-green-700 p-12 flex-col justify-center items-center text-white overflow-hidden z-10">
          
          <div class="absolute inset-0 bg-cover bg-center bg-no-repeat pointer-events-none" 
               style="background-image: url('/images/login.jpg');">
          </div>
          
          <div class="absolute inset-0 bg-gradient-to-br from-green-600/90 to-green-800/90 pointer-events-none"></div>
          
          <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div 
              class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full transition-all duration-1000 ease-out"
              :style="{
                transform: isRegister ? 'translate(25%, -25%) scale(1.2) rotate(180deg)' : 'translate(50%, -50%) scale(1) rotate(0deg)'
              }"></div>
            <div 
              class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full transition-all duration-1000 ease-out"
              :style="{
                transform: isRegister ? 'translate(-30%, 30%) scale(1.3) rotate(-180deg)' : 'translate(-50%, 50%) scale(1) rotate(0deg)'
              }"></div>
          </div>

          <div ref="infoContent" class="relative z-10 text-center">
            <h2 class="text-4xl font-bold mb-4">{{ isRegister ? 'Join Us!' : 'RW 12' }}</h2>
            <div class="w-20 h-1 bg-white mx-auto mb-6"></div>
            <h3 class="text-3xl font-bold mb-4">{{ isRegister ? 'Selamat Datang!' : 'Hello, Warga!' }}</h3>
            <p class="text-green-50 mb-8 max-w-sm">
              {{ isRegister 
                ? 'Daftarkan diri Anda untuk bergabung dengan sistem informasi warga RW 12, DesaPoint' 
                : 'Akses dashboard untuk mengelola data warga, keuangan, program, dan pengaduan DesaPoint' }}
            </p>
          </div>
        </div>

      </div>
    </div>

    <button 
      @click="$router.push('/')"
      class="fixed z-50 transition-all hover:scale-110 group"
      :class="isMobile 
        ? 'top-4 right-4 w-12 h-12 bg-green-600 hover:bg-green-700 rounded-full shadow-2xl flex items-center justify-center text-white' 
        : 'top-6 left-6 w-12 h-12 bg-white/20 backdrop-blur-sm hover:bg-white/30 rounded-full items-center justify-center text-white shadow-lg hover:shadow-xl hidden md:flex'">
      
      <svg v-if="isMobile" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
      
      <svg v-else class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
      </svg>
      
      <span v-if="isMobile" class="absolute left-16 bg-gray-900 text-white text-xs px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Tutup</span>
    </button>

  </div>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { authService } from '@/services/api'
import gsap from 'gsap'

const isRegister = ref(false)
const showPassword = ref(false)
const isLoading = ref(false)
const checkingName = ref(false)
const nameAvailable = ref(true)
const router = useRouter()
const route = useRoute()
const isMobile = ref(false)

const formPanel = ref(null)
const infoPanel = ref(null)
const infoContent = ref(null)

const toast = ref({ show: false, message: '', type: '' })

const formData = ref({
  email: '',
  password: '',
  password_confirmation: '',
  name: '',
  username: '',
  phone: '',
  remember: false
})

const errors = ref({
  name: '',
  username: '',
  password: '',
  password_confirmation: ''
})

let nameCheckTimeout = null

const showToast = (message, type ='success') => {
  toast.value = { show: true, message, type }
  setTimeout(() => {
    toast.value.show = false
  }, 3000)
}

const checkNameAvailability = async (name) => {
  if (!name || name.length < 3) {
    nameAvailable.value = true
    return
  }
  
  checkingName.value = true
  try {
    const response = await authService.checkName(name)
    nameAvailable.value = response.available
    
    if (!response.available) {
      errors.value.name = 'Nama sudah terdaftar, silakan gunakan nama lain'
    }
  } catch (error) {
    console.error('Error checking name:', error)
  } finally {
    checkingName.value = false
  }
}

const handleNameInput = () => {
  if (nameCheckTimeout) {
    clearTimeout(nameCheckTimeout)
  }
  
  validateField('name')
  
  if (!errors.value.name && formData.value.name.length >= 3) {
    nameCheckTimeout = setTimeout(() => {
      checkNameAvailability(formData.value.name)
    }, 500)
  } else {
    nameAvailable.value = true
  }
}

const validateField = (field) => {
  errors.value[field] = ''
  
  switch(field) {
    case 'name':
      if (!formData.value.name) {
        errors.value.name = 'Nama harus diisi'
        nameAvailable.value = true
      } else if (formData.value.name.length < 3) {
        errors.value.name = 'Nama minimal 3 karakter'
        nameAvailable.value = true
      } else if (!/^[a-zA-Z\s]+$/.test(formData.value.name)) {
        errors.value.name = 'Nama hanya boleh berisi huruf'
        nameAvailable.value = true
      }
      break
      
    case 'username':
      if (!formData.value.username) {
        errors.value.username = 'Username harus diisi'
      } else if (formData.value.username.length < 4) {
        errors.value.username = 'Username minimal 4 karakter'
      } else if (/\s/.test(formData.value.username)) {
        errors.value.username = 'Username tidak boleh mengandung spasi'
      } else if (!/^[a-zA-Z0-9_]+$/.test(formData.value.username)) {
        errors.value.username = 'Username hanya boleh huruf, angka, dan underscore'
      }
      break
      
    case 'password':
      if (!formData.value.password) {
        errors.value.password = 'Password harus diisi'
      } else if (formData.value.password.length < 6) {
        errors.value.password = 'Password minimal 6 karakter'
      } else if (!/(?=.*[a-zA-Z])(?=.*[0-9])/.test(formData.value.password)) {
        errors.value.password = 'Password harus kombinasi huruf dan angka'
      }
      
      if (formData.value.password_confirmation) {
        validateField('password_confirmation')
      }
      break
      
    case 'password_confirmation':
      if (!formData.value.password_confirmation) {
        errors.value.password_confirmation = 'Konfirmasi password harus diisi'
      } else if (formData.value.password !== formData.value.password_confirmation) {
        errors.value.password_confirmation = 'Password tidak sama'
      }
      break
  }
}

const isLoginFormValid = computed(() => {
  return formData.value.username && 
         formData.value.password && 
         !errors.value.username && 
         !errors.value.password
})

const isRegisterFormValid = computed(() => {
  return formData.value.name && 
         formData.value.username && 
         formData.value.password && 
         formData.value.password_confirmation &&
         !errors.value.name &&
         !errors.value.username && 
         !errors.value.password && 
         !errors.value.password_confirmation &&
         nameAvailable.value &&
         !checkingName.value
})

const checkMobile = () => {
  isMobile.value = window.innerWidth < 768
}

const animateTransition = () => {
  if (!isMobile.value) {
    const timeline = gsap.timeline()
    
    if (isRegister.value) {
      timeline
        .to(infoPanel.value, {
          x: '-100%',
          scale: 1.15,
          duration: 0.5,
          ease: 'power2.inOut'
        }, 0.1)
        .to(formPanel.value, {
          x: '100%',
          scale: 1.05,
          duration: 0.5,
          ease: 'power2.inOut'
        }, 0.1)
        .to(infoPanel.value, {
          scale: 1,
          duration: 0.3,
          ease: 'power2.out'
        })
        .to(formPanel.value, {
          scale: 1,
          duration: 0.3,
          ease: 'power2.out'
        }, '-=0.3')
        .from(infoContent.value, {
          y: 20,
          opacity: 0,
          duration: 0.4,
          ease: 'back.out(1.7)'
        }, '-=0.2')
    } else {
      timeline
        .to(infoPanel.value, {
          x: '0%',
          scale: 1.15,
          duration: 0.5,
          ease: 'power2.inOut'
        }, 0.1)
        .to(formPanel.value, {
          x: '0%',
          scale: 1.05,
          duration: 0.5,
          ease: 'power2.inOut'
        }, 0.1)
        .to(infoPanel.value, {
          scale: 1,
          duration: 0.3,
          ease: 'power2.out'
        })
        .to(formPanel.value, {
          scale: 1,
          duration: 0.3,
          ease: 'power2.out'
        }, '-=0.3')
        .from(infoContent.value, {
          y: 20,
          opacity: 0,
          duration: 0.4,
          ease: 'back.out(1.7)'
        }, '-=0.2')
    }
  }
}

const handleToggle = () => {
  if (nameCheckTimeout) {
    clearTimeout(nameCheckTimeout)
  }
  
  formData.value = {
    email: '',
    password: '',
    password_confirmation: '',
    name: '',
    username: '',
    phone: '',
    remember: false
  }
  errors.value = {
    name: '',
    username: '',
    password: '',
    password_confirmation: ''
  }
  nameAvailable.value = true
  checkingName.value = false
  
  isRegister.value = !isRegister.value
  nextTick(() => {
    if (!isMobile.value) {
      animateTransition()
    }
  })
}

const handleSubmit = async () => {
  if (isRegister.value) {
    validateField('name')
    validateField('username')
    validateField('password')
    validateField('password_confirmation')
    
    if (!nameAvailable.value) {
      showToast('Nama sudah terdaftar, silakan gunakan nama lain', 'error')
      return
    }
    
    if (checkingName.value) {
      showToast('Mohon tunggu pengecekan nama selesai', 'error')
      return
    }
    
    if (!isRegisterFormValid.value) {
      showToast('Mohon lengkapi form dengan benar', 'error')
      return
    }
  } else {
    validateField('username')
    validateField('password')
    
    if (!isLoginFormValid.value) {
      showToast('Mohon isi username dan password dengan benar', 'error')
      return
    }
  }
  
  isLoading.value = true
  
  try {
    if (isRegister.value) {
      await authService.register(formData.value)
      showToast('Registrasi berhasil! Silakan login')
      
      setTimeout(() => {
        handleToggle()
      }, 1500)
      
    } else {
      console.log('Sending login request...')
      const response = await authService.login({
      username: formData.value.username,
      password: formData.value.password
    })

    localStorage.setItem('token', response.token)
    localStorage.setItem('user', JSON.stringify({
      name: response.user.name,
      username: response.user.username,
      role: response.role
    }))

    showToast('Login berhasil!')
    await new Promise(resolve => setTimeout(resolve, 500))

    const redirectPath = route.query.redirect || (response.role === 'admin' ? '/homeadmin' : '/')
    router.push(redirectPath)
    }
  } catch (error) {
    console.error('Error:', error)
    console.error('Error response:', error.response)
    console.error('Error data:', error.response?.data)
    
    const errorMessage = error.response?.data?.message || 
                        error.response?.data?.error ||
                        (isRegister.value ? 'Registrasi gagal' : 'Login gagal')
    showToast(errorMessage, 'error')
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  checkMobile()
  window.addEventListener('resize', checkMobile)
  
  if (!isMobile.value) {
    gsap.set(formPanel.value, { x: '0%' })
    gsap.set(infoPanel.value, { x: '0%' })
  }
})
</script>

<style scoped>
* {
  box-sizing: border-box;
}

body {
  overflow-x: hidden;
  width: 100%;
  position: relative;
}

@media (min-width: 768px) {
  .form-panel {
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    max-height: 600px;
  }
  
  .info-panel {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
  }
  
  .form-panel,
  .info-panel {
    transition: none !important;
  }
}

@media (max-width: 767px) {
  .form-panel {
    position: relative;
    width: 100%;
    max-width: 100vw;
    height: auto;
    min-height: 100vh;
  }
  
  .mobile-fade-enter-active,
  .mobile-fade-leave-active {
    transition: opacity 0.3s ease;
  }
  
  .mobile-fade-enter-from,
  .mobile-fade-leave-to {
    opacity: 0;
  }
  
  .login-content,
  .register-content {
    position: relative;
    width: 100%;
  }
}

html, body {
  overflow-x: hidden;
  max-width: 100vw;
}

.min-h-screen {
  overflow-x: hidden;
  max-width: 100vw;
}

.overflow-y-auto {
  -webkit-overflow-scrolling: touch;
  scroll-behavior: smooth;
}

input, p, label {
  word-wrap: break-word;
  overflow-wrap: break-word;
}

.break-words {
  word-break: break-word;
  overflow-wrap: break-word;
}

.flex-shrink-0 {
  flex-shrink: 0;
}

.pointer-events-none {
  pointer-events: none;
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