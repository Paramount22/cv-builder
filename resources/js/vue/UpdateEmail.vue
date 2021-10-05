<template>

</template>

<script>
    export default {
        name: "UserEmail",
        props: ['user'],
        data() {
            return {
                email: this.user.email,
                userId: this.user.id,
            }
        },


        methods: {
            updateEmail() {
                if(this.email !== '') {
                    axios.post(`/user/${this.userId}/update`, {
                        email: this.email
                    });
                    this.$root.$emit('flash', 'E-mailová adresa bola zmenená.');
                    this.$root.$emit('updatedEmail', this.email);
                    this.visible = true;
                    setTimeout(()=>{
                        this.visible = false
                    }, 1500);
                }


            }
        }
    }
</script>

<style scoped>

</style>
