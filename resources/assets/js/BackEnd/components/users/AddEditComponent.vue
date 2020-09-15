<template>
    <div class="edit-component modal" role="dialog">
        <div class="edit-component modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="$parent.showModal()">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">
                        <span v-if="mode==='add'">Добавление пользователя</span>
                        <span v-if="mode==='edit'">Редактирование пользователя</span>
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="form-horizontal">
                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="name">Имя</label>
                                <input class="form-control" type="text" id="name" autocomplete="off" v-model="user.name">
                                <ul class="parsley-errors-list filled" v-if="this.errors.name">
                                    <li class="parsley-required">{{ this.errors.name[0] }}.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="emailaddress">Email адрес</label>
                                <input class="form-control" type="text" id="emailaddress" autocomplete="off" v-model="user.email">
                                <ul class="parsley-errors-list filled" v-if="this.errors.email">
                                    <li class="parsley-required">{{ this.errors.email[0] }}.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="password">Пароль</label>
                                <input class="form-control" type="password" id="password" autocomplete="off" v-model="user.password">
                                <ul class="parsley-errors-list filled" v-if="this.errors.password">
                                    <li class="parsley-required">{{ this.errors.password[0] }}.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <select class="selectpicker m-b-0" data-style="btn-light" v-model="user.is_forecaster">
                                    <option data-icon="fa fa-users" value="0">Пользователь</option>
                                    <option data-icon="fa fa-user-circle-o" value="1">Прогнозист</option>
                                </select>
                                <ul class="parsley-errors-list filled" v-if="this.errors.is_forecaster">
                                    <li class="parsley-required">{{ this.errors.is_forecaster[0] }}.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group m-b-25" v-if="parseInt(user.is_forecaster)">
                            <div class="col-12">
                                <label for="information">Информация</label>
                                <textarea class="form-control" rows="5" id="information" v-model="user.information"></textarea>
                                <ul class="parsley-errors-list filled" v-if="this.errors.information">
                                    <li class="parsley-required">{{ this.errors.information[0] }}.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group m-b-25" v-if="parseInt(user.is_forecaster)">
                            <div class="col-12">
                                <label for="sort_id">Для какого вида спорта</label>
                                <select name="sort_id" id="sort_id" v-model="user.sort_id">
                                    <option :value="sort.id" v-for="sort in sorts">{{ sort.name }}</option>
                                </select>
                                <ul class="parsley-errors-list filled" v-if="this.errors.sort_id">
                                    <li class="parsley-required">{{ this.errors.sort_id[0] }}.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-12">
                                <div class="sk-wave" v-show="loading">
                                    <div class="sk-rect sk-rect1"></div>
                                    <div class="sk-rect sk-rect2"></div>
                                    <div class="sk-rect sk-rect3"></div>
                                    <div class="sk-rect sk-rect4"></div>
                                    <div class="sk-rect sk-rect5"></div>
                                </div>
                                <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit" @click="addEditUser()">
                                    <span v-if="mode==='add'">Добавить</span>
                                    <span v-if="mode==='edit'">Сохранить</span>
                                </button>
                            </div>
                        </div>

                    </div>


                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <div id="overlay"></div>
    </div><!-- /.modal -->
</template>

<script>
    export default {
        data() {
            return {
                mode: 'add',
                user: {
                    id: 0,
                    name: '',
                    email: '',
                    password: '',
                    information: '',
                    is_forecaster: 0,
                    sort_id: 0
                },
                sorts: {},
                errors: {},
                showAddModal: false,
                loading: false
            }
        },
        mounted() {
            /**
             * Get Sorts
             */
            axios.post('/control-panel/sorts/get')
                .then((response) => {
                    this.sorts = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        updated() {
            $(this.$el).find('.selectpicker').selectpicker('refresh');
        },
        methods: {
            addEditUser()
            {
                this.loading = !this.loading;

                if(this.mode === 'add') {
                    axios.post('/control-panel/users/add-user', {
                        data: this.user
                        })
                        .then((response) => {
                            this.loading = !this.loading;
                            if (response.data.errors) {
                                this.errors = response.data.errors;
                            } else {
                                alert('Пользователь успешно добавлено.');
                                location.reload();
                            }
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }else{
                    axios.post('/control-panel/users/update-user', {
                        data: this.user
                        })
                        .then((response) => {
                            this.loading = !this.loading;
                            if (response.data.errors) {
                                this.errors = response.data.errors;
                            } else {
                                this.$swal({
                                            title: 'Данные сохранено!',
                                            type: 'success',
                                            confirmButtonClass: 'btn btn-confirm mt-2'
                                        });
                                this.errors = {};
                                this.user = response.data;
                            }
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            getUser(user_id) {
                this.mode = 'edit';

                axios.post('/control-panel/users/get-user', {
                        user_id: user_id
                    })
                    .then((response) => {
                        this.user = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
        }
    }
</script>
