import React from 'react';
import { motion } from 'framer-motion';

function LoadingOverlay() {
    const wrapper = {
        initial: {
            width: '100%',
            height: '100%'
        },
        animate: {
            display: 'none',
            transition: {
                when: 'afterChildren'
            }
        }
    }

    const blackbox = {
        initial: {
            height: "100%",
            width: "100%",
            bottom: 0
        },
        animate: {
            bottom: '-100%',
            transition: {
                duration: 1.5,
                ease: [1, 0, 0.13, 0.8],
                when: 'afterChildren'
            }
        }
    }

    const whitebox = {
        initial: {
            height: '100%',
            width: '100%',
            bottom: 0,
            opacity: 1
        },
        animate: {
            opacity: 0,
            transition: {
                delay: 1.5,
                duration: 1,
            }
        }
    }

    const textWrapper = {
        initial: {
            opacity: 1
        },
        animate: {
            opacity: 0,
            transition: {
                duration: 0.5,
                when: 'afterChildren'
            }
        }
    }

    const textTransform = {
        initial: {
            y: 0
        },
        animate: {
            y: 300,
            transition: {
                duration: 1.5,
                ease: [0.8, 0.1, 0.2, 0.8]
            }
        }
    }

    return (
        <motion.div
            className='loading-overlay'
            variants={wrapper}
            initial='initial'
            animate='animate'
        >
            <motion.div
                className='white-box'
                variants={whitebox}
            >

            </motion.div>
            <motion.div
                variants={blackbox}
                className='black-box'>
                <motion.svg
                    className='text-wrapper'
                    variants={textWrapper} >

                    <pattern
                        id='loading_text_pattern'
                        width='100%'
                        height='400'>
                        <rect className='rect-color' />
                        <motion.rect
                            className='rect-animate'
                            variants={textTransform} >
                        </motion.rect>

                    </pattern>
                    <text x='50%' y='50%' className='main-text' textAnchor='middle' >
                        Quoc Dung - Web developer
                    </text>
                </motion.svg>
            </motion.div>

        </motion.div>
    )
}

export default LoadingOverlay;