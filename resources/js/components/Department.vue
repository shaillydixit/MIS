<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="float-start text-light">
                        Department List
                    </h5>
                    <button class="btn btn-success float-end" @click="createDepartment">New Department</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <button @click="testAction" class="btn btn-info">Test</button>
                        {{test}}
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Director</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr v-for="(department, index) in departments" :key="index">
                                    <td>{{index + 1}}</td>
                                    <td>{{department.name}}</td>
                                    <td>{{department.director_id}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" @click="editDepartment(department)"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm ms-1"
                                            @click="deleteDepartment(department)"><i class="fa fa-trash"></i></button>

                                    </td>
                                </tr>


                            </tbody>

                        </table>
                    </div>
                    <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog"
                        aria-labelledby="departmentModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="departmentModalLabel">
                                        {{!editMode ? 'Add Department' : 'Edit Department'}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    v-model="departmentData.name">
                                                      <div class="text-danger" v-if="departmentData.errors.has('name')" v-html="departmentData.errors.get('name')" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="director_id">Director</label>
                                                <select name="director_id" class="form-control"
                                                    v-model="departmentData.director_id">
                                                    <option value="">Select a person</option>
                                                    <option value="1">IT Director</option>
                                                    <option value="2">HR Director</option>
                                                </select>
                                                    <div class="text-danger" v-if="departmentData.errors.has('director_id')" v-html="departmentData.errors.get('director_id')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
                                    <button type="button" @click="editMode ? updateDepartment() : storeDepartment()"
                                        class="btn btn-success">
                                        {{ editMode ? 'Update Department' : 'Save Department' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {

            return {
                editMode: false,
                departmentData: new Form({
                    id: '',
                    name: '',
                    director_id: '',
                }),
                departmentErrors: {
                    name: false,
                    director_id: false,
                }
            }
        },
        methods: {

            createDepartment() {
                this.editMode = false,
                    this.departmentData.name = this.departmentData.director_id = '';
                $('#departmentModal').modal('show');
            },
            closeModal() {
                $('#departmentModal').modal('hide');
            },
            storeDepartment() {

                 this.$store.dispatch('storeDepartment', this.departmentData)
            },
            editDepartment(department) {
                
                this.editMode = true,
                    this.departmentData.id = department.id;
                this.departmentData.name = department.name;
                this.departmentData.director_id = department.director_id;
                $('#departmentModal').modal('show');
            },
            updateDepartment() {
              this.$store.dispatch('updateDepartment', this.departmentData)
            },
            deleteDepartment(department) {
               this.$store.dispatch('deleteDepartment', department)
            },
            testAction()
            {
                this.$store.dispatch('testAction');         
            }

        },
        mounted() {
            this.$store.dispatch('getDepartments')
            
        },
        computed:{
            departments(){
                return this.$store.getters.departments
            }
        }
    }

</script>
