import axios from 'axios/dist/axios'
//import server from '../env.dev'
const server = `/api/`

export default {
    namespaced: true,
    state: {
        access_token: localStorage.getItem('access_token'),
        token_type: 'Bearer',
        expires_at: localStorage.getItem('expires_at'),
        isLoggedIn: localStorage.getItem('isLoggedIn'),
        user: JSON.stringify(localStorage.getItem('user')),
    },
    getters: {
        getIsLogedIn(state, rootState) {
            return state.isLoggedIn;
        },

        getToken(state) {
            return state.access_token;
        },

        getAccessToken(state) {
            return state.token_type + ' ' + state.access_token;
        },

        getExpires(state) {
            return state.expires_at;
        },

        getUser(state) {
            return state.user;
        },
    },
    mutations: {
        LOGIN_SUCCESS(state, payload) {
            state.isLoggedIn = true;
            state.access_token = payload.access_token;
            state.expires_at = payload.expires_at;
            state.token_type = payload.token_type;
            localStorage.setItem('isLoggedIn', true);
            localStorage.setItem('access_token', payload.access_token);
            localStorage.setItem('token_type', payload.access_token);
            localStorage.setItem('expires_at', payload.expires_at);

        },

        LOGOUT(state) {
            state.isLoggedIn = false;
            state.access_token = '';
            state.expires_at = '';
            localStorage.removeItem('isLoggedIn');
            localStorage.removeItem('access_token');
            localStorage.removeItem('token_type');
            localStorage.removeItem('expires_at');
            localStorage.removeItem('user');

        },

        SET_USER(state, payload) {
            state.user = payload;
            localStorage.setItem('user', JSON.stringify(payload));
        },

        CHANGE_MENU_STATE(state, payload) {
            state.manuPage = payload;
        },
    },
    actions: {
        AUTH_REQUEST: ({commit}, params) => {
            return new Promise((resolve, reject) => {
                const string = server + 'login';
                axios.post(string, params)
                    .then(resp => {
                        if (resp.data.message === "invalid credentials") {
                            resolve(resp.data);
                        } else {
                            commit('LOGIN_SUCCESS', resp.data);
                            resolve(resp.data);
                        }
                    }).catch(err => {
                    commit('LOGOUT');
                    reject(err);
                })
            })
        },

        GET_USER: async ({commit, getters}) => {
            let string = server + 'user';
            try {
                axios.get(string, {
                    headers: {
                        Authorization: getters.getAccessToken
                    }
                }).then(resp => {
                    commit('SET_USER', resp.data)
                })
            } catch (e) {
                console.log(e)
            }
        },

        AUTH_LOGOUT: ({commit, getters}) => {
            return new Promise((resolve, reject) => {
                let string = server + 'logout';
                axios.get(string, {
                    headers: {
                        Authorization: getters.getAccessToken
                    }
                })
                    .then((resp) => {
                        commit('LOGOUT');
                        resolve(resp);
                    }).catch(err => {
                    reject(err);
                })
            })
        },
    }
}
