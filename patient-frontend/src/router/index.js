import { createRouter, createWebHistory } from 'vue-router';
import RegisterPage from '@/views/RegisterPage.vue';
import ListPage from '@/views/ListPage.vue';

const routes = [
  {
    path: '/',
    redirect: '/register',
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterPage,
  },
  {
    path: '/patients',
    name: 'PatientList',
    component: ListPage,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
