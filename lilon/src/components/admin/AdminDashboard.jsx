// src/components/admin/AdminDashboard.jsx
import React from 'react';
import './adminStyles.css';

const AdminDashboard = () => {
  return (
    <div className="dashboard-container">
      <div className="dashboard-stats">
        <div className="stat-card">
          <h3>Total Users</h3>
          <p>1,234</p>
        </div>
        <div className="stat-card">
          <h3>Total Projects</h3>
          <p>56</p>
        </div>
        <div className="stat-card">
          <h3>Messages</h3>
          <p>89</p>
        </div>
        <div className="stat-card">
          <h3>Analytics</h3>
          <p>5.2K</p>
        </div>
      </div>

      <div className="dashboard-content">
        <div className="recent-activities">
          <h2>Recent Activities</h2>
          {/* Add your recent activities list here */}
        </div>
        
        <div className="quick-actions">
          <h2>Quick Actions</h2>
          <button className="action-btn">Add New Project</button>
          <button className="action-btn">View Messages</button>
          <button className="action-btn">Update Profile</button>
        </div>
      </div>
    </div>
  );
};

export default AdminDashboard;