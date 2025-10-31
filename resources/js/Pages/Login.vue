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
            <div class="h-12 w-12 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold">
              RW
            </div>
            <div>
              <h1 class="text-2xl font-bold text-green-700">DesaPoint</h1>
              <p class="text-xs text-gray-600">RW Sejahtera</p>
            </div>
          </div>

          <div v-show="!isRegister" :key="'login'">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign In</h2>
            <p class="text-gray-600 mb-8">Masuk ke dashboard RW 05</p>

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

              <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2 cursor-pointer">
                  <input 
                    v-model="formData.remember"
                    type="checkbox" 
                    class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                  <span class="text-sm text-gray-700">Remember me</span>
                </label>
                <a href="#" class="text-sm text-green-600 hover:text-green-700 font-medium">Forgot Password?</a>
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
            <p class="text-gray-600 mb-6">Daftar sebagai warga RW 05</p>

            <div class="space-y-4">
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                <input 
                  v-model="formData.name"
                  type="text" 
                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all outline-none"
                  placeholder="Nama Anda">
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
              transform: isRegister ? 'translateY(0) scale(1)' : 'translateY(20px) scale(0.95)',
              opacity: isRegister ? 1 : 0
            }">
            <h2 class="text-4xl font-bold mb-4">{{ isRegister ? 'Join Us!' : 'RW 05.' }}</h2>
            <div class="w-20 h-1 bg-white mx-auto mb-6"></div>
            <h3 class="text-3xl font-bold mb-4">{{ isRegister ? 'Selamat Datang!' : 'Hello, Warga!' }}</h3>
            <p class="text-green-50 mb-8 max-w-sm">
              {{ isRegister 
                ? 'Daftarkan diri Anda untuk bergabung dengan sistem informasi warga RW 05 Si Doi' 
                : 'Akses dashboard untuk mengelola data warga, keuangan, program, dan pengaduan RW 05 Si Doi' }}
            </p>

            <div class="flex justify-center space-x-4">
              <a href="#" class="w-10 h-10 border-2 border-white rounded-lg flex items-center justify-center hover:bg-white hover:text-green-600 transition-all duration-300 transform hover:scale-110">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                </svg>
              </a>
              <a href="#" class="w-10 h-10 border-2 border-white rounded-lg flex items-center justify-center hover:bg-white hover:text-green-600 transition-all duration-300 transform hover:scale-110">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </a>
            </div>
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

const isRegister = ref(false)
const showPassword = ref(false)

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

const handleSubmit = () => {
  if (isRegister.value) {
    if (!formData.value.name || !formData.value.email || !formData.value.password || !formData.value.phone) {
      alert('Mohon isi semua field')
      return
    }
    console.log('Register attempt:', formData.value)
    alert('Register functionality - connect to backend')
  } else {
    if (!formData.value.email || !formData.value.password) {
      alert('Mohon isi email dan password')
      return
    }
    console.log('Login attempt:', formData.value)
    alert('Login functionality - connect to backend')
  }
}
</script>