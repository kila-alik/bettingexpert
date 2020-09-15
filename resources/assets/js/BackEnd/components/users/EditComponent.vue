<template>
    <div class="edit-component modal" role="dialog">
        <div class="edit-component modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="setModal()">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Редактирование</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" action="#">

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="username">Name</label>
                                <input class="form-control" type="text" id="username" autocomplete="off" v-bind:value="user.name">
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="text" id="emailaddress" autocomplete="off" :value="user.email">
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-12">
                                <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Сохранить</button>
                            </div>
                        </div>

                    </form>


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
                user: {
                    user_id: '',
                    name: '',
                    email: '',
                    password: '',
                    password_confirmed: ''
                }
            }
        },
        props: {
            user_id: ''
        },
        methods: {
            setModal(user_id) {
                this.$parent.showModal = !this.$parent.showModal;
                axios.post('/control-panel/users/get-user', {
                        user_id: user_id
                    })
                    .then((response) => {
                        console.log(response);
                    })
            },

            saveData(e) {
                e.preventDefault();
                console.log(this.user);
                axios.put('/control-panel/users/1', this.user)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
