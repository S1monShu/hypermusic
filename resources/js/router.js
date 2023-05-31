import { createWebHistory, createRouter } from 'vue-router'

import hpElectricWrapper from './components/hp-electric-wrapper.vue'
import hpBassWrapper from './components/hp-bass-wrapper.vue'
import hpAcousticWrapper from './components/hp-acoustic-wrapper.vue'
import hpMain from './components/hp-main.vue'
import hpItempage from './components/hp-itempage.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'main',
            component: hpMain,
            props: true
        },
        {
            path: '/electric_guitars',
            name: 'electric_guitars',
            component: hpElectricWrapper,
            props: true
        },
        {
            path:'/bass_guitars',
            name: 'bass',
            component: hpBassWrapper,
            props: true
        },
        {
            path: '/acoustic_guitars',
            name: 'acoustic_guitars',
            component: hpAcousticWrapper,
            props: true
        },
        {   
            name: 'bass_guitar',
            path: '/:id',
            component: hpItempage,
            props: true
        },
        {
            name: 'acoustic_guitar',
            path: '/:id',
            component: hpItempage,
            props: true
        },
        {
            path: '/:id',
            component: hpItempage,
            props: true
        }
    ]
})

export default router