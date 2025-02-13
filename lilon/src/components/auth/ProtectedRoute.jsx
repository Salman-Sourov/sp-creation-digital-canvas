import { Navigate, useLocation } from 'react-router-dom';
import { useEffect, useState } from 'react';

const ProtectedRoute = ({ children }) => {
  const location = useLocation();
  const [isAuthenticated, setIsAuthenticated] = useState(() => {
    const token = localStorage.getItem('access_token');
    const user = localStorage.getItem('user');
    return !!(token && user); // Convert to boolean
  });

  useEffect(() => {
    const token = localStorage.getItem('access_token');
    const user = localStorage.getItem('user');
    setIsAuthenticated(!!(token && user));
  }, [location]);

  if (!isAuthenticated) {
    return <Navigate to="/login" state={{ from: location }} replace />;
  }

  return children;
};

export default ProtectedRoute;
