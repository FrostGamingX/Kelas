import api from './api';

const menuService = {
  getAllMenus: () => api.get('/api/menus'),  // Tambahkan '/api/' sebelum endpoint
  create: (data) => api.post('/api/menus', data),
  update: (id, data) => api.put(`/api/menus/${id}`, data),
  delete: (id) => api.delete(`/api/menus/${id}`)
};

export default menuService;