import React from 'react';
import Link from 'next/link';

function BlogItem(props) {
    const { slug, title, description, preview_image, date } = props.blog;

    return (
        <Link href="/blogs/[slug]" as={`/blogs/${slug}`}>
            <a>
                <article className="article-row">
                    <img src={preview_image} className='article-row__image' />
                    <h4 className="article-row__title">{title}</h4>
                    <p className="artical-row__desc">{description}</p>
                    <div className="artical-row__date">
                        <span>Release date: {date}</span>
                    </div>
                    <div className="btn-wrapper">
                        <Link href="/blogs/[slug]" as={`/blogs/${slug}`}  >
                            <button
                                className="btn"
                                target="_blank"
                            >
                                View detail
                            </button>
                        </Link>
                    </div>
                </article>
            </a>
        </Link>
    )
}

export default BlogItem;