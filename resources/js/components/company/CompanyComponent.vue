<template>

    <!--     <h1>{{ message }}</h1>
 -->
    <!--buttom add-->
    <div class="field is-grouped">
        <p class="control">
            <button class="button is-primary" @click="modalFileCompany = true">
                <span class="icon">
                    <i class="fa fa-plus"></i>
                </span>
                <span>Add</span>
            </button>
        </p>
    </div>



    <div class="container">
        <div class="notification is-success is-light" v-if="success == true">
            <strong>{{ message }}</strong>
        </div>

        <div class="notification is-primary">

            <div class="content is-normal">
                <table id="account-clients" class="table is-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Applicante Name</th>
                            <th scope="col">Customer Type</th>
                            <th scope="col">Name Company</th>
                            <th scope="col">Nif</th>
                            <th scope="col">Account TXA</th>
                            <th scope="col">City</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in rows" :key="index">
                            <td>{{ index + 1 }}</td>
                            <td>
                                <span>{{ row.applicante_name }}</span>
                            </td>
                            <td>
                                <span>{{ row.customer_type }}</span>
                            </td>
                            <td>
                                <span>{{ row.name_company }}</span>
                            </td>
                            <td>
                                <span>{{ row.nif }}</span>
                            </td>
                            <td>
                                <span>{{ row.account_txa }}</span>
                            </td>
                            <td>
                                <span>{{ row.customer_city }}</span>
                            </td>
                            <td>
                                <span>null</span>
                            </td>
                            <td>
                                <!--button action icons-->
                                <div class="field is-grouped">
                                    <p class="control">
                                        <a class="button is-small is-primary" href="#"
                                            @click.prevent="editCompany(row)">
                                            <span class="icon is-small">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                    </p>

                                    <!--button view-->
                                    <p class="control">
                                        <a class="button is-small is-info" href="#" @click.prevent="viewCompany(row)">
                                            <span class="icon is-small">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </a>
                                    </p>

                                    <!--Buttom add advance-->
                                    <p class="control">
                                        <a class="button is-small is-link" href="#" @click.prevent="addAdvance(row)">
                                            <span class="icon is-small">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                    </p>

                                    <!--button delete-->
                                    <p class="control">
                                        <a class="button is-small is-danger" href="#"
                                            @click.prevent="deleteCompany(row)">
                                            <span class="icon is-small">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a>
                                    </p>


                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>

        <Teleport to="body">
            <!-- use the modal component, pass in the prop -->
            <modal :show="modalFileCompany" @close="modalFileCompany = false">
                <template #header>
                    <h3 class="title">
                        <i class="fa fa-plus"></i>
                        Datos de Empresa
                    </h3>

                </template>
                <template #body>

                    <div class="field">
                        <div class="control" v-if="companyUpdate == false">
                            <textarea v-model="fileCompany" class="textarea is-large" rows="20"
                                placeholder="Copy paste info file company"></textarea>
                        </div>

                        <div v-else>
                            <div class="field">
                                <label class="label">Applicante Name</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.applicante_name"
                                        placeholder="Name Company">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Customer Type</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.customer_type"
                                        placeholder="Customer Type">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Name Company</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.name_company"
                                        placeholder="Name Company">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Nif</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.nif"
                                        placeholder="Nif">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Account TXA</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.account_txa"
                                        placeholder="Account TXA">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Customer Address</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.customer_address"
                                        placeholder="customer_address">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Customer City</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.customer_city"
                                        placeholder="customer_city">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">User Name</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.user_name"
                                        placeholder="user_name">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">User Rut</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.user_rut"
                                        placeholder="user_rut">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">User Phone</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.user_phone"
                                        placeholder="user_phone">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">User Email</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.user_email"
                                        placeholder="user_email">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Proposed Date</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.proposed_date"
                                        placeholder="proposed_date">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Type Service</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.type_service"
                                        placeholder="type_service">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Type Impression</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.type_of_impression"
                                        placeholder="type_of_impression">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Documentary Return</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.documentary_return"
                                        placeholder="documentary_return">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Type of Integration</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.type_of_integration"
                                        placeholder="type_of_integration">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Printer Property</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.printer_property"
                                        placeholder="printer_property">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Computer Property</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.computer_property"
                                        placeholder="computer_property">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Migrated to TXA</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.migrated_to_txa"
                                        placeholder="migrated_to_txa">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Inhouse</label>
                                <div class="control">
                                    <input type="text" class="input is-large" v-model="infoCompany.inhouse"
                                        placeholder="inhouse">
                                </div>
                            </div>

                        </div>

                    </div>



                </template>
                <template #footer>
                    <div class="card-footer align-content-center">
                        <div class="field is-grouped">
                            <div class="control" v-if="companyUpdate == false">
                                <button class="button is-link" @click="registerFileCompany()">Guadar</button>
                            </div>
                            <div class="control" v-else>
                                <button class="button is-link" @click="SaveEditFileCompany(infoCompany.id)">Editar</button>
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


