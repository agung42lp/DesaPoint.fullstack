<template>
  <div>
    <div v-if="showSplash" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-green-600 to-green-700">
      <div class="animate-fade-in">
        <div class="relative">
          <div class="w-32 h-32 bg-white rounded-2xl shadow-2xl flex items-center justify-center animate-bounce">
            <svg class="w-20 h-20 text-green-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
            </svg>
          </div>
          <div class="absolute inset-0 rounded-2xl bg-white opacity-20 animate-ping"></div>
        </div>
        
        <h1 class="mt-6 text-3xl font-bold text-white text-center animate-fade-in-up">
          DesaPoint
        </h1>
        
        <div class="flex justify-center gap-2 mt-4">
          <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 0ms"></div>
          <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 150ms"></div>
          <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 300ms"></div>
        </div>
      </div>
    </div>

    <router-view v-if="!showSplash" />
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      showSplash: true
    }
  },
  mounted() {
    setTimeout(() => {
      this.showSplash = false
    }, 2500)
  }
}
</script>

<style scoped>
@keyframes fade-in {
  from { opacity: 0; transform: scale(0.8); }
  to { opacity: 1; transform: scale(1); }
}

@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
  animation: fade-in 0.6s ease-out;
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out 0.3s both;
}
</style>