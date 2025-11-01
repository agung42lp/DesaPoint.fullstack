import axios from 'axios'

const api = axios.create({
  baseURL: '/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  }
})

export const authService = {
  async register(data) {
    const response = await api.post('/register', data)
    return response.data
  },

  async login(data) {
    const response = await api.post('/login', data)
    return response.data
  },

  async logout() {
    await api.post('/logout')
  }
}

export default api