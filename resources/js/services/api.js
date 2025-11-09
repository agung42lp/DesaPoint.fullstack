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
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

api.interceptors.response.use(
  response => response,
  error => {
    if (error.response?.status === 401) {
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      window.location.href = '/login'
    }
    return Promise.reject(error)
  }
)

export const pengaduanAPI = {
    getAll: (params) => api.get('/pengaduan', { params }),
    create: (data) => api.post('/pengaduan', data),
    update: (id, data) => api.put(`/pengaduan/${id}`, data),
    export: () => api.get('/export/pengaduan', { responseType: 'blob' })
}

export const laporanKeuanganAPI = {
    getAll: () => api.get('/laporan-keuangan'),
    getById: (id) => api.get(`/laporan-keuangan/${id}`),
    create: (data) => api.post('/laporan-keuangan', data),
    update: (id, data) => api.put(`/laporan-keuangan/${id}`, data),
    delete: (id) => api.delete(`/laporan-keuangan/${id}`),
    export: () => api.get('/export/laporan-keuangan', { responseType: 'blob' })
}

export const jadwalRondaAPI = {
    getAll: () => api.get('/jadwal-ronda'),
    create: (data) => api.post('/jadwal-ronda', data),
    update: (id, data) => api.put(`/jadwal-ronda/${id}`, data),
    delete: (id) => api.delete(`/jadwal-ronda/${id}`),
    export: () => api.get('/export/jadwal-ronda', { responseType: 'blob' })
}

export const bankSampahAPI = {
    getAll: () => api.get('/bank-sampah'),
    create: (data) => api.post('/bank-sampah', data),
    update: (id, data) => api.put(`/bank-sampah/${id}`, data),
    delete: (id) => api.delete(`/bank-sampah/${id}`),
    export: () => api.get('/export/bank-sampah', { responseType: 'blob' })
}

export const baksosAPI = {
    getAll: () => api.get('/baksos'),
    create: (data) => api.post('/baksos', data),
    update: (id, data) => api.put(`/baksos/${id}`, data),
    delete: (id) => api.delete(`/baksos/${id}`),
    export: () => api.get('/export/baksos', { responseType: 'blob' })
}

export const authService = {
  async register(data) {
    const response = await api.post('/register', data)
    return response.data
  },

  async login(data) {
    const response = await api.post('/login', data)
    
    if (response.data.token) {
      localStorage.setItem('token', response.data.token)
      localStorage.setItem('user', JSON.stringify(response.data.user))
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