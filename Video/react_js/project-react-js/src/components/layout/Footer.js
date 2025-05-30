import React from 'react';
import styled from 'styled-components';

const FooterContainer = styled.footer`
  background-color: #333;
  color: white;
  padding: 2rem;
  text-align: center;
  margin-top: auto;
`;

const FooterContent = styled.div`
  max-width: 1200px;
  margin: 0 auto;
`;

const FooterLinks = styled.div`
  display: flex;
  justify-content: center;
  margin-bottom: 1rem;
`;

const FooterLink = styled.a`
  color: white;
  margin: 0 1rem;
  text-decoration: none;
  
  &:hover {
    text-decoration: underline;
  }
`;

const Copyright = styled.p`
  margin-top: 1rem;
  font-size: 0.9rem;
`;

const Footer = () => {
  return (
    <FooterContainer>
      <FooterContent>
        <FooterLinks>
          <FooterLink href="#">Tentang Kami</FooterLink>
          <FooterLink href="#">Kontak</FooterLink>
          <FooterLink href="#">Karir</FooterLink>
          <FooterLink href="#">Kebijakan Privasi</FooterLink>
        </FooterLinks>
        <Copyright>
          &copy; {new Date().getFullYear()} RestoApp. Hak Cipta Dilindungi.
        </Copyright>
      </FooterContent>
    </FooterContainer>
  );
};

export default Footer;