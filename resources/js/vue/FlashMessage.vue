<template>

    <transition name="fade">
        <div class="alert alert-success flash-message alert-dismissible fade show" role="alert"
             v-show="show"
        >
            <strong>OK!</strong> {{ message  }}
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true" @click="hideFlash">&times;</span>
            </button>
        </div>
    </transition>

</template>

<script>
    export default {
        name: "FlashMessage",
        props: ['text'],

        data() {
            return {
                show: false,
                message: ''
            }
        },

        created() {
            this.message = this.text;

            this.$root.$on('flash', message => {
                this.message = message;
                this.showFlash();
            });
        },

        methods: {
            showFlash() {
                this.show = true;
                setTimeout(()=> this.hideFlash(), 3000)
            },

            hideFlash() {
                this.show = false
            }
        }
    }
</script>

<style lang="scss" scoped>
    .flash-message {
        position: fixed;
        right: 2rem;
        bottom: 2rem;
        color: #0f5132;
        background-color: #d1e7dd;
        border-color: #badbcc;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .35s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
