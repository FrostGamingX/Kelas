import React from 'react';
import styled from 'styled-components';
import { Button } from '@mui/material';
import AddShoppingCartIcon from '@mui/icons-material/AddShoppingCart';

const Card = styled.div`
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
  
  &:hover {
    transform: translateY(-5px);
  }
`;

const FoodImage = styled.img`
  width: 100%;
  height: 200px;
  object-fit: cover;
`;

const CardContent = styled.div`
  padding: 1rem;
`;

const FoodName = styled.h3`
  margin: 0 0 0.5rem;
  font-size: 1.2rem;
`;

const FoodDescription = styled.p`
  color: #666;
  margin-bottom: 1rem;
  font-size: 0.9rem;
`;

const FoodPrice = styled.p`
  font-weight: bold;
  font-size: 1.1rem;
  color: #d32f2f;
  margin-bottom: 1rem;
`;

const MenuItem = ({ item, addToCart }) => {
  return (
    <Card>
      <FoodImage src={item.image} alt={item.name} />
      <CardContent>
        <FoodName>{item.name}</FoodName>
        <FoodDescription>{item.description}</FoodDescription>
        <FoodPrice>Rp {item.price.toLocaleString()}</FoodPrice>
        <Button 
          variant="contained" 
          color="primary" 
          startIcon={<AddShoppingCartIcon />}
          onClick={() => addToCart(item)}
          fullWidth
        >
          Tambah ke Keranjang
        </Button>
      </CardContent>
    </Card>
  );
};

export default MenuItem;