import React, { useState, useEffect, useCallback } from 'react';
import { Button, Table } from 'react-bootstrap';
import authService from '../../services/authService';

const UserManagement = ({ setError }) => {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(true);

  const fetchUsers = useCallback(async () => {
    try {
      const response = await authService.getAllUsers();
      setUsers(response.data);
    } catch (err) {
      setError('Gagal memuat data user');
    } finally {
      setLoading(false);
    }
  }, [setError]);

  useEffect(() => {
    fetchUsers();
  }, [fetchUsers]);

  const handleDelete = async (id) => {
    try {
      await authService.deleteUser(id);
      fetchUsers();
    } catch (err) {
      setError('Gagal menghapus user');
    }
  };

  if (loading) return <div>Loading...</div>;

  return (
    <div>
      <Table striped bordered hover>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user.id}>
              <td>{user.name}</td>
              <td>{user.email}</td>
              <td>{user.role}</td>
              <td>
                <Button 
                  variant="danger" 
                  size="sm"
                  onClick={() => handleDelete(user.id)}
                >
                  Hapus
                </Button>
              </td>
            </tr>
          ))}
        </tbody>
      </Table>
    </div>
  );
};

export default UserManagement;