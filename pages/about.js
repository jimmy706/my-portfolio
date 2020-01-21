import Layout from "../components/Layout.comp";
import MainContent from "../components/MainContent.comp";
import "../sass/main.scss";
import Head from "next/head";

function AboutPage() {
  return (
    <div>
      <Head>
        <title>About me</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
      </Head>
      <Layout>
        <MainContent>
          <h2 className="title">About me:</h2>
          <div className="about-item">
            <div className="left">
              <img src="/img/about1.jpg" alt="About me" />
              <div className="black-block"></div>
            </div>
            <div className="right">
              <p>
                My name is <b>Dang Quoc Dung</b>, a full-stack web developer
                with 1 year experience in JavaScript and React. With a good
                self-taught and a strong passion in programming.
              </p>
            </div>
          </div>
          <div className="about-item">
            <div className="right">
              <img src="/img/about2.png" alt="About me" />
              <div className="black-block"></div>
            </div>
            <div className="left">
              <p>
                I like helping other and work well with group. I can also do
                some mentoring tasks and code reviewing for other members. I
                also love to sharing my knowledge about programming.
              </p>
            </div>
          </div>
        </MainContent>
      </Layout>
    </div>
  );
}

export default AboutPage;
