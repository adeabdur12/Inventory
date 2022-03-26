import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path : '/',
        name : 'item.index',
        component : () => import("../views/item/Index.vue")
    },
    {
        path : '/create_item',
        name : 'item.create',
        component : () => import("../views/item/Create.vue")
    },
    {
        path : '/edit/:id',
        name : 'item.edit',
        component : () => import("../views/item/Edit.vue")
    }
];

const router = createRouter({
    history : createWebHistory(),
    routes 
});

export default router;