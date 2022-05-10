export default {
    state: {
        theme: {}
    },
    getters: {
        getTheme: (state) => {
            return state.theme;
        }
    },
    mutations: {
        SET_THEME(state, theme) {
            state.theme = theme;
            localStorage.theme = theme;
        }
    },
    actions: {
        initTheme({ commit }) {
            const cachedTheme = localStorage.theme ? localStorage.theme : false;
            const userPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (cachedTheme)
                commit('SET_THEME', cachedTheme)
            else if (userPrefersDark)
                commit('SET_THEME', 'dark')
            else
                commit('SET_THEME', 'light')
        },
        toggleTheme({ commit }) {
            switch (localStorage.theme) {
                case 'light':
                    commit('SET_THEME', 'dark')
                    break;
                default:
                    commit('SET_THEME', 'light')
                    break;
            }
        }
    },
}
