import React, { useState, useEffect } from 'react';
import styled from 'styled-components';
import MenuList from '../components/menu/MenuList';
import { useCart } from '../context/CartContext';

const MenuHeader = styled.div`
  margin-bottom: 2rem;
`;

const MenuTitle = styled.h1`
  margin-bottom: 1rem;
`;

const MenuDescription = styled.p`
  color: #666;
  max-width: 800px;
`;

// Data menu contoh
const sampleMenuItems = [
  {
    id: 1,
    name: 'Nasi Goreng Spesial',
    description: 'Nasi goreng dengan telur, ayam, dan sayuran segar',
    price: 35000,
    image: 'https://source.unsplash.com/random/300x200/?fried-rice',
    category: 'Makanan Utama'
  },
  {
    id: 2,
    name: 'Mie Goreng',
    description: 'Mie goreng dengan bumbu khas dan tambahan seafood',
    price: 30000,
    image: 'https://source.unsplash.com/random/300x200/?noodles',
    category: 'Makanan Utama'
  },
  {
    id: 3,
    name: 'Ayam Bakar',
    description: 'Ayam bakar dengan bumbu rempah khas Indonesia',
    price: 45000,
    image: 'https://source.unsplash.com/random/300x200/?grilled-chicken',
    category: 'Makanan Utama'
  },
  {
    id: 4,
    name: 'Sate Ayam',
    description: 'Sate ayam dengan bumbu kacang yang lezat',
    price: 25000,
    image: 'https://source.unsplash.com/random/300x200/?satay',
    category: 'Makanan Utama'
  },
  {
    id: 5,
    name: 'Es Teh Manis',
    description: 'Teh manis dingin yang menyegarkan',
    price: 8000,
    image: 'https://source.unsplash.com/random/300x200/?iced-tea',
    category: 'Minuman'
  },
  {
    id: 6,
    name: 'Jus Alpukat',
    description: 'Jus alpukat segar dengan tambahan susu',
    price: 15000,
    image: 'https://source.unsplash.com/random/300x200/?avocado-juice',
    category: 'Minuman'
  },
  {
    id: 7,
    name: 'Pudding Coklat',
    description: 'Pudding coklat lembut dengan saus vanilla',
    price: 18000,
    image: 'https://source.unsplash.com/random/300x200/?chocolate-pudding',
    category: 'Dessert'
  },
  {
    id: 8,
    name: 'Es Krim',
    description: 'Es krim dengan pilihan rasa vanilla, coklat, dan stroberi',
    price: 12000,
    image: 'https://source.unsplash.com/random/300x200/?ice-cream',
    category: 'Dessert'
  }
];

const MenuPage = () => {
  const [menuItems, setMenuItems] = useState([]);
  const { addToCart } = useCart();

  useEffect(() => {
    // Di sini Anda bisa mengambil data menu dari API
    // Untuk contoh, kita gunakan data statis
    setMenuItems(sampleMenuItems);
  }, []);

  return (
    <div>
      <MenuHeader>
        <MenuTitle>Menu Kami</MenuTitle>
        <MenuDescription>
          Jelajahi berbagai pilihan menu lezat kami yang dibuat dengan bahan-bahan berkualitas tinggi dan cita rasa yang autentik.
        </MenuDescription>
      </MenuHeader>
      
      <MenuList menuItems={menuItems} addToCart={addToCart} />
    </div>
  );
};

export default MenuPage;