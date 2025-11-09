<template>
  <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 py-12 px-4">
    <div class="max-w-6xl mx-auto">
      <div class="mb-10 animate-fade-in-down">
        <div class="flex items-center justify-center gap-4">
          <div class="flex items-center">
            <div 
              :class="[
                'w-14 h-14 rounded-2xl flex items-center justify-center font-bold text-lg shadow-xl transition-all duration-500',
                currentStep === 1 ? 'bg-gradient-to-br from-green-600 to-green-700 text-white animate-bounce-in' : 'bg-green-500 text-white scale-90'
              ]">
              <span class="transition-all duration-300">{{ currentStep > 1 ? '✓' : '1' }}</span>
            </div>
            <span 
              :class="[
                'ml-3 font-bold text-base transition-all duration-300',
                currentStep === 1 ? 'text-green-700' : 'text-green-600'
              ]">
              Data Diri
            </span>
          </div>
          
          <div class="relative w-28 h-1 bg-gray-200 rounded-full overflow-hidden">
            <div 
              :class="[
                'absolute inset-0 bg-gradient-to-r from-green-500 to-green-600 rounded-full transition-all duration-700 ease-out',
                currentStep === 2 ? 'translate-x-0' : '-translate-x-full'
              ]"></div>
          </div>
          
          <div class="flex items-center">
            <div 
              :class="[
                'w-14 h-14 rounded-2xl flex items-center justify-center font-bold text-lg transition-all duration-500',
                currentStep === 2 ? 'bg-gradient-to-br from-green-600 to-green-700 text-white shadow-xl animate-bounce-in' : 'bg-gray-200 text-gray-400 scale-90'
              ]">
              2
            </div>
            <span 
              :class="[
                'ml-3 font-bold text-base transition-all duration-300',
                currentStep === 2 ? 'text-green-700' : 'text-gray-400'
              ]">
              Detail Permasalahan
            </span>
          </div>
        </div>
      </div>

      <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-green-100">
        <div class="bg-gradient-to-r from-green-600 via-green-600 to-emerald-600 px-8 py-8 animate-slide-down-fade relative overflow-hidden">
          <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE0YzMuMzEzIDAgNiAyLjY4NyA2IDZzLTIuNjg3IDYtNiA2LTYtMi42ODctNi02IDIuNjg3LTYgNi02ek0yMCAzNGMzLjMxMyAwIDYgMi42ODcgNiA2cy0yLjY4NyA2LTYgNi02LTIuNjg3LTYtNiAyLjY4Ny02IDYtNnoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-20"></div>
          <div class="relative">
            <h1 class="text-4xl font-bold text-white mb-2">Form Pengaduan Warga</h1>
            <p class="text-green-50 text-lg">
              {{ currentStep === 1 ? 'Lengkapi data diri Anda' : 'Ceritakan permasalahan yang dihadapi' }}
            </p>
          </div>
        </div>

        <transition name="slide-fade">
          <div v-if="currentStep === 1" class="grid grid-cols-1 lg:grid-cols-2 min-h-[600px]">
            <div class="p-10 space-y-6">
              <div class="animate-slide-up animation-delay-100">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="formData.nama"
                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none text-gray-700 font-medium placeholder:text-gray-400"
                  placeholder="Masukkan nama lengkap"
                />
              </div>

              <div class="animate-slide-up animation-delay-200">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  RT/RW <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="formData.rt"
                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none text-gray-700 font-medium placeholder:text-gray-400"
                  placeholder="Contoh: 001/002"
                />
              </div>

              <div class="animate-slide-up animation-delay-300">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  Email <span class="text-red-500">*</span>
                </label>
                <input
                  type="tel"
                  v-model="formData.noHp"
                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none text-gray-700 font-medium placeholder:text-gray-400"
                  placeholder="*****@gmail.com"
                />
              </div>

              <div class="animate-slide-up animation-delay-400">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  No. Rumah <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="formData.noRumah"
                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none text-gray-700 font-medium placeholder:text-gray-400"
                  placeholder="Nomor rumah"
                />
              </div>

              <button
                @click="nextStep"
                class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-5 rounded-2xl font-bold text-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl hover:shadow-2xl flex items-center justify-center gap-3 animate-slide-up animation-delay-500">
                Lanjut ke Step 2
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
              </button>
            </div>

            <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 p-10 flex items-center justify-center animate-fade-in-right animation-delay-200">
              <div class="text-center">
                <div class="relative inline-block">
                  <div class="absolute inset-0 bg-green-400 blur-3xl opacity-20 animate-pulse-slow"></div>
                  <svg class="w-72 h-72 mx-auto text-green-600 opacity-90 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                  </svg>
                </div>
                <p class="mt-8 text-green-800 font-bold text-xl">Warga Desa Berkumpul</p>
                <p class="mt-3 text-green-600 text-base">Bersama membangun desa yang lebih baik</p>
              </div>
            </div>
          </div>
        </transition>

        <transition name="slide-fade">
          <div v-if="currentStep === 2" class="grid grid-cols-1 lg:grid-cols-2 min-h-[600px]">
            <div class="p-10 space-y-6">
              <div class="animate-slide-up animation-delay-100">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  Nama Permasalahan <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  v-model="formData.namaPermasalahan"
                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none text-gray-700 font-medium placeholder:text-gray-400"
                  placeholder="Contoh: Jalan Rusak di RT 01"
                />
              </div>

              <div class="animate-slide-up animation-delay-200">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  Kategori Masalah <span class="text-red-500">*</span>
                </label>
                <div class="grid grid-cols-2 gap-3">
                  <label 
                    v-for="kategori in kategoriMasalah" 
                    :key="kategori"
                    :class="[
                      'flex items-center p-4 border-2 rounded-2xl cursor-pointer transition-all',
                      formData.kategori === kategori 
                        ? 'bg-green-50 border-green-500 shadow-md' 
                        : 'border-gray-200 hover:border-green-300 hover:bg-green-50/50'
                    ]">
                    <input
                      type="radio"
                      v-model="formData.kategori"
                      :value="kategori"
                      class="w-5 h-5 text-green-600 focus:ring-2 focus:ring-green-500"
                    />
                    <span class="ml-3 text-sm text-gray-700 font-semibold">
                      {{ kategori }}
                    </span>
                  </label>
                </div>
              </div>

              <div class="animate-slide-up animation-delay-300">
                <label class="block text-sm font-bold text-gray-800 mb-3">
                  Detail Permasalahan <span class="text-red-500">*</span>
                </label>
                <textarea
                  v-model="formData.detailPermasalahan"
                  rows="5"
                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none resize-none text-gray-700 font-medium placeholder:text-gray-400"
                  placeholder="Jelaskan permasalahan secara detail..."
                ></textarea>
              </div>

              <div class="flex gap-4 animate-slide-up animation-delay-400">
                <button
                  @click="prevStep"
                  class="flex-1 bg-gray-100 text-gray-700 py-5 rounded-2xl font-bold text-lg hover:bg-gray-200 active:scale-[0.98] transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                  </svg>
                  Kembali
                </button>
                <button
                  @click="handleSubmit"
                  class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 text-white py-5 rounded-2xl font-bold text-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl hover:shadow-2xl flex items-center justify-center gap-2">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                  </svg>
                  Kirim
                </button>
              </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 p-10 animate-fade-in-right animation-delay-200">
              <label class="block text-sm font-bold text-gray-800 mb-4">
                Upload Foto Bukti <span class="text-red-500">*</span>
              </label>
              
              <div 
                v-if="uploadedImages.length < maxImages"
                @click="triggerFileInput"
                class="border-3 border-dashed border-gray-300 rounded-2xl p-10 text-center hover:border-green-500 hover:bg-green-50/50 transition-all cursor-pointer mb-4 group">
                <input
                  type="file"
                  accept="image/*"
                  @change="handleFileChange"
                  class="hidden"
                  ref="fileInput"
                />
                <svg class="w-20 h-20 mx-auto text-gray-400 group-hover:text-green-500 transition-all mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-700 font-bold text-lg">Klik untuk upload foto</p>
                <p class="text-sm text-gray-500 mt-2">PNG, JPG (Max 5MB)</p>
                <p class="text-xs text-gray-400 mt-1">Maksimal {{ maxImages }} foto</p>
              </div>

              <div class="space-y-4">
                <div 
                  v-for="(image, index) in uploadedImages" 
                  :key="index"
                  class="relative rounded-2xl overflow-hidden shadow-xl animate-scale-in-bounce group">
                  <img 
                    :src="image.url" 
                    :alt="image.name"
                    class="w-full h-56 object-cover"
                  />
                  <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                  <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all flex items-center justify-center">
                    <button
                      @click="removeImage(index)"
                      class="opacity-0 group-hover:opacity-100 transform scale-0 group-hover:scale-100 transition-all bg-red-500 text-white p-3 rounded-full hover:bg-red-600 shadow-lg">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                      </svg>
                    </button>
                  </div>
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <p class="text-white text-sm font-bold truncate">{{ image.name }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>
    </div>
   <a 
    href="#"
    class="fixed top-6 left-6 w-12 h-12 bg-green-700/60 backdrop-blur-sm hover:bg-green-700 rounded-full flex items-center justify-center text-green-100 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl group z-50">
    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
  </a>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import api from '../services/api'

const handleSubmit = async () => {
  if (!formData.value.namaPermasalahan || !formData.value.kategori || 
      !formData.value.detailPermasalahan || uploadedImages.value.length === 0) {
    alert('Mohon lengkapi semua field dan upload minimal 1 foto!')
    return
  }
  
  const formDataToSend = new FormData()
  formDataToSend.append('nama_pengirim', formData.value.nama)
  formDataToSend.append('rt', formData.value.rt)
  formDataToSend.append('nomor_rumah', formData.value.noRumah)
  formDataToSend.append('no_hp', formData.value.noHp)
  formDataToSend.append('judul_permasalahan', formData.value.namaPermasalahan)
  formDataToSend.append('kategori', formData.value.kategori)
  formDataToSend.append('detail_permasalahan', formData.value.detailPermasalahan)
  
  for (let i = 0; i < uploadedImages.value.length; i++) {
    const response = await fetch(uploadedImages.value[i].url)
    const blob = await response.blob()
    formDataToSend.append(`foto_${i + 1}`, blob, uploadedImages.value[i].name)
  }
  
  try {
    await api.post('/pengaduan', formDataToSend, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })
    alert('Pengaduan berhasil dikirim!')
    currentStep.value = 1
    formData.value = { nama: '', rt: '', noHp: '', noRumah: '', namaPermasalahan: '', kategori: '', detailPermasalahan: '' }
    uploadedImages.value = []
  } catch (error) {
    console.error('Error detail:', error.response?.data)
    alert('Gagal mengirim pengaduan: ' + (error.response?.data?.message || error.message))
  }
}

