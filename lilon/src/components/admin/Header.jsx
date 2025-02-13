// src/components/admin/Header.jsx
import React from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import './adminStyles.css';

const Header = () => {
    const navigate = useNavigate();

    const handleLogout = async () => {
        try {
            const token = localStorage.getItem('access_token');
            if (!token) {
                navigate('/login');
                return;
            }

            await axios.post('http://127.0.0.1:8000/api/logout', {}, {
                headers: {
                    Authorization: `Bearer ${token}`,
                    Accept: "application/json",
                }
            });

            localStorage.removeItem('access_token');
            navigate('/login');
        } catch (error) {
            console.error('Logout failed:', error);
            localStorage.removeItem('access_token');
            navigate('/login');
        }
    };

    return (
        <header className="admin-header">
            <div className="header-content">
                <h1>SP Creation</h1>
                <button onClick={handleLogout} className="logout-btn">
                    Logout
                </button>
            </div>
        </header>
    );
};

export default Header;