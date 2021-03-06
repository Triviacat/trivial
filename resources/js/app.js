/* eslint-disable no-unused-vars */
//  require('./bootstrap');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
import Echo from 'laravel-echo'
import Buefy from 'buefy'

import Vue from 'vue'
import VueKonva from 'vue-konva'
// import VueResize from 'vue-resize'

// import { ResizeObserver } from 'vue-resize'

import Lang from 'lang.js'

import { Chrome } from 'vue-color'

import Multiselect from 'vue-multiselect'

import Bulma from '@vizuaalog/bulmajs'
import VueRouter from 'vue-router'

const VueResize = require('vue-resize')

Vue.component('resize-observer', ResizeObserver)

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// import Moment from 'moment';
window.moment = require('moment')

window.Pusher = require('pusher-js')

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: process.env.MIX_PUSHER_APP_KEY,
  cluster: process.env.MIX_PUSHER_APP_CLUSTER,
  encrypted: true
})

window.Echo.channel('game').listen('PlayerJoinsGame', e => {
  console.log('Player has joined the game.')
  console.log(e)
})

window.Vue = require('vue')

Vue.use(Buefy)
Vue.use(VueKonva)
Vue.use(VueResize)
Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('players-in-game', require('./components/PlayersInGame.vue').default)
Vue.component('game-status', require('./components/GameStatus.vue').default)
Vue.component('whosturn', require('./components/WhosTurn.vue').default)
Vue.component('dicebutton', require('./components/DiceButton.vue').default)
Vue.component('dice', require('./components/Dice.vue').default)
Vue.component('question', require('./components/Question.vue').default)
Vue.component('question-modal', require('./components/QuestionModal.vue').default)
Vue.component('box', require('./components/Box.vue').default)
Vue.component('cheeses', require('./components/Cheeses.vue').default)
Vue.component('board', require('./components/Board.vue').default)
Vue.component('profile', require('./components/Profile.vue').default)
Vue.component('game-form', require('./components/GameForm.vue').default)
Vue.component('open-game-button', require('./components/OpenGameButton.vue').default)
Vue.component('close-game-button', require('./components/CloseGameButton.vue').default)
// Vue.component('delete-game-button', require('./components/DeleteGameButton.vue').default);
Vue.component('start-game-button', require('./components/StartGameButton.vue').default)
Vue.component('edit-game-button', require('./components/EditGameButton.vue').default)
Vue.component('game-access-button', require('./components/GameAccessButton.vue').default)
Vue.component('chrome-picker', Chrome)
Vue.component('user-multiselect', Multiselect)

const defaultLocale = window.default_language
const fallbackLocale = window.fallback_locale
const messages = window.messages

// console.log(window.messages);

Vue.prototype.trans = new Lang({ messages, locale: defaultLocale, fallback: fallbackLocale })

const app = new Vue({
  el: '#app'
})

document.addEventListener('DOMContentLoaded', function () {
  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0)

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {
    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {
        // Get the target from the "data-target" attribute
        const target = $el.dataset.target
        const $target = document.getElementById(target)

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active')
        $target.classList.toggle('is-active')
      })
    })
  }
})

// require('./bulma-extensions');
