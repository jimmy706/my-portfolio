import { FaGithub, FaFacebookSquare, FaLinkedin, FaPhone } from "react-icons/fa";
import { IoMdMailUnread } from 'react-icons/io'

export default function MyInfo() {
  return (
    <div className="info-wrapper">
      <img src="/img/me.jpg" alt="My avatar" className="avatar" />
      <h1 className="my-name">Dang Quoc Dung</h1>
      <p className="my-job">Web developer</p>
      <ul className="social-list">
        <li>
          <a href="https://github.com/jimmy706" target="_blank" title="Github">
            <FaGithub />
          </a>
        </li>
        <li>
          <a
            href="https://www.facebook.com/jim.dangquoc"
            target="_blank"
            title="Facebook"
          >
            <FaFacebookSquare />
          </a>
        </li>
        <li>
          <a
            href="https://www.linkedin.com/in/%C4%91%E1%BA%B7ng-d%C5%A9ng-843588163/"
            target="_blank"
            title="Linkedin"
          >
            <FaLinkedin />
          </a>
        </li>
        <li>
          <a href='mailto:jim.dangquoc706@gmail.com'>
            <IoMdMailUnread />
          </a>
        </li>
        <li>
          <a href='tel:+84919886970'>
            <FaPhone />
          </a>
        </li>
      </ul>
    </div>
  );
}
