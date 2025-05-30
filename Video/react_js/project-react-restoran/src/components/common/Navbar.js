import { Link } from 'react-router-dom';
import { useAuth } from '../../contexts/AuthContext';
import NavButton from './NavButton';

const Navbar = () => {
  const { isAuthenticated, logout } = useAuth();

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div className="container">
        <Link className="navbar-brand" to="/">Restoran Kita</Link>
        <div className="d-flex">
          {isAuthenticated ? (
            <button 
              onClick={logout}
              className="btn btn-outline-light rounded-pill px-4 py-2"
            >
              <i className="fas fa-sign-out-alt me-2"></i>
              Logout
            </button>
          ) : (
            <>
              <NavButton to="/login" icon="sign-in-alt">Login</NavButton>
              <NavButton to="/register" icon="user-plus">Daftar</NavButton>
            </>
          )}
        </div>
      </div>
    </nav>
  );
};

export default Navbar;