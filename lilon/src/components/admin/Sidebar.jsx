// In Sidebar.jsx
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { FaHome, FaUserAlt, FaCog } from 'react-icons/fa';

const Sidebar = () => {
    const [isOpen, setIsOpen] = useState(false);

    const toggleSidebar = () => {
        setIsOpen(!isOpen);
    };

    return (
        <div className={`sidebar ${isOpen ? 'open' : ''}`}>
            <div className="sidebar-header">
                <h3>Admin Panel</h3>
            </div>
            <div className="sidebar-nav">
                <ul>
                    <li>
                        <Link to="/home">
                            <FaHome />
                            <span>Home</span>
                        </Link>
                    </li>
                    <li>
                        <Link to="/profile">
                            <FaUserAlt />
                            <span>Profile</span>
                        </Link>
                    </li>
                    <li>
                        <Link to="/settings">
                            <FaCog />
                            <span>Settings</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    );
};

export default Sidebar;
