import Home from "./Home.vue";
import Admin from "./Admin.vue";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'admin',
        path: '/admin',
        component: Admin
    }
];