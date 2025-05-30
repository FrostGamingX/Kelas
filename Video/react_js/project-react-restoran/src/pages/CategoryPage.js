import React, { useState, useEffect } from 'react';
import categoryService from '../services/categoryService';
import { Container, Row, Col, Card, Button, Form, Modal, Alert } from 'react-bootstrap';
import LoadingSpinner from '../components/common/LoadingSpinner';
import ErrorAlert from '../components/common/ErrorAlert';

const CategoryPage = () => {
  const [categories, setCategories] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [showModal, setShowModal] = useState(false);
  const [currentCategory, setCurrentCategory] = useState({ name: '', description: '' });
  const [isEditing, setIsEditing] = useState(false);

  // Fetch categories
  useEffect(() => {
    fetchCategories();
  }, []);

  const fetchCategories = async () => {
    try {
      setLoading(true);
      const response = await categoryService.getAll();
      const data = response.data;
      if (Array.isArray(data)) {
        setCategories(data);
      } else if (data && Array.isArray(data.data)) {
        setCategories(data.data);
      } else {
        setError('Format data kategori tidak sesuai');
        setCategories([]);
      }
    } catch (err) {
      console.error('Error fetching categories:', err);
      setError('Gagal memuat data kategori');
    } finally {
      setLoading(false);
    }
  };

  const handleOpenModal = (category = null) => {
    if (category) {
      setCurrentCategory(category);
      setIsEditing(true);
    } else {
      setCurrentCategory({ name: '', description: '' });
      setIsEditing(false);
    }
    setShowModal(true);
  };

  const handleCloseModal = () => {
    setShowModal(false);
  };

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setCurrentCategory({ ...currentCategory, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      if (isEditing) {
        await categoryService.update(currentCategory.id, currentCategory);
      } else {
        await categoryService.create(currentCategory);
      }
      fetchCategories();
      handleCloseModal();
    } catch (err) {
      console.error('Error saving category:', err);
      setError('Gagal menyimpan kategori');
    }
  };

  const handleDelete = async (id) => {
    if (window.confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
      try {
        await categoryService.delete(id);
        fetchCategories();
      } catch (err) {
        console.error('Error deleting category:', err);
        setError('Gagal menghapus kategori');
      }
    }
  };

  if (loading) return <LoadingSpinner />;
  if (error) return <ErrorAlert message={error} />;

  return (
    <Container className="section-padding">
      <h2 className="page-title">Manajemen Kategori</h2>
      
      <div className="d-flex justify-content-end mb-4">
        <Button variant="primary" onClick={() => handleOpenModal()}>
          <i className="fas fa-plus me-2"></i>Tambah Kategori
        </Button>
      </div>

      {categories.length === 0 && (
        <Alert variant="info" className="text-center">
          Belum ada kategori. Silakan tambahkan kategori baru.
        </Alert>
      )}

      <Row className="row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {categories.map(category => (
          <Col key={category.id}>
            <Card className="h-100">
              <Card.Body>
                <Card.Title>{category.name}</Card.Title>
                <Card.Text>{category.description}</Card.Text>
              </Card.Body>
              <Card.Footer className="bg-white border-0 d-flex justify-content-end">
                <Button 
                  variant="outline-primary" 
                  size="sm" 
                  className="me-2"
                  onClick={() => handleOpenModal(category)}
                >
                  <i className="fas fa-edit"></i>
                </Button>
                <Button 
                  variant="outline-danger" 
                  size="sm"
                  onClick={() => handleDelete(category.id)}
                >
                  <i className="fas fa-trash"></i>
                </Button>
              </Card.Footer>
            </Card>
          </Col>
        ))}
      </Row>

      {/* Modal for adding/editing categories */}
      <Modal show={showModal} onHide={handleCloseModal} centered>
        <Modal.Header closeButton>
          <Modal.Title>{isEditing ? 'Edit Kategori' : 'Tambah Kategori Baru'}</Modal.Title>
        </Modal.Header>
        <Form onSubmit={handleSubmit}>
          <Modal.Body>
            <Form.Group className="mb-3">
              <Form.Label>Nama Kategori</Form.Label>
              <Form.Control
                type="text"
                name="name"
                value={currentCategory.name}
                onChange={handleInputChange}
                placeholder="Masukkan nama kategori"
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Deskripsi</Form.Label>
              <Form.Control
                as="textarea"
                name="description"
                value={currentCategory.description || ''}
                onChange={handleInputChange}
                placeholder="Masukkan deskripsi kategori"
                rows={3}
              />
            </Form.Group>
          </Modal.Body>
          <Modal.Footer>
            <Button variant="secondary" onClick={handleCloseModal}>
              Batal
            </Button>
            <Button variant="primary" type="submit">
              {isEditing ? 'Simpan Perubahan' : 'Tambah Kategori'}
            </Button>
          </Modal.Footer>
        </Form>
      </Modal>
    </Container>
  );
};

export default CategoryPage;