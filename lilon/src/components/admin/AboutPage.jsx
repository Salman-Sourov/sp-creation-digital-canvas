// src\components\admin\AboutPage.jsx
import React, { useState } from 'react';
import { Container, Row, Col, Form, Button, Card } from 'react-bootstrap';
import { FaSave, FaHome, FaInfoCircle, FaBars, FaTimes, FaSignOutAlt } from 'react-icons/fa';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
// import './AboutPage.css';
import './adminStyles.css';

const AboutPage = () => {
  const [sidebarOpen, setSidebarOpen] = useState(true);
  const [formData, setFormData] = useState({
    title: '',
    subtitle: '',
    description: '',
    skills: '',
    experience: '',
    education: ''
  });
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

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prevState => ({
      ...prevState,
      [name]: value
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('Form submitted:', formData);
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
              <h1 className="page-title">About Page Management</h1>
              <p className="text-muted">Update your about page content here</p>
            </Col>
          </Row>

          <Row>
            <Col>
              <Card className="form-card">
                <Card.Body>
                  <Form onSubmit={handleSubmit}>
                    <Row>
                      <Col md={6}>
                        <Form.Group className="mb-4">
                          <Form.Label>Title</Form.Label>
                          <Form.Control
                            type="text"
                            name="title"
                            value={formData.title}
                            onChange={handleChange}
                            placeholder="Enter main title"
                          />
                        </Form.Group>
                      </Col>
                      
                      <Col md={6}>
                        <Form.Group className="mb-4">
                          <Form.Label>Subtitle</Form.Label>
                          <Form.Control
                            type="text"
                            name="subtitle"
                            value={formData.subtitle}
                            onChange={handleChange}
                            placeholder="Enter subtitle"
                          />
                        </Form.Group>
                      </Col>
                    </Row>

                    <Form.Group className="mb-4">
                      <Form.Label>Description</Form.Label>
                      <Form.Control
                        as="textarea"
                        rows={4}
                        name="description"
                        value={formData.description}
                        onChange={handleChange}
                        placeholder="Enter your description"
                      />
                    </Form.Group>

                    <Form.Group className="mb-4">
                      <Form.Label>Skills</Form.Label>
                      <Form.Control
                        as="textarea"
                        rows={3}
                        name="skills"
                        value={formData.skills}
                        onChange={handleChange}
                        placeholder="Enter your skills (comma separated)"
                      />
                    </Form.Group>

                    <Form.Group className="mb-4">
                      <Form.Label>Experience</Form.Label>
                      <Form.Control
                        as="textarea"
                        rows={4}
                        name="experience"
                        value={formData.experience}
                        onChange={handleChange}
                        placeholder="Enter your work experience"
                      />
                    </Form.Group>

                    <Form.Group className="mb-4">
                      <Form.Label>Education</Form.Label>
                      <Form.Control
                        as="textarea"
                        rows={3}
                        name="education"
                        value={formData.education}
                        onChange={handleChange}
                        placeholder="Enter your education background"
                      />
                    </Form.Group>

                    <div className="text-end">
                      <Button type="submit" variant="primary" className="save-button">
                        <FaSave className="me-2" /> Save Changes
                      </Button>
                    </div>
                  </Form>
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      </div>
    </div>
  );
};

export default AboutPage;
