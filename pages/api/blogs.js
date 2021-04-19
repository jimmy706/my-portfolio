import fs from 'fs';
import matter from 'gray-matter';

export default function handler(req, res) {
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
            date: stats.mtime
        }
    })
    return res.status(200).json({
        page: 1,
        count: posts.length,
        results: posts
    })
}