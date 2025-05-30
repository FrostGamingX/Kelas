import React from 'react';
import styled from 'styled-components';
import { IconButton } from '@mui/material';
import AddIcon from '@mui/icons-material/Add';
import RemoveIcon from '@mui/icons-material/Remove';
import DeleteIcon from '@mui/icons-material/Delete';

const CartItemContainer = styled.div`
  display: flex;
  align-items: center;
  padding: 1rem;
  border-bottom: 1px solid #eee;
`;

const ItemImage = styled.img`
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 4px;
  margin-right: 1rem;
`;

const ItemDetails = styled.div`
  flex: 1;
`;

const ItemName = styled.h4`
  margin: 0 0 0.5rem;
`;

const ItemPrice = styled.p`
  margin: 0;
  color: #d32f2f;
  font-weight: bold;
`;

const QuantityControl = styled.div`
  display: flex;
  align-items: center;
  margin-right: 1rem;
`;

const Quantity = styled.span`
  margin: 0 0.5rem;
  min-width: 24px;
  text-align: center;
`;

const CartItem = ({ item, updateQuantity, removeFromCart }) => {
  return (
    <CartItemContainer>
      <ItemImage src={item.image} alt={item.name} />
      <ItemDetails>
        <ItemName>{item.name}</ItemName>
        <ItemPrice>Rp {item.price.toLocaleString()}</ItemPrice>
      </ItemDetails>
      <QuantityControl>
        <IconButton 
          size="small" 
          onClick={() => updateQuantity(item.id, item.quantity - 1)}
          disabled={item.quantity <= 1}
        >
          <RemoveIcon />
        </IconButton>
        <Quantity>{item.quantity}</Quantity>
        <IconButton 
          size="small" 
          onClick={() => updateQuantity(item.id, item.quantity + 1)}
        >
          <AddIcon />
        </IconButton>
      </QuantityControl>
      <IconButton color="error" onClick={() => removeFromCart(item.id)}>
        <DeleteIcon />
      </IconButton>
    </CartItemContainer>
  );
};

export default CartItem;