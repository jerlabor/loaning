import PensionCreate from "../views/pension/PensionCreate";
import PensionIndex from "../views/pension/PensionIndex";
import PensionAll from "../views/pension/PensionAll";
import PensionShow from "../views/pension/PensionShow";

export default [
    {
        path: '/pension',
        name: 'PensionIndex',
        meta: {
            requiresAuth: true
        },
        component: PensionIndex,
        children: [
            {
                path: 'all',
                name: 'PensionAll',
                component: PensionAll,
            },
            {
                path: 'create',
                name: 'PensionCreateRoute',
                component: PensionCreate,
            },
            {
                path: ':pension',
                name: 'PensionShow',
                component: PensionShow,
            },

        ]
    }
];
