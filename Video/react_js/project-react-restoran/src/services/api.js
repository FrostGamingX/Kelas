import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000', // Sesuaikan dengan port backend Anda
  headers: {
    'Content-Type': 'application/json'
  }
});

export default api;