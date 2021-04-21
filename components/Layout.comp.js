import Sidebar from "./sidebar/Sidebar.comp";
import { FaBars } from "react-icons/fa";
import React, { useState, useEffect } from "react";
import LoadingOverlay from "./loading-overlay/LoadingOverlay";
function Layout(props) {
  const [openNav, setOpenNav] = useState(false);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const loaded = sessionStorage.getItem('loaded');

    if (loaded !== null) {
      setLoading(false);
    }
    else {
      sessionStorage.setItem('loaded', '1');
    }
  }, []);
  return (
    <div className="wrapper">
      {loading && <LoadingOverlay />}
      <button id="btn-toggle" onClick={() => setOpenNav(!openNav)}>
        <FaBars />
      </button>
      <input type="checkbox" id="toggle-nav" defaultChecked={openNav} />
      <Sidebar />
      <div id="overlay-mb" onClick={() => setOpenNav(false)}></div>
      {props.children}
    </div>
  );
}

export default Layout;
