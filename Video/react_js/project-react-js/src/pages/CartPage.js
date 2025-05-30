import React from 'react';
import styled from 'styled-components';
import { Button } from '@mui/material';
import { Link } from 'react-router-dom';
import CartItem from '../components/cart/CartItem';
import { useCart } from '../context/CartContext';

const CartContainer = styled.div`
  max-width: 800px;
  margin: 0 auto;
`;

const CartHeader = styled.div`
  margin-bottom: 2rem;
`;

const CartTitle = styled.h1`
  margin-bottom: 1rem;
`;

const EmptyCartMessage = styled.p`
  text-align: center;
  padding: 2rem;
  background-color: #f8f9fa;
  border-radius: 8px;
  margin: 2rem 0;
`;

const CartSummary = styled.div`
  margin-top: 2rem;
  padding: 1.5rem;
  background-color: #f8f9fa;
  border-radius: 8px;
`;

const SummaryRow = styled.div`
  display: flex;
  justify-content: space-between;
  margin-bottom: 1rem;
`;

const TotalRow = styled(SummaryRow)`
  font-weight: bold;
  font-size: 1.2rem;
  border-top: 1px solid #ddd;
  padding-top: 1rem;
`;

const ButtonContainer = styled.div`
  display: flex;
  justify-content: space-between;
  margin-top: 2rem;
`;

const CartPage = () => {
  const { 
    cartItems, 
    updateQuantity, 
    removeFromCart, 
    clearCart,
    getTotalPrice 
  } = useCart();

  const handleCheckout = () => {
    alert('Terima kasih telah berbelanja! Pesanan Anda sedang diproses.');
    clearCart();
  };

  return (
    <CartContainer>
      <CartHeader>
        <CartTitle>Keranjang Belanja</CartTitle>
      </CartHeader>

      {cartItems.length === 0 ? (
        <EmptyCartMessage>
          Keranjang belanja Anda kosong. 
          <Link to="/menu" style={{ display: 'block', marginTop: '1rem' }}>
            Kembali ke Menu
          </Link>
        </EmptyCartMessage>
      ) : (
        <>
          {cartItems.map((item) => (
            <CartItem 
              key={item.id} 
              item={item} 
              updateQuantity={updateQuantity}
              removeFromCart={removeFromCart}
            />
          ))}

          <CartSummary>
            <SummaryRow>
              <span>Subtotal</span>
              <span>Rp {getTotalPrice().toLocaleString()}</span>
            </SummaryRow>
            <SummaryRow>
              <span>Biaya Pengiriman</span>
              <span>Rp 10,000</span>
            </SummaryRow>
            <TotalRow>
              <span>Total</span>
              <span>Rp {(getTotalPrice() + 10000).toLocaleString()}</span>
            </TotalRow>
          </CartSummary>

          <ButtonContainer>
            <Button 
              component={Link} 
              to="/menu" 
              variant="outlined"
            >
              Lanjut Belanja
            </Button>
            <Button 
              variant="contained" 
              color="primary"
              onClick={handleCheckout}
            >
              Checkout
            </Button>
          </ButtonContainer>
        </>
      )}
    </CartContainer>
  );
};

export default CartPage;