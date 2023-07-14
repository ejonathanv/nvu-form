import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const { createApp } = Vue;

createApp({
    data() {
        return {
            submiting: false,
        };
    },
    methods: {
        submitForm() {
            this.submiting = true;
            this.$refs.form.submit();
        }
    }
}).mount("#app");
