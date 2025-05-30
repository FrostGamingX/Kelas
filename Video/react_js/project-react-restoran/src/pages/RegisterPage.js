import React from 'react';
import RegisterForm from '../components/auth/RegisterForm';
import { Link } from 'react-router-dom';

const RegisterPage = () => {
  return (
    <div className="container section-padding">
      <div className="row justify-content-center">
        <div className="col-md-6">
          <div className="card shadow-lg">
            <div className="card-body p-5">
              <h2 className="text-center mb-4">Daftar Akun</h2>
              <p className="text-center text-muted mb-5">Bergabunglah dengan kami untuk pengalaman kuliner eksklusif</p>
              <RegisterForm onRegisterSuccess={() => window.location.href = '/login'} />
              <div className="text-center mt-4">
                <p>Sudah memiliki akun? <Link to="/login" className="text-primary">Login di sini</Link></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RegisterPage;