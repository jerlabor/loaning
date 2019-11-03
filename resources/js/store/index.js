import Vue from 'vue'
import Vuex from 'vuex'



Vue.use(Vuex)


export default new Vuex.Store({
    state: {
        authUser: null
    },
    mutations: {
        setAuthUser(state,user){
            state.authUser = user;
        }
    },
    getters: {
        getAuthUser(state){
            return state.authUser;
        }
    }
})
