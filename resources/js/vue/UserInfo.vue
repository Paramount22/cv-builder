<template>
    <div>
       <div v-if="!updatedEmail">
           {{user.email}}
       </div>

        <div v-if="updatedEmail">
            {{updatedEmail}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserInfo",
        props: ['user'],

        data() {
            return {
                //email: this.user.email,
                userId: this.user.id,
                userData: [],
                updatedEmail: '',
            }
        },

        created() {

            this.$root.$on('updatedEmail', data => {
                //console.log(data);
                this.updatedEmail = data
            });

        },
        methods: {
            getUser() {
                axios.get(`/user/${this.userId}`)
                    .then(response => {
                        this.userData =  response.data
                    })
            }
        }
    }
</script>

<style scoped>

</style>
