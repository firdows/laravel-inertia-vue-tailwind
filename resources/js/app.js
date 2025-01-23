import { createInertiaApp } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy';
import '../css/app.css';
import MainLayout from "./Layouts/MainLayout.vue";

createInertiaApp({
    resolve: async(name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = await pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || MainLayout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
})