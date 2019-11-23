import PrintIndex from './../views/print/PrintIndex';
import PLoanApplication from './../views/print/PLoanApplication';

export default [
    {
        path: '/print',
        name: 'PrintIndex',
        meta: {
            requiresAuth: true
        },
        component: PrintIndex,
        children: [
            {
                path: 'loan-application',
                name: 'PLoanApplication',
                component: PLoanApplication,
            }
        ]

    }
];
