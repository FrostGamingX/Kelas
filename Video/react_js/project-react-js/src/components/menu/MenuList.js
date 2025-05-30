import React from 'react';
import styled from 'styled-components';
import MenuItem from './MenuItem';

const MenuGrid = styled.div`
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
`;

const CategoryTitle = styled.h2`
  margin-top: 2rem;
  margin-bottom: 1rem;
  padding-bottom: 0.5rem;
  border-bottom: 2px solid #d32f2f;
`;

const MenuList = ({ menuItems, addToCart }) => {
  // Mengelompokkan item menu berdasarkan kategori
  const categories = menuItems.reduce((acc, item) => {
    if (!acc[item.category]) {
      acc[item.category] = [];
    }
    acc[item.category].push(item);
    return acc;
  }, {});

  return (
    <div>
      {Object.keys(categories).map((category) => (
        <div key={category}>
          <CategoryTitle>{category}</CategoryTitle>
          <MenuGrid>
            {categories[category].map((item) => (
              <MenuItem key={item.id} item={item} addToCart={addToCart} />
            ))}
          </MenuGrid>
        </div>
      ))}
    </div>
  );
};

export default MenuList;