<template>
    <div>
        
        <div class="content">
                <h2 class="intro-y text-lg font-medium mt-10">
                    LIST OF USERS
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">



<!-- BEGIN: Modal Toggle -->

    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary shadow-md mr-2">
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
                                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                                </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                                </li>
                            </ul>
                        </nav>
                        <select class="w-20 form-select box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div>
                    <!-- END: Pagination -->
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="p-5 text-center">
                                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-slate-500 mt-2">
                                        Do you really want to delete these records? 
                                        <br>
                                        This process cannot be undone.
                                    </div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <button type="button" class="btn btn-danger w-24">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Delete Confirmation Modal -->
            </div>





 <!-- BEGIN: Modal Content -->
 <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                 <h2 class="font-medium text-base mr-auto">Broadcast Message</h2> 
                 
                 
             </div> <!-- END: Modal Header -->
             <!-- BEGIN: Modal Body -->
             <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Fulle Name</label> <input id="modal-form-1" type="text" class="form-control" placeholder="fulle name"> </div>
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Email</label> <input id="modal-form-2" type="text" class="form-control" placeholder="example@gmail.com"> </div>
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-6" class="form-label">Role</label> <select id="modal-form-6" class="form-select">
                         <option disabled>-------</option>
                         <option>Administrateur</option>
                         <option>Employee</option>
                     </select> 
                 </div>
                 <div class="col-span-12 sm:col-span-6"> <label for="modal-form-6" class="form-label">Company</label> <select id="modal-form-6" class="form-select">
                         <option disabled>--------</option>
                         <option>Chaimae</option>
                         <option>Adidas</option>
                         <option>Nike</option>
                        
                     </select> 
                 </div>
             </div> <!-- END: Modal Body -->
             <!-- BEGIN: Modal Footer -->
             <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="button" class="btn btn-primary w-20">Send</button> </div> <!-- END: Modal Footer -->
         </div>
     </div>
 </div> <!-- END: Modal Content -->



    </div>
</template>
<script>
export default {

    data() {
        return {
            users:{},
        }
    },
    methods: {
        getusers() {
            axios.get('/api/list/users')
            .then((response=>{
                this.users = response.data.users;
            }))
        }
    },
    created() {
        this.getusers();
       
    },
    
}
</script>