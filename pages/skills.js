import Head from "next/head";
import Layout from "../components/Layout.comp";
import MainContent from "../components/MainContent.comp";

function SkillsPage() {
  return (
    <div>
      <Head>
        <title>My skills</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
      </Head>
      <Layout>
        <MainContent>
          <h2 className="title">My abilities:</h2>
          <div className="skills-list">
            <div className="skill-group">
              <h4>Programming Languages</h4>
              <ul>
                <li>HTML, CSS</li>
                <li>JavaScript</li>
                <li>Java</li>
                <li>Python</li>
              </ul>
            </div>
            <div className="skill-group">
              <h4>Database</h4>
              <ul>
                <li>MongoDB</li>
                <li>MySQL</li>
              </ul>
            </div>
            <div className="skill-group">
              <h4>Version Control</h4>
              <ul>
                <li>Github</li>
                <li>Bitbucket</li>
              </ul>
            </div>
            <div className="skill-group">
              <h4>Frameworks & Platforms</h4>
              <ul>
                <li>ReactJS</li>
                <li>Bootstrap</li>
                <li>ExpressJS</li>
                <li>Spring, Spring Boot, Spring Security</li>
                <li>Django</li>
              </ul>
            </div>
            <div className="skill-group">
              <h4>IDEs</h4>
              <ul>
                <li>Visual Studio Code</li>
                <li>Sublime Text</li>
                <li>Eclipse & IntelliJ</li>
              </ul>
            </div>
            <div className="skill-group">
              <h4>Others</h4>
              <ul>
                <li>
                  Have understanding about OOP, Design Pattern, Dependency
                  Injection, IOC...
                </li>
                <li>Time management skill</li>
                <li>Good self-taught skill</li>
                <li>Have teamwork skill</li>
              </ul>
            </div>
          </div>
        </MainContent>
      </Layout>
    </div>
  );
}

export default SkillsPage;
