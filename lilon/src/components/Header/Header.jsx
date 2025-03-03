import PropTypes from 'prop-types';
import React, { useState, useEffect } from 'react';
import { Icon } from '@iconify/react';
import { Link } from 'react-router-dom';
import { Link as ScrollLink } from 'react-scroll';
import { socialData } from '../../data.json';
import axios from 'axios';

const Header = ({ data }) => {
  const [isOpen, setIsOpen] = useState(false);

  const handleMobileToggle = () => {
    setIsOpen(!isOpen);
  };

  const [previews, setPreviews] = useState({
    logo: localStorage.getItem('logo_url'),
    image: null
  });

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

            if (homeData.logo) {
                localStorage.setItem('logo_url', homeData.logo);
            }
            setPreviews({
                logo: homeData.logo,
                image: homeData.image
            });
        } else {
            localStorage.removeItem('logo_url');
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

  return (
    <header>
      {/* Mob header */}
      <div className="mob-header" onClick={handleMobileToggle}>
        <div className="mob-h-left">
          <Link className="navbar-brand" to="/">
            <img className="logo-dark" title="" alt="SP Creation" src={previews.logo} />
            <img className="logo-light" title="" alt="SP Creation" src={previews.logo} />
          </Link>
        </div>
        <div className="mob-h-right">
          <button className="toggler-menu">
            <span />
          </button>
        </div>
      </div>
      {/* End */}
      {/* Header Top */}
      <div
        className={`header-left-fixed one-page-nav ${
          isOpen ? 'menu-open' : ''
        }`}
      >
        {/* Brand */}
        <div className="logo">
          <Link className="navbar-brand" to="/">
            <img
              className="logo-dark"
              title="Lilon"
              alt="SP Creation"
              src={previews.logo}
            />
            <img
              className="logo-light"
              title="Lilon"
              alt="SP Creation"
              src={previews.logo}
            />
          </Link>
        </div>
        {/* / */}
        <ul className="main-menu">
          <li>
            <ScrollLink
              to="home"
              spy={true}
              duration={500}
              onClick={() => setIsOpen(false)}
            >
              Home
            </ScrollLink>
          </li>
          <li>
            <ScrollLink
              to="about"
              spy={true}
              duration={500}
              onClick={() => setIsOpen(false)}
            >
              About
            </ScrollLink>
          </li>
          {/* <li>
            <ScrollLink
              to="services"
              spy={true}
              duration={500}
              onClick={() => setIsOpen(false)}
            >
              Services
            </ScrollLink>
          </li> */}
          <li>
            <ScrollLink
              to="work"
              spy={true}
              duration={500}
              onClick={() => setIsOpen(false)}
            >
              Portfolio
            </ScrollLink>
          </li>
          <li>
            <ScrollLink
              to="blog"
              spy={true}
              duration={500}
              onClick={() => setIsOpen(false)}
            >
              Blog
            </ScrollLink>
          </li>
          <li>
            <ScrollLink
              to="contact"
              spy={true}
              duration={500}
              onClick={() => setIsOpen(false)}
            >
              Contact
            </ScrollLink>
          </li>
        </ul>
        <ul className="nav social-link">
          {socialData.map((element, index) => (
            <li key={index}>
              <a href={element.link} target="_blank" rel="noopener noreferrer">
                <Icon icon={`fa6-brands:${element.icon}`} />
              </a>
            </li>
          ))}
        </ul>
      </div>
      {/* End Header Top */}
    </header>
  );
};

Header.propTypes = {
  data: PropTypes.object,
};

export default Header;
