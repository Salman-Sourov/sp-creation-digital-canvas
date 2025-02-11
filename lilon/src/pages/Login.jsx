import { useState } from "react";
import { Button, Form, Container, Row, Col, Card, InputGroup, Alert } from "react-bootstrap";
import { FaEnvelope, FaLock } from "react-icons/fa";
import { useNavigate } from "react-router-dom";
import "./Login.css";
import axios from "axios";

const Login = () => {
  const [formData, setFormData] = useState({ email: "", password: "" });
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");
    setLoading(true);

    try {
      // First, get the CSRF cookie from Laravel
      await axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie', {
        withCredentials: true,
        headers: {
          'Accept': 'application/json',
          'Access-Control-Allow-Origin': 'http://127.0.0.1:8000'
        }
      });

      // Then make the login request
      const response = await axios.post('http://127.0.0.1:8000/api/login', formData, {
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Access-Control-Allow-Origin': 'http://127.0.0.1:8000'
        },
        withCredentials: true
      });

      console.log('Login Response:', response.data); // Debug log

      if (response.data.status) {
        localStorage.setItem('user', JSON.stringify(response.data.user));
        window.location.href = `http://127.0.0.1:8000${response.data.dashboard_url}`;
      } else {
        setError('Authentication failed. Please try again.');
      }
    } catch (error) {
      console.error('Login Error Details:', {
        message: error.message,
        response: error.response?.data,
        status: error.response?.status,
        headers: error.response?.headers
      });

      if (error.response) {
        // Server responded with an error
        setError(`Server Error (${error.response.status}): ${error.response.data.message || JSON.stringify(error.response.data)}`);
      } else if (error.request) {
        // Request was made but no response
        setError('No response from server. Please ensure:\n1. Laravel server is running (php artisan serve)\n2. API URL is correct (http://127.0.0.1:8000)\n3. CORS is properly configured in Laravel');
      } else {
        // Error in request setup
        setError(`Request Error: ${error.message}`);
      }
    } finally {
      setLoading(false);
    }
  };

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  return (
    <div className="login-container">
      <Container>
        <h2 className="text-center text-white mb-4">ACCOUNT LOGIN</h2>
        <div className="login-wrapper">
          <Card className="login-card">
            <Card.Body>
              {error && <Alert variant="danger">{error}</Alert>}
              <Form onSubmit={handleSubmit}>
                <Row>
                  {/* Email Field */}
                  <Col md={6} className="border-end pe-4">
                    <Form.Group className="mb-3">
                      <Form.Label className="fw-bold">Email</Form.Label>
                      <InputGroup>
                        <InputGroup.Text><FaEnvelope /></InputGroup.Text>
                        <Form.Control
                          type="email"
                          name="email"
                          placeholder="Enter email"
                          value={formData.email}
                          onChange={handleChange}
                          required
                          disabled={loading}
                        />
                      </InputGroup>
                    </Form.Group>
                  </Col>

                  {/* Password Field */}
                  <Col md={6} className="ps-4">
                    <Form.Group className="mb-3">
                      <Form.Label className="fw-bold">Password</Form.Label>
                      <InputGroup>
                        <InputGroup.Text><FaLock /></InputGroup.Text>
                        <Form.Control
                          type="password"
                          name="password"
                          placeholder="Enter password"
                          value={formData.password}
                          onChange={handleChange}
                          required
                          disabled={loading}
                        />
                      </InputGroup>
                    </Form.Group>
                  </Col>
                </Row>
                <Button 
                  type="submit" 
                  className="login-button w-100" 
                  disabled={loading}
                >
                  {loading ? "SIGNING IN..." : "SIGN IN"}
                </Button>
              </Form>
            </Card.Body>
          </Card>
        </div>
      </Container>
    </div>
  );
};

export default Login;
