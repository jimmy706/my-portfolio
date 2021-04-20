import React from "react";
import classnames from 'classnames';


export default class LazyImage extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loaded: false
        }
        this.refImage = React.createRef()
    }

    componentDidMount() {
        const mainContent = document.getElementById('main-content');
        const loadImage = () => {
            const image = this.refImage.current;
            const pos = image.getBoundingClientRect();
            if (pos.y <= 700) {
                image.src = this.props.src;
                this.setState({ loaded: true });
                mainContent.removeEventListener('scroll', loadImage);
                window.removeEventListener('resize', loadImage);
                window.removeEventListener('orientationchange', loadImage);

            }
        }
        // Call for first-start time
        loadImage();
        mainContent.addEventListener("scroll", loadImage);
        window.addEventListener('resize', loadImage);
        window.addEventListener('orientationChange', loadImage)
    }

    render() {
        const { className } = this.props;
        return (
            <img
                ref={this.refImage}
                className={`lazy-image ${classnames(className)}`}
            />
        );
    }
}