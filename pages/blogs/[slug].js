import fs from 'fs';
import matter from 'gray-matter';
import Head from 'next/head';
import showdown from 'showdown';
import dayjs from 'dayjs';
import ArticleLayout from '../../components/ArticleLayout';
import ArticleContent from '../../components/ArticleContent';



function BlogDetailPage(props) {
    const { date, content, title } = props;

    return (
        <div className='blog-detail-page'>
            <Head>
                <title>Blog detail</title>
            </Head>
            <div className='blog-detail-content'>

                <ArticleContent articleContent={true}>
                    <ArticleLayout preview_image={props.preview_image} date={date} content={content} title={title} />
                </ArticleContent>
            </div>
        </div>
    )
}

export default BlogDetailPage;

export async function getServerSideProps(context) {
    const { slug } = context.params;
    const file = fs.readFileSync(`blogs/${slug}.md`);
    const markdownToObject = matter(file.toString());

    const { title, description, preview_image } = markdownToObject.data;
    const stats = fs.statSync(`blogs/${slug}.md`);
    const converter = new showdown.Converter();
    return {
        props: {
            content: converter.makeHtml(markdownToObject.content),
            title,
            description,
            preview_image,
            date: dayjs(stats.mtime).format('ddd DD/MM/YYYY')
        }
    }
}