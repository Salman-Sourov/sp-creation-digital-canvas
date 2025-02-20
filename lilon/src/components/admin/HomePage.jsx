// src/components/admin/HomePage.jsx
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { ToastContainer } from 'react-toastify';

const HomePage = () => {
    const [formData, setFormData] = useState({
        logo: null,
        image: null
    });

    const [errors, setErrors] = useState({});

    const [previews, setPreviews] = useState({
        logo: null,
        image: null
    });

    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchHomeData();
    }, []);

    const fetchHomeData = async () => {
        try {
            const token = localStorage.getItem('access_token');
            const response = await axios.get('http://127.0.0.1:8000/api/get-home', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });
    
            const data = response.data;
    
            if (data.data.length > 0) {
                const homeData = data.data[0]; // Assuming you fetch multiple records but only need the first one
    
                setPreviews({
                    logo: homeData.logo ? homeData.logo : null, // Use direct URL from API
                    image: homeData.image ? homeData.image : null // Use direct URL from API
                });
            } else {
                setPreviews({
                    logo: null,
                    image: null
                });
            }
        } catch (error) {
            console.error('Error fetching home page data:', error);
        } finally {
            setLoading(false);
        }
    };
    

    const handleFileChange = (e) => {
        const { name, files } = e.target;
        if (files.length > 0) {
            const selectedFile = files[0];
            setFormData(prev => ({ ...prev, [name]: selectedFile }));
    
            // Create preview
            const reader = new FileReader();
            reader.onloadend = () => {
                setPreviews(prev => ({ ...prev, [name]: reader.result }));
            };
            reader.readAsDataURL(selectedFile);
    
            // Debugging
            console.log(`${name} file selected:`, selectedFile);
        }
    };
    

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrors({});
    
        const formDataToSend = new FormData();
        if (formData.logo) formDataToSend.append('logo', formData.logo);
        if (formData.image) formDataToSend.append('image', formData.image);
    
        try {
            const token = localStorage.getItem('access_token');
            await axios.post('http://127.0.0.1:8000/api/store-home', formDataToSend, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data',
                },
            });
    
            toast.success('Home page updated successfully!'); // Success message
            fetchHomeData(); // Refresh preview after update
    
        } catch (error) {
            console.error('Error updating home page:', error);
            
            if (error.response && error.response.data.errors) {
                setErrors(error.response.data.errors);
                toast.error('Validation failed! Check inputs.');
            } else {
                toast.error('Failed to update home page.');
            }
        }
    };
    
    

    if (loading) {
        return <div className="loading">Loading...</div>;
    }

    return (
        <div className="home-page">
            <h2 className="mb-4">Edit Home Page</h2>
            <div className="row">
                {/* Form Column */}
                <div className="col-md-6">
                    <form onSubmit={handleSubmit} className="about-form">
                                <div className="form-group mb-3">
                                    <label className="form-label small">Logo</label>
                                    <input
                                        type="file"
                                        name="logo"
                                        onChange={handleFileChange}
                                        className="form-control form-control-sm"
                                        accept="image/*"
                                    />
                                    <small className="d-block mt-1" style={{ fontSize: '11px', color: 'yellow' }}>Size: 200x100px</small>
                                    {errors.logo && (
                                        <div className="text-danger mt-1" style={{ fontSize: '12px' }}>
                                            {errors.logo[0]}
                                        </div>
                                    )}
                                </div>
                        
                          
                                <div className="form-group mb-3">
                                    <label className="form-label small">Banner Image</label>
                                    <input
                                        type="file"
                                        name="image"
                                        onChange={handleFileChange}
                                        className="form-control form-control-sm"
                                        accept="image/*"
                                    />
                                    <small className="d-block mt-1" style={{ fontSize: '11px', color: 'yellow' }}>Size: 953x1369px</small>
                                    {errors.image && (
                                        <div className="text-danger mt-1" style={{ fontSize: '12px' }}>
                                            {errors.image[0]}
                                        </div>
                                    )}
                                </div>
                        
                        
                        <div className="text-end mt-2">
                            <button type="submit" className="btn btn-primary btn-md">
                                Update Home Page
                            </button>
                        </div>
                    </form>
                </div>

                {/* Preview Column */}
                <div className="col-md-6">
                    <div className="preview-section">
                        <div className="preview-item mb-4">
                            <h6 className="preview-label"></h6>
                            <div className="preview-image-container p-3">
                                {previews.logo ? (
                                    <img 
                                        src={previews.logo} 
                                        alt="Logo Preview" 
                                        className="img-fluid mb-3"
                                        style={{ maxHeight: '80px' }}
                                    />
                                ) : (
                                    <div className="text-center text-muted">
                                        No logo selected
                                    </div>
                                )}
                            </div>
                        </div>
                        <div className="preview-item">
                            <h6 className="preview-label"></h6>
                            <div className="preview-image-container p-3">
                                {previews.image ? (
                                    <img 
                                        src={previews.image} 
                                        alt="Banner Preview" 
                                        className="img-fluid"
                                        style={{ maxHeight: '80px' }}
                                    />
                                ) : (
                                    <div className="text-center text-muted">
                                        No banner image selected
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ToastContainer position="top-right" autoClose={1000} />
        </div>
    );
};

export default HomePage;