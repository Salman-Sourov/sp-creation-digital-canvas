// src/components/admin/AboutPage.jsx
import React, { useState } from 'react';
import axios from 'axios';

const AboutPage = () => {
    const [formData, setFormData] = useState({
        title: '',
        description: '',
        image: null
    });

    const [imagePreview, setImagePreview] = useState(null);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    const handleImageChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setFormData(prev => ({
                ...prev,
                image: file
            }));
            
            // Create image preview
            const reader = new FileReader();
            reader.onloadend = () => {
                setImagePreview(reader.result);
            };
            reader.readAsDataURL(file);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        const formDataToSend = new FormData();
        formDataToSend.append('title', formData.title);
        formDataToSend.append('description', formData.description);
        if (formData.image) {
            formDataToSend.append('image', formData.image);
        }

        try {
            const token = localStorage.getItem('access_token');
            await axios.post('http://127.0.0.1:8000/api/about', formDataToSend, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data'
                }
            });
            alert('About page updated successfully!');
        } catch (error) {
            console.error('Error updating about page:', error);
            alert('Failed to update about page');
        }
    };

    return (
        <div className="about-page col-sm-12">
            {/* <h2>Edit About Page</h2> */}
            <form onSubmit={handleSubmit} className="col-md-6 col-sm-12">
                <div className="form-group">
                    <label>"Quotation"</label>
                    <input
                        type="text"
                        name="title"
                        value={formData.title}
                        onChange={handleInputChange}
                        required
                    />
                </div>
                <div className="form-group">
                    <label>Description</label>
                    <textarea
                        name="description"
                        value={formData.description}
                        onChange={handleInputChange}
                        required
                    />
                </div>
                <div className="form-group ">
                    <label>Image</label>
                    <div className="file-upload-container">
                        <input
                            type="file"
                            accept="image/*"
                            onChange={handleImageChange}
                            id="image-upload"
                            className="file-upload-input"
                        />
                        <label htmlFor="image-upload" className="file-upload-label">
                            <svg className="upload-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                            </svg>
                            <span>Choose an image</span>
                            <span className="file-info">or drag and drop here</span>
                        </label>
                    </div>
                    {imagePreview && (
                        <div className="image-preview">
                            <img src={imagePreview} alt="Preview" style={{ maxWidth: '200px', marginTop: '10px', borderRadius: '4px' }} />
                        </div>
                    )}
                </div>
                <button type="submit" className="submit-btn">Update About Page</button>
            </form>
        </div>
    );
};

export default AboutPage;