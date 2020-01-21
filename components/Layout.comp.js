import Sidebar from "./sidebar/Sidebar.comp";

function Layout(props) {
  return (
    <div className="wrapper">
      <Sidebar />
      {props.children}
    </div>
  );
}

export default Layout;
