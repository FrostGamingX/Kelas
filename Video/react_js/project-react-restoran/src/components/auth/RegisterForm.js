import { useState } from 'react';
import authService from '../../services/authService';
import { Form, Button, Alert } from 'react-bootstrap';

const RegisterForm = ({ onRegisterSuccess }) => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: '',
  });

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await authService.register(formData);
      onRegisterSuccess();
    } catch (error) {
      console.error('Registration error:', error);
    }
  };

  return (
    <Form onSubmit={handleSubmit}>
      {error && <Alert variant="danger">{error}</Alert>}
      
      <Form.Group className="mb-4">
        <Form.Label>Nama Lengkap</Form.Label>
        <Form.Control 
          type="text" 
          value={userData.name}
          onChange={(e) => setUserData({...userData, name: e.target.value})}
          placeholder="Masukkan nama lengkap Anda"
          required
        />
      </Form.Group>
      
      <Form.Group className="mb-4">
        <Form.Label>Email</Form.Label>
        <Form.Control 
          type="email" 
          value={userData.email}
          onChange={(e) => setUserData({...userData, email: e.target.value})}
          placeholder="Masukkan email Anda"
          required
        />
      </Form.Group>
      
      <Form.Group className="mb-4">
        <Form.Label>Password</Form.Label>
        <Form.Control 
          type="password" 
          value={userData.password}
          onChange={(e) => setUserData({...userData, password: e.target.value})}
          placeholder="Masukkan password Anda"
          required
        />
      </Form.Group>
      
      <div className="d-grid gap-2 mt-5">
        <Button type="submit" disabled={loading}>
          {loading ? 'Memproses...' : 'Daftar'}
        </Button>
      </div>
    </Form>
  );
};

export default RegisterForm;