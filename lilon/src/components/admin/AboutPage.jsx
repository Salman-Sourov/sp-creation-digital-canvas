import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { ToastContainer } from 'react-toastify';

const AboutPage = () => {
    const [formData, setFormData] = useState({
        quote: '',
        description: '',
        image: null
    });

    const [imagePreview, setImagePreview] = useState(null);
    const [loading, setLoading] = useState(true); // Loading state
    const [errors, setErrors] = useState({}); // Error state

    // Fetch initial data
    useEffect(() => {
        fetchAboutData();
    }, []);

    const fetchAboutData = async () => {
        try {
            const token = localStorage.getItem('access_token');
            const response = await axios.get('http://127.0.0.1:8000/api/get-about', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            const data = response.data.data; // Access the nested "data" object

            if (data) {
                setFormData({
                    quote: data.quote || '',
                    description: data.description || '',
                    image: null // Reset image file (use preview URL instead)
                });
                setImagePreview(data.image ? `http://127.0.0.1:8000/${data.image}` : null); // Set full image URL for preview
            }
        } catch (error) {
            console.error('Error fetching about page data:', error);
            toast.error('Failed to fetch about page data.');
        } finally {
            setLoading(false); // Stop loading
        }
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
        // Clear errors when the user starts typing
        setErrors(prev => ({ ...prev, [name]: '' }));
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

            // Clear errors when the user selects a file
            setErrors(prev => ({ ...prev, image: '' }));
        }
    };

    const validateForm = () => {
        const newErrors = {};

        if (!formData.quote.trim()) {
            newErrors.quote = ['Quotation is required.'];
        }
        if (!formData.description.trim()) {
            newErrors.description = ['Description is required.'];
        }
        // if (!formData.image) {
        //     newErrors.image = ['Image is required.'];
        // }

        setErrors(newErrors);
        return Object.keys(newErrors).length === 0; // Return true if no errors
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        // Validate form before submission
        if (!validateForm()) {
            toast.error('Please fill in all required fields.');
            return;
        }

        // //setLoading(true); // Start loading
        setErrors({}); // Reset errors

        const formDataToSend = new FormData();
        formDataToSend.append('quote', formData.quote);
        formDataToSend.append('description', formData.description);
        if (formData.image) {
            formDataToSend.append('image', formData.image);
        }

        try {
            const token = localStorage.getItem('access_token');
            await axios.post('http://127.0.0.1:8000/api/store-about', formDataToSend, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data'
                }
            });
            toast.success('About page updated successfully!');
            fetchAboutData(); // Refresh data after update
        } catch (error) {
            console.error('Error updating about page:', error);
            if (error.response && error.response.data.errors) {
                // Set validation errors from the API response
                setErrors(error.response.data.errors);
                toast.error('Validation failed! Please check the inputs.');
            } else {
                toast.error(`Failed to update about page: ${error.response?.data?.message || error.message}`);
            }
        } finally {
            setLoading(false); // Stop loading
        }
    };

    if (loading) {
        return <div className="loading">Loading...</div>;
    }

    return (
        <div className="about-page col-sm-12">
            <h2 className='mb-4'>Edit About Page</h2>
            <form onSubmit={handleSubmit} className="col-md-6 col-sm-12">
                {/* Quotation Field */}
                <div className="form-group">
                    <label>Quotation</label>
                    <input
                        type="text"
                        name="quote"
                        value={formData.quote}
                        onChange={handleInputChange}
                    />
                    {errors.quote && (
                        <div className="text-danger mt-1" style={{ fontSize: '12px' }}>
                            {errors.quote[0]}
                        </div>
                    )}
                </div>

                {/* Description Field */}
                <div className="form-group">
                    <label>Description</label>
                    <textarea
                        name="description"
                        value={formData.description}
                        onChange={handleInputChange}
                    />
                    {errors.description && (
                        <div className="text-danger mt-1" style={{ fontSize: '12px' }}>
                            {errors.description[0]}
                        </div>
                    )}
                </div>

                {/* Image Field */}
                <div className="form-group">
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
                        <small className="d-block mt-1" style={{ fontSize: '11px', color: 'yellow' }}>Size: 400 x 422px</small>
                    </div>
                    {errors.image && (
                        <div className="text-danger mt-1" style={{ fontSize: '12px' }}>
                            {errors.image[0]}
                        </div>
                    )}
                    {imagePreview && (
                        <div className="image-preview">
                            <img src={imagePreview} alt="Preview" style={{ maxWidth: '200px', marginTop: '10px', borderRadius: '4px' }} />
                        </div>
                    )}
                </div>

                {/* Submit Button */}
                <button type="submit" className="submit-btn" disabled={loading}>
                    {loading ? 'Updating...' : 'Update About Page'}
                </button>
            </form>
            <ToastContainer position="top-right" autoClose={1000} />
        </div>
    );
};

export default AboutPage;