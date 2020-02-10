import React, { useEffect } from "react";
import { FaAngleUp } from "react-icons/fa";

export default function MainContent(props) {
  useEffect(() => {
    const main = document.getElementById("main-content");
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
    <main id="main-content">
      <div className="container">{props.children}</div>
      <button id="btn-top">
        <FaAngleUp />
      </button>
    </main>
  );
}
