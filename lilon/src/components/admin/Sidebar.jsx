// src/components/admin/Sidebar.jsx
import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { FaHome, FaInfoCircle, FaEdit } from 'react-icons/fa';

const Sidebar = () => {
    const location = useLocation();

    return (
        <div className="sidebar">
            <div className="sidebar-header">
                <h3>Admin Panel</h3>
            </div>
            <nav className="sidebar-nav">
                <ul>
                    <li>
                        <Link to="/admin" className={location.pathname === '/admin' ? 'active' : ''}>
                            <FaHome /> Dashboard
                        </Link>
                    </li>

                    <li>
                        <Link to="/admin/home" className={location.pathname === '/admin/home' ? 'active' : ''}>
                            <FaEdit /> Home
                        </Link>
                    </li>
                    <li>
                        <Link to="/admin/about" className={location.pathname === '/admin/about' ? 'active' : ''}>
                            <FaInfoCircle /> About
                        </Link>
                    </li>
                </ul>
            </nav>
        </div>
    );
};

export default Sidebar;