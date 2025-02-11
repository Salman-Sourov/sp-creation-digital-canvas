import logoDark from '@/assets/images/logo-dark.png';
import logo from '@/assets/images/logo.png';
import PageBreadcrumb from '@/components/PageBreadcrumb';
import IconifyIcon from '@/components/wrappers/IconifyIcon';
import { Card, Col, Row } from 'react-bootstrap';
const Error404Page = () => {
  return <>
    <PageBreadcrumb title='Error 404' />
    <div className="auth-bg d-flex min-vh-100">
      <Row className="g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
        <Col xxl={3} lg={5} md={6}>
          <a href="/'" className="auth-brand d-flex justify-content-center mb-2">
            <img src={logoDark} alt="dark logo" height={26} className="logo-dark" />
            <img src={logo} alt="logo light" height={26} className="logo-light" />
          </a>
          <p className="fw-semibold mb-4 text-center text-muted fs-15">Admin Panel Design by Coderthemes</p>
          <Card className="overflow-hidden text-center p-xxl-4 p-3 mb-0">
            <div className="text-center">
              <h1 className="text-error">404</h1>
              <h3 className="mt-3 mb-2">Page not Found</h3>
              <p className="text-muted mb-3">It's looking like you may have taken a wrong turn. Don't
                worry... it happens to
                the best of us. You might want to check your internet connection. Here's a little
                tip that might
                help you get back on track.</p>
              <a href="/'" className="btn btn-danger">
                <IconifyIcon icon='tabler:home' className="fs-16 me-1" /> Back to Home
              </a>
            </div>
          </Card>
          <p className="mt-4 text-center mb-0">
            © Adminto - By <span className="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
          </p>
        </Col>
      </Row>
    </div>
    </>;
};
export default Error404Page;