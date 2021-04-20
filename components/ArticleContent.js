import React, { useEffect } from "react";
import { FaAngleUp } from "react-icons/fa";
import { FaChevronLeft, FaFacebookF } from 'react-icons/fa'
import { useRouter } from 'next/router';
import { LANDING_URL } from "../config/namespaces";

function ArticleNavigation() {
    const router = useRouter();

    return (
        <div className='article-nav'>
            <ul>
                <li className='nav-item' title='Return to previous page'>
                    <a href="#" onClick={() => router.back()}>
                        <FaChevronLeft />
                    </a>
                </li>
                <li className='nav-item'>
                    <a title='Share on facebook' href={`https://www.facebook.com/sharer/sharer.php?u=${LANDING_URL}/blog/${router.query.slug}`} target='_blank'>
                        <FaFacebookF />
                    </a>
                </li>
            </ul>
        </div>
    )
}

export default function ArticleContent(props) {
    useEffect(() => {
        const main = document.getElementById("article-content");
        const btnTop = document.getElementById("btn-top");

        main.addEventListener("scroll", e => {
            if (main.scrollTop > 200) {
                btnTop.style.right = "40px";
            } else {
                btnTop.style.right = "-60px";
            }
        });

        btnTop.addEventListener("click", () => {
            main.scroll({
                top: 0,
                behavior: "smooth"
            });
        });
    }, []);

    return (
        <main id="article-content">
            <div className={
                `container--posts`
            }>
                <ArticleNavigation />
                {props.children}
            </div>
            <button id="btn-top">

                <FaAngleUp />
            </button>
        </main>
    );
}
