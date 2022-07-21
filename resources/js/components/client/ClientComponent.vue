<template>
    <!--load file txt-->
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subir .txt</div>
                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-default-success">
                            {{ success }}
                        </div>
                        <form @submit.prevent="submit" enctype="multiform/form-data">

                            <div class="form-group">

                                <div class="file is-centered is-boxed is-success has-name">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="resume" @change="loadFile"
                                            id="ControlFile">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                Archivo Plano-TXA
                                            </span>
                                        </span>
                                        <span class="file-name">
                                            {{ fileName }}

                                        </span>


                                    </label>

                                </div>


                            </div>


                            <!--progrees bar-->
                            <div class="progress" v-if="loading">
                            <progress class="progress is-small is-primary" max="100">15%</progress>
                            </div>


                        </form>
                    </div>
                    <div class="content is-normal">
                        <table id="account-clients" class="table is-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Account Txa</th>
                                    <th scope="col">Nif</th>
                                    <th scope="col">Name Company</th>
                                    <th scope="col">Account Gts</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(row, index) in rows" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    <span>{{ row.account_txa }}</span>
                                </td>
                                <td>
                                    <span>{{ row.nif }}</span>
                                </td>
                                <td>
                                    <span>{{ row.name_company }}</span>
                                </td>
                                <td>
                                    <span>{{ row.account_gts }}</span>
                                </td>
                                <td>
                                    <span>{{ row.created_at }}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    //define variables
    data() {
        return {
            success: "",
            rows: [],
            fileName: "",
            time_difference_seconds: 0,
            loading: true,

        };
    },
    methods: {

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



        getAccountList() {


            axios.get("/client/load").
            then((response) => {

            $('#account-clients').DataTable().destroy();


            //captute time seconds response
                var time = new Date().getTime();
                var time_response = new Date(response.headers.date).getTime();
                var time_difference = time - time_response;
                this.time_difference_seconds = time_difference / 1000;
                //convert seconds tp miliseconds
                this.time_difference_seconds = this.time_difference_seconds * 1000;
                console.log("Segundos: ",this.time_difference_seconds);

                this.rows = response.data;



            })
            .catch((error) => {
                console.log("error:", error);
            })
            .finally(() => {


                this.table();
                this.loading = false;

                /* setTimeout(() => {
                    this.loading = true;
                this.rows = response.data;
                this.table();

                 }, 500); */



            });

        },
        loadFile: function (e, time) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                var contents = e.target.result;
                var lines = contents.split("\n");
                var data = [];
                for (var i = 0; i < lines.length; i++) {
                    var line = lines[i];
                    var parts = line.split(";");
                    var obj = {
                        account_txa: parts[0],
                        nif: parts[1],
                        name_company: parts[2],
                        account_gts: parts[3],
                        created_at: parts[4],
                    };
                    data.push(obj);
                }
                //insert data if difererent from null
                axios
                    .post("/client/save", data)
                    .then(function (response ) {

                    })
                    .catch(function (error) {
                        console.log(error);
                    }).finally(function () {
                        alert("Se cargaron " + data.length + " registros");

                        location.reload();

                    });
            };

            reader.readAsText(file);

            this.getAccountList();


        },

    },

    mounted() {
        this.getAccountList();


    },
};
</script>
