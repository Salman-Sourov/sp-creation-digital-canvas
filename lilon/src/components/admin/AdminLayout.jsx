// src/components/admin/AdminLayout.jsx
import React from 'react';
import { Outlet } from 'react-router-dom';
import Sidebar from './Sidebar'; 
import './adminStyles.css'; 

const AdminLayout = () => {
  return (
    <div style={{ display: 'flex' }}>
      <Sidebar />
      <div style={{ flexGrow: 1, padding: '20px' }}>
        <Outlet />
      </div>
    </div>
  );
};

export default AdminLayout;
