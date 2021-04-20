function ArticleLayout(props) {
    return (
        <div className='article-layout'>
            <div>
                <small className='article-layout__info'>
                    Post on {props.date}
                </small>
            </div>

            <h1 className='title title--article'>
                {props.title}
            </h1>
            <img width='100%' src={props.preview_image} />
            <div className='article-layout__content' dangerouslySetInnerHTML={{ __html: props.content }} />
        </div>
    )
}

export default ArticleLayout;