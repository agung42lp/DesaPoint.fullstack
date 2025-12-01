import axios from 'axios'

const api = axios.create({
  baseURL: '/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  }
})

api.interceptors.request.use(config => {
  
  const token = localStorage.getItem('token')
  const loginTime = localStorage.getItem('loginTime')
  
  if (token) {
    if (loginTime) {
      const now = Date.now()
      const expiryTime = 24 * 60 * 60 * 1000 
      
      if ((now - parseInt(loginTime)) > expiryTime) {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        localStorage.removeItem('loginTime')
        window.location.href = '/login'
        return Promise.reject(new Error('Session expired'))
      }
    }
    
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

import router from '../router'

api.interceptors.response.use(
  response => response,
  error => {
    if (error.response?.status === 401) {
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      router.push('/login')
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
    const response = await api.get('/check-name', { 
      params: { name } 
    })
    return response.data
  },

  async register(data) {
    const response = await api.post('/register', data)
    return response.data
  },

  async login(data) {
  localStorage.removeItem('token')
  localStorage.removeItem('user')
  
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
    await api.post('/logout')
    localStorage.removeItem('token')
    localStorage.removeItem('user')
  }
}

export default api