import MyInfo from "./MyInfo.comp";
import NavLinkList from "./NavLinkList.comp";
import SidebarFooter from "./SidebarFooter.comp";

export default function Sidebar() {
  return (
    <nav className="sidebar">
      <MyInfo />
      <NavLinkList />
      <SidebarFooter />
    </nav>
  );
}
