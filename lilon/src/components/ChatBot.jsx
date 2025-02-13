import React, { useState } from 'react';
import { FaRobot, FaTimes } from 'react-icons/fa';
import './ChatBot.css';

const ChatBot = () => {
  const [isOpen, setIsOpen] = useState(false);

  const toggleChat = () => {
    setIsOpen(!isOpen);
  };

  return (
    <div className="chatbot-container">
      {isOpen && (
        <div className="chat-window">
          <div className="chat-header">
            <div className="chat-title">
              <FaRobot className="robot-icon" />
              <span>Chat with us</span>
            </div>
            <button className="close-button" onClick={toggleChat}>
              <FaTimes />
            </button>
          </div>
          <div className="chat-messages">
            <div className="message bot-message">
              👋 Hi! How can I help you today?
            </div>
            {/* Add more messages here */}
          </div>
          <div className="chat-input">
            <input 
              type="text" 
              placeholder="Type your message..."
              onKeyPress={(e) => {
                if (e.key === 'Enter') {
                  // Handle message send
                }
              }}
            />
          </div>
        </div>
      )}
      <button 
        className={`chatbot-button ${isOpen ? 'active' : ''}`} 
        onClick={toggleChat}
      >
        <FaRobot />
        {!isOpen && <span className="chat-notification">👋</span>}
      </button>
    </div>
  );
};

export default ChatBot;
