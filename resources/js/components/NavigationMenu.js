import React, { useState } from "react";
import {Menu} from "antd";

export default function NavigationMenu() {
    function getItem(label, key, children, type) {
        return {
            key,
            children,
            label,
            type,
        };
    }

    const items = [
        getItem('Loads', 'sub1', [
            getItem('Load List', '1'),
            getItem('New Load', '2'),
        ]),
        getItem('Customers', 'sub2', [
            getItem('Customer list', '3'),
            getItem('New Customer', '4'),
        ]),
        getItem('Carriers', 'sub3', [
            getItem('Carrier list', '5'),
            getItem('New Carrier', '6'),
        ]),
        getItem('Dispatchers', 'sub4', [
            getItem('Dispatcher list', '7'),
            getItem('New Dispatcher', '8'),
        ]),
        getItem('Accounting', 'sub5', [
            getItem('Load Sales Summary', '9'),
        ]),
        getItem('Black List', 'sub6'),
    ];

    const [current, setCurrent] = useState('1');
    return (
        <Menu
            onClick={(e) => {setCurrent(e.key);}}
            defaultOpenKeys={['sub1']}
            selectedKeys={[current]}
            mode="inline"
            items={items}
        />
    );
}
