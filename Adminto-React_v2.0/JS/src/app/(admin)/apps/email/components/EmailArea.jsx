import { emailsData } from '@/assets/data/social';
import amazonImg from '@/assets/images/brands/amazon.svg';
import avatar2 from '@/assets/images/users/avatar-2.jpg';
import IconifyIcon from '@/components/wrappers/IconifyIcon';
import useToggle from '@/hooks/useToggle';
import { Link } from 'react-router-dom';
import { useState } from 'react';
import { Card, CardBody, Col, Offcanvas, OffcanvasBody, OffcanvasHeader, OverlayTrigger, Row, Tooltip } from 'react-bootstrap';
import EmailNavigationMenu from './EmailNavigationMenu';
const EmailArea = () => {
  const [emails, setEmails] = useState(emailsData);
  const {
    isTrue,
    toggle
  } = useToggle();
  const {
    isTrue: isOpenCompose,
    toggle: isToggleCompose
  } = useToggle();
  const showAllEmails = () => {
    setEmails(emailsData);
  };

  /**
   * Shows the starred emails only
   */
  const showStarredEmails = () => {
    setEmails(emailsData.filter(e => e.isStar));
  };
  return <>
      <EmailNavigationMenu isOpenCompose={isOpenCompose} toggleCompose={isToggleCompose} showAllEmails={showAllEmails} showStarredEmails={showStarredEmails} />
      <Card className="flex-grow-1">
        <div className="border-start border-light h-100">
          <CardBody className="py-2">
            <div className="d-flex align-items-center gap-2">
              <button type="button" className="btn btn-light d-xxl-none d-flex p-1" data-bs-toggle="offcanvas" data-bs-target="#email-sidebar" aria-controls="email-sidebar">
                <IconifyIcon icon='tabler:menu-2' className="fs-17" />
              </button>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="flexCheckDefault" />
              </div>
              <div className="d-flex align-items-center">
                <OverlayTrigger placement="top" overlay={<Tooltip className="danger-tooltip">Mark as read</Tooltip>}>
                  <button type="button" className="btn btn-sm btn-icon btn-ghost-light text-dark rounded-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" data-bs-placement="top" data-bs-title="<span class='fs-12'>Mark as read</span>">
                    <IconifyIcon icon='ri:mail-open-line' className="fs-18" />
                  </button>
                </OverlayTrigger>
                <OverlayTrigger placement="top" overlay={<Tooltip className="danger-tooltip">Archive</Tooltip>}>
                  <button type="button" className="btn btn-sm btn-icon btn-ghost-light text-dark rounded-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" data-bs-placement="top" data-bs-title="<span class='fs-12'>Archive</span>">
                    <IconifyIcon icon='ri:inbox-archive-line' className="fs-18" />
                  </button>
                </OverlayTrigger>

                <OverlayTrigger placement="top" overlay={<Tooltip className="danger-tooltip">Delete</Tooltip>}>
                  <button type="button" className="btn btn-sm btn-icon btn-ghost-light text-dark rounded-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" data-bs-placement="top" data-bs-title="<span class='fs-12'>Delete</span>">
                    <IconifyIcon icon='tabler:trash' className="fs-18" />
                  </button>
                </OverlayTrigger>

                <OverlayTrigger placement="top" overlay={<Tooltip className="danger-tooltip">Report spam</Tooltip>}>
                  <button type="button" className="btn btn-icon btn-sm btn-ghost-light text-dark rounded-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" data-bs-placement="top" data-bs-title="<span class='fs-12'>Report spam</span>">
                    <IconifyIcon icon='ri:delete-bin-2-line' className="fs-18" />
                  </button>
                </OverlayTrigger>

              </div>
              <div className="ms-auto d-xl-flex d-none">
                <div className="app-search">
                  <input type="text" className="form-control rounded-pill" placeholder="Search mail..." />
                  <IconifyIcon icon='ri:search-line' className="fs-18 app-search-icon text-muted" />
                </div>
              </div>
            </div>
          </CardBody>
          <div className="border-top border-light">
            <div className="table-responsive">
              <table className="table table-hover mail-list mb-0">
                <tbody>
                  {emails.map((item, idx) => {
                  return <tr className="position-relative" key={idx} onClick={toggle}>
                          <td className="ps-3">
                            <input className="form-check-input position-relative z-2" type="checkbox" />
                          </td>
                          <td>
                            <button className="btn p-0 text-warning fs-16 flex-shrink-0">{item.isStar ? <IconifyIcon icon="tabler:star-filled" /> : <IconifyIcon icon="tabler:star" />}</button>
                          </td>
                          <td>
                            <div className="d-flex align-items-center gap-2">
                              <img src={item.image} alt="user avatar" className="avatar-md rounded-circle" />
                              <h5 className="fs-14 mb-0 fw-medium">
                                <Link to="#" className="link-reset text-truncate">{item.name}</Link>
                              </h5>
                            </div>
                          </td>
                          <td>
                            <Link data-bs-toggle="modal" to="#email-details-modal" role="button" aria-controls="email-details-modal" className="link-reset text-truncate fs-14 fw-semibold stretched-link">{item.subTitle}</Link>
                          </td>
                          <td>
                            <div>
                              <span className="fs-14 text-muted text-truncate mb-0"> {item.description}</span>
                            </div>
                          </td>
                          <td>
                            {item.isAttachment && <Link to="#" className="link-reset text-truncate text-nowrap"> <IconifyIcon icon="tabler:paperclip" /> {item.isAttachment} </Link>}
                          </td>
                          <td>
                            <p className="fs-12 text-muted mb-0 text-end text-truncate">
                              Jan 5, 3:45 PM
                            </p>
                          </td>
                          {item.variant && <td className="pe-3">
                              <IconifyIcon icon="solar:bolt-circle-bold-duotone" className={`text-${item.variant} fs-16 ms-2 align-middle`} />
                            </td>}
                        </tr>;
                })}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </Card>
      <Offcanvas show={isTrue} onHide={toggle} placement={'end'} className="offcanvas-end w-lg-50" tabIndex={-1} id="email-details-modal" aria-labelledby="email-details-modalLabel">
        <OffcanvasHeader className="d-flex flex-wrap gap-2 align-items-start">
          <img className="me-2 rounded-circle" src={avatar2} alt="placeholder image" height={40} />
          <div className="flex-grow-1">
            <h6 className="fs-16 mb-1">Steven Smith</h6>
            <p className="text-muted mb-0">From: jonathan@domain.com</p>
          </div>
          <div>
            <button type="button" className="btn-close" onClick={toggle} data-bs-dismiss="offcanvas" aria-label="Close" />
          </div>
        </OffcanvasHeader>
        <OffcanvasBody>
          <h5 className="fs-18">Your elite author Graphic Optimization reward is ready!</h5>
          <hr />
          <p>Hi Coderthemes!</p>
          <p>Clicking ‘Order Service’ on the right-hand side of the above page will present you
            with an order page. This service has the following Briefing Guidelines that will
            need to be filled before placing your order:</p>
          <ol>
            <li>Your design preferences (Color, style, shapes, Fonts, others) </li>
            <li>Tell me, why is your item different? </li>
            <li>Do you want to bring up a specific feature of your item? If yes, please tell me
            </li>
            <li>Do you have any preference or specific thing you would like to change or improve
              on your item page? </li>
            <li>Do you want to include your item's or your provider's logo on the page? if yes,
              please send it to me in vector format (Ai or EPS) </li>
            <li>Please provide me with the copy or text to display</li>
          </ol>
          <p>Filling in this form with the above information will ensure that they will be able to
            start work quickly.</p>
          <p>You can complete your order by putting your coupon code into the Promotional code box
            and clicking ‘Apply Coupon’.</p>
          <p><b>Best,</b> <br /> Graphic Studio</p>
          <hr />
          <h5 className="mb-3 fw-bold">Attachments</h5>
          <Row>
            <Col xl={6}>
              <Card className="mb-1 shadow-none border border-light">
                <div className="p-2">
                  <Row className="align-items-center">
                    <Col xs={'auto'}>
                      <div className="avatar-lg">
                        <span className="avatar-title bg-soft-primary text-primary rounded">
                          .ZIP
                        </span>
                      </div>
                    </Col>
                    <Col className="ps-0">
                      <a href="" className="text-muted fw-bold">Adminto-admin-design.zip</a>
                      <p className="mb-0">2.3 MB</p>
                    </Col>
                    <Col xs={'auto'}>
                      <a href="" className="btn btn-link btn-lg text-muted">
                        <IconifyIcon icon='ri:download-2-line' />
                      </a>
                    </Col>
                  </Row>
                </div>
              </Card>
            </Col>
            <Col xl={6}>
              <Card className="mb-1 shadow-none border border-light">
                <div className="p-2">
                  <Row className="align-items-center">
                    <Col xs={'auto'}>
                      <img src={amazonImg} className="avatar-lg rounded" alt="file-image" />
                    </Col>
                    <Col className="ps-0">
                      <a href="" className="text-muted fw-bold">Dashboard-design.jpg</a>
                      <p className="mb-0">3.25 MB</p>
                    </Col>
                    <Col xs={'auto'}>
                      <a href="" className="btn btn-link btn-lg text-muted">
                        <IconifyIcon icon='ri:download-2-line' />
                      </a>
                    </Col>
                  </Row>
                </div>
              </Card>
            </Col>
          </Row>
        </OffcanvasBody>
        <div className="offcanvas-footer gap-1 p-2 d-flex justify-content-end border-top">
          <button className="btn btn-primary" data-bs-target="#email-compose-modal" onClick={() => {
          isToggleCompose(), toggle();
        }} data-bs-toggle="modal"><IconifyIcon icon='ri:reply-line' className="align-text-bottom me-1 " />
            Reply</button>
          <button className="btn btn-primary" data-bs-target="#email-compose-modal" onClick={() => {
          isToggleCompose(), toggle();
        }} data-bs-toggle="modal"><IconifyIcon icon='ri:share-forward-line' className="align-text-bottom me-1 " />
            Forward</button>
        </div>
      </Offcanvas>

    </>;
};
export default EmailArea;