import PropTypes from 'prop-types';
import SectionHeading from '../SectionHeading/SectionHeading';
import perser from 'html-react-parser';
import { Icon } from '@iconify/react';
import { useState, useEffect } from 'react';
import axios from 'axios';

const About = ({ data }) => {
  const [apiData, setApiData] = useState({
    ImgLink: '',
    aboutText: '',
    note: '',
  });
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  // Fetch data from the API
  useEffect(() => {
    const fetchData = async () => {
      try {
        // // Check if data exists in local storage
        // const storedData = localStorage.getItem('aboutData');
        // if (storedData) {
        //   // Use data from local storage
        //   setApiData(JSON.parse(storedData));
        //   setLoading(false);
        //   return;
        // }

        // Fetch data from the API
        const response = await axios.get('http://127.0.0.1:8000/api/get-about');
        const apiResponse = response.data.data; // Access the nested "data" object

        // Map API response to component state
        const newData = {
          ImgLink: apiResponse.image ? `http://127.0.0.1:8000/${apiResponse.image}` : '',
          aboutText: apiResponse.description || '',
          note: apiResponse.quote || '',
        };

        // Save data to local storage
        localStorage.setItem('aboutData', JSON.stringify(newData));

        // Update state with the new data
        setApiData(newData);
      } catch (err) {
        setError('Failed to fetch data from the API.');
        console.error('Error fetching data:', err);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  if (loading) {
    return <div>Loading...</div>;
  }

  if (error) {
    return <div>{error}</div>;
  }

  const { aboutLeft, aboutRight } = data;
  const { name, designation, resumeCv } = aboutLeft;
  const { contactInfo, archivement } = aboutRight;

  return (
    <section id="about" className="section about-section">
      <div className="container">
        <SectionHeading title="WELCOME TO..." subTitle="Nice to meet you!" />
        <div
          className="row gy-4"
          data-aos="fade-up"
          data-aos-duration="800"
          data-aos-delay="500"
        >
          <div className="col-lg-5">
            <div className="about-left">
              <div className="about-avatar">
                <img src={apiData.ImgLink} alt="Thumb" />
              </div>
              <h3>{name}</h3>
              <p>{perser(designation)}</p>
            </div>
          </div>
          <div className="col-lg-7 ps-xl-5">
            <div className="about-bio">
              <p>{apiData.aboutText}</p>
            </div>
            <div className="about-contact row gx-lg-5">
              {contactInfo.map((element, index) => (
                <div className={`col-sm-${index === 0 ? '4' : '8'}`} key={index}>
                  <p>
                    <Icon icon={`bi:${element.icon}`} />{' '}
                    <span>{element.data}</span>
                  </p>
                </div>
              ))}
            </div>
            <div className="about-exp">
              <blockquote>
                <Icon icon="fa6-solid:quote-left" />
                <p>{apiData.note}</p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

About.propTypes = {
  data: PropTypes.object,
};

export default About;