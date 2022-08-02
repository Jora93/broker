import React from 'react';
import ReactDOM from 'react-dom/client';
const { Header, Content, Sider } = Layout;
import {Layout, Breadcrumb} from 'antd';
import NavigationMenu from "./NavigationMenu";
import LoadList from "./Loads/LoadList";

export default function App() {

    return (
        <Layout>
            <Header>header</Header>
            <Layout>
                <Sider>
                    <NavigationMenu/>
                </Sider>
                <Content style={{ margin: '0 16px'}}>
                    <Breadcrumb style={{ margin: '16px 0' }}>
                        <Breadcrumb.Item>Load List</Breadcrumb.Item>
                    </Breadcrumb>
                    <div
                        className="site-layout-background"
                        style={{
                            padding: 24,
                            minHeight: 360,
                            background: "white"
                        }}
                    >
                        <LoadList/>
                    </div>
                </Content>
            </Layout>
            <Layout.Footer>footer</Layout.Footer>
        </Layout>
    );
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<App />);
