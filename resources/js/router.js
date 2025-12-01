import { createRouter, createWebHashHistory } from 'vue-router'
import Home from './Pages/Home.vue'
import Form from './Pages/Form.vue'
import Login from './Pages/Login.vue'
import Homeadmin from './Pages/Homeadmin.vue'
import Keuangan from './Pages/Keuangan.vue'
import Pengaduan from './Pages/Pengaduan.vue'
import Program from './Pages/Program.vue'
import Profile from './Pages/Profile.vue'
import Profileadmin from './Pages/Profileadmin.vue'
import Manajemenakun from './Pages/ManajemenAkun.vue'

const router = createRouter({
  history: createWebHashHistory('/desapoint/'),
  routes: [
    { 
      path: '/', 
      name: 'Home', 
      component: Home,
      meta: { title: 'Beranda - DesaPoint' }
    },
    { 
      path: '/homeadmin', 
      name: 'Homeadmin', 
      component: Homeadmin, 
      meta: { requiresAuth: true, role: 'admin', title: 'Dashboard Admin' }
    },
    { 
      path: '/form', 
      name: 'Form', 
      component: Form,
      meta: { title: 'Form Pengaduan' }
    },
    { 
      path: '/login', 
      name: 'Login', 
      component: Login,
      meta: { guest: true, title: 'Login' }
    },
    { 
      path: '/keuangan', 
      name: 'Keuangan', 
      component: Keuangan, 
      meta: { requiresAuth: true, role: 'admin', title: 'Keuangan' } 
    },
    { 
      path: '/pengaduan', 
      name: 'Pengaduan', 
      component: Pengaduan, 
      meta: { requiresAuth: true, role: 'admin', title: 'Pengaduan' } 
    },
    { 
      path: '/program', 
      name: 'Program', 
      component: Program, 
      meta: { requiresAuth: true, role: 'admin', title: 'Program' } 
    },
    { 
      path: '/profile', 
      name: 'Profile', 
      component: Profile, 
      meta: { requiresAuth: true, title: 'Profile' }
    },
    { 
      path: '/profileadmin', 
      name: 'Profileadmin', 
      component: Profileadmin, 
      meta: { requiresAuth: true, role: 'admin', title: 'Profile Admin' } 
    },
    {
      path: '/manajemen-akun',
      name: 'ManajemenAkun',
      component: Manajemenakun, 
      meta: { requiresAuth: true, role: 'admin', title: 'Manajemen Akun' }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: {
        template: `
          <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-400 via-green-500 to-green-600">
            <div class="text-center bg-white rounded-3xl shadow-2xl p-12 max-w-md mx-4">
              <div class="mb-6">
                <svg class="w-24 h-24 mx-auto text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
              <p class="text-xl text-gray-600 mb-2">Halaman Tidak Ditemukan</p>
              <p class="text-sm text-gray-500 mb-8">Maaf, halaman yang Anda cari tidak tersedia</p>
              <router-link 
                to="/" 
                class="inline-block px-8 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition-all hover:scale-105 shadow-lg">
                Kembali ke Beranda
              </router-link>
            </div>
          </div>
        `
      },
      meta: { title: '404 - Halaman Tidak Ditemukan' }
    }
  ]
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  let user = null
  
  
  try {
    const userStr = localStorage.getItem('user')
    user = userStr ? JSON.parse(userStr) : null
  } catch (e) {
    console.error('❌ Error parsing user:', e)
    localStorage.removeItem('user')
    localStorage.removeItem('token')
  }

  document.title = to.meta.title || 'DesaPoint'

  if (to.meta.requiresAuth && !token) {
    return next({ 
      path: '/login', 
      query: { redirect: to.fullPath }
    })
  }

  if (to.meta.role && (!user || to.meta.role !== user.role)) {
    console.warn('⚠️ Role mismatch or user null:', { requiredRole: to.meta.role, userRole: user?.role })
    return next('/')
  }

  if (to.meta.guest && token) {
    return next(user?.role === 'admin' ? '/homeadmin' : '/')
  }

  if (to.path === '/' && token && user?.role === 'admin') {
    return next('/homeadmin')
  }

  next()
})

router.afterEach(() => {
  window.dispatchEvent(new Event('route-changed'))
})

export default router