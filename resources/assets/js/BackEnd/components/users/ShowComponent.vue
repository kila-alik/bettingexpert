<template>
    <i class="fa fa-edit edit-component button" title="Редактировать" @click="setModal"></i>
</template>

<script>
    export default {
        props: {
            userId: ''
        },
        methods: {
            setModal() {
                this.$parent.setModal();
                this.$refs.user_id = this.userId
            }
        }
    }
</script>

<style scoped>

</style>