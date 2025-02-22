// src/App.jsx
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Layout from './components/Layout/Layout';
import Home from './pages/Home';
import './sass/style.scss';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle';
import { useEffect } from 'react';
import Aos from 'aos';
import 'aos/dist/aos.css';
import Login from './pages/Login';
import AdminDashboard from './components/admin/AdminDashboard';
import AboutPage from './components/admin/AboutPage';
import HomePage from './components/admin/HomePage';
import ProtectedRoute from './components/auth/ProtectedRoute';
import AdminLayout from './components/admin/AdminLayout';


const App = () => {
  useEffect(() => {
    Aos.init({ once: true });
  }, []);

  return (
    <BrowserRouter>
      <Routes>
        {/* Public Routes */}
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
        </Route>

        <Route path="/login" element={<Login />} />

        {/* Protected Admin Routes */}
        <Route
          path="/admin"
          element={
            <ProtectedRoute>
              <AdminLayout />
            </ProtectedRoute>
          }
        >
          <Route index element={<AdminDashboard />} />
          <Route path="about" element={<AboutPage />} />
          <Route path="home" element={<HomePage />} />
          {/* Add more admin routes here as needed */}
        </Route>
      </Routes>
    </BrowserRouter>
  );
};

export default App;