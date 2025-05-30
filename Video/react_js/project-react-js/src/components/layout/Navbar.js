import React from 'react';
import { Link } from 'react-router-dom';
import styled from 'styled-components';
import ShoppingCartIcon from '@mui/icons-material/ShoppingCart';
import RestaurantMenuIcon from '@mui/icons-material/RestaurantMenu';
import HomeIcon from '@mui/icons-material/Home';

const NavContainer = styled.nav`
  background-color: #f8f9fa;
  padding: 1rem 2rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
`;

const NavList = styled.ul`
  display: flex;
  justify-content: space-between;
  align-items: center;
  list-style: none;
  margin: 0;
  padding: 0;
`;

const NavItem = styled.li`
  margin: 0 1rem;
`;

const Logo = styled.div`
  font-size: 1.5rem;
  font-weight: bold;
  color: #d32f2f;
`;

const StyledLink = styled(Link)`
  text-decoration: none;
  color: #333;
  display: flex;
  align-items: center;
  gap: 5px;
  
  &:hover {
    color: #d32f2f;
  }
`;

const Navbar = () => {
  return (
    <NavContainer>
      <NavList>
        <Logo>
          <StyledLink to="/">
            <RestaurantMenuIcon /> RestoApp
          </StyledLink>
        </Logo>
        <div style={{ display: 'flex' }}>
          <NavItem>
            <StyledLink to="/">
              <HomeIcon /> Beranda
            </StyledLink>
          </NavItem>
          <NavItem>
            <StyledLink to="/menu">
              <RestaurantMenuIcon /> Menu
            </StyledLink>
          </NavItem>
          <NavItem>
            <StyledLink to="/cart">
              <ShoppingCartIcon /> Keranjang
            </StyledLink>
          </NavItem>
        </div>
      </NavList>
    </NavContainer>
  );
};

export default Navbar;