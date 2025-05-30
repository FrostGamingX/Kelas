import React, { useState, useEffect, useCallback } from 'react';
import { Button, Table, Modal, Form } from 'react-bootstrap';
import menuService from '../../services/menuService';

const MenuManagement = ({ setError }) => {
  const [menus, setMenus] = useState([]);
  const [loading, setLoading] = useState(true);
  const [showModal, setShowModal] = useState(false);
  const [currentMenu, setCurrentMenu] = useState({
    name: '',
    description: '',
    price: 0,
    category: ''
  });

  const fetchMenus = useCallback(async () => {
    try {
      const response = await menuService.getAllMenus();
      setMenus(response.data);
    } catch (err) {
      setError('Gagal memuat data menu');
    } finally {
      setLoading(false);
    }
  }, [setError]);

  useEffect(() => {
    fetchMenus();
  }, [fetchMenus]);

  const handleDelete = async (id) => {
    try {
      await menuService.delete(id);
      fetchMenus();
    } catch (err) {
      setError('Gagal menghapus menu');
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      if (currentMenu.id) {
        await menuService.update(currentMenu.id, currentMenu);
      } else {
        await menuService.create(currentMenu);
      }
      fetchMenus();
      setShowModal(false);
    } catch (err) {
      setError('Gagal menyimpan menu');
    }
  };

  if (loading) return <div>Loading...</div>;

  return (
    <div>
      <div className="d-flex justify-content-end mb-3">
        <Button variant="primary" onClick={() => setShowModal(true)}>
          Tambah Menu
        </Button>
      </div>

      <Table striped bordered hover>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          {menus.map(menu => (
            <tr key={menu.id}>
              <td>{menu.name}</td>
              <td>{menu.description}</td>
              <td>Rp {menu.price.toLocaleString()}</td>
              <td>{menu.category}</td>
              <td>
                <Button variant="warning" size="sm" className="me-2">
                  Edit
                </Button>
                <Button 
                  variant="danger" 
                  size="sm"
                  onClick={() => handleDelete(menu.id)}
                >
                  Hapus
                </Button>
              </td>
            </tr>
          ))}
        </tbody>
      </Table>

      <Modal show={showModal} onHide={() => setShowModal(false)}>
        <Modal.Header closeButton>
          <Modal.Title>Tambah Menu Baru</Modal.Title>
        </Modal.Header>
        <Form onSubmit={handleSubmit}>
          <Modal.Body>
            <Form.Group className="mb-3">
              <Form.Label>Nama Menu</Form.Label>
              <Form.Control 
                type="text" 
                value={currentMenu.name}
                onChange={(e) => setCurrentMenu({...currentMenu, name: e.target.value})}
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Deskripsi</Form.Label>
              <Form.Control 
                as="textarea" 
                value={currentMenu.description}
                onChange={(e) => setCurrentMenu({...currentMenu, description: e.target.value})}
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Harga</Form.Label>
              <Form.Control 
                type="number" 
                value={currentMenu.price}
                onChange={(e) => setCurrentMenu({...currentMenu, price: e.target.value})}
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Kategori</Form.Label>
              <Form.Control 
                type="text" 
                value={currentMenu.category}
                onChange={(e) => setCurrentMenu({...currentMenu, category: e.target.value})}
              />
            </Form.Group>
          </Modal.Body>
          <Modal.Footer>
            <Button variant="secondary" onClick={() => setShowModal(false)}>
              Batal
            </Button>
            <Button variant="primary" type="submit">
              Simpan
            </Button>
          </Modal.Footer>
        </Form>
      </Modal>
    </div>
  );
};

export default MenuManagement;