</template>

<script>

import Modal from '../modal/ModalComponent.vue';

export default {
    //define variables
    data() {
        return {
            success: false,
            rows: [],
            fileCompany: "",
            infoCompany: {
                id: "",
                applicante_name: "",
                customer_type: "",
                customer_tracking_gts: "",
                name_company: "",
                nif: "",
                account_txa: "",
                customer_address: "",
                customer_city: "",
                user_name: "",
                user_rut: "",
                user_phone: "",
                user_email: "",
                proposed_date: "",
                type_service: "",
                type_of_impression: "",
                documentary_return: "",
                type_of_integration: "",
                printer_property: "",
                computer_property: "",
                migrated_to_txa: "",
                inhouse: "",

            },
            loading: true,
            message: "",
            modalFileCompany: false,
            companyUpdate: false,

        };
    },
    methods: {

        registerFileCompany() {
            // get lines with break in textarea
            var lines = this.fileCompany.split('\n');
            var lines_array = [];
            for (var i = 0; i < lines.length; i++) {
                lines_array.push(lines[i].split(';'));
            }

            //get count line break

            var count_line_break = lines.length;

            if (count_line_break >= 21) {

                this.success = true;
                this.modalFileCompany = false;
                this.message = "File company registered successfully";

                axios.post('/company/registerCompany', {
                    lines_array: lines_array
                })
                    .then(response => {
                        //  this.success = response.data.message;
                        this.modalFileCompany = false;
                        this.fileCompany = "";
                        location.reload();

                    })
                    .catch(error => {
                        //  this.success = error.response.data.message;
                    });


                /* this.success = "Registro correcto";
                this.modalFileCompany = false; */

            } else {

                alert("File company must have at least 21 lines");
                //this.modalFileCompany = false;
                this.success = true;
                this.message = "El archivo no tiene el formato correcto";
            }


        },

        table() {


            this.$nextTick(() => {
                $('#account-clients').DataTable({
                    "paging": true,
                    "pageLength": 100,
                    "destroy": true,
                    "lengthChange": false,
                    "searching": true,
                    "processing": true,
                    "loadingRecords": true,
                    "info": true,
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

        getCompaniesList() {
            this.loading = true;
            axios.get('/company/load')
                .then(response => {
                    this.rows = response.data;
                    this.loading = false;
                    console.log(response);
                    this.table();
                })
                .catch(error => {
                    this.loading = false;
                    console.log(error);
                });
        },


        /***Methods Actions******************* */

        editCompany(row) {

            this.modalFileCompany = true;
            this.companyUpdate = true;

            // get filecompany by id
            axios.get('/company/getInfoCompany/' + row.id)
                .then(response => {
                    this.infoCompany = response.data;

                    console.log(response.data);

                    //this.fileCompany = response.data.fileCompany;
                })
                .catch(error => {
                    console.log(error);
                });


        },

        SaveEditFileCompany(id) {

             axios.post('/company/updateCompany', {
                infoCompany: this.infoCompany,
                id: id
            })
                .then(response => {
                    this.success = response.data.message;
                    this.modalFileCompany = false;
                    this.fileCompany = "";
                    location.reload();
                })
                .catch(error => {
                    this.success = error.response.data.message;
                });


        },


        /************************************* */
        closeModal() {
            this.modalFileCompany = false;
            this.fileCompany = "";
            this.success = false;
            this.message = "";
            this.companyUpdate = false;

        },



    },
    mounted() {
        this.getCompaniesList();
    },
    components: {
        Modal,
    }


}




</script>
