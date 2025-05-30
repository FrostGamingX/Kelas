import React from 'react';
import { Card } from 'react-bootstrap';

const MenuCard = ({ menu }) => {
  const getImagePath = () => {
    // 1. Prioritas utama - gunakan imagePath dari database
    if (menu.imagePath) {
      try {
        return require(`../../images/${menu.imagePath}`);
      } catch (err) {
        console.warn(`Gambar ${menu.imagePath} tidak ditemukan`);
      }
    }
    
    // 2. Fallback - cari gambar berdasarkan nama menu
    const imageName = menu.name.toLowerCase().replace(/\s+/g, '-') + '.jpg';
    try {
      return require(`../../images/${imageName}`);
    } catch {
      // 3. Final fallback - gunakan gambar default
      return require('../../images/default.jpg');
    }
  };

  return (
    <Card className="h-100">
      <Card.Img 
        variant="top" 
        src={getImagePath()} 
        alt={menu.name}
        style={{ height: '200px', objectFit: 'cover' }}
        onError={(e) => {
          e.target.onerror = null;
          e.target.src = require('../../images/ikan-bakar.jpg');
        }}
      />
      <Card.Body>
        <Card.Title>{menu.name}</Card.Title>
        <Card.Text>{menu.description}</Card.Text>
        <Card.Text className="text-primary fw-bold">
          Rp {menu.price.toLocaleString()}
        </Card.Text>
      </Card.Body>
    </Card>
  );
};

export default MenuCard;