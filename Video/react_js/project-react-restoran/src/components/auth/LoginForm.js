import { useState } from 'react';
import authService from '../../services/authService';
import { Form, Button, Alert } from 'react-bootstrap';

const LoginForm = ({ onLoginSuccess }) => {
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const user = await authService.login(formData);
      onLoginSuccess(user);
    } catch (error) {
      console.error('Login error:', error);
    }
  };

  return (
    <Form onSubmit={handleSubmit}>
      {error && <Alert variant="danger">{error}</Alert>}
      
      <Form.Group className="mb-4">
        <Form.Label>Email</Form.Label>
        <Form.Control 
          type="email" 
          value={credentials.email}
          onChange={(e) => setCredentials({...credentials, email: e.target.value})}
          placeholder="Masukkan email Anda"
          required
        />
      </Form.Group>
      
      <Form.Group className="mb-4">
        <Form.Label>Password</Form.Label>
        <Form.Control 
          type="password" 
          value={credentials.password}
          onChange={(e) => setCredentials({...credentials, password: e.target.value})}
          placeholder="Masukkan password Anda"
          required
        />
      </Form.Group>
      
      <div className="d-grid gap-2 mt-5">
        <Button type="submit" disabled={loading}>
          {loading ? 'Memproses...' : 'Login'}
        </Button>
      </div>
    </Form>
  );
};

export default LoginForm;