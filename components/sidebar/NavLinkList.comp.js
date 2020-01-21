import Link from "next/link";
import { useRouter } from "next/router";
import classNames from "classnames";

export default function NavLinkList() {
  const { asPath } = useRouter();
  return (
    <ul className="link-list">
      <li>
        <Link href="/">
          <a title="Home" className={classNames({ active: asPath === "/" })}>
            Home
          </a>
        </Link>
      </li>
      <li>
        <Link href="/about">
          <a
            title="About"
            className={classNames({ active: asPath === "/about" })}
          >
            About
          </a>
        </Link>
      </li>
      <li>
        <Link href="/education">
          <a
            title="Education"
            className={classNames({ active: asPath === "/education" })}
          >
            Education
          </a>
        </Link>
      </li>
      <li>
        <Link href="/skills">
          <a
            title="Skills"
            className={classNames({ active: asPath === "/skills" })}
          >
            Skills
          </a>
        </Link>
      </li>
    </ul>
  );
}
