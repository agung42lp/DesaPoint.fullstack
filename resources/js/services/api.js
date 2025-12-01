import axios from 'axios'

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL || '/api'
const TOKEN_EXPIRY = 24 * 60 * 60 * 1000

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  timeout: 30000
})

const getToken = () => localStorage.getItem('token')
const getLoginTime = () => localStorage.getItem('loginTime')

const isTokenExpired = () => {
  const loginTime = getLoginTime()
  if (!loginTime) return false
  
  const now = Date.now()
  return (now - parseInt(loginTime)) > TOKEN_EXPIRY
}

const clearAuth = () => {
  localStorage.removeItem('token')
  localStorage.removeItem('user')
  localStorage.removeItem('loginTime')
}

api.interceptors.request.use(
  config => {
    const token = getToken()
    
    if (token) {
      if (isTokenExpired()) {
        clearAuth()
        window.location.href = '#/login'
        return Promise.reject({ message: 'Session expired', isExpired: true })
      }
      
      config.headers.Authorization = `Bearer ${token}`
    }
    
    return config
  },
  error => Promise.reject(error)
)

api.interceptors.response.use(
  response => response,
  error => {
    if (error.response?.status === 401) {
      clearAuth()
      window.location.href = '#/login'
    }
    
    if (error.isExpired) {
      return Promise.reject({ ...error, handled: true })
    }
    
    return Promise.reject(error)
  }
)

export const userManagementAPI = {
  getAllUsers: () => api.get('/users'),
  createUser: (data) => api.post('/users', data),
  updateUser: (id, data) => api.put(`/users/${id}`, data),
  deleteUser: (id) => api.delete(`/users/${id}`),
  
  getAllAdmins: () => api.get('/admins'),
  createAdmin: (data) => api.post('/admins', data),
  updateAdmin: (id, data) => api.put(`/admins/${id}`, data),
  deleteAdmin: (id) => api.delete(`/admins/${id}`)
}

export const kebersihanAPI = {
  getAll: () => api.get('/kebersihan'),
  create: (data) => api.post('/kebersihan', data, {
    headers: { 'Content-Type': 'multipart/form-data' }
  }),
  update: (id, data) => api.post(`/kebersihan/${id}?_method=PUT`, data, {
    headers: { 'Content-Type': 'multipart/form-data' }
  }),
  delete: (id) => api.delete(`/kebersihan/${id}`),
  exportPdf: () => api.get('/export/kebersihan-pdf', { responseType: 'blob' })
}

export const pengaduanAPI = {
  getAll: (params) => api.get('/pengaduan', { params }),
  create: (data) => api.post('/pengaduan', data),
  update: (id, data) => api.put(`/pengaduan/${id}`, data),
  delete: (id) => api.delete(`/pengaduan/${id}`),
  exportPdf: () => api.get('/export/pengaduan-pdf', { responseType: 'blob' })
}

export const laporanKeuanganAPI = {
  getAll: () => api.get('/laporan-keuangan'),
  getById: (id) => api.get(`/laporan-keuangan/${id}`),
  create: (data) => api.post('/laporan-keuangan', data),
  update: (id, data) => api.put(`/laporan-keuangan/${id}`, data),
  delete: (id) => api.delete(`/laporan-keuangan/${id}`),
  exportPdf: () => api.get('/laporan-keuangan/export-pdf', { responseType: 'blob' })
}

export const jadwalRondaAPI = {
  getAll: () => api.get('/jadwal-ronda'),
  create: (data) => api.post('/jadwal-ronda', data),
  update: (id, data) => api.put(`/jadwal-ronda/${id}`, data),
  delete: (id) => api.delete(`/jadwal-ronda/${id}`),
  exportPdf: () => api.get('/export/jadwal-ronda-pdf', { responseType: 'blob' })
}

export const bankSampahAPI = {
  getAll: () => api.get('/bank-sampah'),
  getByName: (name) => api.get(`/bank-sampah/by-name/${encodeURIComponent(name)}`),
  create: (data) => api.post('/bank-sampah', data),
  update: (id, data) => api.put(`/bank-sampah/${id}`, data),
  delete: (id) => api.delete(`/bank-sampah/${id}`),
  exportPdf: () => api.get('/export/bank-sampah-pdf', { responseType: 'blob' })
}

export const danaSosialAPI = {
  getAll: () => api.get('/dana-sosial'),
  create: (data) => api.post('/dana-sosial', data, {
    headers: { 'Content-Type': 'multipart/form-data' }
  }),
  update: (id, data) => {
    data.append('_method', 'PUT')
    return api.post(`/dana-sosial/${id}`, data, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })
  },
  delete: (id) => api.delete(`/dana-sosial/${id}`),
  export: () => api.get('/export/dana-sosial', { responseType: 'blob' })
}

export const authService = {
  async checkName(name) {
    const response = await api.get('/check-name', { params: { name } })
    return response.data
  },

  async register(data) {
    const response = await api.post('/register', data)
    return response.data
  },

  async login(data) {
    clearAuth()
    
    const response = await api.post('/login', data)
    
    if (response.data.token) {
      localStorage.setItem('token', response.data.token)
      localStorage.setItem('loginTime', Date.now().toString())
      
      const userToSave = {
        ...response.data.user,
        role: response.data.role
      }
      localStorage.setItem('user', JSON.stringify(userToSave))
    }
    
    return response.data
  },

  async logout() {
    try {
      await api.post('/logout')
    } catch (error) {
      console.error('Logout error:', error)
    }
    clearAuth()
  },

  isAuthenticated() {
    const token = getToken()
    return !!(token && !isTokenExpired())
  },

  getCurrentUser() {
    try {
      const userStr = localStorage.getItem('user')
      return userStr ? JSON.parse(userStr) : null
    } catch (e) {
      console.error('Error getting user:', e)
      clearAuth()
      return null
    }
  }
}

export default api