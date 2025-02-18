import React from 'react';
import { Outlet } from 'react-router-dom';
import Sidebar from './Sidebar';
import Header from './Header';
import './adminStyles.css';

const AdminLayout = () => {
  return (
      <div className="admin-layout">
          <Sidebar />
          <div className="main-content">
              <Header />
              <Outlet />
          </div>
      </div>
  );
};

export default AdminLayout;