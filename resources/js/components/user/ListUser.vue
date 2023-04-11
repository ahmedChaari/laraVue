<template>
    <div>
        <topBare></topBare>
        <div class="flex overflow-hidden">
        <sideBare></sideBare>
        <div class="content">
                <h2 class="intro-y text-lg font-medium mt-10">
                    LIST OF USERS
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">



                <!-- BEGIN: Modal Toggle -->

                    <a href="javascript:;" data-tw-toggle="modal"
                    data-tw-target="#headerPreviewAddUser" class="btn btn-primary shadow-md mr-2">
                        Add New User</a>
                <!-- END: Modal Toggle -->



                        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-slate-500">
                                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">NAME / ROLE</th>
                                    <th class="whitespace-nowrap">EMAIL / TEL </th>
                                    <th class="whitespace-nowrap"> ADRESSE </th>
                                    <th class="text-center whitespace-nowrap"> COMPANY</th>
                                    <th class="text-center whitespace-nowrap">DATE DE NAISSANCE</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="intro-x" v-for="user in users" :key="user.id">
                                    <td class="w-40">
                                        <a href="" class="font-medium whitespace-nowrap">{{ user.name }}</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ user.role }}</div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ user.email }}</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ user.tel }}</div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ user.address }}</a>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ user.company }}</a>

                                    </td>


                                    <td class="text-center">{{ user.age }}</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success" v-if="(user.status ) == 1 ">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active
                                        </div>
                                        <div class="flex items-center justify-center text-danger" v-else>
                                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;" @click="showEditUser(user)"
                                            data-tw-toggle="modal" data-tw-target="#headerPreview" > <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal" data-tw-target="#button-modal-delete" @click="getIdDeleteModal(user.id)"
                                            > <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->

                </div>
        </div>
        <!-- BEGIN: Modal Content delete user -->
        <div id="button-modal-delete" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content"> <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x" class="w-8 h-8 text-slate-400 alt-danger"></i> </a>
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Delete user</div>
                            <div class="text-slate-500 mt-2">Are you sur you need to delete this user</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24"
                            @click="deleteUser">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
        <!-- BEGIN: Modal Content  add-->
        <div id="headerPreviewAddUser" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Fulle Name</label>
                            <input id="modal-form-1" type="text" name="name" class="form-control" placeholder="fulle name" v-model="addData.name"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label" >Email</label>
                            <input id="modal-form-2" type="text" name="email" class="form-control"  placeholder="example@gmail.com" v-model="addData.email"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Tel</label>
                            <input id="modal-form-2" type="text" name="tel" class="form-control" placeholder="0XX XXX XXX" v-model="addData.tel"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Address</label>
                            <input id="modal-form-2" type="text" name="address" class="form-control" placeholder="address" v-model="addData.address"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-6" class="form-label">Role</label>
                            <select id="modal-form-6" name="role_id" class="form-select" v-model="addData.role_id">
                                <option  value="" selected>--select--</option>
                                <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-6" class="form-label">Company</label>
                            <select id="modal-form-6" name="company_id" class="form-select" v-model="addData.company_id">
                                <option  value="" selected>--select--</option>
                                <option v-for="company in companies" :key="company.id" :value="company.id">{{ company.name }}</option>
                            </select>
                        </div>
                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <a type="button"  @click="AddUser()" id="programmatically-toggle-modal"
                        href="javascript:;"  data-tw-dismiss="modal"
                        class="btn btn-primary w-20">Add</a> </div> <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
        <!-- BEGIN: Modal Content update-->
        <div id="headerPreview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>


                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Fulle Name</label>
                        <input id="modal-form-1" type="text" class="form-control" placeholder="fulle name" v-model="edite.name"> </div>
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label" >Email</label>
                        <input id="modal-form-2" type="text" class="form-control"  placeholder="example@gmail.com" v-model="edite.email"> </div>
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Tel</label>
                        <input id="modal-form-2" type="text" class="form-control" placeholder="0XX XXX XXX" v-model="edite.tel"> </div>
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Address</label>
                        <input id="modal-form-2" type="text" class="form-control" placeholder="address" v-model="edite.address"> </div>
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-6" class="form-label">Role</label>
                        <select id="modal-form-6" class="form-select" v-model="edite.role_id">
                            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6"> <label for="modal-form-6" class="form-label">Company</label>
                        <select id="modal-form-6" class="form-select" v-model="edite.company_id">
                            <option v-for="company in companies" :key="company.id" :value="company.id">{{ company.name }}</option>
                        </select>
                    </div>
                </div> <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <a type="button"  @click="SubmitUser()" id="programmatically-toggle-modal"
                    href="javascript:;"  data-tw-dismiss="modal"
                    class="btn btn-primary w-20">Update</a> </div> <!-- END: Modal Footer -->
            </div>
        </div>
        </div>
        <!-- END: Modal Content -->
        </div>
    </div>
</template>
<script>


import topBare from '../template/TopBarComponent.vue'
import sideBare from '../template/SideBarComponent.vue'

export default {
    components: {
        topBare,
        sideBare,
    },

    data() {
        return {
            users:{},
            roles:{},
            companies:{},
            addData:{
                name:'',
                address:'',
            },
            edite:{
                id:'',
                name:'',
                address:'',
                tel:'',
                email:'',
                role_id:'',
                company_id:'',
            },
            id:'',
        }
    },
    methods: {
        getusers() {
            axios.get('/api/list/users')
            .then((response=>{
                this.users = response.data.users;
            }))

        },
        resetForm(objet){
            Object.keys(objet).forEach(function(key , index){
                objet[key] = ''
            })
        },
        AddUser(){
          axios.post('/api/add/user/', this.addData)

            .then((response) => {
            this.users = response.data.users;
                        this.getusers()
                    })
            this.resetForm(this.addData)
        // Can accept an Object of options

        },
        getroles() {
            axios.get('/api/list/roles')
            .then((response=>{
                this.roles = response.data.roles;
            }))
        },
        getcompanies() {
            axios.get('/api/list/companies')
            .then((response=>{
                this.companies = response.data.companies;
            }))
        },
        showEditUser(data){
                this.edite.id = data.id,
                this.edite.name = data.name,
                this.edite.address = data.address,
                this.edite.tel = data.tel,
                this.edite.email = data.email,
                this.edite.role_id = data.role_id,
                this.edite.company_id = data.company_id
            },
        SubmitUser(){
        axios.put('/api/update/user/'+this.edite.id, this.edite)
       // this.$("#header-footer-modal-preview").modal('hide');
        .then((response) => {
            this.users = response.data.users;
                        this.getusers()
                    })
        // Can accept an Object of options

        },
        getIdDeleteModal(id){
            this.id = id
        },
        async deleteUser(){
            axios.delete('/api/delete/user/'+this.id)
                .then((response) => {
                this.users = response.data.users;
                this.getusers()
                    })

        }

    },
    created() {
        this.getusers();
        this.getroles();
        this.getcompanies();

    },

}
</script>
