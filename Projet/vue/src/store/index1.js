import{createStore} from "vuex";
import axiosClient from "../axios";


const Partie= [
  {
    id:100,
    creator_id:1,
    max_players:2,
    is_public:"true",
    started:"false",
    finished:"false",
  },


];

const store = createStore({
    state:{
        user:{
          data: {},
          token: sessionStorage.getItem('TOKEN'),
        },
        parties:[...Partie],
    },
    getters:{},
    actions:{
      register({commit}, user) {
        return axiosClient.post('/register', user)
          .then(({data}) => {
            commit('setUser', data);
            return data;
          })
      },
      login({commit}, user) {
        return axiosClient.post('/login', user)
          .then(({data}) => {
            commit('setUser', data);
            return data;
          })
      },
      logout({commit}) {
        return axiosClient.post('/logout')
          .then(response => {
            commit('logout')
            return response;
          })
      }
    },
    mutations: {
      logout: state => {
        state.user.token = null;
        state.user.data = {};
        sessionStorage.removeItem('TOKEN');
      },
      setUser: (state, userData) => {
        state.user.token = userData.token;
        state.user.data = userData.user;
        sessionStorage.setItem('TOKEN', userData.token);
      }
    },
    modules:{},
})

export default store;

