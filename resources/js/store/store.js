import { createStore } from "vuex";
import departmentModule from "./modules/department";

export const store = createStore({
    strict: true,
    modules: {
        departmentModule
    },
    state: {
        test: 0,
    },
    getters: {
        test(state){
            return state.test
        }
    },
    mutations: {
        testMutation: (state) => {
            state.test++
            console.log( state.test)

        }
    },
    actions: {
        testAction: (context) =>{
            context.commit('testMutation')
        }
    }
})