import fs from 'fs';
import matter from 'gray-matter';
import Layout from "../components/Layout.comp";
import MainContent from "../components/MainContent.comp";
import Head from "next/head";
import dayjs from 'dayjs';
import BlogItem from '../components/blog-item/BlogItem';



function HomePage(props) {

  function renderBlogs(posts) {
    return posts.map(p => <li key={p.slug}><BlogItem blog={p} /></li>)
  }

  return (
    <div>
      <Head>
        <title>Dang Quoc Dung - Web developer</title>
      </Head>
      <Layout>
        <MainContent articleContent={true}>
          <ul>
            {renderBlogs(props.results)}
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