const currentStep = ref(1)
const maxImages = 2

const formData = ref({
  nama: '',
  rt: '',
  noHp: '',
  noRumah: '',
  namaPermasalahan: '',
  kategori: '',
  detailPermasalahan: ''
})

const kategoriMasalah = ['Infrastruktur', 'Kebersihan', 'Keamanan', 'Pelayanan', 'Lainnya']
const uploadedImages = ref([])
const fileInput = ref(null)

const nextStep = () => {
  if (!formData.value.nama || !formData.value.rt || !formData.value.noHp || !formData.value.noRumah) {
    alert('Mohon lengkapi semua field yang wajib diisi!')
    return
  }
  currentStep.value = 2
}

const prevStep = () => {
  currentStep.value = 1
}

const triggerFileInput = () => {
  fileInput.value.click()
}

const handleFileChange = (event) => {
  const file = event.target.files[0]
  if (!file) return
  
  if (uploadedImages.value.length >= maxImages) {
    alert(`Maksimal ${maxImages} foto`)
    return
  }
  
  if (file.size > 5 * 1024 * 1024) {
    alert(`File terlalu besar! Max 5MB`)
    return
  }
  
  const reader = new FileReader()
  reader.onload = (e) => {
    uploadedImages.value.push({
      name: file.name,
      url: e.target.result
    })
  }
  reader.readAsDataURL(file)
  
  event.target.value = ''
}

