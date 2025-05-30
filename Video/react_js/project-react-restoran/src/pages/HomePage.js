import React from 'react';
import NavButton from '../components/common/NavButton';

const HomePage = () => {
  return (
    <>
      {/* Hero Section */}
      <div className="hero-section text-white"> 
        <div className="container text-center">
          <h1 className="display-3 mb-4">Rempah Wangi Restoran</h1>
          <p className="lead fs-4 mb-5">Pengalaman bersantap mewah dengan cita rasa autentik Nusantara</p>
          
          <div className="mt-5 d-flex justify-content-center flex-wrap gap-4">
            <NavButton to="/menu" icon="utensils" className="btn-lg">Jelajahi Menu</NavButton>
            <NavButton to="/customers" icon="users" className="btn-lg btn-outline-light">Testimoni</NavButton>
            <NavButton to="/login" icon="sign-in-alt" className="btn-lg btn-outline-light">Reservasi</NavButton>
          </div>
        </div>
      </div>
      
      {/* Intro Section */}
      <div className="container section-padding text-center">
        <div className="row justify-content-center">
          <div className="col-lg-8">
            <h2 className="page-title">Selamat Datang</h2>
            <p className="lead mb-5">Rempah Wangi adalah destinasi kuliner premium yang menyajikan hidangan Indonesia dengan sentuhan modern. Kami menggunakan bahan-bahan terbaik dan rempah pilihan untuk menciptakan pengalaman bersantap yang tak terlupakan.</p>
          </div>
        </div>
      </div>
      
      {/* Menu Spesial Section */}
      <div className="container section-padding"> 
        <h2 className="page-title">Signature Dishes</h2>
        <div className="row row-cols-1 row-cols-md-3 g-4">
          <div className="col">
            <div className="card h-100 text-center">
              <div className="card-body p-5">
                <i className="fas fa-pepper-hot text-primary fs-1 mb-4"></i>
                <h5 className="card-title mb-3">Rendang Wagyu</h5>
                <p className="card-text">Daging sapi Wagyu grade A5 dimasak dengan 21 jenis rempah pilihan dari Sumatera Barat selama 8 jam hingga mencapai tekstur dan rasa yang sempurna.</p>
              </div>
            </div>
          </div>
          <div className="col">
            <div className="card h-100 text-center">
              <div className="card-body p-5">
                <i className="fas fa-fish text-primary fs-1 mb-4"></i>
                <h5 className="card-title mb-3">Ikan Bakar Jimbaran</h5>
                <p className="card-text">Ikan kakap merah segar dipilih langsung oleh chef kami, dibakar dengan bumbu rempah Bali dan disajikan dengan sambal matah premium.</p>
              </div>
            </div>
          </div>
          <div className="col">
            <div className="card h-100 text-center">
              <div className="card-body p-5">
                <i className="fas fa-mortar-pestle text-primary fs-1 mb-4"></i>
                <h5 className="card-title mb-3">Soto Royal</h5>
                <p className="card-text">Kaldu ayam kampung yang dimasak selama 12 jam dengan rempah pilihan, disajikan dengan daging ayam suwir, telur puyuh, dan emping melinjo.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default HomePage;