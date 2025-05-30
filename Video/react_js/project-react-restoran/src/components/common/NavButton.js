import { Link } from 'react-router-dom';

const NavButton = ({ to, icon, children }) => (
  <Link 
    to={to} 
    className="btn btn-outline-primary rounded-pill px-4 py-2 mx-2"
  >
    <i className={`fas fa-${icon} me-2`}></i>
    {children}
  </Link>
);

export default NavButton;