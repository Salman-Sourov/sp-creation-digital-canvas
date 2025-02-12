import { useState } from "react";
import { Button, Form, Container, Row, Col, Card, InputGroup, Alert } from "react-bootstrap";
import { FaEnvelope, FaLock } from "react-icons/fa";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import "./Login.css";

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
      const response = await axios.post("http://127.0.0.1:8000/api/login", formData, {
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
      });

      if (response.data.token) {
        // Store the access token and user data
        localStorage.setItem("access_token", response.data.token);
        localStorage.setItem("user", JSON.stringify(response.data.user));

        // Set default Authorization header
        axios.defaults.headers.common["Authorization"] = `Bearer ${response.data.token}`;

        // Redirect to admin dashboard
        navigate("/admin");
      } else {
        setError("Invalid credentials. Please try again.");
      }
    } catch (error) {
      console.error("Login Error:", error);

      if (error.response) {
        setError(error.response.data.message || "Authentication failed. Please try again.");
      } else if (error.request) {
        setError("Network error. Please check your connection and try again.");
      } else {
        setError("An unexpected error occurred. Please try again.");
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
        <Row className="justify-content-center align-items-center min-vh-100">
          <Col md={6} lg={5}>
            <Card className="shadow-lg border-0">
              <Card.Body className="p-5">
                <h2 className="text-center mb-4">Admin Login</h2>

                {error && (
                  <Alert variant="danger" className="mb-4">
                    {error}
                  </Alert>
                )}

                <Form onSubmit={handleSubmit}>
                  <Form.Group className="mb-4">
                    <InputGroup>
                      <InputGroup.Text className="bg-light">
                        <FaEnvelope />
                      </InputGroup.Text>
                      <Form.Control
                        type="email"
                        name="email"
                        placeholder="Email address"
                        value={formData.email}
                        onChange={handleChange}
                        required
                        disabled={loading}
                      />
                    </InputGroup>
                  </Form.Group>

                  <Form.Group className="mb-4">
                    <InputGroup>
                      <InputGroup.Text className="bg-light">
                        <FaLock />
                      </InputGroup.Text>
                      <Form.Control
                        type="password"
                        name="password"
                        placeholder="Password"
                        value={formData.password}
                        onChange={handleChange}
                        required
                        disabled={loading}
                      />
                    </InputGroup>
                  </Form.Group>

                  <Button type="submit" variant="primary" className="w-100 py-2" disabled={loading}>
                    {loading ? "Logging in..." : "Login"}
                  </Button>
                </Form>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Container>
    </div>
  );
};

export default Login;
