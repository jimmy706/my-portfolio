import Sidebar from "./sidebar/Sidebar.comp";
import { FaBars } from "react-icons/fa";
import React, { useState } from "react";
function Layout(props) {
  const [openNav, setOpenNav] = useState(false);
  return (
    <div className="wrapper">
      <button id="btn-toggle" onClick={() => setOpenNav(!openNav)}>
        <FaBars />
      </button>
      <input type="checkbox" id="toggle-nav" checked={openNav} />
      <Sidebar />
      <div id="overlay-mb" onClick={() => setOpenNav(false)}></div>
      {props.children}
    </div>
  );
}

export default Layout;
