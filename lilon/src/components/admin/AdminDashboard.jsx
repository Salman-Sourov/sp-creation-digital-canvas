// src\components\admin\AdminDashboard.jsx
import React, { useState } from 'react';
import { Container, Row, Col, Card } from 'react-bootstrap';
import { Link, useNavigate } from 'react-router-dom';
import { FaHome, FaInfoCircle, FaBars, FaTimes, FaSignOutAlt } from 'react-icons/fa';
import axios from 'axios';
// import './AdminDashboard.css';
import './adminStyles.css';


const AdminDashboard = () => {
  const [sidebarOpen, setSidebarOpen] = useState(true);
  const navigate = useNavigate();

  const toggleSidebar = () => {
    setSidebarOpen(!sidebarOpen);
  };

  const handleLogout = async () => {
    try {
      const token = localStorage.getItem('access_token');
  
      if (!token) {
        console.error("No token found, redirecting to login...");
        navigate('/login');
        return;
      }
  
      const response = await axios.post(
        'http://127.0.0.1:8000/api/logout', 
        {}, 
        {
          headers: {
            Authorization: `Bearer ${token}`,
            Accept: "application/json",
          },
        }
      );
  
      console.log("Logout response:", response.data);
  
      if (response.data.status) {
        localStorage.removeItem('access_token');
        navigate('/login');
      } else {
        console.error("Logout failed:", response.data.message);
      }
    } catch (error) {
      console.error("Error logging out:", error.response?.data || error.message);
      alert("Failed to logout. Please try again.");
    }
  };
  

  return (
    <div className="admin-dashboard">
      {/* Mobile Menu Toggle */}
      <div className="mobile-toggle" onClick={toggleSidebar}>
        {sidebarOpen ? <FaTimes /> : <FaBars />}
      </div>

      {/* Logout Button */}
      <button className="logout-button" onClick={handleLogout}>
        <FaSignOutAlt /> Logout
      </button>

      {/* Sidebar */}
      <div className={`sidebar ${sidebarOpen ? 'open' : ''}`}>
        <div className="sidebar-header">
          <h3>Admin Panel</h3>
        </div>
        <nav className="sidebar-nav">
          <ul>
            <li>
              <Link to="/admin" className="active">
                <FaHome /> Home
              </Link>
            </li>
            <li>
              <Link to="/admin/about">
                <FaInfoCircle /> About
              </Link>
            </li>
          </ul>
        </nav>
      </div>

      {/* Main Content */}
      <div className={`main-content ${sidebarOpen ? 'shifted' : ''}`}>
        <Container fluid>
          <Row className="mb-4">
            <Col>
              <h1 className="dashboard-title">Admin Dashboard</h1>
            </Col>
          </Row>
          
          <Row>
            <Col md={3}>
              <Card className="dashboard-card">
                <Card.Body>
                  <Card.Title>Total Users</Card.Title>
                  <Card.Text className="dashboard-stat">1,234</Card.Text>
                </Card.Body>
              </Card>
            </Col>
            
            <Col md={3}>
              <Card className="dashboard-card">
                <Card.Body>
                  <Card.Title>Total Projects</Card.Title>
                  <Card.Text className="dashboard-stat">56</Card.Text>
                </Card.Body>
              </Card>
            </Col>
            
            <Col md={3}>
              <Card className="dashboard-card">
                <Card.Body>
                  <Card.Title>Messages</Card.Title>
                  <Card.Text className="dashboard-stat">89</Card.Text>
                </Card.Body>
              </Card>
            </Col>
            
            <Col md={3}>
              <Card className="dashboard-card">
                <Card.Body>
                  <Card.Title>Analytics</Card.Title>
                  <Card.Text className="dashboard-stat">5.2K</Card.Text>
                </Card.Body>
              </Card>
            </Col>
          </Row>

          <Row className="mt-4">
            <Col md={8}>
              <Card className="dashboard-card">
                <Card.Body>
                  <Card.Title>Recent Activities</Card.Title>
                  <div className="activity-list">
                    <div className="activity-item">
                      <p>New project added: Portfolio Website</p>
                      <small>2 hours ago</small>
                    </div>
                    <div className="activity-item">
                      <p>Message received from client</p>
                      <small>5 hours ago</small>
                    </div>
                    <div className="activity-item">
                      <p>Project status updated: E-commerce Site</p>
                      <small>1 day ago</small>
                    </div>
                  </div>
                </Card.Body>
              </Card>
            </Col>
            
            <Col md={4}>
              <Card className="dashboard-card">
                <Card.Body>
                  <Card.Title>Quick Actions</Card.Title>
                  <div className="quick-actions">
                    <button className="action-btn">Add New Project</button>
                    <button className="action-btn">View Messages</button>
                    <button className="action-btn">Update Profile</button>
                  </div>
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      </div>
    </div>
  );
};

export default AdminDashboard;
