import {
  JS,
  HTML,
  CSS,
  SASS,
  NODE_JS,
  MONGO_DB,
  REACT,
  SPRING_BOOT
} from "./tools.data";

const HomePageData = [
  {
    projectName: "Weathering with you",
    desc: "An introduce movie Weathering with you website landing page",
    source: "https://github.com/jimmy706/WeatheringWithYou",
    demo: "https://weatheringwithyou-30519.firebaseapp.com/#",
    madeBy: [JS, HTML, CSS]
  },
  {
    projectName: "Making test",
    desc: "A project create and testing with multiple answer questions",
    source: "https://github.com/jimmy706/MakingTestProject",
    madeBy: [JS, HTML, CSS, SASS, NODE_JS, MONGO_DB]
  },
  {
    projectName: "Todo list react",
    desc: "A project creating Todo list build with React",
    source: "https://github.com/jimmy706/Todo-list-React",
    demo: "https://coders-tokyo-react-87aca.firebaseapp.com/",
    madeBy: [JS, HTML, SASS, CSS, REACT]
  },
  {
    projectName: "My schedule",
    desc:
      "Making your own weekly schedule, inspire by Google Calender and build with React",
    source: "https://github.com/jimmy706/my-shedule-project",
    madeBy: [HTML, SASS, REACT, JS, CSS]
  },
  {
    projectName: "Jav Searcher",
    desc:
      "Project for creating, listing JAV movie. Also used for storing JAV idols infomation",
    source: "https://github.com/jimmy706/jav-searcher-fe",
    demo: "https://jav-searcher-fe.herokuapp.com/",
    madeBy: [HTML, CSS, REACT, JS, SASS, SPRING_BOOT, MONGO_DB]
  },
  {
    projectName: "Slideshow",
    desc: "A carousel maker library inspired by Owl-Carousel",
    source: "https://github.com/jimmy706/slideshow",
    madeBy: [JS, CSS]
  }
];

export default HomePageData;
