import { Navigate, useLocation } from 'react-router-dom';

const ProtectedRoute = ({ children }) => {
  const location = useLocation();

  // Check if user is authenticated
  const isAuthenticated = () => {
    const user = localStorage.getItem('user');
    return user !== null;
  };

  if (!isAuthenticated()) {
    // Redirect to login page with return url
    return <Navigate to="/login" state={{ from: location }} replace />;
  }

  return children;
};

export default ProtectedRoute;

