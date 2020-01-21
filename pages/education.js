import React from "react";
import Layout from "../components/Layout.comp";
import MainContent from "../components/MainContent.comp";
import "../sass/main.scss";
import educationPage from "../constant/education-page.data";
import Head from "next/head";

export default function EducationPage() {
  function renderTimeline() {
    return educationPage.map(item => {
      return (
        <ul key={item.year}>
          <div className="year">
            <span>{item.year}</span>
            <span className="dot"></span>
          </div>
          {item.events.map((e, i) => (
            <li key={i}>
              <div className="mark">
                <span className="time">{e.time}</span>
                <p className="content">{e.content}</p>
              </div>
              <div className="img-wrapper">
                <img src={e.img} alt="Timeline photo" />
              </div>
            </li>
          ))}
        </ul>
      );
    });
  }

  return (
    <div>
      <Head>
        <title>My education</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
      </Head>
      <Layout>
        <MainContent>
          <h2 className="title">My education process:</h2>
          <div className="timeline">{renderTimeline()}</div>
        </MainContent>
      </Layout>
    </div>
  );
}
