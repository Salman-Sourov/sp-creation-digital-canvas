import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Layout from './components/Layout/Layout';
import Home from './pages/Home';
import './sass/style.scss';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle';
import { useEffect } from 'react';
import Aos from 'aos';
import 'aos/dist/aos.css';
import Login from './pages/Login';

const App = () => {
  useEffect(() => {
    Aos.init({ once: true });
  }, []);
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
        </Route>

        <Route path="/login" element={<Login />}>
        </Route>

      </Routes>
    </BrowserRouter>
  );
};

export default App;
