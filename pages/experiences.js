import Head from 'next/head';
import React from 'react';
import Layout from '../components/Layout.comp';
import MainContent from '../components/MainContent.comp';

function ExperiencesPage() {
    return (
        <div>
            <Head>
                <title>
                    My experiences
                </title>
            </Head>
            <Layout>
                <MainContent>

                </MainContent>
            </Layout>
        </div>
    )
}

export default ExperiencesPage;