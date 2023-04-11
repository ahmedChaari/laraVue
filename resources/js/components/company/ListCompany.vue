<template>
    <div>

        <div class="content">
                <h2 class="intro-y text-lg font-medium mt-10">
                    LIST OF COMPANIES
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">



<!-- BEGIN: Modal Toggle -->

    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-company" class="btn btn-primary shadow-md mr-2">
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
                                    <th class="whitespace-nowrap">IMAGE</th>
                                    <th class="whitespace-nowrap">NAME</th>
                                    <th class="text-center whitespace-nowrap">ADRESSE</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="intro-x" v-for="company in companies" :key="company.id">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-11.jpg" title="Uploaded at 12 October 2020">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ company.name }}</a>

                                    </td>
                                    <td class="text-center">{{ company.address }}</td>

                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#header-footer-modal-preview"
                                             @click="showEditCompany(company)"> <i data-lucide="check-square" class="w-4 h-4 mr-1" >

                                            </i> Edit </a>
                                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                             @click="getIdDeleteModal(company.id)"
                                             data-tw-target="#button-modal-delete"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
                </div>

            </div>

            <!-- BEGIN: Modal Content delete company -->
            <div id="button-modal-delete" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"> <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x" class="w-8 h-8 text-slate-400 alt-danger"></i> </a>
                        <div class="modal-body p-0">
                            <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Delete Company</div>
                                <div class="text-slate-500 mt-2">Are you sur you need to delete companu</div>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24"
                                 @click="deleteCompany">Yes</button> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Modal Content -->

        <!-- BEGIN: Modal Content create company-->
        <div id="add-company" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">add a new company</h2>


                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label"> Name of company</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="name" v-model="addData.name">
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label"> Address of company</label>
                            <input id="address" type="text" name="address" class="form-control" placeholder="address" v-model="addData.address">
                        </div>

                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20" id="addCompany" data-tw-dismiss="modal"
                         @click="AddCompany()">add</button>
                    </div> <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
         <!-- END: Modal Content -->


        <!-- BEGIN: Modal Content -->
        <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">update company</h2>


                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label"> Name of company</label>
                            <input id="modal-form-1" type="text" class="form-control" placeholder="name" v-model="edite.name">
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label"> Address of company</label>
                            <input id="modal-form-1" type="text" class="form-control" placeholder="address" v-model="edite.address">
                        </div>

                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20" id="submitcompay" data-tw-dismiss="modal"
                         @click="SubmitCompany()">Update</button>
                    </div> <!-- END: Modal Footer -->
                </div>
            </div>
        </div> <!-- END: Modal Content -->



    </div>
</template>
<script>
import * as $ from 'jquery';



export default {
    data() {
        return {
            companies:{},
            addData:{
                name:'',
                address:'',
            },
            edite:{
                id:'',
                name:'',
                address:'',
            },
            id:'',
        }
    },
    methods: {
        getcompanies() {
            axios.get('/api/list/companies')
            .then((response=>{
                this.companies = response.data.companies;
            }))
        },
        resetForm(objet){
            Object.keys(objet).forEach(function(key , index){
                objet[key] = ''
            })
        },
        AddCompany(){
          axios.post('/api/add/company/', this.addData)

            .then((response) => {
            this.companies = response.data.companies;
                        this.getcompanies()
                    })
            this.resetForm(this.addData)
        // Can accept an Object of options

        },
        showEditCompany(data){
            this.edite.id = data.id,
            this.edite.name = data.name,
            this.edite.address = data.address
        },
        SubmitCompany(){
            axios.put('/api/update/company/'+this.edite.id, this.edite)
            .then((response) => {
                this.companies = response.data.companies;
                this.getcompanies()
                    })
        // Can accept an Object of options

        },
        getIdDeleteModal(id){
            this.id = id
        },
        async deleteCompany(){
            axios.delete('/api/delete/company/'+this.id)
                .then((response) => {
                this.companies = response.data.companies;
                this.getcompanies()
                    })
        }
    },
    created() {
        this.getcompanies();

    },

}
</script>
