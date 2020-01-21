import Layout from "../components/Layout.comp";
import MainContent from "../components/MainContent.comp";
import "../sass/main.scss";
import HomeData from "../constant/home.data";
import Head from "next/head";

function ProjectItem(props) {
  const { projectName, desc, source, demo, madeBy } = props.projectDetail;
  return (
    <li>
      <article className="project-comp">
        <h4 className="project-name">{projectName}</h4>
        <p className="desc">{desc}</p>
        <div className="tech">
          <span>Made by:</span>
          <span>
            {madeBy.map(item => (
              <img
                src={item.img}
                alt={item.toolName}
                title={item.toolName}
                key={item.toolName}
              />
            ))}
          </span>
        </div>
        <div className="btn-wrapper">
          {source && (
            <a
              href={source}
              className="btn"
              title="View source code"
              target="_blank"
            >
              Source
            </a>
          )}
          {demo && (
            <a href={demo} className="btn" title="View demo" target="_blank">
              Demo
            </a>
          )}
        </div>
      </article>
    </li>
  );
}

function HomePage() {
  function renderMyProject() {
    return HomeData.map(project => (
      <ProjectItem projectDetail={project} key={project.projectName} />
    ));
  }

  return (
    <div>
      <Head>
        <title>Dang Quoc Dung - Web developer</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
      </Head>
      <Layout>
        <MainContent>
          <h1 className="greeting">
            <p>Hi! I am a</p>
            <p>Web developer</p>
          </h1>
          <h2 className="title">My project:</h2>
          <ul className="my-project">{renderMyProject()}</ul>
        </MainContent>
      </Layout>
    </div>
  );
}

export default HomePage;
