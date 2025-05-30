import React, { useState } from 'react';
import { Container, Tab, Tabs, Alert } from 'react-bootstrap';
import MenuManagement from '../components/admin/MenuManagement';
import UserManagement from '../components/admin/UserManagement';

const AdminPage = () => {
  const [key, setKey] = useState('menu');
  const [error, setError] = useState('');

  return (
    <Container className="section-padding">
      <h2 className="page-title">Admin Dashboard</h2>
      
      {error && <Alert variant="danger">{error}</Alert>}

      <Tabs
        activeKey={key}
        onSelect={(k) => setKey(k)}
        className="mb-4"
      >
        <Tab eventKey="menu" title="Manajemen Menu">
          <MenuManagement setError={setError} />
        </Tab>
        <Tab eventKey="users" title="Manajemen User">
          <UserManagement setError={setError} />
        </Tab>
      </Tabs>
    </Container>
  );
};

export default AdminPage;