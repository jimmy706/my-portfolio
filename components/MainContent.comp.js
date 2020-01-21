export default function MainContent(props) {
  return (
    <main id="main-content">
      <div className="container">{props.children}</div>
    </main>
  );
}
