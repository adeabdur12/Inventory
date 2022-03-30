import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path : '/',
        name : 'home',
        component : () => import("../views/home/Home.vue")

    },
    {
        path : '/dashboard',
        name : 'item.index',
        component : () => import("../views/item/Index.vue")
    },
    {
        path : '/login',
        name : 'auth.login',
        component : () => import("../views/auth/Login.vue")
    },
    {
        path : '/register',
        name : 'auth.register',
        component : () => import("../views/auth/Register.vue")
    },
    {
        path : '/create_item',
        name : 'item.create',
        component : () => import("../views/item/Create.vue")
    },
    {
        path : '/edit/:id',
        name : 'item.edit',
        component : () => import("../views/item/EditItem.vue")
    },
    {
        path : '/customer',
        name : 'customer.index',
        component : () => import("../views/customer/Index.vue")
    },
    {
        path : '/create_customer',
        name : 'customer.create',
        component : () => import("../views/customer/Create.vue")
    },
    {
        path :'/sales',
        name : 'sales.index',
        component : () => import("../views/sales/Index.vue")
    },
    {
        path :'/cart',
        name : 'home.cart',
        component : () => import("../views/home/Cart.vue")
    }
];

const router = createRouter({
    history : createWebHistory(),
    routes 
});

export default router;