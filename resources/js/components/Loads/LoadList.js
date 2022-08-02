import React, {useState, useEffect} from "react";
import { Table } from 'antd';

export default function LoadList() {
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(true);
    const [items, setItems] = useState([]);
    const [pagination, setPagination] = useState({
        current: 1,
        pageSize: 25,
    });
    const columns = [
        {
            title: 'Load#',
            dataIndex: 'id',
            key: 'Load#',
            sorter: (a, b) => a.id - b.id,

            render: (text, record) => {
                return (
                    <a href={`https://broker.me/1/loads/${record.id}`}>
                        {text}
                    </a>
                );
            }
        },
        {
            title: 'Type',
            dataIndex: 'shipper_type',
            key: 'Type',
        },
        {
            title: 'Status',
            dataIndex: 'status',
            key: 'Status',
        },
        {
            title: 'Customer',
            dataIndex: ['customer', 'company'],
            key: 'Customer',
            render: (text, record) => {
                return (
                    <a href={`https://broker.me/1/customers/${record.customer.id}`}>
                        {text}
                    </a>
                );
            }
        },
        {
            title: 'Ship Date',
            dataIndex: 'shipper_pickup_time',
            key: 'Ship Date',
        },
        {
            title: 'Carrier',
            dataIndex: ['carrier', 'company'],
            key: 'Carrier',
            render: (text, record) => {
                return (
                    <a href={`https://broker.me/1/carriers/${record.carrier.id}`}>
                        {text}
                    </a>
                );
            }
        },
        {
            title: 'Shipper Address',
            dataIndex: 'shipper_address1',
            key: 'Shipper Address',
        },
        {
            title: 'Deliv. Address',
            dataIndex: 'consignee_address1',
            key: 'Deliv. Address',
        },
        {
            title: 'Stops',
            dataIndex: ['drops', 'length'],
            key: 'Stops',
        },
        {
            title: 'Delivery Date',
            dataIndex: 'consignee_delivery_date',
            key: 'Delivery Date',
        },
    ];

    const fetchData = (params = {}) => {
        setLoading(true);
        fetch(`https://broker.me/api/1/loads?page=${params.current}`)
            .then(res => res.json())
            .then(
                result => {
                    setLoading(false);
                    setItems(result.data.data.map(item => {
                        item.key = item.id
                        return item;
                    }));

                    console.log(result.data.data.map(item => {
                        item.key = item.id
                        return item;
                    }).length);
                    console.log(pagination.pageSize);
                    console.log(pagination.total);

                    setPagination({
                        ...params.pagination,
                        total: result.data.total

                    });
                },
                error => {
                    setError(error);
                    setLoading(true);

                }
            )
    };

    const handleTableChange = (newPagination) => {
        // if (JSON.stringify(pagination) === JSON.stringify(newPagination)) {
            return fetchData(newPagination)
        // }
    }

    useEffect(() => {
        fetchData({pagination});
    }, []);

    return  (
        <Table
            columns={columns}
            dataSource={items}
            pagination={pagination}
            loading={loading}
            onChange={handleTableChange}
        />
    );
}
