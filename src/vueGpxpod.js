import Vue from 'vue'
import App from './App.vue'
import './bootstrap.js'
import '../css/maplibre.scss'

import VueClipboard from 'vue-clipboard2'
import Tooltip from '@nextcloud/vue/dist/Directives/Tooltip.js'
Vue.directive('tooltip', Tooltip)
Vue.use(VueClipboard)

const View = Vue.extend(App)
new View().$mount('#content')
