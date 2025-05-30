import React, { useState, useEffect } from 'react';
import menuService from '../services/menuService';
import { Container, Row, Alert } from 'react-bootstrap';
import LoadingSpinner from '../components/common/LoadingSpinner';
import ErrorAlert from '../components/common/ErrorAlert';
import MenuCard from '../components/menu/MenuCard';

const MenuPage = () => {
  const [menus, setMenus] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [activeCategory, setActiveCategory] = useState('all');

  // Fetch data dari API
  useEffect(() => {
    const fetchMenus = async () => {
      try {
        setLoading(true);
        const response = await menuService.getAllMenus();
        
        // Handle case where endpoint exists but returns empty array
        if (!response.data || response.data.length === 0) {
          setError('Tidak ada menu tersedia');
          setMenus([]);
          return;
        }
        
        setMenus(response.data);
      } catch (err) {
        // More specific error handling
        if (err.response) {
          if (err.response.status === 404) {
            setError('Endpoint menu tidak ditemukan');
          } else {
            setError(`Error ${err.response.status}: Gagal memuat menu`);
          }
        } else {
          setError('Tidak dapat terhubung ke server');
        }
        console.error('Error:', err);
      } finally {
        setLoading(false);
      }
    };

    fetchMenus();
  }, []);

  // Tampilkan loading spinner
  if (loading) return <LoadingSpinner />;
  
  // Tampilkan error jika ada
  if (error) return <ErrorAlert message={error} />;

  // Tampilkan pesan jika tidak ada menu
  if (menus.length === 0) {
    return (
      <Container className="section-padding">
        <h2 className="page-title">Menu Eksklusif Kami</h2>
        <Alert variant="info" className="text-center">
          Tidak ada menu tersedia saat ini.
        </Alert>
      </Container>
    );
  }

  // Filter menu berdasarkan kategori
  const filteredMenus = activeCategory === 'all' 
    ? menus 
    : menus.filter(menu => menu.category === activeCategory);

  // Dapatkan kategori unik
  const categories = ['all', ...new Set(menus.map(menu => menu.category).filter(Boolean))];

  // Render daftar menu
  return (
    <Container className="section-padding">
      <h2 className="page-title">Menu Eksklusif Kami</h2>
      
      {/* Filter kategori */}
      <div className="text-center mb-5">
        <div className="d-inline-flex flex-wrap justify-content-center gap-3">
          {categories.map(category => (
            <button 
              key={category} 
              className={`btn ${activeCategory === category ? 'btn-primary' : 'btn-outline-secondary'}`}
              onClick={() => setActiveCategory(category)}
            >
              {category === 'all' ? 'Semua Menu' : category}
            </button>
          ))}
        </div>
      </div>
      
      {filteredMenus.length === 0 && (
        <Alert variant="info" className="text-center">
          Tidak ada menu dalam kategori ini.
        </Alert>
      )}
      
      <Row className="row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {filteredMenus.map((menu, index) => (
          <div key={menu.id || index} className="col">
            <MenuCard menu={menu} />
          </div>
        ))}
      </Row>
    </Container>
  );
};

export default MenuPage;