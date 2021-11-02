<template>
    <div>
        Email:
       <span v-if="!updatedEmail">
           {{user.email}}
       </span>

        <span v-if="updatedEmail">
            {{updatedEmail}}
        </span>
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
    span {
        font-weight: bolder;
    }
</style>