const removeImage = (index) => {
  uploadedImages.value.splice(index, 1)
}
</script>

<style scoped>
@keyframes bounceIn {
  0% {
    opacity: 0;
    transform: scale(0.3);
  }
  50% {
    opacity: 1;
    transform: scale(1.1);
  }
  70% {
    transform: scale(0.9);
  }
  100% {
    transform: scale(1);
  }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideDownFade {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes scaleInBounce {
  0% {
    opacity: 0;
    transform: scale(0.8);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes pulseSlow {
  0%, 100% {
    opacity: 0.2;
  }
  50% {
    opacity: 0.4;
  }
}

.animate-bounce-in {
  animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.animate-slide-up {
  animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.animate-fade-in-right {
  animation: fadeInRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.animate-fade-in-down {
  animation: fadeInDown 0.6s ease-out both;
}

.animate-slide-down-fade {
  animation: slideDownFade 0.7s ease-out both;
}

.animate-scale-in-bounce {
  animation: scaleInBounce 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.animate-pulse-slow {
  animation: pulseSlow 3s ease-in-out infinite;
}

.animation-delay-100 { animation-delay: 0.1s; }
.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-300 { animation-delay: 0.3s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-500 { animation-delay: 0.5s; }

.slide-fade-enter-active {
  transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}

.slide-fade-leave-active {
  transition: all 0.4s cubic-bezier(0.6, -0.28, 0.735, 0.045);
}

.slide-fade-enter-from {
  transform: translateX(30px);
  opacity: 0;
}

.slide-fade-leave-to {
  transform: translateX(-30px);
  opacity: 0;
}
</style>