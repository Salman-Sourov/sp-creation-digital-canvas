// src/App.js
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
import ProtectedRoute from './components/auth/ProtectedRoute';
import AdminLayout from './components/admin/AdminLayout'; // Import Admin Layout

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

        {/* Protected Admin Routes with Admin Layout */}
        <Route path="/admin" element={
          <ProtectedRoute>
            <AdminLayout /> {/* Use AdminLayout for admin routes */}
          </ProtectedRoute>
        }>
          <Route index element={<AdminDashboard />} />
          <Route path="about" element={<AboutPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
};

export default App;
