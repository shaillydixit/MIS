import axios from "axios";

export default {
  state : {
    departments: {}, 
  },
  getters: {
    departments(state)
    {
        return state.departments
    }
  },
  mutations: {
    set_departments : (state, data) =>{
        state.departments = data
    }
  },
  actions: {
    getDepartments : (context) =>{
        axios.get(`${window.url}api/get-departments`).then((response) => {
            context.commit('set_departments', response.data)
        })
    },
    storeDepartment: (context, departmentData) =>{
        departmentData.post(window.url + 'api/store-department')
                    .then((response) => {
                        context.dispatch('getDepartments')
                        $('#departmentModal').modal('hide');
                    })
    },
    updateDepartment:(context, departmentData)=>{
        departmentData.post(window.url + 'api/update-department/' + departmentData.id)
        .then((response) => {
            context.dispatch('getDepartments')
            $('#departmentModal').modal('hide');
        })
    },
    deleteDepartment:(context, departmentData) =>{
        if (confirm('Are you sure you want to delete department')) {
            axios.post(window.url + 'api/delete-department/' + departmentData.id)
                .then((response) => {
                    context.dispatch('getDepartments')
                })
        }
    }
  },
}
