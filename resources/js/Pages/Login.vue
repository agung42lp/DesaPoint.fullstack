<template>
  <div class="min-h-screen bg-gradient-to-br from-green-400 via-green-500 to-green-600 flex items-center justify-center p-4 relative overflow-hidden">
    
    <div 
      class="absolute w-64 h-64 bg-white/10 rounded-full blur-3xl transition-all duration-1000 ease-out"
      :style="{
        top: isRegister ? '10%' : '20%',
        left: isRegister ? '5%' : '15%',
        transform: isRegister ? 'scale(1.2) rotate(45deg)' : 'scale(1) rotate(0deg)',
        opacity: isRegister ? 0.8 : 1
      }"></div>
    <div 
      class="absolute w-80 h-80 bg-white/10 rounded-full blur-3xl transition-all duration-1000 ease-out"
      :style="{
        bottom: isRegister ? '5%' : '15%',
        right: isRegister ? '10%' : '15%',
        transform: isRegister ? 'scale(0.9) rotate(-30deg)' : 'scale(1) rotate(0deg)',
        opacity: isRegister ? 1 : 0.8
      }"></div>
    <div 
      class="absolute w-72 h-72 bg-white/10 rounded-full blur-3xl transition-all duration-1000 ease-out"
      :style="{
        top: isRegister ? '60%' : '50%',
        left: isRegister ? '80%' : '50%',
        transform: `translate(-50%, -50%) scale(${isRegister ? 1.3 : 1}) rotate(${isRegister ? 90 : 0}deg)`,
        opacity: isRegister ? 0.9 : 1
      }"></div>

    <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden">
      <div class="grid grid-cols-1 md:grid-cols-2 relative min-h-[600px]">
        
        <div 
          class="absolute inset-0 md:w-1/2 p-12 bg-white transition-all duration-700 ease-out overflow-y-auto"
          :style="{
            transform: isRegister ? 'translateX(100%)' : 'translateX(0)',
            opacity: 1,
            zIndex: isRegister ? 1 : 2
          }">
          
          <div class="flex items-center space-x-3 mb-8">
            <div class="h-10 w-10 md:h-12 md:w-12 rounded-lg flex items-center justify-center overflow-hidden">
              <img :src="`/images/logo.jpg`" alt="Logo" class="h-full w-full object-cover" />
            </div>
            <div>
              <h1 class="text-2xl font-bold text-green-700">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>

          <div v-show="!isRegister" :key="'login'">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign In</h2>
            <p class="text-gray-600 mb-8">Masuk ke dashboard RW 12</p>

            <div class="space-y-6">
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                <input 
                  v-model="formData.username"
                  type="text" 
                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                  placeholder="Username Anda"
                  @keyup.enter="handleSubmit">
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <div class="relative">
                  <input 
                    v-model="formData.password"
                    :type="showPassword ? 'text' : 'password'"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                    placeholder="••••••••"
                    @keyup.enter="handleSubmit">
                  <button 
                    type="button"
                    @click="showPassword = !showPassword"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                    <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                  </button>
                </div>
              </div>

              <button 
                @click="handleSubmit"
                class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl">
                LOGIN NOW
              </button>

              <p class="text-center text-sm text-gray-600">
                Don't have an account? 
                <button @click="handleToggle" class="text-green-600 hover:text-green-700 font-semibold">Register</button>
              </p>
            </div>
          </div>

          <div v-show="isRegister" :key="'register'">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign Up</h2>
            <p class="text-gray-600 mb-6">Daftar sebagai warga RW 12</p>

            <div class="space-y-4">
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                <input 
                  v-model="formData.name"
                  type="text" 
                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                  placeholder="Nama Lengkap Anda">
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                <input 
                  v-model="formData.username"
                  type="text" 
                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                  placeholder="Username Anda">
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input 
                  v-model="formData.password"
                  :type="showPassword ? 'text' : 'password'"
                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                  placeholder="••••••••">
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2"> Konfirmasi Password</label>
                <div class="relative">
                  <input 
                    v-model="formData.password_confirmation"
                    :type="showPassword ? 'text' : 'password'"
                    class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                    placeholder="••••••••"
                    @keyup.enter="handleSubmit">
                  <button 
                    type="button"
                    @click="showPassword = !showPassword"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                    <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                  </button>
                </div>
              </div>

              <button 
                @click="handleSubmit"
                class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl">
                REGISTER NOW
              </button>

              <p class="text-center text-sm text-gray-600">
                Already have an account? 
                <button @click="handleToggle" class="text-green-600 hover:text-green-700 font-semibold">Login</button>
              </p>
            </div>
          </div>
        </div>

        <div 
          class="absolute inset-0 md:w-1/2 bg-gradient-to-br from-green-500 to-green-700 p-12 flex flex-col justify-center items-center text-white overflow-hidden transition-all duration-700 ease-out"
          :style="{
            transform: isRegister ? 'translateX(0)' : 'translateX(100%)',
            opacity: 1,
            zIndex: isRegister ? 2 : 1
          }">
          
          <div class="absolute inset-0 opacity-10">
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

          <div 
            class="relative z-10 text-center transition-all duration-500 ease-out"
            :style="{
              transform: 'translateY(0) scale(1)',
              opacity: 1
            }">
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

    <a 
      href="#"
      class="fixed top-6 left-6 w-12 h-12 bg-white/20 backdrop-blur-sm hover:bg-white/30 rounded-full flex items-center justify-center text-white transition-all duration-300 shadow-lg hover:shadow-xl group z-50">
      <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
      </svg>
    </a>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { authService } from '@/services/api'

const isRegister = ref(false)
const showPassword = ref(false)
const router = useRouter()

const formData = ref({
  email: '',
  password: '',
  name: '',
  phone: '',
  remember: false
})

const handleToggle = () => {
  isRegister.value = !isRegister.value
}

const handleSubmit = async () => {
  try {
    if (isRegister.value) {
      if (!formData.value.name || !formData.value.username || 
          !formData.value.password || !formData.value.password_confirmation) {
        alert('Mohon isi semua field')
        return
      }
      
      await authService.register(formData.value)
      alert('Registrasi berhasil!')
      handleToggle()
      
    } else {
      if (!formData.value.username || !formData.value.password) {
        alert('Mohon isi username dan password')
        return
      }
      
      console.log('Sending login request...')
        const response = await authService.login({
          username: formData.value.username,
          password: formData.value.password
        })

        await new Promise(resolve => setTimeout(resolve, 100))

        if (response.role === 'admin') {
          router.push('/homeadmin')
        } else {
          router.push('/')
        }
      }
    } catch (error) {
      console.error('Full error:', error)
      console.error('Error response:', error.response)
      console.error('Error data:', error.response?.data)
      alert(error.response?.data?.message || 'Terjadi kesalahan')
    }
  }
</script>