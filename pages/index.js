import fs from 'fs';
import matter from 'gray-matter';
import Layout from "../components/Layout.comp";
import MainContent from "../components/MainContent.comp";
import HomeData from "../constant/home.data";
import Head from "next/head";
import dayjs from 'dayjs';

function BlogItem(props) {
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

function HomePage(props) {

  console.log(props)

  function renderBlogs(posts) {
    return posts.map(p => <BlogItem blog={blog} />)
  }

  return (
    <div>
      <Head>
        <title>Dang Quoc Dung - Web developer</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
      </Head>
      <Layout>
        <MainContent>
          <ul>

          </ul>
        </MainContent>
      </Layout>
    </div>
  );
}

export async function getServerSideProps(context) {
  const files = fs.readdirSync("blogs");

  const posts = files.map((filename) => {

    const markdownContent = fs.readFileSync(`blogs/${filename}`).toString();
    const markdownToObject = matter(markdownContent);
    const { title, description, preview_image } = markdownToObject.data;
    const stats = fs.statSync(`blogs/${filename}`);

    return {
      slug: filename.replace('.md', ''),
      title,
      description,
      preview_image,
      date: dayjs(stats.mtime).format('ddd DD/MM/YYYY')
    }
  })
  return {
    props: {
      page: 1,
      results: posts,
      count: posts.length
    }
  }
}

export default HomePage;
