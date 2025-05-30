import React from 'react';
import LoginForm from '../components/auth/LoginForm';
import { Link } from 'react-router-dom';

const LoginPage = () => {
  return (
    <div className="container section-padding">
      <div className="row justify-content-center">
        <div className="col-md-6">
          <div className="card shadow-lg">
            <div className="card-body p-5">
              <h2 className="text-center mb-4">Login</h2>
              <p className="text-center text-muted mb-5">Masuk untuk menikmati layanan eksklusif kami</p>
              <LoginForm onLoginSuccess={() => window.location.href = '/'} />
              <div className="text-center mt-4">
                <p>Belum memiliki akun? <Link to="/register" className="text-primary">Daftar sekarang</Link></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;