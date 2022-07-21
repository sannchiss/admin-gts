<template>

    <div class="container">
        <div class="notification is-success is-light">
            <h1>{{ name }}</h1>
            <button class="button is-link is-rounded" @click="showModal = true">
                <i class="fas fa-plus"></i>
                Nuevo
            </button>

            <!--click show modal-->



            <table id="users-table" class="table is-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="sort" data-sort="name">Name</th>
                        <th scope="col" class="sort" data-sort="budget">User Name</th>
                        <th scope="col" class="sort" data-sort="status">Password</th>
                        <th scope="col" class="sort" data-sort="status">Email</th>
                        <th scope="col" class="sort" data-sort="completion">Role</th>
                        <th scope="col" class="sort" data-sort="completion">Account Txa</th>
                        <th scope="col" class="sort" data-sort="completion">Account GTS</th>
                        <th scope="col" class="sort" data-sort="completion">Project Id</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users" :key="index">
                        <td>{{ user.name }}</td>
                        <td>{{ user.username }}</td>
                        <td>{{ user.password }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.role }}</td>
                        <td>{{ user.account_txa }}</td>
                        <td>{{ user.account_gts }}</td>
                        <td>{{ user.project_id }}</td>


                        <td style="height:100px;width:100px">
                            <button class="button is-small is-primary" @click="updateUser(index)">
                                <span class="icon is-small">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </button>
                            <button class="button is-small is-danger" @click="deleteCredential(index)">
                                <span class="icon is-small">
                                    <i class="fas fa-trash"></i>
                                </span>

                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>


        </div>



        <div>

            <Teleport to="body">
                <!-- use the modal component, pass in the prop -->
                <modal :show="showModal" @close="showModal = false">
                    <template #header>
                        <h3 class="title">
                            <i class="fas fa-user"></i>
                            Datos de Usuario
                        </h3>

                    </template>
                    <template #body>
                        <div class="container">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">

                                            <div class="column is-half">


                                                <div class="field">
                                                    <label class="label">Name</label>
                                                    <div class="control">
                                                        <input class="input" type="text" placeholder="Text input"
                                                            v-model="user.name">
                                                    </div>
                                                </div>

                                                <div class="field">
                                                    <label class="label">Username</label>
                                                    <div class="control has-icons-left has-icons-right">

                                                        <input class="input" type="text" placeholder="Text input"
                                                            v-model="user.username">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                        </span>




                                                    </div>
                                                    <p class="help is-success">-</p>
                                                </div>

                                                <div class="field">
                                                    <label class="label">Email</label>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input is-success" type="email"
                                                            placeholder="Email input" v-model="user.email">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                        <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                    </div>

                                                </div>

                                                <!--account txa-->
                                                <div class="field">
                                                    <label class="label">Account Txa</label>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input is-success" type="text"
                                                            placeholder="account_txa" v-model="user.account_txa">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                    </div>
                                                    <p class="help is-success">-</p>
                                                </div>
                                                <!--account gts-->
                                                <div class="field">
                                                    <label class="label">Account Gts</label>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input is-success" type="text"
                                                            placeholder="account_gts" v-model="user.account_gts">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                    </div>
                                                    <p class="help is-success">-</p>
                                                </div>

                                                <!--project id-->
                                                <div class="field">
                                                    <label class="label">Project Id</label>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input is-success" type="text"
                                                            placeholder="project_id" v-model="user.project_id">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                    </div>
                                                    <p class="help is-success">-</p>
                                                </div>
                                                <!--password-->
                                                <div class="field">
                                                    <label class="label">Password</label>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input is-success" type="password"
                                                            placeholder="Text input" v-model="user.password">
                                                        <span class="icon is-small is-left">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                    </div>
                                                    <p class="help is-success">-</p>
                                                </div>
                                                <!--rol-->

                                                <div class="field">
                                                    <label class="label">Rol</label>
                                                    <div class="control">
                                                        <div class="select">
                                                            <select v-model="user.role">
                                                                <option value="menu_cliente_full">Menú cliente full
                                                                </option>
                                                                <option value="menu_cliente_consulta">Menú cliente
                                                                    consulta</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template #footer>
                        <div class="card-footer align-content-center">
                            <div class="field is-grouped">
                                <div class="control" v-if="userUpdate == false">
                                    <button class="button is-link" @click="registerUser()">Guadar</button>
                                </div>
                                <div class="control" v-if="userUpdate == true">
                                    <button class="button is-link" @click="updateUser()">Actualizar</button>
                                </div>
                                <div class="control">
                                    <button class="button is-link is-light" @click="closeModal">Cancelar</button>
                                </div>
                            </div>

                        </div>
                    </template>

                </modal>
            </Teleport>



        </div>


    </div>


</template>

<script>


import Modal from '../modal/ModalComponent.vue';


export default ({

    name: 'CredentialComponent',

    data: () => ({
        users: [],

        showModal: false,
        userUpdate: false,

        user: {
            name: '',
            username: '',
            password: '',
            email: '',
            role: '',
            account_txa: '',
            account_gts: '',
            project_id: ''
        },

    }),


    methods: {

        table() {
            this.$nextTick(() => {
                $('#users-table').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "processing": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados en su búsqueda",
                        "searchPlaceholder": "Buscar registros",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "No existen registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    }

                });
            });
        },

        getCredentials() {

            axios.get('/credential/list')
                .then(response => {
                    this.users = response.data;
                    this.table();

                })
                .catch(error => {
                    console.log(error);
                });
        },

        registerUser() {

            axios.post('/credential/register', this.user)
                .then(response => {
                    this.getCredentials();
                    this.showModal = false;

                    // refresh datatable
                    $('#users-table').DataTable().destroy();

                })
                .catch(error => {
                    console.log(error);
                });
        },


        updateUser(index) {


            /* this.$swal.fire(
              'Good job!',
              'You clicked the button!',
              'success'
              ) */

            this.showModal = true;
            this.userUpdate = true;
            this.user = this.users[index];

        },

        saveUpdateUser() {
            axios.put('/credential/update', this.user)
                .then(response => {
                    this.getCredentials();
                    this.showModal = false;
                })
                .catch(error => {
                    console.log(error);
                });
        },


        deleteCredential(index) {


            const swalWithBootstrapButtons = this.$swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.delete('/credential/delete/' + this.users[index].id)
                        .then(response => {
                            this.getCredentials();

                            // refresh datatable
                            $('#users-table').DataTable().destroy();


                        })
                        .catch(error => {
                            console.log(error);
                        });


                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })



        },

        // funtion modal close
        closeModal() {
            this.showModal = false;
            this.userUpdate = false;

            //clear user
            this.user = {
                name: '',
                username: '',
                password: '',
                email: '',
                role: '',
                account_txa: '',
                account_gts: '',
                project_id: ''
            };


        },


    },

    components: {
        Modal,

    },


    mounted() {
        this.getCredentials();
    },

    created() {



    },

})
</script>



