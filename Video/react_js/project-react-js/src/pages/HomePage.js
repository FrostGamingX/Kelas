import React from 'react';
import styled from 'styled-components';
import { Button } from '@mui/material';
import { Link } from 'react-router-dom';
import RestaurantMenuIcon from '@mui/icons-material/RestaurantMenu';

const HeroSection = styled.div`
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/random/1200x800/?restaurant,food');
  background-size: cover;
  background-position: center;
  height: 500px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
  padding: 0 2rem;
  margin: -2rem -2rem 2rem -2rem;
`;

const HeroTitle = styled.h1`
  font-size: 3rem;
  margin-bottom: 1rem;
`;

const HeroSubtitle = styled.p`
  font-size: 1.5rem;
  margin-bottom: 2rem;
  max-width: 800px;
`;

const FeaturesSection = styled.div`
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin: 4rem 0;
`;

const FeatureCard = styled.div`
  padding: 2rem;
  background-color: #f8f9fa;
  border-radius: 8px;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
`;

const FeatureTitle = styled.h3`
  margin: 1rem 0;
`;

const FeatureDescription = styled.p`
  color: #666;
`;

const HomePage = () => {
  return (
    <>
      <HeroSection>
        <HeroTitle>Selamat Datang di RestoApp</HeroTitle>
        <HeroSubtitle>
          Nikmati pengalaman kuliner terbaik dengan menu-menu pilihan kami yang lezat dan berkualitas
        </HeroSubtitle>
        <Button 
          component={Link} 
          to="/menu" 
          variant="contained" 
          color="primary" 
          size="large"
          startIcon={<RestaurantMenuIcon />}
        >
          Lihat Menu
        </Button>
      </HeroSection>

      <h2>Mengapa Memilih Kami?</h2>
      <FeaturesSection>
        <FeatureCard>
          <FeatureTitle>Makanan Berkualitas</FeatureTitle>
          <FeatureDescription>
            Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk setiap hidangan kami.
          </FeatureDescription>
        </FeatureCard>
        <FeatureCard>
          <FeatureTitle>Pengiriman Cepat</FeatureTitle>
          <FeatureDescription>
            Pesan makanan favorit Anda dan nikmati pengiriman cepat langsung ke rumah Anda.
          </FeatureDescription>
        </FeatureCard>
        <FeatureCard>
          <FeatureTitle>Pemesanan Mudah</FeatureTitle>
          <FeatureDescription>
            Proses pemesanan yang sederhana dan cepat melalui aplikasi kami yang user-friendly.
          </FeatureDescription>
        </FeatureCard>
      </FeaturesSection>
    </>
  );
};

export default HomePage;