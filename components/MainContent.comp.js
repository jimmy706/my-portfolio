import React from "react";
import classnames from 'classnames';

export default function MainContent(props) {


  return (
    <main id="main-content">
      <div className={
        `container${classnames({ '--posts': props.articleContent })}`
      }>{props.children}</div>

    </main>
  );
}
