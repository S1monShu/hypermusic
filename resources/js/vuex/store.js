import { createStore } from 'vuex'
import axios from 'axios'
import artists from '../artist.json'


export default createStore({
  state: {
    guitars: [],
    acoustic_guitars: [],
    artists: artists.artists
  },
  mutations: {
    SET_GUITARS_TO_VUEX: (state, guitars) => {
        state.guitars = guitars
    },
  },
  actions: {
    GET_GUITARS_FROM_API({commit}){
        return axios('http://127.0.0.1:8000/api/all', {
            method: 'GET'
        })
        .then((response) => {
            commit('SET_GUITARS_TO_VUEX', response.data.data)
        })
    }
  },
  getters: {
    GUITARS(state){
        return state.guitars
    },
    ACOUSTIC_GUITARS(state){
        return state.guitars.slice(0, 120)
    },
    BASS_GUITARS(state){
        return state.guitars.slice(120, 211)
    },
    ELECTRIC_GUITARS(state){
        return state.guitars.slice(212, 332)
    },
    GUITAR: (state) => (id) => {
        return state.guitars.find(element => element.id === id)
    },
    ARTIST(state){
      let rnd = Math.floor(Math.random() * state.artists.length)
      return state.artists.find(element => element.id === rnd)
    }
  }
})
