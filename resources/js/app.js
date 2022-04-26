import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Shared/Layout'

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    
    page.layout ??= Layout;

    return page;
  },
  setup({ el, App, props, plugin }) {
    Vue.use(plugin)

    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
});

InertiaProgress.init()